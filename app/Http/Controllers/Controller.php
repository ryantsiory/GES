<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $notification;

    public function __construct()
    {
        $this->middleware('auth');


    }

    public function index(){
        $user_id = Auth::user()->id;
        $this->notifications = Notification::where("user_id", $user_id)->get();
        View::share('notif', $this->notifications);
    }




}
