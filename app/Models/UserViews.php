<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserViews extends Model
{
    use HasFactory;


    protected $fillable = [
        'view_userid',
        'view_audioid',
        'view_type',
        'view_status',
        'view_ownerid',
        'user_ip'
    ];

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
