<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\UserNotes;
use Auth;
use App\Models\User;

class EditorNotes extends Component
{

    public function render()
    {
    	$notesList = UserNotes::where('notes_userid',Auth::user()->id)->get();
        return view('livewire.editor.editor-notes',compact('notesList'));
    }
}
