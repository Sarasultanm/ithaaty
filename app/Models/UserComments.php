<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserComments extends Model
{
    use HasFactory;

    public function get_user(){
        return $this->belongsTo('App\Models\User', 'coms_userid', 'id');
    }

     public function get_audio(){
        return $this->belongsTo('App\Models\Audio', 'coms_audioid', 'id');
    }
}
