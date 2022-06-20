<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\{
    User,
    UserFriends,
    UserSetup,
    UserChannel,
    UserChannelSub,
    Interest,
    UserInterest,
};
use Auth;

class EditorSetup extends Component
{


     protected $listeners = [
        'refreshParent' =>'$refresh'
    ];



    public $search = "",$result,$addFriend = 0,$interest_option,$result_items = "";


    
	public $searchbar;


    public function getSearch(){

        redirect()->to('editor/s/'.$this->searchbar); 

    }




    public function subChannel($id){
        $data = new UserChannelSub;
        $data->sub_channelid = $id;
        $data->sub_userid = Auth::user()->id;
        $data->sub_type  = "channel";
        $data->save();

        $this->emit('refreshParent');
    }


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


    public function skipSetup($type){

        $data = new UserSetup;
        $data->setup_ownerid = Auth::user()->id;

        if($type == "Friend"){
            $data->setup_type = "Friend Setup";
            $data->setup_typestatus = "Incomplete"; 
            $this->currentSteps = 2;
            $this->stepOne = 1;

        }elseif($type == "Interest"){
            $data->setup_type = "Interest Setup";
            $data->setup_typestatus = "Incomplete";
            $this->currentSteps = 3;
            $this->stepTwo = 1;

        }elseif($type == "Channel"){
            $data->setup_type = "Channel Setup";
            $data->setup_typestatus = "Incomplete";
            $this->stepThree = 1;
            
            User::where("id",Auth::user()->id)->update([
            "firstlogin"=>"1"
            ]);

            session()->flash('status', 'Setup Complete');
             redirect()->to('editor/dashboard');  

        }else{

        }

        $data->save();
    }


     public function checkSteps($type){
        //$data = Auth::user()->get_setup($type)->count();
        // if($type == "Friend Setup"){
        //     if($data != 0){
        //         $this->currentSteps = 1;
        //         $this->stepOne = 1;
        //     }else{
        //         $this->currentSteps = 1;
        //         $this->stepOne = 0;
        //     }

        // }elseif($type == "Interest Setup"){
        //     if($data != 0){
        //         $this->currentSteps = 3;
        //         $this->stepTwo = 1;
        //     }else{
        //         $this->currentSteps = 1;
        //         $this->stepTwo = 0;
        //     }
        // }elseif($type == "Channel Setup"){
        //     if($data != 0){
        //         $this->stepThree = 1;
        //     }else{
        //         $this->currentSteps = 1;
        //         $this->stepThree = 0;
        //     }
        // }

        $firstStep = Auth::user()->get_setup('Friend Setup')->count();

        // check if already exist
        if($firstStep != 0 ){

            $this->currentSteps = 2;
            $this->stepOne = 1;
            $this->stepTwo = 0;
            $this->stepThree = 0;
            
            $secondStep = Auth::user()->get_setup('Interest Setup')->count();
            if($secondStep != 0){
                $this->currentSteps = 3;
                $this->stepOne = 1;
                $this->stepTwo = 1;
                $this->stepThree = 0;
            }

        }else{
            $this->currentSteps = 1;
            $this->stepOne = 0;
            $this->stepTwo = 0;
            $this->stepThree = 0;
        }



        

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

        if($this->interest_option){
            foreach($this->interest_option as $value){
                if($value != 0){
                     UserInterest::updateOrCreate(
                            ['interest_ownerid'=>Auth::user()->id,'interest_id'=>$value],
                            ['interest_type'=>"interest",'interest_typestatus' => "check"]
                     );
                }
            }
            
        }
        

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

   



    public function mount(){
        $this->checkSteps('Friend Setup');
        // $this->checkSteps('Interest Setup');
        // $this->checkSteps('Channel Setup');

    }


    public function render()
    {

        $channel_list = UserChannel::orderBy('id')->where('channel_status','active')->get();
        $interest_list = Interest::where('status','active')->get();
        return view('livewire.editor.editor-setup',compact('channel_list','interest_list'));
    }
}
