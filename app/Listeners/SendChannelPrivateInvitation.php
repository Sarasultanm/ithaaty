<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\ChannelPrivateInvitation;
class SendChannelPrivateInvitation
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
        Mail::to($event->email)->send(
            new ChannelPrivateInvitation(
                $event->user, 
                $event->channel_name, 
                $event->channel_photo, 
                $event->subcribers,
                $event->mail_link,
                $event->channel_privatecode,
                $event->email
            ));
    }
}
