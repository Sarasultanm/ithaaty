<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Ads;



class AdminAds extends Component
{
    public function render()
    {


    	$adslist = Ads::orderBy('id', 'DESC')->where('ads_status','active');
    
        return view('livewire.admin.admin-ads',compact('adslist'));
    }
}
