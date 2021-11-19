<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlaylistItems extends Model
{
    use HasFactory;


    public function get_user(){
        return $this->belongsTo('App\Models\User', 'plitems_ownerid', 'id');
    }

    public function get_audio(){
        return $this->belongsTo('App\Models\Audio', 'plitems_audioid','id');
    }

}
