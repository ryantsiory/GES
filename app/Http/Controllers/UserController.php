<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Information;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request['name'];
        $user->lastname = $request['lastname'];
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
                'lastname' => $user->lastname,
                'email' => $user->email,
                'password' => Hash::make($user->password),
                'avatar' => $user->avatar,
            ]);

        }

        Information::where('user_id',Auth::user()->id)->update([
                                                            'adresse'=>$request['adresse'],
                                                            'telephone'=>$request['telephone'],
                                                            'date_de_naissance'=>$request['date_de_naissance']
                                                        ]);
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
