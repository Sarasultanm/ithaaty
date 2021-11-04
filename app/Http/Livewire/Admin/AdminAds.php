<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Ads;
use App\Models\AdsList;


class AdminAds extends Component
{


	public function confirmVideo($id){

        AdsList::where('id',$id)
            ->update([
                'adslist_status'=> "Confirm",
            ]);

        session()->flash('status', 'Confirm Video Ads Success');
        redirect()->to('admin/ads');       

    }






    public function render()
    {


    	$ads = Ads::orderBy('id', 'DESC');
    	$adslist = AdsList::orderBy('id','DESC');
        return view('livewire.admin.admin-ads',compact('ads','adslist'));
    }
}
