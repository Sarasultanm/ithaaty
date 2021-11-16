<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\UserNotifications;
use App\Models\UserFriends;
use Auth;


class EditorActivity extends Component
{

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



    public function render()
    {
    	$notif_list = UserNotifications::orderBy('id', 'DESC')->get();

        return view('livewire.editor.editor-activity',compact('notif_list'));
    }
}
