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
};

use Auth;

use App\Repo\BrowsersRepositories;

class AdsListRepositories
{

    protected $BrowsersRepositories;
    protected $user,$ads,$adsList,$adsStats;

    public function __construct(
        User $user,
        Ads $ads,
        AdsList $adsList,
        AdsStats $adsStats,
        BrowsersRepositories $BrowsersRepositories
    ) 
    {
        $this->user = $user;
        $this->ads = $ads;
        $this->adsList = $adsList;
        $this->adsStats = $adsStats;
        $this->browser = $BrowsersRepositories->getBrowser();
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


    public function getAdsListContextAds(){

        $users = Auth::user();

        $adslist = $this->getAdsList()
                        ->inRandomOrder()
                        ->where(['adslist_type'=>'Context Ads','adslist_status'=>'Confirm'])
                        ->where('adslist_country', 'like', '%'.$users->country.'%')
                        ->take(2)
                        ->get();

        foreach($adslist as $adslist_items){
            AdsShow::create([
                'ash_adslistid'=>$adslist_items->id,
                'ash_country'=>$users->country,
                'ash_age'=>$users->age,
                'ash_gender'=>$users->gender,
                'ash_device'=> $this->browser['userAgent'],
                'ash_ipaddress'=> $_SERVER['REMOTE_ADDR'] 
            ]);

        }

        return $adslist;

    }

    public function getAdsListSocialAds(){

        $users = Auth::user();

        $adslist = $this->getAdsList()
                        ->inRandomOrder()
                        ->where(['adslist_type'=>'Social Ads','adslist_status'=>'Confirm'])
                        ->where('adslist_country', 'like', '%'.$users->country.'%')
                        ->take(2)
                        ->get();

        foreach($adslist as $adslist_items){
            AdsShow::create([
                'ash_adslistid'=>$adslist_items->id,
                'ash_country'=>$users->country,
                'ash_age'=>$users->age,
                'ash_gender'=>$users->gender,
                'ash_device'=> $this->browser['userAgent'],
                'ash_ipaddress'=> $_SERVER['REMOTE_ADDR'] 
            ]);

        }

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