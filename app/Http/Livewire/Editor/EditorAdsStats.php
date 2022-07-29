<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\{
    User,
    Ads,
    AdsList,
    AdsShow
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
        $this->totalFemale = AdsShow::where(['ash_adslistid'=>$id,'ash_gender'=>'Female'])->groupBy('ash_gender')->count();
        $this->totalMale = AdsShow::where(['ash_adslistid'=>$id,'ash_gender'=>'Male'])->groupBy('ash_gender')->count();
        $this->jan = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('01'))->whereYear('created_at', date('Y'))->count();
        $this->feb = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('02'))->whereYear('created_at', date('Y'))->count();
    	$this->mar = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('03'))->whereYear('created_at', date('Y'))->count();
    	$this->apr = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('04'))->whereYear('created_at', date('Y'))->count();
    	$this->may = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('05'))->whereYear('created_at', date('Y'))->count();
    	$this->jun = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('06'))->whereYear('created_at', date('Y'))->count();
    	$this->jul = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('07'))->whereYear('created_at', date('Y'))->count();
    	$this->aug = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('08'))->whereYear('created_at', date('Y'))->count();
    	$this->sep = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('09'))->whereYear('created_at', date('Y'))->count();
    	$this->oct = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('10'))->whereYear('created_at', date('Y'))->count();
    	$this->nov = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('11'))->whereYear('created_at', date('Y'))->count();
    	$this->dec = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('12'))->whereYear('created_at', date('Y'))->count();
    
    }

    
    public function render()
    {   
        // $jan = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('01'))->whereYear('created_at', date('Y'))->count();
    	// $feb = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('02'))->whereYear('created_at', date('Y'))->count();
    	// $mar = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('03'))->whereYear('created_at', date('Y'))->count();
    	// $apr = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('04'))->whereYear('created_at', date('Y'))->count();
    	// $may = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('05'))->whereYear('created_at', date('Y'))->count();
    	// $jun = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('06'))->whereYear('created_at', date('Y'))->count();
    	// $jul = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('07'))->whereYear('created_at', date('Y'))->count();
    	// $aug = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('08'))->whereYear('created_at', date('Y'))->count();
    	// $sep = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('09'))->whereYear('created_at', date('Y'))->count();
    	// $oct = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('10'))->whereYear('created_at', date('Y'))->count();
    	// $nov = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('11'))->whereYear('created_at', date('Y'))->count();
    	// $dec = AdsShow::where('ash_adslistid',$id)->whereMonth('created_at', date('12'))->whereYear('created_at', date('Y'))->count();

        //return view('livewire.editor.editor-ads-stats',compact('jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'));
        return view('livewire.editor.editor-ads-stats');
    }
}
