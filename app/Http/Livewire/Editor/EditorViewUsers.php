<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\User;
use App\Models\Audio;
use App\Models\Category;
use App\Models\UserFollow;
use App\Models\UserFav;
use Auth;


class EditorViewUsers extends Component
{


	
	public function render()
    {	
    	$categoryList = Category::orderBy('id', 'DESC');
    	$audioList = Audio::orderBy('id', 'DESC')->where('audio_editor',Auth::user()->id);
    	$topPodcast = Audio::orderBy('id', 'DESC');
    	$following = UserFollow::orderBy('id', 'DESC');
    	$favorite = UserFav::orderBy('id', 'DESC');
    	$displayUser = User::orderBy('id', 'DESC');
        return view('livewire.editor.editor-view-users',compact('audioList','categoryList','topPodcast','following','favorite','displayUser'));
    }

   
}
