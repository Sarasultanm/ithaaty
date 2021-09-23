<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\User;
use App\Models\UserFollow;
use App\Models\UserNotifications;
use Auth;

class EditorSubscribers extends Component
{

	public function accept($id,$follow_userid){


		UserFollow::where('id',$id)
            ->update([
            	'follow_type'=> 'follow',
            ]);

    	 $notif = new UserNotifications;
         $notif->notif_userid = $follow_userid;
         $notif->notif_type = "follow";
         $notif->notif_type_id = $id;
         $notif->notif_message = "You are now following";
         $notif->status = "active";
         $notif->save();

         $notif1 = new UserNotifications;
         $notif1->notif_userid = Auth::User()->id;
         $notif1->notif_type = "following";
         $notif1->notif_type_id = $id;
         $notif1->notif_message = "Start following you";
         $notif1->status = "active";
         $notif1->save();    


        session()->flash('status', 'Accept Followers.');    

        redirect()->to('editor/subscribers');   


	}

	public function reject($id,$follow_userid){


		UserFollow::where('id',$id)
            ->update([
            	'follow_type'=> 'reject',
            ]);

    	 $notif = new UserNotifications;
         $notif->notif_userid = $follow_userid;
         $notif->notif_type = "reject";
         $notif->notif_type_id = $id;
         $notif->notif_message = "Your request has rejected";
         $notif->status = "active";
         $notif->save();

         $notif1 = new UserNotifications;
         $notif1->notif_userid = Auth::User()->id;
         $notif1->notif_type = "rejected";
         $notif1->notif_type_id = $id;
         $notif1->notif_message = "You rejected the request of";
         $notif1->status = "active";
         $notif1->save();    


        session()->flash('status', 'Rejected Followers.');    

        redirect()->to('editor/subscribers');   


	}



    public function render()
    {


    	$following = UserFollow::where(['follow_userid'=>Auth::user()->id,'follow_type'=>'follow']);
    	$followers = UserFollow::where(['follow_userfollowing'=>Auth::user()->id,'follow_type'=>'follow']);
    	$request = UserFollow::where(['follow_userfollowing'=>Auth::user()->id,'follow_type'=>'request']);
    	$reject = UserFollow::where(['follow_userfollowing'=>Auth::user()->id,'follow_type'=>'reject']);
        return view('livewire.editor.editor-subscribers',compact('following','followers','request','reject'));
    }
}
