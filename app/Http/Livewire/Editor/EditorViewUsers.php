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
use App\Models\UserFriends;
use App\Models\UserNotifications;
use Auth;


class EditorViewUsers extends Component
{

    public $userInfo,$userPodcast,$userFav,$userCat,$userFollow,$recentLikes,$checkFollowing,$checkFriend,$getTopView;

    public function mount($id){


        $this->userInfo = User::where('id',$id)->first();
        $this->userPodcast = Audio::orderBy('id', 'DESC')->where('audio_editor',$id)->take(3)->get();
        $this->userFav = UserFav::orderBy('id', 'DESC')->where('favs_userid',$id)->get();
        $this->userCat = Category::orderBy('id', 'DESC')->where('category_owner',$id)->get();
        $this->userFollow = UserFollow::orderBy('id', 'DESC')->where('follow_userid',$id)->get();
        $this->recentLikes = UserLikes::orderBy('id','DESC')->where('like_userid',$id)->take(3)->get();
        $this->checkFollowing = $this->get_if_following($id);
        $this->checkFriend = $this->get_if_friends($id);
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

     public function get_if_friends($id){

        $request = UserFriends::where(['friend_userid'=>Auth::user()->id,'friend_requestid'=>$id]);
        $friend = UserFriends::where(['friend_userid'=>$id,'friend_requestid'=>Auth::user()->id]);

        // check if you are requesting to the users
        if($request->count() != 0){
            return $request->first()->friend_type;
        }else{

            if($friend->count() != 0){

                
                if($friend->first()->friend_type == "Send Request"){
                    return "Confirm Request";
                }else{
                    return $friend->first()->friend_type;
                }

            }else{
                return "Add Friend";
            }
            
        }

    }



     public function addFriend($id){


             $data = new UserFriends;
             $data->friend_userid = Auth::User()->id;
             $data->friend_requestid = $id;
             $data->friend_type = "Send Request";
             $data->friend_status = "active";
             $data->save();

             $notif = new UserNotifications;
             $notif->notif_userid = Auth::User()->id;
             $notif->notif_type = "request";
             $notif->notif_type_id = $data->id;
             $notif->notif_message = "Sending a request to be friend";
             $notif->status = "active";
             $notif->save();

             $notif1 = new UserNotifications;
             $notif1->notif_userid = $id;
             $notif1->notif_type = "requested";
             $notif1->notif_type_id = $data->id;
             $notif1->notif_message = "Requesting to be friend";
             $notif1->status = "active";
             $notif1->save();
             
             session()->flash('status', 'Friend Request has send');
             redirect()->to('/editor/users/'.$id);

        }

         public function confirmFriend($friend_id){

            $data = UserFriends::where(['friend_userid'=>$friend_id,'friend_requestid'=>Auth::user()->id]);

            $data->update([
                'friend_type'=> 'Friends',
            ]);
            // UserFriends::where(['friend_userid'=>$id,'friend_requestid'=>Auth::user()->id])
            // ->update([
            //     'friend_type'=> 'friends',
            // ]);




             $notif = new UserNotifications;
             $notif->notif_userid = $friend_id;
             $notif->notif_type = "friend";
             $notif->notif_type_id = $data->first()->id;
             $notif->notif_message = "You are now Friend";
             $notif->status = "active";
             $notif->save();

             $notif1 = new UserNotifications;
             $notif1->notif_userid = Auth::User()->id;
             $notif1->notif_type = "friend now";
             $notif1->notif_type_id = $data->first()->id;
             $notif1->notif_message = "Start friend you";
             $notif1->status = "active";
             $notif1->save();    

            
             
             session()->flash('status', 'Friend Request Confirm');
             redirect()->to('/editor/users/'.$friend_id);

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
        $friendList = UserFriends::where('friend_userid',Auth::user()->id)->orWhere('friend_requestid',Auth::user()->id)->get();
        return view('livewire.editor.editor-view-users',compact('audioList','topOneView','topOneLikes','friendList'));
    }

   
}
