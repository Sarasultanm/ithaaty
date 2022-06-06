<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\UserCollaboratorsCredsMail;
class UserSendCollaboratorsCredsListiners
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->user->email)->send(
            new UserCollaboratorsCredsMail(
                $event->user, 
                $event->owner_email,
                $event->channel_name, 
                $event->channel_photo, 
                $event->subcribers,
                $event->mail_link,
                $event->password
            ));
    }
}
