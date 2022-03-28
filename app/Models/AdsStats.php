<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsStats extends Model
{
    use HasFactory;


    protected $fillable = [
        'as_adslistid',
        'as_country',
        'as_age',
        'as_gender',
        'as_status',
        'as_device',
        'as_ipaddress',
    ];








}
