<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsList extends Model
{
    use HasFactory;

    public function get_gallery(){
        return $this->belongsTo('App\Models\UserGallery','adslist_videolink','id');
    }

    public function get_ads_stats(){
        return $this->hasMany('App\Models\AdsStats', 'as_adslistid','id');
    }

}
