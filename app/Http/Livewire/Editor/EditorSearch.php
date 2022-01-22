<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\User;

class EditorSearch extends Component
{

    public $title,$search = ""  ,$result;

    public function mount($data){
        $this->result = User::search($data)->get();
    }
   
    public function get_search(){

        return $this->result = User::search($this->search)->get();

    }

    public function render()
    {


        return view('livewire.editor.editor-search');
    }
}
