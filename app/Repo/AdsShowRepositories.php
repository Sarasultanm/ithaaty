<?php

namespace App\Repo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{
    AdsShow
};

use Auth;

class AdsShowRepositories
{

    protected $adsShow;

    public function __construct(
        AdsShow $adsShow
    ) 
    {
        $this->adsShow = $adsShow;
    }

 

    public function getAdsShow(){
       return $this->adsShow;
    }
     
    public function getAdsShowById($if){
        return $this->getAdsShow()->find($id);
    }
      
    public function getAdsShowIp(){
        return $this->getAdsShow()
                    ->where('ash_ipaddress',$_SERVER['REMOTE_ADDR'] )
                    ->get();
    }

    public function checkAdsShowIp($id){
        return $this->getAdsShow()
                    ->where(['ash_adslistid'=>$id,'ash_ipaddress'=>$_SERVER['REMOTE_ADDR']])
                    ->count();
    }
    
}


?>