<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\{
    User,
};
use Livewire\WithFileUploads;
use Redirect;

use App\Repo\AdsListRepositories;
use App\Repo\AdsStatsRepositories;

class EditorAdsNewUpdate extends Component
{

    use WithFileUploads;

    protected  $AdsStatsRepositories;
    public $adslit_id,$tpye,$contextAdsImage;

    public $compSkip = 50,$compDisplay = 100,$compDays = 3,$compTotal = 450;
    public $adsContextValue = 100;

    public function mount($id,$type,AdsStatsRepositories $AdsStatsRepositories){
        $this->type = $type;
        $this->ads_list = $AdsStatsRepositories->getAdsListById($id);

        $this->adslit_id =  $this->ads_list->id;
        $this->adslist_name = $this->ads_list->adslist_name;
        // $this->adslist_videolink =  $image->id;
        // $this->adslist_type = "Context Ads";
        // $this->adslist_adstype = "none";
        // $this->adslist_durationtype = "none";
        // $this->adslist_displaytime = "none";
        // $this->adslist_status = "Pending";
        // $this->adslist_agebracket = $this->adslist_agebracket;
        // $this->adslist_country = $this->adslist_country;
         $this->adslist_webname = $this->ads_list->adslist_webname;
         $this->adslist_weblink = $this->ads_list->adslist_weblink;
         $this->adslist_desc =  $this->ads_list->adslist_desc;
        // $this->adslist_days = $this->adslist_days;
        $this->adslist_videotype = $this->ads_list->adslist_videotype;
        // $this->adslist_end = "none";
        
    }




    public function updateAds(){


        $this->ads_list->update([
            'adslist_name' => $this->adslist_name,
            'adslist_desc' => $this->adslist_desc,
            'adslist_webname' => $this->adslist_webname,
            'adslist_weblink' => $this->adslist_weblink
        ]);

        session()->flash('status', 'Update Ads');

        redirect()->to('/editor/ads/update/'.$this->adslit_id.'/'.$this->type);   

    }

    public function render()
    {
        return view('livewire.editor.editor-ads-new-update');
    }
}
