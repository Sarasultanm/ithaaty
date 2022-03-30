<?php

namespace App\Repo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{
    User,
    Ads,
    AdsList,
    AdsStats,
};

use Auth;

class AdsRepositories
{

    protected $user,$ads,$adsList,$adsStats;

    public function __construct(
        User $user,
        Ads $ads,
        AdsList $adsList,
        AdsStats $adsStats
    ) 
    {
        $this->user = $user;
        $this->ads = $ads;
        $this->adsList = $adsList;
        $this->adsStats = $adsStats;
    }

 
     


    
}


?>