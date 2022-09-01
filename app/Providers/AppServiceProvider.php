<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //require_once __DIR__ . '/../Http/Helpers/func_helper.php';
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::defaultStringLength(191);
        Paginator::useBootstrap();

        // Using view composer to set following variables globally
// if (auth()->user()){
    view()->composer('*',function($view) {

        if(Auth::user() != null)
        {
            $user_id = auth()->user()->id;
        $notifications = Notification::where("user_id", $user_id)->orderBy('id', 'desc')->get();
        $count_notifications = Notification::where("user_id", $user_id)->where("seen", 0)->count();


        //messages
        // count how many message are unread from the selected user
        $users = DB::select("select users.id, users.name, users.avatar, users.email, count(is_read) as unread
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        where users.id != " . Auth::id() . "
        group by users.id, users.name, users.avatar, users.email");

        $my_id = Auth::id();

        $messages = Message::select('message', 'from', 'to')->where('to', $my_id)->get();



        $view->with('notifications', $notifications);
        $view->with('count_notifications', $count_notifications);

        $view->with('users', $users);
        $view->with('messages', $messages);
        }
        else
        {

        }


    });

// }


    }
}
