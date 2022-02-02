<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles',
        'gender',
        'birthday',
        'country',
        'age',
        'plan',
        'alias',
        'about',
        'firstlogin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    public function get_followers(){
        return $this->hasMany('App\Models\UserFollow', 'follow_userfollowing','id');
    }

    public function get_audio(){
        return $this->hasMany('App\Models\Audio', 'audio_editor','id');
    }

    public function get_audio_type($type){
        return $this->hasMany('App\Models\Audio', 'audio_editor','id')->where(['audio_type'=>$type]);
    }
    
    public function get_playlist(){
        return $this->hasMany('App\Models\UserPlaylist', 'playlist_userid','id');
    }

    public function get_gallery($type,$status){
        return $this->hasMany('App\Models\UserGallery', 'gallery_userid','id')->where(['gallery_type'=>$type,'gallery_typestatus'=>$status]);
    }

    public function get_profilephoto(){
        return $this->hasMany('App\Models\UserGallery', 'gallery_userid','id')->where(['gallery_type'=>'profile','gallery_typestatus'=>'active']);
    }

     public function get_coverphoto(){
        return $this->hasMany('App\Models\UserGallery', 'gallery_userid','id')->where(['gallery_type'=>'cover','gallery_typestatus'=>'active']);
    }

    public function get_plan(){
        return $this->belongsTo('App\Models\UserPlan','plan','id');
    }

    public function block_list(){
        return $this->belongsTo('App\Models\UserBlockList','block_user','id');
    }
    
    public function check_shared_playlist($playlistid){
        return $this->belongsTo('App\Models\UserPlaylistShared','id','plshared_userid')->where(['plshared_playlistid'=>$playlistid]);
    }

    public function get_rsslink(){
        return $this->hasMany('App\Models\UserRssLink', 'rss_ownerid','id')->where('rss_status','active');
    }

    public function get_csm($type,$status){
        return $this->hasMany('App\Models\UserCustomization', 'csm_ownerid','id')->where(['csm_type'=>$type,'csm_typestatus'=>$status]);
    }

    public function get_socialLink($type,$status){
        return $this->hasMany('App\Models\UserSocialLinks', 'social_ownerid','id')->where(['social_type'=>$type,'social_typestatus'=>$status]);
    }

     public function get_setuptype($type,$status){
        return $this->hasMany('App\Models\UserSetup', 'setup_ownerid','id')->where(['setup_type'=>$type,'setup_typestatus'=>$status]);
    }







    public static function search($search){

        return empty($search) ? static::query()
            : static::query()->where('name', 'like', '%'.$search.'%')
                ->orWhere('email', 'like', '%'.$search.'%');

    }


}
