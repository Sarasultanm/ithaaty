<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PodcastCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'pc_categoryid',
        'pc_podcastid',
    ];

    public function get_category(){
        return $this->belongsTo('App\Models\Category', 'pc_categoryid', 'id');
    }
    


}
