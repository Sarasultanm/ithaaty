<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\{
    User,
    Ads,
    AdsList
};
use Redirect;


class EditorAdsStats extends Component
{

    public $tpye;


    public function mount($id,$type){
        $this->type = $type;
        $this->ads_list = AdsList::find($id);
    }

    



    public function render()
    {
        return view('livewire.editor.editor-ads-stats');
    }
}
