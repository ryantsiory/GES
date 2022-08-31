<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Notification;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function createNotification($subject, $text, $object=null,$user_id)
    {

            // createNotification(Request $request)


                        $dataNotif = [
                            'subject' => $subject,
                            'text' => $text,
                            'user_id' => $user_id,
                            'seen' => 0,
                            'object' => $object,
                            'created_at' => now(),
                            'updated_at'=> now()->addMinutes(30),
                            'deleted_at' => now()->addDay(30),
                        ];
                        Notification::create($dataNotif);



    }

}
