<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFav extends Model
{
    use HasFactory;

     public function get_audio(){
        return $this->belongsTo('App\Models\Audio', 'favs_audioid', 'id');
    }
}
