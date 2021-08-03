<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    public function get_categories(){
        return $this->belongsTo('App\Models\Category', 'audio_category', 'id');
    }
    public function get_user(){
        return $this->belongsTo('App\Models\User', 'audio_editor', 'id');
    }
     public function get_like(){
        return $this->hasMany('App\Models\UserLikes', 'like_audioid','id');
    }

    public function get_comments(){
        return $this->hasMany('App\Models\UserComments', 'coms_audioid','id');
    }



}
