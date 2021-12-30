<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\User;
use App\Models\UserFollow;
use App\Models\UserNotifications;
use Auth;


class EditorFollowers extends Component
{
    public function render()
    {   
        $following = UserFollow::where(['follow_userid'=>Auth::user()->id,'follow_type'=>'follow']);
        $followers = UserFollow::where(['follow_userfollowing'=>Auth::user()->id,'follow_type'=>'follow']);
        $request = UserFollow::where(['follow_userfollowing'=>Auth::user()->id,'follow_type'=>'request']);
        $reject = UserFollow::where(['follow_userfollowing'=>Auth::user()->id,'follow_type'=>'reject']);
        return view('livewire.editor.editor-followers',compact('following','followers','request','reject'));
    }
}
