<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Models\main_menu;
use App\Models\sub_menu;

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
        View::composer('*', function($view){
            $view->with('main_menu', main_menu::where('status',1)->get());
            $view->with('sub_menu', sub_menu::where('status',1)->get());
        });
    }
}
