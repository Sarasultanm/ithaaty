<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\Audio;
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

        return view('livewire.editor.editor-popular',compact('topPodcast'));
    }
}
