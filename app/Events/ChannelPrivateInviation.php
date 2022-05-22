<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChannelPrivateInviation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $user,$email,$channel_name,$channel_photo,$subcribers,$mail_link,$channel_privatecode;

    public function __construct($user,$email,$channel_name,$channel_photo,$subcribers,$mail_link,$channel_privatecode)
    {
        $this->user = $user;
        $this->email = $email;
        $this->channel_name = $channel_name;
        $this->channel_photo = $channel_photo;
        $this->subcribers = $subcribers;
        $this->mail_link = $mail_link;
        $this->channel_privatecode = $channel_privatecode;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
