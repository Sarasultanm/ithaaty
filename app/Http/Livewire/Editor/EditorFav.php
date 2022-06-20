<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\UserFav;
use App\Models\User;
use Auth;

use Livewire\WithPagination;

class EditorFav extends Component
{


    use WithPagination;
    
    public $searchbar;

    public function getSearch(){

        redirect()->to('editor/s/'.$this->searchbar); 

    }

    public function render()
    {
        // return view('livewire.editor.editor-fav');

        return view('livewire.editor.editor-fav',[
            'favList'=> UserFav::orderBy('id','DESC')->where('favs_userid',Auth::user()->id)->paginate(20),
        ]);

        
    }
}
