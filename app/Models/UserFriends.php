<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFriends extends Model
{
    use HasFactory;

     public function get_request_user(){
        return $this->belongsTo('App\Models\User', 'friend_requestid', 'id');
    }

    public function get_add_friend(){
        return $this->belongsTo('App\Models\User', 'friend_userid', 'id');
    }
}
