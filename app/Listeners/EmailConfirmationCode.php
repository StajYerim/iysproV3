<?php

namespace App\Listeners;

use App\Mail\ConfirmationCode;
use Illuminate\Support\Facades\Mail;

class EmailConfirmationCode
{
    /**
     * Handle the event.
     *
     * @param Object $event
     */
    public function handle($event)
    {
        // trigger mailable class with user and password
        Mail::to($event->user->email)
            ->send(new ConfirmationCode(
                $event->user
            ));
    }
}
