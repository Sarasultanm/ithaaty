<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlaylist extends Model
{
    use HasFactory;

   
    public function checkPlaylist($audio_id){
        return $this->hasMany('App\Models\UserPlaylistItems', 'plitems_plid','id')->where('plitems_audioid',$audio_id);
    }

    public function get_playlistItems(){
        return $this->hasMany('App\Models\UserPlaylistItems', 'plitems_plid','id');
    }

    public function get_user(){
        return $this->belongsTo('App\Models\User', 'playlist_userid', 'id');
    }
}
