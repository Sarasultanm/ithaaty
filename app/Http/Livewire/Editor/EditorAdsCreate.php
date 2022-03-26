<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\Ads;
use App\Models\AdsList;
use App\Models\User;
use App\Models\UserGallery;
use Auth;
use Livewire\WithFileUploads;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

use App\Http\Controllers\Controller;


class EditorAdsCreate extends Component
{

    use WithFileUploads;


    public $contextAdsImage,$socialAdsFile,$mediaAdsFile;
    public $contextTitle = "Ads Title Here";
    public $contextDescription = "Lorem ipsum dolor sit amet consectetur adipiscing elit non scelerisque aliquet";
    public $contextUrlName = "Website Name";
    public $contextUrlLink = "Website Link";

    public $socialTitle = "Ads Title Here";
    public $socialDescription = "Lorem ipsum dolor sit amet consectetur adipiscing elit non scelerisque aliquet";
    public $socialUrlName = "Website Name";
    public $socialUrlLink = "Website Link";

    public $ads_name,$ads_website,$ads_location,$ads_logo,$ads_file;
    public $ads_list,$adslist_name,$adslist_videolink,$adslist_videoupload,$adslist_adstype,$adslist_durationtype,$adslist_displaytime,$adslist_agebracket,$adslist_country,$adslist_weblink,$adslist_desc,$country_slc,$agebracket_list,$adslist_days,$adslist_videotype,$adslist_end;




    public $compSkip = 50,$compDisplay = 100,$compDays = 3,$compTotal = 450;
    public $adsContextValue = 100;
    public $select = 'Red';

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
        'contextAdsImage' =>'required|mimes:png,jpg,jpeg,gif|max:1000',
    ];

    public function updateTitle(){
        $this->contextTitle = $this->adslist_name;
    }

    public function addContextAds($id){

        $this->validate([
            'contextTitle' => 'required',
            'contextDescription' => 'required',
            'contextUrlName' => 'required',
            'contextUrlLink' => 'required',
        ]);

        $image = Controller::makeImage('context_adsimage', $this->contextAdsImage, 'ads/context_ads');

        $data = new AdsList;
        $data->adslist_id = $id;
        $data->adslist_name = $this->contextTitle;
        $data->adslist_videolink =  $image->id;
        $data->adslist_type = "Context Ads";
        $data->adslist_adstype = "none";
        $data->adslist_durationtype = "none";
        $data->adslist_displaytime = "none";
        $data->adslist_status = "Pending";
        $data->adslist_agebracket = $this->adslist_agebracket;
        $data->adslist_country = $this->adslist_country;
        $data->adslist_webname = $this->contextUrlName;
        $data->adslist_weblink = $this->contextUrlLink;
        $data->adslist_desc = $this->contextDescription;
        $data->adslist_days = $this->adslist_days;
        $data->adslist_videotype = "image";
        $data->adslist_end = "none";


        $data->save(); 

         session()->flash('status', 'New ads added as file');
        redirect()->to('editor/ads');    

    }

    public function addSocialAds($id){

        $this->validate([
            'contextTitle' => 'required',
            'contextDescription' => 'required',
            'contextUrlName' => 'required',
            'contextUrlLink' => 'required',
        ]);

        $image = Controller::makeImage('context_adsimage', $this->socialAdsFile, 'ads/social_ads');

        $data = new AdsList;
        $data->adslist_id = $id;
        $data->adslist_name = $this->contextTitle;
        $data->adslist_videolink =  $image->id;
        $data->adslist_type = "Social Ads";
        $data->adslist_adstype = "none";
        $data->adslist_durationtype = "none";
        $data->adslist_displaytime = "none";
        $data->adslist_status = "Pending";
        $data->adslist_agebracket = $this->adslist_agebracket;
        $data->adslist_country = $this->adslist_country;
        $data->adslist_webname = $this->contextUrlName;
        $data->adslist_weblink = $this->contextUrlLink;
        $data->adslist_desc = $this->contextDescription;
        $data->adslist_days = $this->adslist_days;
        $data->adslist_videotype = $this->checkFile($this->socialAdsFile->getMimeType());
        $data->adslist_end = "none";


        $data->save(); 

         session()->flash('status', 'New ads added as file');
        redirect()->to('editor/ads');    

    }

    public function selectType($type){
        $this->select = $type;
    }

    public function checkFile($mime){

        if(Str::contains($mime  , 'image')){
            $file = "image";
        }elseif(Str::contains($mime  , 'video')){
            $file = "video";
        }else{
            $file = "audio";
        }
        return $file;

        //return Str::contains($mime  , 'image')  ? "image" : "audio";
        //return $mime;
    }


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
    public function adsContextComputation($value){
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
        
    

        $this->compTotal = ( $this->adsContextValue ) * $this->compDays;
        


    }


    public function render()
    {   
        $checkAds = Ads::where('ads_ownerid',Auth::user()->id);

        return view('livewire.editor.editor-ads-create',compact('checkAds'));
    }
}
