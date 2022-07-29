<?php

namespace App\Repo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{
    User,
    Ads,
    AdsList,
    AdsStats,
    AdsShow,
    AdsInterest,
};

use Auth;

use App\Repo\BrowsersRepositories;
use App\Repo\AdsShowRepositories;

class AdsListRepositories
{

    protected $BrowsersRepositories,$AdsShowRepositories;
    protected $user,$ads,$adsList,$adsStats,$adsInterest;



    public function __construct(
        User $user,
        Ads $ads,
        AdsList $adsList,
        AdsStats $adsStats,
        AdsInterest $adsInterest,
        BrowsersRepositories $BrowsersRepositories,
        AdsShowRepositories $AdsShowRepositories
    ) 
    {
        $this->user = $user;
        $this->ads = $ads;
        $this->adsList = $adsList;
        $this->adsStats = $adsStats;
        $this->adsInterest = $adsInterest;
        $this->browser = $BrowsersRepositories->getBrowser();
        $this->AdsShowRepositories = $AdsShowRepositories;
    }

    public function getAdsList(){
        return $this->adsList; 
    }

    public function getAdsListByCountry($country){
        return $this->getAdsList()
                    ->where('adslist_country', 'like', '%'.$country.'%')
                    ->take(2)
                    ->get();
    }

    public function getAdsListByType($type){
        return $this->getAdsList()
                    ->where(['adslist_type'=>'Context Ads','adslist_status'=>'Confirm'])
                    ->take(2)
                    ->get();
                    
    }


    public function getAdsContextAdsByInterest(){

        $user = Auth::user();


    }



    public static function getAdsListContextAds(){

        $users = Auth::user();

        // $adslist = $this->getAdsList()
        //                 ->inRandomOrder()
        //                 ->where(['adslist_type'=>'Context Ads','adslist_status'=>'Confirm'])
        //                 ->where('adslist_country', 'like', '%'.$users->country.'%')
        //                 ->take(2)
        //                 ->get();

        $adslist = AdsList::inRandomOrder()
                        ->where(['adslist_type'=>'Context Ads','adslist_status'=>'Confirm'])
                        ->where('adslist_country', 'like', '%'.$users->country.'%')
                        ->take(2)
                        ->get();

        if($adslist) {
            foreach($adslist as $adslist_items){

                // if($this->AdsShowRepositories->checkAdsShowIp($adslist_items->id) == 0){
                //     AdsShow::create([
                //         'ash_adslistid'=>$adslist_items->id,
                //         'ash_country'=>$users->country,
                //         'ash_age'=>$users->age,
                //         'ash_gender'=>$users->gender,
                //         'ash_device'=> $this->browser['userAgent'],
                //         'ash_ipaddress'=> $_SERVER['REMOTE_ADDR'] 
                //     ]);
    
                // }
    
                if(AdsShowRepositories::checkAdsShowIps($adslist_items->id) == 0){
                    AdsShow::create([
                        'ash_adslistid'=>$adslist_items->id,
                        'ash_country'=>$users->country,
                        'ash_age'=>$users->age,
                        'ash_gender'=>$users->gender,
                        'ash_device'=> "",
                        // 'ash_device'=> $this->browser['userAgent'],
                        'ash_ipaddress'=> $_SERVER['REMOTE_ADDR'] 
                    ]);
    
                }
    
            }
        }               
       


        return $adslist;

    }

    public static function getAdsListSocialAds(){

        $users = Auth::user();

        // $adslist = $this->getAdsList()
        //                 ->inRandomOrder()
        //                 ->where(['adslist_type'=>'Social Ads','adslist_status'=>'Confirm'])
        //                 ->where('adslist_country', 'like', '%'.$users->country.'%')
        //                 ->take(2)
        //                 ->get();

        $adslist = AdsList::inRandomOrder()
                        ->where(['adslist_type'=>'Social Ads','adslist_status'=>'Confirm'])
                        ->where('adslist_country', 'like', '%'.$users->country.'%')
                        ->take(2)
                        ->get();


        foreach($adslist as $adslist_items){
            if(AdsShowRepositories::checkAdsShowIps($adslist_items->id) == 0){
                AdsShow::create([
                    'ash_adslistid'=>$adslist_items->id,
                    'ash_country'=>$users->country,
                    'ash_age'=>$users->age,
                    'ash_gender'=>$users->gender,
                    'ash_device'=> "",
                    // 'ash_device'=> $this->browser['userAgent'],
                    'ash_ipaddress'=> $_SERVER['REMOTE_ADDR'] 
                ]);
            }
            // if($this->AdsShowRepositories->checkAdsShowIp($adslist_items->id) == 0){
            //     AdsShow::create([
            //         'ash_adslistid'=>$adslist_items->id,
            //         'ash_country'=>$users->country,
            //         'ash_age'=>$users->age,
            //         'ash_gender'=>$users->gender,
            //         'ash_device'=> $this->browser['userAgent'],
            //         'ash_ipaddress'=> $_SERVER['REMOTE_ADDR'] 
            //     ]);
            // }
        }

        return $adslist;

    }

    public function getAdsListMediaAds(){

        $users = Auth::user();

        $adslist = $this->getAdsList()
                        ->inRandomOrder()
                        ->where('adslist_type','Media Ads')
                        ->where('adslist_status','Confirm')
                        ->where('adslist_country', 'like', '%'.$users->country.'%')
                        ->get();

        foreach($adslist as $adslist_items){
            if($this->AdsShowRepositories->checkAdsShowIp($adslist_items->id) == 0){
                AdsShow::create([
                    'ash_adslistid'=>$adslist_items->id,
                    'ash_country'=>$users->country,
                    'ash_age'=>$users->age,
                    'ash_gender'=>$users->gender,
                    'ash_device'=> $this->browser['userAgent'],
                    'ash_ipaddress'=> $_SERVER['REMOTE_ADDR'] 
                ]);
            }
        }

        return $adslist;

    }


    public function getAdsListMediaNumber(){

        $users = Auth::user();

        $adslist = $this->getAdsList()
                        ->inRandomOrder()
                        ->where('adslist_type','Media Ads')
                        ->where('adslist_status','Confirm')
                        ->where('adslist_country', 'like', '%'.$users->country.'%')
                        ->count();

        return $adslist;
    }

   




    public function getRandomContextAds(){
       return $this->getAdsList()
                   ->inRandomOrder()
                   ->where(['adslist_type'=>'Context Ads','adslist_status'=>'Confirm'])
                   ->take(2)
                   ->get();
    }
    
    public function getRandomSocialAds(){
        return $this->getAdsList()
                    ->inRandomOrder()
                    ->where(['adslist_type'=>'Social Ads','adslist_status'=>'Confirm'])
                    ->take(1)
                    ->get();
     }
     
    

     


    
}


?>