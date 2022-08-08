<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::find($id);
        return view('User.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = $request['password'];

        if($request->hasfile('avatar'))
        {
            $destination = public_path('/images/'.$user->avatar);
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('avatar');
            $extention = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extention;
            $filePath = public_path('/images/');
            $file->move($filePath, $fileName);
            $user->avatar= $fileName;

            $user->update([
                'name' => $user->name,
                'email' => $user->email,
                'password' => Hash::make($user->password),
                'avatar' => $user->avatar,
            ]);

        }

        $user->update();


        return redirect()->back()->with('status','User Updated Successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $destination = public_path('/images/'.$user->avatar);
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $user->delete();
        return redirect()->back()->with('status','User Deleted Successfully');
    }


}
