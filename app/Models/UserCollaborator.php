<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCollaborator extends Model
{
    use HasFactory;

     protected $fillable = [
        'usercol_userid',
        'usercol_channel_id',
        'usercol_email',
        'usercol_type',
        'usercol_typestatus',
        'usercol_status',
    ];


 

}
