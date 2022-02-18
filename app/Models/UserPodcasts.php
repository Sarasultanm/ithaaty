<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPodcasts extends Model
{
    use HasFactory;


    protected $fillable = [
        'podcast_ownerid',
        'podcast_channelid',
        'podcast_title',
        'podcast_description',
        'podcast_logo_id',
        'podcast_cover_id',
        'podcast_uniquelink',
    ];


    public function get_channel_photo(){
        return $this->belongsTo('App\Models\UserGallery', 'podcast_logo_id', 'id');
    }
    public function get_channel(){
        return $this->belongsTo('App\Models\UserChannel', 'podcast_channelid', 'id');
    }
    public function get_episodes(){
        return $this->hasMany('App\Models\UserPodcastEpisodes', 'poditem_podcastid', 'id');
    }
    public function check_episodes($audioid){
        return $this->hasMany('App\Models\UserPodcastEpisodes', 'poditem_podcastid', 'id')->where(['poditem_audioid'=>$audioid]);
    }

}
