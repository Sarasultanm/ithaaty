<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\Audio;
use App\Models\UserLikes;
use Auth;


class EditorPopular extends Component
{



    
	public $searchbar;


    public function getSearch(){

        redirect()->to('editor/s/'.$this->searchbar); 

    }


    public function render()
    {
    	$topPodcast = Audio::orderBy('id', 'DESC')->where('audio_editor',Auth::user()->id)->take(3)->get();
        $topPodcasts = UserLikes::orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->get();
        return view('livewire.editor.editor-popular',compact('topPodcast','topPodcasts'));
    }
}
