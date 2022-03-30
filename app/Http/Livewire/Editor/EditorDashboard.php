<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\User;
use App\Models\Audio;
use App\Models\Category;
use App\Models\UserFollow;
use App\Models\UserLikes;
use App\Models\UserFav;
use App\Models\UserNotifications;
use App\Models\UserComments;
use App\Models\UserNotes;
use App\Models\UserViews;
use App\Models\AudioReport;
use App\Models\UserFriends;
use App\Models\Ads;
use App\Models\AdsList;
use App\Models\AdsStats;
use Auth;
use Share;
use URL;
use Request;

use Livewire\WithFileUploads;


use App\Repo\BrowsersRepositories;
use App\Repo\AdsListRepositories;


class EditorDashboard extends Component
{

	use WithFileUploads;

        protected $BrowsersRepositories;
        protected $AdsListRepositories;

        public $post_ads = 0;
	    public $title,$season,$episode,$category,$summary,$audiofile,$uploadType,$embedlink,$comments,$hashtags,$notes_message,$notes_time;
        public $report_type,$report_message;

        protected $listeners = [
        'refreshParent' =>'$refresh'
        ];



	    protected $rules = [
        'title' => 'required',
        'season' => 'required',
        'episode' => 'required',
        'category' => 'required',
        'summary' => 'required',
        'audio' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
	    ];

     

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
            redirect()->to('/editor/dashboard');

        }

	    public function save(){

	    // $this->validate();	

        if($this->uploadType == 'uploadFile'){

            if($this->audiofile){

                $data = new Audio;
                $data->audio_editor = Auth::user()->id;
                $data->audio_name = $this->title;
                $data->audio_season = $this->season;
                $data->audio_episode = $this->episode;
                $data->audio_category = $this->category;
                $data->audio_tags = "none";
                $data->audio_status = "active";
                $data->audio_summary = $this->summary;
                $data->audio_path = $this->audiofile->hashName();
                $data->audio_type = "Upload";
                $data->audio_hashtags = $this->hashtags;
                $data->save();

                $audiofile = $this->audiofile->hashName();
                $path = $this->audiofile->storeAs('audio',$audiofile);

                session()->flash('status', 'Post Success');

                redirect()->to('/editor/dashboard');

            }else{
                redirect()->to('/editor/dashboard');
                
            }

        }else{


            if($this->embedlink){

                $data = new Audio;
                $data->audio_editor = Auth::user()->id;
                $data->audio_name = $this->title;
                $data->audio_season = $this->season;
                $data->audio_episode = $this->episode;
                $data->audio_category = $this->category;
                $data->audio_tags = "none";
                $data->audio_status = "active";
                $data->audio_summary = $this->summary;
                $data->audio_path = $this->embedlink;
                $data->audio_type = "Embed";
                $data->audio_hashtags = $this->hashtags;
                $data->save();

                // $audiofile = $this->audiofile->hashName();
                // $path = $this->audiofile->storeAs('audio',$audiofile);

                session()->flash('status', 'Post Success');

                redirect()->to('/editor/dashboard');

            }else{
                redirect()->to('/editor/dashboard');
                
            }

        }


	   }


        public function follow($id){

             $data = new UserFollow;
             $data->follow_userid = Auth::User()->id;
             $data->follow_userfollowing = $id;
             $data->follow_type = "follow";
             $data->follow_status = "active";
             $data->save();

             // $notif = new UserNotifications;
             // $notif->notif_userid = Auth::User()->id;
             // $notif->notif_type = "follow";
             // $notif->notif_type_id = $data->id;
             // $notif->notif_message = "You are now following";
             // $notif->status = "active";
             // $notif->save();

             // $notif1 = new UserNotifications;
             // $notif1->notif_userid = $id;
             // $notif1->notif_type = "following";
             // $notif1->notif_type_id = $data->id;
             // $notif1->notif_message = "Start following you";
             // $notif1->status = "active";
             // $notif1->save();

             $notif = new UserNotifications;
             $notif->notif_userid = Auth::User()->id;
             $notif->notif_type = "request";
             $notif->notif_type_id = $data->id;
             $notif->notif_message = "Sending a request to follow";
             $notif->status = "active";
             $notif->save();

             $notif1 = new UserNotifications;
             $notif1->notif_userid = $id;
             $notif1->notif_type = "requested";
             $notif1->notif_type_id = $data->id;
             $notif1->notif_message = "Requesting to follow you";
             $notif1->status = "active";
             $notif1->save();
             
             session()->flash('status', 'Follow Request has send');
             redirect()->to('/editor/dashboard');

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


            
            $this->emit('refreshParent');

        }



        public function view($id,$audio_editor){

             $data = new UserViews;
             $data->view_userid = Auth::User()->id;
             $data->view_audioid = $id;
             $data->view_type = "view";
             $data->view_status = "active";
             $data->view_ownerid = $audio_editor;
             $data->user_ip = Request::ip();
             $data->save();

             $notif = new UserNotifications;
             $notif->notif_userid = Auth::User()->id;
             $notif->notif_type = "view";
             $notif->notif_type_id = $data->id;
             $notif->notif_message = "You view the audio of";
             $notif->status = "active";
             $notif->save();

             $notif1 = new UserNotifications;
             $notif1->notif_userid = $audio_editor;
             $notif1->notif_type = "viewed";
             $notif1->notif_type_id = $data->id;
             $notif1->notif_message = "View your audio";
             $notif1->status = "active";
             $notif1->save();


            
             $this->emit('refreshParent');

             return redirect()->to('editor/podcast/view/'.$id);

        }


        public function favorite($id){

             $data = new UserFav;
             $data->favs_userid = Auth::User()->id;
             $data->favs_audioid = $id;
             $data->favs_type = "favorite";
             $data->favs_status = "active";
             $data->save();
            
            $this->emit('refreshParent');

        }


        public function publicAudio($id){

             Audio::where('id',$id)
            ->update([
                'audio_status'=> 'public',
            ]);
            
            session()->flash('status', 'Audio Status change to Public');

            $this->emit('refreshParent');

            redirect()->to('editor/dashboard'); 

        }
        public function privateAudio($id){

             Audio::where('id',$id)
            ->update([
                'audio_status'=> 'private',
            ]);
            session()->flash('status', 'Audio Status change to Private');

            $this->emit('refreshParent');

            redirect()->to('editor/dashboard'); 

        }

        public function displayLink(){

            
            session()->flash('status', 'Copy Link');

            $this->emit('refreshParent');

           

        }

        

        public function clearFields(){
            $this->comments = null;
           
        }
        public function clearFieldsNotes(){
             $this->notes_time = null;
            $this->notes_message = null;
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

            $this->emit('refreshParent');

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

    public function shareButton($socialMedia,$id){
        if($socialMedia == "facebook"){
             $link ="https://www.facebook.com/sharer/sharer.php?u=https://ithaaty.com/post/".$id;
        }else{
            $link = "https://twitter.com/intent/tweet?url=https://ithaaty.com/post/".$id;
        }
        redirect()->to($link);
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
                if(Auth::user()->id == $id){
                      return "Owner";
                }else{
                     return "Not Friend";
                }
               
            }
            
        }

    }

    public function checkMediaFile($mime){

        if(Str::contains($mime  , 'image')){
            $file = "image";
        }elseif(Str::contains($mime  , 'video')){
            $file = "video";
        }else{
            $file = "audio";
        }
        return $file;

        //return Str::contains($mime  , 'image')  ? "image" : "audio";
        //return $mime;
    }



    public function viewContextLink($id){
        $ads_list = AdsList::find($id);
        $users = Auth::user();
    
        AdsStats::create([
            'as_adslistid'=>$id,
            'as_country'=>$users->country,
            'as_age'=>$users->age,
            'as_gender'=>$users->gender,
            'as_device'=> $this->browser['userAgent'],
            'as_ipaddress'=> $_SERVER['REMOTE_ADDR'] 
        ]);
       
        redirect()->away($ads_list->adslist_weblink);
   }

   public function viewSocialAds($id){
        $ads_list = AdsList::find($id);
        $users = Auth::user();

        AdsStats::create([
            'as_adslistid'=>$id,
            'as_country'=>$users->country,
            'as_age'=>$users->age,
            'as_gender'=>$users->gender,
            'as_device'=> $this->browser['userAgent'],
            'as_ipaddress'=> $_SERVER['REMOTE_ADDR'] 
        ]);

        redirect()->away($ads_list->adslist_weblink);
        //redirect()->to('editor/dashboard');   
        //session()->flash('status', 'Audio Status change to Private');  
        //$this->emit('refreshParent');     
    }

    public function mount(BrowsersRepositories $BrowsersRepositories,
                          AdsListRepositories $AdsListRepositories){

        $this->browser = $BrowsersRepositories->getBrowser();
        $this->AdsListRepositories = $AdsListRepositories;

    }

  
    public function render()
    {   

    	$audioList = Audio::orderBy('id','DESC')->where('audio_publish','Publish')->whereIn('audio_status', ['active','public','private']);
        //$audioList = Audio::orderBy('id','DESC')->where(['audio_status'=>'active','audio_status'=>'public','audio_status'=>'private']);
        $categoryList = Category::orderBy('id', 'DESC')->where('category_status','active');
        $randomList = User::inRandomOrder()->where('id','!=',Auth::user()->id)->take(3)->get();
        $mostlike = UserLikes::orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->take(1);
        // $contextAds = AdsList::inRandomOrder()->where(['adslist_type'=>'Context Ads','adslist_status'=>'Confirm'])->take(2)->get();
        $contextAds = $this->AdsListRepositories->getAdsListContextAds();
        $socialAds = $this->AdsListRepositories->getAdsListSocialAds();
    

        return view('livewire.editor.editor-dashboard',compact('audioList','categoryList','randomList','mostlike','contextAds','socialAds'));
    }

   





}
