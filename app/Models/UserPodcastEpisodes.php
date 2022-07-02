<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPodcastEpisodes extends Model
{
    use HasFactory;


    protected $fillable = [
        'poditem_podcastid',
        'poditem_audioid',
        'poditem_type',
        'poditem_typestatus',
        'podcast_status',
    ];

 
    public function get_audio()
    {
        return $this->belongsTo('App\Models\Audio', 'poditem_audioid', 'id');
    }

    public function get_podcast()
    {
        return $this->belongsTo('App\Models\UserPodcasts', 'poditem_podcastid', 'id');
    }
    
    public function get_audiotimestats(){
        return $this->hasMany('App\Models\AudioTimeStats', 'ats_audioid','poditem_audioid');
    } 

    
}
