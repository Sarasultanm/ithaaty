<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class UserCollaboratorsCredsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    
    public $user,$owner_email,$channel_name,$channel_photo,$subcribers,$link,$password;

    public function __construct(User $user,$owner_email,$channel_name,$channel_photo,$subcribers,$link,$password)
    {
        $this->user = $user;
        $this->owner_email = $owner_email;
        $this->channel_name = $channel_name;
        $this->channel_photo = $channel_photo;
        $this->subcribers = $subcribers;
        $this->link = $link;
        $this->password = $password;
        $this->subject('Ithaaty : Channel Collaborators Invitation');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.channel-collaborators-invite');
    }
}
