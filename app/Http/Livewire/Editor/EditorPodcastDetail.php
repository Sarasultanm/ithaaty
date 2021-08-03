<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\Audio;



class EditorPodcastDetail extends Component
{
	public $audio;

	public function mount($id)
    {
        $this->audio = Audio::where('id',$id)->first();
    }


    public function render()
    {

        return view('livewire.editor.editor-podcast-detail');
    }
}
