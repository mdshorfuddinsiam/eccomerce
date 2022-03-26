<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['admin.body.header'], function($view){
            $view->with('activeAdmin', Auth::guard('admin')->user());
        });
        View::composer(['dashboard', 'frontend.profile.user_profile', 'frontend.profile.change_password'], function($view){
            $view->with('user', Auth::user());
        });



        // (stack overflow)
        // view()->composer('*', function ($view)
        // {
        //     $user = request()->user();

        //     $view->with('user', $user);
        // });

    }
}
