<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
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
    UserPlaylistItems,
    AudioTimeStats
};
use Auth;

use App\Repo\AdsListRepositories;

use Illuminate\Support\Carbon;

class EditorPodcastView extends Component
{

	public $audio,$notes,$comments,$notes_message,$notes_time,$adsList,$numAds,$newAdsList,$newNumAds,$qa_answer,$report_type,$report_message;
    public $videoTimePause,$timeEnd;

    protected $AdsListRepositories;

     protected $listeners = [
        'refreshParent' =>'$refresh'
        ];
    
        
	public $searchbar;


    public function getSearch(){

        redirect()->to('editor/s/'.$this->searchbar); 

    }


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

	

    public function refreshData(){

        redirect()->to('editor/dashboard'); 
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


        public function favorite($id){

             $data = new UserFav;
             $data->favs_userid = Auth::User()->id;
             $data->favs_audioid = $id;
             $data->favs_type = "favorite";
             $data->favs_status = "active";
             $data->save();
            
            redirect()->to('editor/podcast/view/'.$id); 

        }

        public function reportAudio($audio_id){
            $this->validate([
                "report_type" => "required",
                "report_message" => "required",
            ]);

            $data = new AudioReport;
            $data->report_audioid = $audio_id;
            $data->report_userid = Auth::user()->id;
            $data->report_type = $this->report_type;
            $data->report_message = $this->report_message;
            $data->save();

            session()->flash('status', 'Report Submitted');
            redirect()->to('editor/podcast/view/'.$audio_id); 
      

        }


        public function shareButton($socialMedia,$id){
            if($socialMedia == "facebook"){
                 $link ="https://www.facebook.com/sharer/sharer.php?u=https://ithaaty.com/post/".$id;
            }else{
                $link = "https://twitter.com/intent/tweet?url=https://ithaaty.com/post/".$id;
            }
            redirect()->to($link);
        }

        public function publicAudio($id){

             Audio::where('id',$id)
            ->update([
                'audio_status'=> 'public',
            ]);
            
            session()->flash('status', 'Audio Status change to Public');

            $this->emit('refreshParent');

            redirect()->to('editor/podcast/view/'.$id); 
      

        }
        public function privateAudio($id){

             Audio::where('id',$id)
            ->update([
                'audio_status'=> 'private',
            ]);
            session()->flash('status', 'Audio Status change to Private');

            $this->emit('refreshParent');

            redirect()->to('editor/podcast/view/'.$id); 

        }

        public function checkPremierDate($premier_date){

            $now = Carbon::now();
            $expiredDate = Carbon::parse($premier_date)->format('d.m.Y h:m:sa');

            // if ($now->format('d.m.Y') >= $expiredDate){
            //     return 'Play'.strtotime($now->format('d.m.Y h:m:sa'))." - ".$expiredDate;
            // }else{
            //     return 'Off'.$now->format('d.m.Y h:m:sa')." - ".$expiredDate; 
            // }

            // $result = $now->gt($premier_date);
            // if($result == true){
            //     return 'Active';
            // }else{
            //     return 'Expired';
            // }

            
            
            if ($now->between($now->format('d.m.Y h:m:sa'), $expiredDate)) {
                return 'Active';
            } else {
                return 'Expired';
            }
    
        }

        public function saveTimePlay(){
              AudioTimeStats::create([
                'ats_userid'=> Auth::user()->id,
                'ats_audioid' => 2,
                'ats_viewedtime' => 2,
                'ats_audiolenght' => 2
            ]);
            $this->emit('refreshParent');    
        }

        public function saveVideoTime(){

            // AudioTimeStats::create([
            //     'ats_userid'=> Auth::user()->id,
            //     'ats_audioid' => 2,
            //     'ats_viewedtime' => 2,
            //     'ats_audiolenght' => 2
            // ]);
             $this->timeEnd = $this->videoTimePause;   
             $this->emit('refreshParent');
        }


    public function mount($id,AdsListRepositories $AdsListRepositories)
    {
        $this->audio = Audio::where('id',$id)->first();
        $this->notes = UserNotes::where('notes_audioid',$id)->get();
        $this->adsList = AdsListSetup::where('adssetup_audioid',$id)->get();
        $this->numAds = AdsListSetup::where('adssetup_audioid',$id)->count();
        //$this->newAdsList = AdsList::where('adslist_country',Auth::User()->country)->whereNull('adslist_type')->get();
       // $this->newNumAds = AdsList::where('adslist_country',Auth::User()->country)->whereNull('adslist_type')->count();
       $this->newAdsList =  $AdsListRepositories->getAdsListMediaAds();
       $this->newNumAds = $AdsListRepositories->getAdsListMediaNumber();
        //$this->AdsListRepositories = $AdsListRepositories;

    }    



    public function render()
    {	
    	$getHashtags = Audio::where('audio_hashtags', 'like', '%music%')->count();
    	$randomList = User::inRandomOrder()->where('id','!=',Auth::user()->id)->take(3)->get();
    	$mostlike = UserLikes::orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->take(1);
        return view('livewire.editor.editor-podcast-view',compact('getHashtags','randomList','mostlike'));
    }
}
