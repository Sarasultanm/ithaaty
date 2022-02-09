<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChannel extends Model
{
    use HasFactory;


    public function get_channel_photo(){
        return $this->belongsTo('App\Models\UserGallery', 'channel_gallery_id', 'id');
    }

     public function get_channel_cover(){
        return $this->belongsTo('App\Models\UserGallery', 'channel_gallery_cover_id', 'id');
    }

    public function check_user_subs($userid){
        return $this->belongsTo('App\Models\UserChannelSub','id','sub_channelid')->where(['sub_userid'=>$userid]);
    }

    public function check_episode($audio){
        return $this->belongsTo('App\Models\UserChannelEpisode','id','channelep_channelid')->where(['channelep_audioid'=>$audio,'channelep_typestatus'=>'active']);
    }

    public function get_episode(){
        return $this->hasMany('App\Models\UserChannelEpisode','channelep_channelid','id')->where(['channelep_typestatus'=>'active']);
    }


    public function get_subs(){
        return $this->hasMany('App\Models\UserChannelSub', 'sub_channelid','id');
    }

   

}
