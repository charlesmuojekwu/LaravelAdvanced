<?php

namespace App\Providers;

use App\Console\Commands\Hello;
use App\Console\Commands\Rename;
use Illuminate\Support\ServiceProvider;

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
    }
}
