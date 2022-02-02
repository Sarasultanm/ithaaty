<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\{
    User,
    UserFriends,
    UserSetup,
};
use Auth;

class EditorSetup extends Component
{


     protected $listeners = [
        'refreshParent' =>'$refresh'
    ];



    public $search = "",$result,$addFriend = 0;


    public function get_search(){

        return $this->result = User::search($this->search)->get();

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

             // $notif = new UserNotifications;
             // $notif->notif_userid = Auth::User()->id;
             // $notif->notif_type = "request";
             // $notif->notif_type_id = $data->id;
             // $notif->notif_message = "Sending a request to be friend";
             // $notif->status = "active";
             // $notif->save();

             // $notif1 = new UserNotifications;
             // $notif1->notif_userid = $id;
             // $notif1->notif_type = "requested";
             // $notif1->notif_type_id = $data->id;
             // $notif1->notif_message = "Requesting to be friend";
             // $notif1->status = "active";
             // $notif1->save();
             

            
             $this->emit('refreshParent');

             $this->addFriend++;
    }

    public function friendSetup(){
        $data = new UserSetup;
        $data->setup_ownerid = Auth::user()->id;
        $data->setup_type = "Friend Setup";
        $data->setup_typestatus = "Complete";
        $data->save();

        $this->currentSteps = 2;
        $this->stepOne = 1;
    }

    public function interestSetup(){
        $data = new UserSetup;
        $data->setup_ownerid = Auth::user()->id;
        $data->setup_type = "Interest Setup";
        $data->setup_typestatus = "Incomplete";
        $data->save();

        $this->currentSteps = 3;
        $this->stepTwo = 1;
    }

    public function channelSetup(){

        $data = new UserSetup;
        $data->setup_ownerid = Auth::user()->id;
        $data->setup_type = "Channel Setup";
        $data->setup_typestatus = "Incomplete";
        $data->save();

        User::where("id",Auth::user()->id)->update([
            "firstlogin"=>"1"
        ]);
       
        $this->stepThree = 1;

        session()->flash('status', 'Setup Complete');
        redirect()->to('editor/dashboard');  

    }

    public function checkSteps($type,$status){
        $data = Auth::user()->get_setuptype($type,$status)->count();
        if($type == "Friend Setup"){
            if($data != 0){
                $this->currentSteps = 2;
                $this->stepOne = 1;
            }else{
                $this->currentSteps = 1;
                $this->stepOne = 0;
            }

        }elseif($type == "Interest Setup"){
            if($data != 0){
                $this->currentSteps = 3;
                $this->stepTwo = 1;
            }else{
                $this->currentSteps = 1;
                $this->stepTwo = 0;
            }
        }else{
            if($data != 0){
                $this->stepThree = 1;
            }else{
                $this->currentSteps = 1;
                $this->stepThree = 0;
            }
        }
        

    }



    public function mount(){
        $this->checkSteps('Friend Setup','Complete');
        $this->checkSteps('Interest Setup','Incomplete');
        $this->checkSteps('Channel Setup','Incomplete');

    }


    public function render()
    {
        return view('livewire.editor.editor-setup');
    }
}
