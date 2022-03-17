<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCollaborator extends Model
{
    use HasFactory;

     protected $fillable = [
        'usercol_ownerid',
        'usercol_userid',
        'usercol_channel_id',
        'usercol_email',
        'usercol_type',
        'usercol_typestatus',
        'usercol_status',
    ];

    public function get_user(){
        return $this->belongsTo('App\Models\User', 'usercol_userid', 'id');
    }

    public function get_channel(){
        return $this->belongsTo('App\Models\UserChannel', 'usercol_channel_id', 'id');
    }

}
