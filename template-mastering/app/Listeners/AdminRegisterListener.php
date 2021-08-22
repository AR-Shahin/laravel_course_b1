<?php

namespace App\Listeners;

use App\Events\AdminRegisterEvent;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class AdminRegisterListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AdminRegisterEvent  $event
     * @return void
     */
    public function handle(AdminRegisterEvent $event)
    {
        if ($event->admin instanceof MustVerifyEmail && !$event->admin->hasVerifiedEmail()) {
            $event->admin->sendEmailVerificationNotification();
        }
    }
}
