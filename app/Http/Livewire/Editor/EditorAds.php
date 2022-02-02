<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\Ads;
use App\Models\AdsList;
use App\Models\User;
use App\Models\UserGallery;
use Auth;
use Livewire\WithFileUploads;

class EditorAds extends Component
{

    public $compSkip = 50,$compDisplay = 100,$compDays = 3,$compTotal = 450;


    protected $rules = [
        'adslist_name' => 'required',
        'adslist_desc' => 'required',
        'adslist_weblink' => 'required',
        'adslist_videotype' => 'required',
        'adslist_country' => 'required',
        'adslist_agebracket' => 'required',
        'adslist_adstype' => 'required',
        'adslist_displaytime' => 'required',
        'adslist_days' => 'required',
        // 'audio' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
        
    ];


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

             // $s3_storage = $this->ads_logo->store('ads/company/', 's3');

            session()->flash('status', 'Please wait for the admin confirmation about your company');
            redirect()->to('editor/ads');   

        }else{

            session()->flash('status', 'Ads Image not loaded');
            redirect()->to('editor/ads');  
        }

		
	}

    public function addAdsList($id){

        $this->validate();
        
        if($this->adslist_videotype === "link"){

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
            $data->adslist_days = $this->adslist_days;
            $data->adslist_videotype = $this->adslist_videotype;
            $data->adslist_end = "none";
            
            
            $data->save();  

            session()->flash('status', 'New ads added as link');
            redirect()->to('editor/ads');   

        }elseif($this->adslist_videotype === "upload"){

             if($this->adslist_videoupload){

            $data = new AdsList;
            $data->adslist_id = $id;
            $data->adslist_name = $this->adslist_name;
            $data->adslist_videolink = $this->adslist_videoupload->hashName();
            $data->adslist_adstype = $this->adslist_adstype;
            $data->adslist_durationtype = "none";
            $data->adslist_displaytime = $this->adslist_displaytime;
            $data->adslist_status = "Pending";
            $data->adslist_agebracket = $this->adslist_agebracket;
            $data->adslist_country = $this->adslist_country;
            $data->adslist_weblink = $this->adslist_weblink;
            $data->adslist_desc = $this->adslist_desc;
            $data->adslist_days = $this->adslist_days;
            $data->adslist_videotype = $this->adslist_videotype;
            $data->adslist_end = "none";

            $data->save(); 

             session()->flash('status', 'New ads added as file');
            redirect()->to('editor/ads');     

            }else{
                 session()->flash('status', 'Video ads not uploaded!');
                redirect()->to('editor/ads');   
            }


        }

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
        $this->adslist_displaytime = "1%";
        $this->adslist_adstype = "0";
        $this->adslist_days = "3";
    }

    public function addCountry(){
        $this->adslist_country = $this->adslist_country."".$this->country_slc.",";
    }

     public function addBracket(){
        if($this->agebracket_list == "age0"){
            $bracketText = "No specific";
        }elseif($this->agebracket_list == "age1"){
            $bracketText = "18 - 24 years";
        }elseif($this->agebracket_list == "age2"){
            $bracketText = "25 - 40 years";
        }elseif($this->agebracket_list == "age3"){
            $bracketText = "41 - 60 years";
        }elseif($this->agebracket_list == "age4"){
            $bracketText = "61 - 80 years";
        }
        $this->adslist_agebracket = $this->adslist_agebracket."".$bracketText.",";
    }


    public function adsComputation($value,$options){
        if($options == 'skip'){
            if($value == 'Select'){
            $this->compSkip = 0;
            }elseif($value == '0'){
                 $this->compSkip = 50;
            }elseif($value == '5'){
                 $this->compSkip = 25;
            }
        }elseif($options == 'days'){
            if($value == 'Select'){
            $this->compDays = 0;
            }elseif($value == '3'){
                 $this->compDays = 3;
            }elseif($value == '7'){
                 $this->compDays = 7;
            }elseif($value == '9'){
                 $this->compDays = 9;
            }elseif($value == '12'){
                 $this->compDays = 12;
            }

        }else{
            if($value == 'Select'){
            $this->compDisplay = 0;
            }elseif($value == '1%'){
                 $this->compDisplay = 100;
            }elseif($value == '10%'){
                 $this->compDisplay = 90;
            }elseif($value == '20%'){
                 $this->compDisplay = 80;
            }elseif($value == '30%'){
                 $this->compDisplay = 70;
            }elseif($value == '40%'){
                 $this->compDisplay = 60;
            }elseif($value == '50%'){
                 $this->compDisplay = 50;
            }elseif($value == '60%'){
                 $this->compDisplay = 40;
            }elseif($value == '70%'){
                 $this->compDisplay = 30;
            }elseif($value == '80%'){
                 $this->compDisplay = 20;
            }elseif($value == '90%'){
                 $this->compDisplay = 10;
            }elseif($value == '100%'){
                 $this->compDisplay = 5;
            }

        }
        
        $this->compTotal = ( $this->compSkip + $this->compDisplay ) * $this->compDays;
        


    }

    // public function insertValue($text){
    //     $this->adslist_videotype == $text;
    // }

    public function render()
    {

    	$checkAds = Ads::where('ads_ownerid',Auth::user()->id);
        // $ads_list = AdsList::where('adslist_id',$checkAds->first()->id);
        return view('livewire.editor.editor-ads',compact('checkAds'));
    }
}
