<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\Audio;
use App\Models\User;
use App\Models\Category;
use Auth;


class EditorPodcastDetail extends Component
{
	public $audio;

	public function mount($id)
    {
        $this->audio = Audio::where('id',$id)->first();
    }
    

    public function render()
    {
        $audioList = Audio::orderBy('id', 'DESC')->where('audio_editor',Auth::user()->id);
    	$getHashtags = Audio::where('audio_hashtags', 'like', '%music%')->count();
        return view('livewire.editor.editor-podcast-detail',compact('getHashtags','audioList'));
    }
}
