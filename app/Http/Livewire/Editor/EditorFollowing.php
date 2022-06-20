<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\User;
use App\Models\UserFollow;
use App\Models\UserNotifications;
use Auth;



class EditorFollowing extends Component
{
    
    public $searchbar;

    public function getSearch(){

        redirect()->to('editor/s/'.$this->searchbar); 

    }
    
    public function render()
    {

    	$following = UserFollow::where(['follow_userid'=>Auth::user()->id,'follow_type'=>'follow']);
    	$followers = UserFollow::where(['follow_userfollowing'=>Auth::user()->id,'follow_type'=>'follow']);
    	$request = UserFollow::where(['follow_userfollowing'=>Auth::user()->id,'follow_type'=>'request']);
    	$reject = UserFollow::where(['follow_userfollowing'=>Auth::user()->id,'follow_type'=>'reject']);
        return view('livewire.editor.editor-following',compact('following','followers','request','reject'));
    }
}
