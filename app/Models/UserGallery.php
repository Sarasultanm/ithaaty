<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGallery extends Model
{
    use HasFactory;


      protected $fillable = [
        'gallery_userid',
        'gallery_type',
        'gallery_typestatus',
        'gallery_path',
        'gallery_status',
    ];




}
