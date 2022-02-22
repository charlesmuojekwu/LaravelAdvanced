<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\OrderShipped;
use App\Events\UserCreated;
use App\Listeners\SendShipmentNotification;
use App\Listeners\UserCreatedListener;
use App\Observers\UserObserver;
use App\Models\User;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        ### ADDED TO REGISTER THE EVENT SERVICE
        OrderShipped::class => [
            SendShipmentNotification::class,
        ],

        ## added for model event listener
        UserCreated::class => [
            UserCreatedListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // register usermodel observer
        User::observe(UserObserver::class);
    }
}
