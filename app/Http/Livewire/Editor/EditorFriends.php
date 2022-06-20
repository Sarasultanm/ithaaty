<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\UserFriends;
use App\Models\UserNotifications;
use App\Models\UserBlockList;
use Auth;
class EditorFriends extends Component
{

    public $searchbarfriend;
    public $searchbar;


    public function get_search(){
        redirect()->to('/editor/search/'.$this->searchbarfriend);
    }



    public function getSearch(){

        redirect()->to('editor/s/'.$this->searchbar); 

    }

	public function confirmFriend($friend_id){

            $data = UserFriends::where(['friend_userid'=>$friend_id,'friend_requestid'=>Auth::user()->id]);

            $data->update([
                'friend_type'=> 'Friends',
            ]);

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
             redirect()->to('/editor/friends');

        }

     public function blockFriend($id,$friend_id,$block_type){


          $data = UserFriends::where('id',$id);
          $data->update([
                'friend_type' => 'Block',
                'friend_block_type' => $block_type,
            ]);

           $block = new UserBlockList;
           $block->block_userid = Auth::user()->id;
           $block->block_blockedid = $friend_id;
           $block->block_type = "empty";
           $block->block_status = "active";
           $block->block_friendtblid = $id;
           $block->save();





             // $notif = new UserNotifications;
             // $notif->notif_userid = $friend_id;
             // $notif->notif_type = "block";
             // $notif->notif_type_id = $data->first()->id;
             // $notif->notif_message = "You block";
             // $notif->status = "active";
             // $notif->save();

             // $notif1 = new UserNotifications;
             // $notif1->notif_userid = Auth::User()->id;
             // $notif1->notif_type = "blocked";
             // $notif1->notif_type_id = $data->first()->id;
             // $notif1->notif_message = "Start friend you";
             // $notif1->status = "active";
             // $notif1->save();    

          session()->flash('status', 'Block User Complete');
          redirect()->to('/editor/friends');
     }   



    public function render()
    {
    	$friendList = UserFriends::where('friend_userid',Auth::user()->id)->orWhere('friend_requestid',Auth::user()->id)->get();
    	$friendrequest = UserFriends::where(['friend_userid'=>Auth::user()->id,'friend_status' =>'active'])->get();
    	$confirmrequest = UserFriends::where(['friend_requestid'=>Auth::user()->id,'friend_status' =>'active'])->get();
    
        return view('livewire.editor.editor-friends',compact('friendList','friendrequest','confirmrequest'));
    }
}
