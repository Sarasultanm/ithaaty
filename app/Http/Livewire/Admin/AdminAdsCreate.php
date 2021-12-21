<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Ads;
use Livewire\WithFileUploads;



class AdminAdsCreate extends Component
{

	use WithFileUploads;

	public $ads_name,$ads_website,$ads_location,$ads_logo;


	public function addAds(){
       
        // $this->validate([
        //     'ads_logo' => 'image|max:1024',
        // ]);

        if($this->ads_logo){

            $data = new Ads;
            $data->ads_name = $this->ads_name;
            $data->ads_website = $this->ads_website;
            $data->ads_location = $this->ads_location;
            $data->ads_linktolocation = "none";
            $data->ads_logo = $this->ads_logo->hashName();
            $data->ads_status = "active";
            $data->ads_ownerid = Auth::user()->id;
            $data->ads_filetype = "none";
            $data->ads_filelink = "none";
            $data->ads_filepath = "none";
            $data->save();  

            $imagefile = $this->ads_logo->hashName();
            $path = $this->ads_logo->storeAs('ads/company',$imagefile);

            // $s3_storage = $this->ads_logo->store('audio/', 's3');

            session()->flash('status', 'Added new Company');
            redirect()->to('admin/ads/');   

        }else{

            session()->flash('status', 'Company image not loaded');
            redirect()->to('admin/ads/');   

        } 

        
    }



    public function render()
    {
        return view('livewire.admin.admin-ads-create');
    }
}
