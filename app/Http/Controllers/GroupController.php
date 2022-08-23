<?php

namespace App\Http\Controllers;
use App\Models\group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        //some functions can only be executed by group admin/owner
        $this->middleware('owner')->only(['edit', 'update', 'delete', 'remove_user', 'show']);

        //the group will only be accessed by a member  message
        $this->middleware('member')->only('show', 'update');
    }

    //display form to create a group //-- show create Group Page
    public function create_form()
    {
        return view('group.create');
    }
    // create New Group
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        //generate a code for the groupe
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($characters), rand(0, 9), 7);
       // insert New Group to Table
        $group = group::create([
            'name' => $request->name,
            'code' => $code,
            'admin_id' => auth()->user()->id,
        ]);

        //we attach the user with the group after he created it
       $group->participants()->attach(auth()->user()->id);

        return redirect('/home')->with('success', 'Your group has been created');
    }

    //display the form to join a group
    public function join_form()
    {
        return view('group.join');
    }

    //user join a group by entering the code
    public function join(Request $request)
    {
        $this->validate($request, [
            'code' => 'required'
        ]);

        $code = $request->code;
       $group = Group::where('code', $code)->first();

        //if the group exists
        if ($group)
        {
            try
            {
                //we add the user to the group and we redirect him to the home page with a success message
                $group->participants()->attach(auth()->user()->id);
                return redirect('/home')->with('success', 'Group joined');
            }
            catch (\Throwable $th)
            {
                //Display an error if the user is already in the group
                return redirect('/home')->with('error', 'You are already a member of this group');
            }
        }
        else
        {
            //if the group doesn't exist we throw an error
            return redirect()->back()->with('error', 'Group not found');
        }
    }

    //display the form to edit the name of a group
    public function edit($id)
    {
        $group = Group::find($id);
        return view('group.edit', compact('group'));
    }

    //change the name of the group
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $group = Group::find($id);
        $group->name = $request->name;
        $group->save();

        return redirect('/home')->with('success', 'Group name has been changed');
    }

    //delete a groupe and remove every participant
    public function deleteGroup($id)
    {
        $group = Group::find($id);
        $group->participants()->detach();  // remove all subscribers from this Group
        $group->delete();
        $messages = $group->messages()->delete();  // remove all messages from this Group

        return redirect('/home')->with('success', 'Group has been deleted');
    }

    //display the members of a group, the admin can then decide who to remove
    public function members_list($id)
    {
        $group = Group::find($id);
        $group_members = $group->participants()->get();
        $group_id = $id;

        return view('group.members_list', compact(['group_members', 'group_id']));
    }

    //remove the user from a group
    public function remove_user($id, $user_id)
    {
        $group = Group::find($id);
        $group->participants()->detach($user_id);

        return redirect()->back()->with('success', 'A user has been removed');
    }

}
