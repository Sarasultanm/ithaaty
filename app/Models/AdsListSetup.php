<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsListSetup extends Model
{
    use HasFactory;


    public function get_audio(){
        return $this->belongsTo('App\Models\Audio', 'adssetup_audioid', 'id');
    }


    public function get_adslist(){
        return $this->belongsTo('App\Models\AdsList', 'adssetup_adsid', 'id');
    }
}
