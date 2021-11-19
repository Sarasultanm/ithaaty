<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\UserPlaylist;

class EditorPlaylist extends Component
{

	public $playlist;


	public function mount($id){

		$this->playlist = UserPlaylist::where('id',$id)->first();



	}


    public function render()
    {
        return view('livewire.editor.editor-playlist');
    }
}
