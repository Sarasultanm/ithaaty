<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlaylistShared extends Model
{
    use HasFactory;


    public function get_playlist(){
        return $this->belongsTo('App\Models\UserPlaylist','plshared_playlistid','id');
    }
}
