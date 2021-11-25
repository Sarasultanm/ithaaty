<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\Ads;
use App\Models\AdsList;
use App\Models\User;
use Auth;
use Livewire\WithFileUploads;

class EditorAds extends Component
{


	use WithFileUploads;

	public $ads_name,$ads_website,$ads_location,$ads_logo,$ads_file;
    public $ads_list,$adslist_name,$adslist_videolink,$adslist_adstype,$adslist_durationtype,$adslist_displaytime,$adslist_agebracket,$adslist_country,$adslist_weblink,$adslist_desc,$country_slc;

	public function saveAds(){

        if($this->ads_logo){ 

            $data = new Ads;
            $data->ads_name = $this->ads_name;
            $data->ads_website = $this->ads_website;
            $data->ads_location = $this->ads_location;
            $data->ads_linktolocation = "none";
            $data->ads_logo = $this->ads_logo->hashName();
            $data->ads_status = "Pending";
            $data->ads_ownerid = Auth::user()->id;
            $data->ads_filetype = "link";
            $data->ads_filelink = $this->ads_file;
            $data->ads_filepath = "none";
            $data->save();  

            $imagefile = $this->ads_logo->hashName();
            $path = $this->ads_logo->storeAs('ads/company',$imagefile);

            session()->flash('status', 'Please wait for the admin confirmation about your company');
            redirect()->to('editor/ads');   

        }else{

            session()->flash('status', 'Ads Image not loaded');
            redirect()->to('editor/ads');  
        }

		
	}

    public function addAdsList($id){

        $data = new AdsList;
        $data->adslist_id = $id;
        $data->adslist_name = $this->adslist_name;
        $data->adslist_videolink = $this->adslist_videolink;
        $data->adslist_adstype = $this->adslist_adstype;
        $data->adslist_durationtype = "none";
        $data->adslist_displaytime = $this->adslist_displaytime;
        $data->adslist_status = "Pending";
        $data->adslist_agebracket = $this->adslist_agebracket;
        $data->adslist_country = $this->adslist_country;
        $data->adslist_weblink = $this->adslist_weblink;
        $data->adslist_desc = $this->adslist_desc;
        $data->save();  

        session()->flash('status', 'New Add Added');
        redirect()->to('editor/ads');   
    }

    public function checkAdslist(){

        $check = Ads::where('ads_ownerid',Auth::user()->id);
        if($check->count() == 0){
           return "0";
        }else{
            $list = AdsList::where('adslist_id',$check->first()->id)->get();
            return $list;
        }


    }

    public function mount(){
        $this->ads_list = $this->checkAdslist();
    }

    public function addCountry(){
        $this->adslist_country = $this->adslist_country."".$this->country_slc.",";
    }

    public function render()
    {

    	$checkAds = Ads::where('ads_ownerid',Auth::user()->id);
        // $ads_list = AdsList::where('adslist_id',$checkAds->first()->id);
        return view('livewire.editor.editor-ads',compact('checkAds'));
    }
}
