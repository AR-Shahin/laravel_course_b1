<?php

namespace App\Providers;

use App\Models\Product;
use App\Events\AdminRegisterEvent;
use App\Observers\ProductObserver;
use App\Events\CategoryDeleteEvent;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\AdminRegisterListener;
use App\Listeners\CategoryDeleteListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        AdminRegisterEvent::class => [
            AdminRegisterListener::class
        ],
        CategoryDeleteEvent::class => [
            CategoryDeleteListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Product::observe(ProductObserver::class);
    }
}
