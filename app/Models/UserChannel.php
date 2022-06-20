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

     public function get_podcast(){
        return $this->hasMany('App\Models\UserPodcasts','podcast_channelid','id')->where(['podcast_status'=>'active']);
    }

    public function get_subs(){
        return $this->hasMany('App\Models\UserChannelSub', 'sub_channelid','id');
    }

    public function get_invitation($invitation_type){
        return $this->hasMany('App\Models\UserCollaborator','usercol_channel_id','id')->where(['usercol_type'=>$invitation_type]);
    }


    public function get_channel_access($email){
        return $this->hasMany('App\Models\ChannelAccessList','cal_channel_id','id')->where(['cal_receiver_email'=>$email,'cal_typestatus'=>'access']);
    }



    
    public static function search($search){

        return empty($search) ? static::query()
            : static::query()->where('channel_name', 'like', '%'.$search.'%');

    }


}
