<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsInterest extends Model
{
    use HasFactory;

    protected $fillable = [
        'ai_ownerid',
        'ai_adsid',
        'ai_interestid',
        'ai_type',
        'ai_typestatus',
    ];


}
