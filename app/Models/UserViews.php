<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserViews extends Model
{
    use HasFactory;

    public function get_audio(){
        return $this->belongsTo('App\Models\Audio', 'view_audioid', 'id');
    }

     public function get_user(){
        return $this->belongsTo('App\Models\User', 'view_userid', 'id');
    }

     public function get_like(){
        return $this->hasMany('App\Models\UserLikes', 'like_audioid','view_audioid');
    }
}
