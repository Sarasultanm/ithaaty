<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    public function get_categories(){
        return $this->belongsTo('App\Models\Category', 'audio_category', 'id');
    }
    public function get_user(){
        return $this->belongsTo('App\Models\User', 'audio_editor', 'id');
    }
    public function get_like(){
        return $this->hasMany('App\Models\UserLikes', 'like_audioid','id');
    }

    public function get_react($like_type){
        return $this->hasMany('App\Models\UserLikes', 'like_audioid','id')->where('like_type',$like_type);
    }

    public function get_comments(){
        return $this->hasMany('App\Models\UserComments', 'coms_audioid','id');
    }

    public function get_notes(){
        return $this->hasMany('App\Models\UserNotes', 'notes_audioid','id');
    }

    public function get_view(){
        return $this->hasMany('App\Models\UserViews', 'view_audioid','id');
    }

    public function get_references(){
        return $this->hasMany('App\Models\AudioReferences', 'audioref_audioid','id');
    }

    public function get_affiliate(){
        return $this->hasMany('App\Models\AudioAffiliate', 'audioafi_audioid','id');
    }

    public function get_sponsor(){
        return $this->hasMany('App\Models\AudioSponsor', 'audiospon_audioid','id');
    }

    public function get_question(){
        return $this->hasMany('App\Models\UserQa', 'qa_audioid','id');
    }   

    public function get_profilephoto(){
        return $this->hasMany('App\Models\UserGallery', 'gallery_userid','id')->where(['gallery_type'=>'profile','gallery_typestatus'=>'active']);
        // return $this->belongsTo('App\Models\User', 'audio_editor', 'id');
    } 

    public function get_thumbnail(){
        return $this->hasMany('App\Models\UserGallery', 'gallery_userid','id')->where(['gallery_type'=>'podcast','gallery_typestatus'=>'active']);
    // return $this->belongsTo('App\Models\User', 'audio_editor', 'id');
    } 

    public function get_chapters(){
         return $this->belongsTo('App\Models\AudioChapters', 'id', 'chapter_audioid',);
        // return $this->hasMany('App\Models\AudioChapters', 'chapter_audioid','id');
    }


}
