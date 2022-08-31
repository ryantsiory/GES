<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Notification;

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
        view()->composer('*',function($view) {

        $user_id = auth()->user()->id;

        $notifications = Notification::where("user_id", $user_id)->get();

        $count_notifications = Notification::where("user_id", $user_id)->where("seen", 0)->count();
        $view->with('notifications', $notifications);
        $view->with('count_notifications', $count_notifications);
    });
    }
}
