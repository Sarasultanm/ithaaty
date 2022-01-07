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
    
    public function get_playlist(){
        return $this->hasMany('App\Models\UserPlaylist', 'playlist_userid','id');
    }

    public function get_gallery($type,$status){
        return $this->hasMany('App\Models\UserGallery', 'gallery_userid','id')->where(['gallery_type'=>$type,'gallery_typestatus'=>$status]);
    }

    public function get_profilephoto(){
        return $this->hasMany('App\Models\UserGallery', 'gallery_userid','id')->where(['gallery_type'=>'profile','gallery_typestatus'=>'active']);
    }

    public function get_plan(){
        return $this->belongsTo('App\Models\UserPlan','plan','id');
    }

    public function block_list(){
        return $this->belongsTo('App\Models\UserBlockList','block_user','id');
    }
    
}
