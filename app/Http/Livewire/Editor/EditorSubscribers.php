<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\User;
use App\Models\UserFollow;
use Auth;

class EditorSubscribers extends Component
{
    public function render()
    {


    	$following = UserFollow::where('follow_userid',Auth::user()->id);
    	$followers = UserFollow::where('follow_userfollowing',Auth::user()->id);
        return view('livewire.editor.editor-subscribers',compact('following','followers'));
    }
}
