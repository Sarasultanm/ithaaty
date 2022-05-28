<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioPremier extends Model
{
    use HasFactory;

    protected $fillable = [
        'ap_audioid',
        'ap_date',

    ];

}
