<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;


class ChannelInvitation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user,$channel_name,$channel_photo,$subcribers;


    public function __construct(User $user,$channel_name,$channel_photo,$subcribers)
    {
        $this->user = $user;
        $this->channel_name = $channel_name;
        $this->channel_photo = $channel_photo;
        $this->subcribers = $subcribers;
        $this->subject('Ithaaty : Channel Invitation');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.channel-invitation');
    }
}
