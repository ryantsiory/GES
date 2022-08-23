<?php

namespace App\Http\Controllers;
use Pusher\Pusher;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\group;


class MessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    // show all groups that User is Follow
    public function index()
    {
        $my_id = Auth::id();
        $group = group::all();
        // select channels that User Subscribe
        $users = DB::select("select groups.id, groups.name
        from groups inner JOIN  group_participants ON groups.id = group_participants.group_id and group_participants.user_id = " . Auth::id() . "
        where group_participants.user_id = " . Auth::id() . "
        group by groups.id, groups.name");
        return view('mailbox.mailboxGroup', compact(['users', 'group']));
    }
    //  get all Channels are in App
    public function subscribe()
    {
        $groupALL = Group::all();

        return view('group.join', compact('groupALL'));
    }
   // unFollow User a Channel
    public function remove_user($id)
    {
        $group = Group::find($id);  // find Channel in Group Table
        $my_id = Auth::id();        // current User
        $group->participants()->detach($my_id);  // remove User in group_participants Table
        $messages = message::where(['from' => $my_id])->first(); // find User in Messages Table according his Id
        if (is_array($messages) || is_object($messages))
        {
        foreach($messages as $value) {
            message::where(['from' => $my_id])->delete();  // delete all messages of User in Messages Table
        }
    }
        return redirect()->back();
    }

    // get messages of user according find Group
    public function getMessage($id)
    {
        $my_id = Auth::id();
        $group = Group::find($id)
        ;
        // get all messages that User sent & got
        // $messages = Message::where(function ($query) use ($id, $my_id) {
        //     $query->where('group_id', $id)->where('user_id', $my_id);
        // })->oRwhere(function ($query) use ($id, $my_id) {
        //     $query->where('group_id', $my_id)->where('user_id', $id);
        // })->get();
        $messages = message::where(['group_id' => $id])->get();
        foreach($messages as $value) {
            message::where(['user_id' => $my_id])->update(['is_read' => 1]); // if User start to see messages is_read in Table update to 0
        }
        return view('messages.index', compact(['group', 'messages']));
    }
    // update is_read .... this function update messages is not read and update to read in Navbar
    // public function getMessage($id)
    // {
    //     $my_id = Auth::id();
    //     $group = Group::find($id);
    //     $messages = message::where(['user_id' => $my_id])->get();
    //     foreach($messages as $value) {
    //         message::where(['user_id' => $my_id])->update(['is_read' => 1]);
    //     }
    // }

   // send new message to all Followers
    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'message' => 'required',
        ]);
        $to = $request->id; // this part get Group id
        $from = Auth::id();  // this part get  user id who watnts to send message
        $group = Group::find($request->id);  // find group according id
        $from = Auth::id();
        $name = Auth::user()->name;
        $group_members = $group->participants()->get();
         // send for all Followers
         foreach($group_members as $value) {
            $message = Message::create(
              $data = array(
               'group_id' => $request->id,
               'user_id' => $value->id,
               'message' => $request->message,
               'from' => $from,
               'name' => $name,
               'is_read' => 0,
               ));
               // Pusher send New message at real time
               $options = array(
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'encrypted' => true
                );
            $pusher = new Pusher(
                    env('PUSHER_APP_KEY'),
                    env('PUSHER_APP_SECRET'),
                    env('PUSHER_APP_ID'),
                    $options
                );
            $data = ['from' => $to, 'to' => $value->id];
            $notify = '' . $value->id .'';
            $pusher->trigger($notify, 'App\\Events\\Notify', $data);

            }


        return redirect()->back();
    }


}
