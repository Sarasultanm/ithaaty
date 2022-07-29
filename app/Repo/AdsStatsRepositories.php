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
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;



use Auth;

class AdsStatsRepositories
{

    protected $user,$ads,$adsList,$adsStats,$adsShow;

    public function __construct(
        User $user,
        Ads $ads,
        AdsList $adsList,
        AdsStats $adsStats,
        AdsShow $adsShow
    ) 
    {
        $this->user = $user;
        $this->ads = $ads;
        $this->adsList = $adsList;
        $this->adsStats = $adsStats;
        $this->adsShow = $adsShow;
    }

    /* initialize */
    public function getAdsStat(){
        return $this->adsStats;
    }
    public function getAdsList(){
        return $this->adsList;
    }
    public function getAdsShow(){
        return $this->adsShow;
    }
    /* initialize */

   

    public function getAdsStatById($id){
        return $this->getAdsStat()->find($id);

    }

    public function getAdsListById($id){
        return $this->getAdsList()->find($id);
    }

    public function getTotalClick($id){
        return $this->getAdsListById($id)
                    ->get_ads_stats()
                    ->count();
    }


    public function getTotalImpression($id){
        return $this->getAdsListById($id)
                    ->get_ads_shown()
                    ->count();
    }

    public function getTotalClickToday($id){
        return $this->getAdsListById($id)
                    ->get_ads_stats()
                    ->whereDate('created_at', Carbon::today())
                    ->count();
    }

    public function getTotalCTR($id){

        $calculate = "0";

        if($this->getTotalImpression($id) && $this->getTotalClick($id) != 0 ){
            $calculate = $this->getTotalClick($id) / $this->getTotalImpression($id);
        }

        return $calculate;
    }


    public function getLatestRecordClick($id,$take){
        return $this->getAdsListById($id)
                    ->get_ads_stats()
                    ->orderBy('id','DESC')
                    ->take($take)
                    ->get();
    }

    public function getLatestRecordShown($id,$take){
        return $this->getAdsListById($id)
                    ->get_ads_shown()
                    ->orderBy('id','DESC')
                    ->take($take)
                    ->get();
    }

    public function getTopCountry($id,$take){
        return $this->getAdsListById($id)
                    ->get_ads_stats()
                    ->orderBy('total','DESC')
                    ->groupBy('as_country')
                    ->selectRaw('count(*) as total, as_country')
                    ->take($take)
                    ->get();
    }

    public function getTopCountryMediaAds($id,$take){
        return $this->getAdsListById($id)
                    ->get_ads_shown()
                    ->orderBy('total','DESC')
                    ->groupBy('ash_country')
                    ->selectRaw('count(*) as total, ash_country')
                    ->take($take)
                    ->get();
    }


   
    



    
}


?>