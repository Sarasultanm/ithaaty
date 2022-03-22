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
}
