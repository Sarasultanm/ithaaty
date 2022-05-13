<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAdsDisplay extends Model
{
    use HasFactory;

    protected $fillable = [
        'uad_userid',
        'uad_adsid',
        'uad_type',
        'uad_typestatus',
        'uad_status',
    ];

}
