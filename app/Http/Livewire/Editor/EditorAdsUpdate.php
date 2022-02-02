<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\Ads;
use App\Models\AdsList;
use Auth;
use Livewire\WithFileUploads;


class EditorAdsUpdate extends Component
{

    use WithFileUploads;

    public $ads_name,$ads_website,$ads_location,$ads_logo,$ads_file;
    public $ads_list,$adslist_name,$adslist_videolink,$adslist_videoupload,$adslist_adstype,$adslist_durationtype,$adslist_displaytime,$adslist_agebracket,$adslist_country,$adslist_weblink,$adslist_desc,$country_slc,$agebracket_list,$adslist_days,$adslist_videotype,$adslist_end;
    public $compDisplay = 100,$compDays = 3,$compTotal = 450;


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

    public function adsGetComp($value,$options){

        if($options == 'skip'){
            if($value == 'Select'){
            $data = 0;
            }elseif($value == '0'){
                 $data = 50;
            }elseif($value == '5'){
                 $data = 25;
            }
        }elseif($options == 'days'){
            if($value == 'Select'){
            $data = 0;
            }elseif($value == '3'){
                 $data = 3;
            }elseif($value == '7'){
                 $data = 7;
            }elseif($value == '9'){
                 $data = 9;
            }elseif($value == '12'){
                 $data = 12;
            }

        }else{
            if($value == 'Select'){
            $data = 0;
            }elseif($value == '1%'){
                 $data = 100;
            }elseif($value == '10%'){
                 $data = 90;
            }elseif($value == '20%'){
                 $data = 80;
            }elseif($value == '30%'){
                 $data = 70;
            }elseif($value == '40%'){
                 $data = 60;
            }elseif($value == '50%'){
                 $data = 50;
            }elseif($value == '60%'){
                 $data = 40;
            }elseif($value == '70%'){
                 $data = 30;
            }elseif($value == '80%'){
                 $data = 20;
            }elseif($value == '90%'){
                 $data = 10;
            }elseif($value == '100%'){
                 $data = 5;
            }

        }

        return $data;
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


    public function updateAdsList(){

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

    public function mount($id){
        $data = AdsList::where('id',$id)->first();
        $this->adslist_name = $data->adslist_name;
        $this->adslist_videolink = $data->adslist_videolink;
        $this->adslist_adstype = $data->adslist_adstype;
        $this->adslist_durationtype = "none";
        $this->adslist_displaytime = $data->adslist_displaytime;
        $this->adslist_status = "Pending";
        $this->adslist_agebracket = $data->adslist_agebracket;
        $this->adslist_country = $data->adslist_country;
        $this->adslist_weblink = $data->adslist_weblink;
        $this->adslist_desc = $data->adslist_desc;
        $this->adslist_days = $data->adslist_days;
        $this->adslist_videotype = $data->adslist_videotype;
        $this->adslist_end = "none";
        $this->compSkip = $this->adsGetComp($data->adslist_adstype,"skip");
        $this->compDisplay = $this->adsGetComp($data->adslist_displaytime,"display");
        $this->compDays = $this->adsGetComp($data->adslist_days,"days");
       
        $this->compTotal = ( $this->compSkip + $this->compDisplay ) * $this->compDays;
    }


    public function render()
    {
        return view('livewire.editor.editor-ads-update');
    }
}
