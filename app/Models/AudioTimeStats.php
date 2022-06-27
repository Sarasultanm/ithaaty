<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioTimeStats extends Model
{
    use HasFactory;

    protected $fillable = [
        'ats_userid',
        'ats_audioid',
        'ats_ownerid',
        'ats_viewedtime',
        'ats_audiolenght',
        'ats_typestatus',
        'ats_status'
    ];

}
