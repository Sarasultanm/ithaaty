<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\{
    User,
    Ads,
    AdsList
};
use Redirect;

use App\Repo\AdsListRepositories;
use App\Repo\AdsStatsRepositories;

class EditorAdsStats extends Component
{

    protected  $AdsStatsRepositories;
    public $tpye;

    public $searchbar;

    public function getSearch(){

        redirect()->to('editor/s/'.$this->searchbar); 

    }
    
    public function mount($id,$type,AdsStatsRepositories $AdsStatsRepositories){
        $this->type = $type;
        $this->ads_list = $AdsStatsRepositories->getAdsListById($id);
        $this->totalClick = $AdsStatsRepositories->getTotalClick($id);
        $this->totalClickToday = $AdsStatsRepositories->getTotalClickToday($id);
        $this->latestRecordClick = $AdsStatsRepositories->getLatestRecordClick($id,5);
        $this->latestRecordShown = $AdsStatsRepositories->getLatestRecordShown($id,5);
        $this->totalImpression = $AdsStatsRepositories->getTotalImpression($id);
        $this->listTopCountry = $AdsStatsRepositories->getTopCountry($id,5);
        $this->totalCTR =  $AdsStatsRepositories->getTotalCTR($id);
        $this->listTopCountryMediaAds = $AdsStatsRepositories->getTopCountryMediaAds($id,5);
    }

    
    public function render()
    {   

        return view('livewire.editor.editor-ads-stats');
    }
}
