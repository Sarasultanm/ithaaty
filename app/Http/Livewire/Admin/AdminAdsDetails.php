<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\AdsList;
use App\Models\Ads;

class AdminAdsDetails extends Component
{

	public $ads_id,$ads_list,$adslist_name,$adslist_videolink,$adslist_adstype,$adslist_durationtype,$adslist_displaytime;



	public function addAdsList($id){

        $data = new AdsList;
        $data->adslist_id = $id;
        $data->adslist_name = $this->adslist_name;
        $data->adslist_videolink = $this->adslist_videolink;
        $data->adslist_adstype = $this->adslist_adstype;
        $data->adslist_durationtype = "none";
        $data->adslist_displaytime = $this->adslist_displaytime;
        $data->adslist_status = "active";
        $data->save();  

        session()->flash('status', 'New Add Added');
        redirect()->to('admin/ads/details/'.$id);   
    }


    public function mount($id)
    {
        $data = Ads::findOrFail($id);
        $this->ads_id = $data->id;
        $this->ads_list = AdsList::where('adslist_id',$id)->get();
    }

    public function render()
    {
        return view('livewire.admin.admin-ads-details');
    }
}
