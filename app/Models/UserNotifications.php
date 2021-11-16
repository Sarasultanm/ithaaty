<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNotifications extends Model
{
    use HasFactory;


    public function get_follow(){
        return $this->belongsTo('App\Models\UserFollow', 'notif_type_id', 'id');
    }

    public function get_like(){
        return $this->belongsTo('App\Models\UserLikes', 'notif_type_id', 'id');
    }
    public function get_comments(){
        return $this->belongsTo('App\Models\UserComments', 'notif_type_id', 'id');
    }

    public function get_notes(){
        return $this->belongsTo('App\Models\UserNotes', 'notif_type_id', 'id');
    }

    public function get_users_info(){
         return $this->belongsTo('App\Models\User', 'notif_userid', 'id'); 
    }


}
