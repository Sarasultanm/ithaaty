<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\UserNotes;
use Auth;
use App\Models\User;
use Livewire\WithPagination;

class EditorNotes extends Component
{


	 use WithPagination;

    public function shareButton($socialMedia,$id){
        if($socialMedia == "facebook"){
             $link ="https://www.facebook.com/sharer/sharer.php?u=https://ithaaty.com/notes/".$id;
        }else{
            $link = "https://twitter.com/intent/tweet?url=https://ithaaty.com/notes/".$id;
        }
        redirect()->to($link);
    }

    
    
    public function render()
    {
    	// $notesList = UserNotes::where('notes_userid',Auth::user()->id)->get();
     //    return view('livewire.editor.editor-notes',compact('notesList'));

        return view('livewire.editor.editor-notes',[
            'notesList'=> UserNotes::where('notes_userid',Auth::user()->id)->paginate(20),
        ]);
    }
}
