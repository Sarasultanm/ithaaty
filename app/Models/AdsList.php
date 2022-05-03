<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsList extends Model
{
    use HasFactory;

    protected $fillable = [
        'adslist_name',
        'adslist_desc',
        'adslist_weblink',
        'adslist_webname',
    ];

    public function get_gallery(){
        return $this->belongsTo('App\Models\UserGallery','adslist_videolink','id');
    }

    public function get_ads_stats(){
        return $this->hasMany('App\Models\AdsStats', 'as_adslistid','id');
    }

    public function get_ads_shown(){
        return $this->hasMany('App\Models\AdsShow', 'ash_adslistid','id');
    }

}
