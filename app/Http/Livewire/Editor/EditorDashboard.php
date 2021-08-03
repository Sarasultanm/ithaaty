<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\User;
use App\Models\Audio;
use App\Models\Category;
use App\Models\UserFollow;
use App\Models\UserLikes;
use App\Models\UserFav;
use App\Models\UserComments;
use Auth;

use Livewire\WithFileUploads;

class EditorDashboard extends Component
{

	use WithFileUploads;



	    public $title,$season,$episode,$category,$summary,$audiofile,$uploadType,$embedlink,$comments,$hashtags;
 

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
             session()->flash('status', 'Done Following');
             redirect()->to('/editor/dashboard');

        }

        public function like($id){

             $data = new UserLikes;
             $data->like_userid = Auth::User()->id;
             $data->like_audioid = $id;
             $data->like_type = "like";
             $data->like_status = "active";
             $data->save();
            
            $this->emit('refreshParent');

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


        public function clearFields(){
            $this->comments = null;
        }

        public function saveComment($id){

             $data = new UserComments;
             $data->coms_userid = Auth::User()->id;
             $data->coms_audioid = $id;
             $data->coms_type = "comments";
             $data->coms_message = $this->comments;
             $data->coms_status = "active";
             $data->save();
            
             $this->clearFields();

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


    public function render()
    {

    	$audioList = Audio::orderBy('id', 'DESC');
        $categoryList = Category::orderBy('id', 'DESC')->where('category_owner',Auth::user()->id);
        $randomList = User::inRandomOrder()->where('id','!=',Auth::user()->id)->take(3)->get();
        $mostlike = UserLikes::orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->take(1);



        return view('livewire.editor.editor-dashboard',compact('audioList','categoryList','randomList','mostlike'));
    }

   





}
