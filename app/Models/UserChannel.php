<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChannel extends Model
{
    use HasFactory;


    public function get_channel_photo(){
        return $this->belongsTo('App\Models\UserGallery', 'channel_gallery_id', 'id');
    }

}
