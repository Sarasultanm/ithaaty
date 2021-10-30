<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
// use App\Models\AdsList;
// use App\Models\AdsListSetup;
// use App\Models\Ads;
// use App\Models\Audio;

use App\Models\{
	AdsList,
	AdsListSetup,
	Ads,
	Audio
};

class AdminAdsSetup extends Component
{

	public $ads_id,$setup_adsid,$setup_audioid,$setup_rolltype,$setupList;


	public function mount($id)
    {
        $data = AdsList::findOrFail($id);
        $this->ads_id = $data->id;
      	$this->setupList = AdsListSetup::where(['adssetup_adsid'=>$id,'adssetup_status'=>'active'])->get();
    }

    public function insertAds($adsid){


    	$data = new AdsListSetup;
        $data->adssetup_adsid = $adsid;
        $data->adssetup_audioid = $this->setup_audioid;
        $data->adssetup_rolltype = "none";
        $data->adssetup_status = "active";
        $data->save();  

        session()->flash('status', 'New Video Added');
        redirect()->to('admin/ads/setup/'.$adsid);   


    }


    public function render()
    {


    	$audioList = Audio::where(['audio_type'=>'RSS'])->get();

        return view('livewire.admin.admin-ads-setup',compact('audioList'));
    }
}
