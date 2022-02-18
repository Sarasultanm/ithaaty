<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioInterest extends Model
{
    use HasFactory;

     protected $fillable = [
        'ai_interestid',
        'ai_audioid',
        'ai_type',
        'ai_typestatus',
    ];

   
}
