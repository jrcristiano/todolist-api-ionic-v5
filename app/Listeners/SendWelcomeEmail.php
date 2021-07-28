<?php

namespace App\Listeners;

use App\Events\WelcomeUserCreated as Event;
use App\Jobs\WelcomeUserJob;

class SendWelcomeEmail
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Event $event)
    {
        $user = $event->getUser();
        WelcomeUserJob::dispatch($user);
    }
}
