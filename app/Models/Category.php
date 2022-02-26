<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

     public function season(){
   		return $this->hasMany('App\Models\Audio', 'audio_category' ,'id')->count();
     }
     public function episode(){
   		return $this->hasMany('App\Models\Audio','audio_category','id')->count();
     }

     public function checkPodcastCategory($podcastId){
      return $this->belongsTo('App\Models\PodcastCategories','id','pc_categoryid')->where(['pc_podcastid'=>$podcastId]);
   }

     public function getAudioById($userid){
        return $this->hasMany('App\Models\Audio','audio_category','id')->where(['audio_editor'=>$userid]);
     }



}
