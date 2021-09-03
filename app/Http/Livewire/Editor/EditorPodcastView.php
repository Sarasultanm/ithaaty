<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\User;
use App\Models\Audio;
use App\Models\UserFollow;
use App\Models\UserLikes;
use App\Models\UserViews;
use App\Models\UserFav;
use Auth;

class EditorPodcastView extends Component
{

	public $audio;


    public static function checkFollow($id){

        $data = UserFollow::where(['follow_userid'=>Auth::user()->id,'follow_userfollowing'=>$id])->count();
        return $data;

    }    
     
    public static function checkLike($id){

        $data = UserLikes::where(['like_userid'=>Auth::user()->id,'like_audioid'=>$id])->count();
        return $data;
    }    

    public static function checkFav($id){

        $data = UserFav::where(['favs_userid'=>Auth::user()->id,'favs_audioid'=>$id])->count();
        return $data;
    }  

	public function mount($id)
    {
        $this->audio = Audio::where('id',$id)->first();
    }

    public function render()
    {	
    	$getHashtags = Audio::where('audio_hashtags', 'like', '%music%')->count();
    	$randomList = User::inRandomOrder()->where('id','!=',Auth::user()->id)->take(3)->get();
    	$mostlike = UserLikes::orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->take(1);
        return view('livewire.editor.editor-podcast-view',compact('getHashtags','randomList','mostlike'));
    }
}
