<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
// use App\Models\User;
// use App\Models\Audio;
// use App\Models\UserFollow;
// use App\Models\UserLikes;
// use App\Models\UserViews;
// use App\Models\UserFav;
// use App\Models\UserNotes;
// use App\Models\AudioSponsor;
// use App\Models\UserComments;
// use App\Models\UserNotifications;
// use App\Models\AdsListSetup;
use App\Models\{
    User,
    Audio,
    UserFollow,
    UserLikes,
    UserViews,
    UserFav,
    UserNotes,
    AudioSponsor,
    UserComments,
    UserNotifications,
    AdsListSetup,
    AdsList,
    UserQa,
    UserQanswer,
    UserPlaylist,
    UserPlaylistItems
};
use Auth;

class EditorPodcastView extends Component
{

	public $audio,$notes,$comments,$notes_message,$notes_time,$adsList,$numAds,$newAdsList,$newNumAds,$qa_answer;


     protected $listeners = [
        'refreshParent' =>'$refresh'
        ];


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
        $this->notes = UserNotes::where('notes_audioid',$id)->get();
        $this->adsList = AdsListSetup::where('adssetup_audioid',$id)->get();
        $this->numAds = AdsListSetup::where('adssetup_audioid',$id)->count();
        $this->newAdsList = AdsList::where('adslist_country',Auth::User()->country)->get();
        $this->newNumAds = AdsList::where('adslist_country',Auth::User()->country)->count();
    }

     public function like($id,$audio_editor,$like_type){

             $data = new UserLikes;
             $data->like_userid = Auth::User()->id;
             $data->like_audioid = $id;
             $data->like_type = $like_type;
             $data->like_status = "active";
             $data->like_ownerid = $audio_editor;
             $data->save();

             $notif = new UserNotifications;
             $notif->notif_userid = Auth::User()->id;
             $notif->notif_type = "like";
             $notif->notif_type_id = $data->id;
             $notif->notif_message = "You like the audio of";
             $notif->status = "active";
             $notif->save();

             $notif1 = new UserNotifications;
             $notif1->notif_userid = $audio_editor;
             $notif1->notif_type = "liked";
             $notif1->notif_type_id = $data->id;
             $notif1->notif_message = "Like your audio";
             $notif1->status = "active";
             $notif1->save();
            
            // $this->emit('refreshParent');

            redirect()->to('editor/podcast/view/'.$id); 

        }

    public function saveComment($id,$audio_editor){

             $data = new UserComments;
             $data->coms_userid = Auth::User()->id;
             $data->coms_audioid = $id;
             $data->coms_type = "comments";
             $data->coms_message = $this->comments;
             $data->coms_status = "active";
             $data->coms_ownerid = $audio_editor;
             $data->save();

             $notif = new UserNotifications;
             $notif->notif_userid = Auth::User()->id;
             $notif->notif_type = "comments";
             $notif->notif_type_id = $data->id;
             $notif->notif_message = "You are commenting on the audio of";
             $notif->status = "active";
             $notif->save();

             $notif1 = new UserNotifications;
             $notif1->notif_userid = $audio_editor;
             $notif1->notif_type = "commenting";
             $notif1->notif_type_id = $data->id;
             $notif1->notif_message = "commenting on your audio";
             $notif1->status = "active";
             $notif1->save();

            
             $this->clearFields();

            // $this->emit('refreshParent');

            redirect()->to('editor/podcast/view/'.$id); 

    }

    public function saveNotes($id,$audio_editor){

             $data = new UserNotes;
             $data->notes_userid = Auth::User()->id;
             $data->notes_audioid = $id;
             $data->notes_ownerid = $audio_editor;
             $data->notes_time = $this->notes_time;
             $data->notes_message = $this->notes_message;
             $data->notes_status = "active";
             $data->save();

             $notif = new UserNotifications;
             $notif->notif_userid = Auth::User()->id;
             $notif->notif_type = "addnotes";
             $notif->notif_type_id = $data->id;
             $notif->notif_message = "You are adding notes on the audio of";
             $notif->status = "active";
             $notif->save();

             $notif1 = new UserNotifications;
             $notif1->notif_userid = $audio_editor;
             $notif1->notif_type = "notes";
             $notif1->notif_type_id = $data->id;
             $notif1->notif_message = "adding notes on your audio";
             $notif1->status = "active";
             $notif1->save();

            
             $this->clearFieldsNotes();

            $this->emit('refreshParent');

            redirect()->to('editor/podcast/view/'.$id); 

        }


          public function clearFieldsNotes(){
             $this->notes_time = null;
            $this->notes_message = null;
        }


        public function clearFields(){
                $this->comments = null;     
        }

        public function saveAnswer($question_id,$audio_id){

            $this->validate([
                "qa_answer" => "required",
            ]);

             $data = new UserQanswer;
             $data->qn_qaid = $question_id;
             $data->qn_audioid = $audio_id;
             $data->qn_useranswerid = Auth::User()->id;
             $data->qn_answer = $this->qa_answer;
             $data->qn_time = "00:00";
             $data->qn_status = "active";
             $data->save();

             // $notif = new UserNotifications;
             // $notif->notif_userid = Auth::User()->id;
             // $notif->notif_type = "like";
             // $notif->notif_type_id = $data->id;
             // $notif->notif_message = "You like the audio of";
             // $notif->status = "active";
             // $notif->save();

             // $notif1 = new UserNotifications;
             // $notif1->notif_userid = $audio_editor;
             // $notif1->notif_type = "liked";
             // $notif1->notif_type_id = $data->id;
             // $notif1->notif_message = "Like your audio";
             // $notif1->status = "active";
             // $notif1->save();
            
            // $this->emit('refreshParent');

            redirect()->to('editor/podcast/view/'.$audio_id); 

        }



        public function addToPlaylist($playlist_id,$audio_id,$owner_id){

            $data = new UserPlaylistItems;
            $data->plitems_userid = Auth::user()->id;
            $data->plitems_plid = $playlist_id;
            $data->plitems_audioid = $audio_id;
            $data->plitems_ownerid = $owner_id;
            $data->plitems_status = "active";
            $data->save();

            redirect()->to('editor/podcast/view/'.$audio_id); 
        }






    public function render()
    {	
    	$getHashtags = Audio::where('audio_hashtags', 'like', '%music%')->count();
    	$randomList = User::inRandomOrder()->where('id','!=',Auth::user()->id)->take(3)->get();
    	$mostlike = UserLikes::orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->take(1);
        return view('livewire.editor.editor-podcast-view',compact('getHashtags','randomList','mostlike'));
    }
}
