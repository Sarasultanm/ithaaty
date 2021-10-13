<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLikes extends Model
{
    use HasFactory;


    public function get_audio(){
        return $this->belongsTo('App\Models\Audio', 'like_audioid', 'id');
    }

    public function get_user(){
        return $this->belongsTo('App\Models\User', 'like_userid', 'id');
    }

    public function get_owner(){
        return $this->belongsTo('App\Models\User', 'like_ownerid', 'id');
    }
}
