<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsShow extends Model
{
    use HasFactory;

    protected $fillable = [
        'ash_adslistid',
        'ash_country',
        'ash_age',
        'ash_gender',
        'ash_status',
        'ash_device',
        'ash_ipaddress',
    ];

}
