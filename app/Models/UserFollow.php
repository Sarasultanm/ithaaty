<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFollow extends Model
{
    use HasFactory;


    public function get_user(){
        return $this->belongsTo('App\Models\User', 'follow_userfollowing', 'id');
    }

    public function get_user_following(){
        return $this->belongsTo('App\Models\User', 'follow_userid', 'id');
    }


}
