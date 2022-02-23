<?php

namespace App\Providers;

use App\Console\Commands\Hello;
use App\Console\Commands\Rename;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;

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
        ### I ADDED THIS IS THE REGISTERING OF console commands METHOD 2
        if ($this->app->runningInConsole()) {
            $this->commands([
                Hello::class,
                Rename::class,
            ]);
        }

            ### FETCHING CATEGORIES
        // \view()->composer('welcome', function ($view) {
        //     $categories = \App\Models\Category::all();

        //     $view->with('categories',$categories );
        // });


        /// FETCHING CATEGORIES AND STORING IN CACHE
        \view()->composer('welcome', function ($view) {
            $categories = Cache::rememberForever('categories', function () {
                return  \App\Models\Category::all();
            });

            $view->with('categories',$categories );
        });

    }
}
