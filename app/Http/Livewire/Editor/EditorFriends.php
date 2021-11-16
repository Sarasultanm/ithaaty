<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\UserFriends;
use Auth;
class EditorFriends extends Component
{


	public function checkUses($id){
		

	}



    public function render()
    {
    	$friendList = UserFriends::where('friend_userid',Auth::user()->id)->orWhere('friend_requestid',Auth::user()->id)->get();

        return view('livewire.editor.editor-friends',compact('friendList'));
    }
}
