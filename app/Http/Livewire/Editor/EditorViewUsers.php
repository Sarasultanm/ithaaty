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
use App\Models\UserPlaylist;
use App\Models\UserPlaylistItems;
use App\Models\UserGallery;
use App\Models\UserSocialLinks;
use Auth;

use Livewire\WithFileUploads;

class EditorViewUsers extends Component
{


    use WithFileUploads;


    public $userInfo,$userPodcast,$userFav,$userCat,$userFollow,$recentLikes,$checkFollowing,$checkFriend,$getTopView,$playlist_title,$playlist_status,$playlist_public,$playlist_private;
    public $user_coverphoto,$user_profilephoto;
    public $userFacebook,$userTwitter,$userInstagram,$userFriendList;


    public function checkSocialLink($id,$type){
        if(UserSocialLinks::where(['social_ownerid'=>$id,'social_type'=>$type,'social_typestatus'=>'active'])->count() != 0){
            $data = UserSocialLinks::where(['social_ownerid'=>$id,'social_type'=>$type,'social_typestatus'=>'active'])->first()->social_link;
        }else{
            $data = "";
        }
        return $data;
    }

    public function mount($id){


        $this->userInfo = User::where('id',$id)->first();
        $this->userPodcast = Audio::orderBy('id', 'DESC')->where('audio_editor',$id)->take(3)->get();
        $this->userFav = UserFav::orderBy('id', 'DESC')->where('favs_userid',$id)->get();
        $this->userCat = Category::orderBy('id', 'DESC')->where('category_owner',$id)->get();
        $this->userFollow = UserFollow::orderBy('id', 'DESC')->where('follow_userid',$id)->get();
        $this->recentLikes = UserLikes::orderBy('id','DESC')->where('like_userid',$id)->take(3)->get();
        $this->checkFollowing = $this->get_if_following($id);
        $this->checkFriend = $this->get_if_friends($id);
        $this->playlist_public = UserPlaylist::orderBy('id','DESC')->where(['playlist_userid'=>$id,'playlist_status'=>'Public'])->get();
        $this->playlist_private = UserPlaylist::orderBy('id','DESC')->where(['playlist_userid'=>$id,'playlist_status'=>'Private'])->get();
        $this->userFacebook = $this->checkSocialLink($id,"Facebook");
        $this->userTwitter = $this->checkSocialLink($id,"Twitter");
        $this->userInstagram = $this->checkSocialLink($id,"Instagram");
        $this->userFriendList = UserFriends::where('friend_userid',$id)->orWhere('friend_requestid',$id)->get();
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
             $data->friend_block_type = "empty";
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
	

         public function createPlaylist(){

            $data = new UserPlaylist;
            $data->playlist_userid = Auth::User()->id;
            $data->playlist_title = $this->playlist_title;
            $data->playlist_status = $this->playlist_status;
            $data->save();

            session()->flash('status', 'New Playlist created');
            redirect()->to('/editor/users/'.Auth::User()->id);

         }



    public function saveProfilePhoto()
    {
        $this->validate([
            'user_profilephoto' => 'image|max:1024',
        ]);

        $checkProfile = UserGallery::where(['gallery_userid'=>Auth::user()->id,'gallery_type'=>'profile','gallery_typestatus'=>'active']);

        if($checkProfile->count() == 0){

            $data = New UserGallery;
            $data->gallery_userid = Auth::user()->id;
            $data->gallery_type = "profile";
            $data->gallery_typestatus = "active";
            $data->gallery_path = $this->user_profilephoto->hashName();
            $data->gallery_status = "active";
            $data->save();

        }else{  

            UserGallery::where('id',$checkProfile->first()->id)
            ->update([
                'gallery_typestatus'=> 'draft',
            ]);

            $data = New UserGallery;
            $data->gallery_userid = Auth::user()->id;
            $data->gallery_type = "profile";
            $data->gallery_typestatus = "active";
            $data->gallery_path = $this->user_profilephoto->hashName();
            $data->gallery_status = "active";
            $data->save();

        }

       
        
        $imagefile = $this->user_profilephoto->hashName();
        // local
        $local_storage = $this->user_profilephoto->storeAs('users/profile_img',$imagefile);
        // s3
        $s3_storage = $this->user_profilephoto->store('users/profile_img/', 's3');

        
        session()->flash('status', 'Profile Picture Updated');
        redirect()->to('/editor/users/'.Auth::user()->id);

    }

    public function saveCoverPhoto()
    {
        $this->validate([
            'user_coverphoto' => 'image|max:1024',
        ]);

        $checkProfile = UserGallery::where(['gallery_userid'=>Auth::user()->id,'gallery_type'=>'cover','gallery_typestatus'=>'active']);

        if($checkProfile->count() == 0){

            $data = New UserGallery;
            $data->gallery_userid = Auth::user()->id;
            $data->gallery_type = "cover";
            $data->gallery_typestatus = "active";
            $data->gallery_path = $this->user_coverphoto->hashName();
            $data->gallery_status = "active";
            $data->save();

        }else{  

            UserGallery::where('id',$checkProfile->first()->id)
            ->update([
                'gallery_typestatus'=> 'draft',
            ]);

            $data = New UserGallery;
            $data->gallery_userid = Auth::user()->id;
            $data->gallery_type = "cover";
            $data->gallery_typestatus = "active";
            $data->gallery_path = $this->user_coverphoto->hashName();
            $data->gallery_status = "active";
            $data->save();

        }

       
        
        $imagefile = $this->user_coverphoto->hashName();
        // local
        $local_storage = $this->user_coverphoto->storeAs('users/cover_img',$imagefile);
        // s3
        $s3_storage = $this->user_coverphoto->store('users/cover_img/', 's3');

        
        session()->flash('status', 'Profile Picture Updated');
        redirect()->to('/editor/users/'.Auth::user()->id);

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
