<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\UserNotifications;
use Auth;

class EditorNotification extends Component
{
    public function render()
    {


    	$notif_list = UserNotifications::orderBy('id', 'DESC')->where('notif_userid',Auth::user()->id)->get();

        return view('livewire.editor.editor-notification',compact('notif_list'));
    }
}
