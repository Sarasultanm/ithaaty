<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\User;
use App\Models\Audio;
use App\Models\Category;
use App\Models\UserFollow;
use App\Models\UserFav;
use App\Models\UserViews;
use App\Models\UserLikes;
use Auth;


class EditorViewUsers extends Component
{

    public $userInfo,$userPodcast,$userFav,$userCat,$userFollow,$recentLikes,$checkFollowing,$getTopView;

    public function mount($id){


        $this->userInfo = User::where('id',$id)->first();
        $this->userPodcast = Audio::orderBy('id', 'DESC')->where('audio_editor',$id)->take(3)->get();
        $this->userFav = UserFav::orderBy('id', 'DESC')->where('favs_userid',$id)->get();
        $this->userCat = Category::orderBy('id', 'DESC')->where('category_owner',$id)->get();
        $this->userFollow = UserFollow::orderBy('id', 'DESC')->where('follow_userid',$id)->get();
        $this->recentLikes = UserLikes::orderBy('id','DESC')->where('like_userid',$id)->take(3)->get();
        $this->checkFollowing = $this->get_if_following($id);
        // $this->getTopView = UserViews::where('view_ownerid',$id)->orderBy('total','DESC')->groupBy('view_audioid')->selectRaw('count(*) as total, view_audioid')->take(1)->first();

    }


    public function get_if_following($id){

        $following = UserFollow::where(['follow_userid'=>Auth::user()->id,'follow_userfollowing'=>$id]);
        $followers = UserFollow::where(['follow_userid'=>$id,'follow_userfollowing'=>Auth::user()->id]);

        // check if you are following to the users
        if($following->count() != 0){
            // return "Following";
             // check if the user follow you back
            if($followers->count() != 0){
                return "Followers";
            }else{
                return "Following";
            }
        }else{
            return "Follow";
        }

    }

	
	public function render()
    {	
    	// $categoryList = Category::orderBy('id', 'DESC');
    	// $topPodcast = Audio::orderBy('id', 'DESC');
    	// $following = UserFollow::orderBy('id', 'DESC');
    	// $favorite = UserFav::orderBy('id', 'DESC');
    	// $displayUser = User::orderBy('id', 'DESC');
        // return view('livewire.editor.editor-view-users',compact('audioList','categoryList','topPodcast','following','favorite','displayUser'));
        $topOneView = UserViews::where('view_ownerid',Auth::user()->id)->orderBy('total','DESC')->groupBy('view_audioid')->selectRaw('count(*) as total, view_audioid')->take(1)->first();

        $topOneLikes = UserLikes::where('like_ownerid',Auth::user()->id)->orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->take(1)->first();
        $audioList = Audio::orderBy('id', 'DESC')->where('audio_editor',Auth::user()->id);
        return view('livewire.editor.editor-view-users',compact('audioList','topOneView','topOneLikes'));
    }

   
}
