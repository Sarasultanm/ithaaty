<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioCategories extends Model
{
    use HasFactory;


    protected $fillable = [
        'ac_categoryid',
        'ac_audioid',
        'ac_type',
    ];


}
