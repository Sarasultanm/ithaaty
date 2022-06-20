<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;

class EditorAdsCompany extends Component
{

    public $searchbar;

    public function getSearch(){

        redirect()->to('editor/s/'.$this->searchbar); 

    }
    
    public function render()
    {
        return view('livewire.editor.editor-ads-company');
    }
}
