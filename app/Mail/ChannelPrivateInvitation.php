<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ChannelPrivateInvitation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $user,$channel_name,$channel_photo,$subcribers,$link,$channel_privatecode,$reciever_email;

    public function __construct(User $user,$channel_name,$channel_photo,$subcribers,$link,$channel_privatecode,$reciever_email)
    {
        $this->user = $user;
        $this->channel_name = $channel_name;
        $this->channel_photo = $channel_photo;
        $this->subcribers = $subcribers;
        $this->link = $link;
        $this->channel_privatecode = $channel_privatecode;
        $this->reciever_email = $reciever_email;
        $this->subject('Ithaaty : Channel Private Invitation');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.channel-private-invitation');
    }
}
