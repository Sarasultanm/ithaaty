<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNotes extends Model
{
    use HasFactory;

    public function get_user(){
        return $this->belongsTo('App\Models\User', 'notes_userid', 'id');
    }

    public function get_audio(){
        return $this->belongsTo('App\Models\Audio', 'notes_audioid', 'id');
    }
}
