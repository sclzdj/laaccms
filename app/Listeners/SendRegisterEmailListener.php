<?php

namespace App\Listeners;

use App\Notifications\RegisterEmailNotify;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRegisterEmailListener
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
     * @param  RegisteredRegistered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $user=$event->user;
        $user->email_token=str_random(64);
        $user->save();
        $user->notify(new RegisterEmailNotify($user));
    }
}
