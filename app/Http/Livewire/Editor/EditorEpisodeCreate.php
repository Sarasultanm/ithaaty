<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use Auth;
use App\Models\{
    User,
    Audio,
    Category,
    AudioReferences,
    UserPodcasts,
    UserPodcastEpisodes,
};

use Livewire\WithFileUploads;

class EditorEpisodeCreate extends Component
{

    use WithFileUploads;
	
	public $count = 0;
 	
	public $title,$season,$episode,$category,$summary,$embedlink,$hashtags,$status,$audio,$podcast_id;


    public $showSummary = true;

	protected $listeners = [
        'refreshParent' =>'$refresh'
        ];


    
        public function increment()
        {
            $this->count++;
        }    
    
         public function saveMedia(){
    
            $validatedData = $this->validate([
                'title' => 'required',
                'season' => 'required',
                'episode' => 'required',
                'status' => 'required',
                'category' => 'required',
                // 'audio' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,mp4,wav',
                
            ]);
    
            $data = new Audio;
            $data->audio_editor = Auth::user()->id;
            $data->audio_name = $this->title;
            $data->audio_season = $this->season;
            $data->audio_episode = $this->episode;
            $data->audio_category = $this->category;
            $data->audio_tags = "none";
            $data->audio_status = $this->status;
            $data->audio_summary = (empty($this->summary)) ? "" : $this->summary;
            $data->audio_path = $this->audio->hashName();
            $data->audio_type = "Upload";
            $data->audio_hashtags = (empty($this->hashtags)) ? "" : $this->hashtags;
            $data->audio_publish = "Draft";
            $data->save();
    
    
            $mediafile = $this->audio->hashName();
            $path = $this->audio->storeAs('audio',$mediafile);
    
            $s3_storage = $this->audio->store('audio', 's3');
    
            UserPodcastEpisodes::create([
                'poditem_podcastid' => $this->podcast_id,
                'poditem_audioid' => $data->id,
                'poditem_type' => 'Upload',
                'poditem_typestatus' => 'active',
                'podcast_status' => 'active',
            ]);


            session()->flash('status', "You updated your podcast but its not publish. If you want to publish your podcast now hit the publish button.");


    
            redirect()->to('/editor/podcast/update/'.$data->id);
    
         }
    
        public function save(){
    
            // $this->validate();
    
            $validatedData = $this->validate([
                'title' => 'required',
                'season' => 'required',
                'episode' => 'required',
                'status' => 'required',
                'category' => 'required',
                'embedlink' => 'required',
            ]);
    
            // if(empty($this->summary)){
            //     $newSummary = "";
            // }else{
            //     $newSummary = $this->summary;
            // }
            
            $data = new Audio;
            $data->audio_editor = Auth::user()->id;
            $data->audio_name = $this->title;
            $data->audio_season = $this->season;
            $data->audio_episode = $this->episode;
            $data->audio_category = $this->category;
            $data->audio_tags = "none";
            $data->audio_status = $this->status;
            $data->audio_summary = (empty($this->summary)) ? "" : $this->summary;
            $data->audio_path = $this->embedlink;
            $data->audio_type = "Embed";
            $data->audio_publish = "Draft";
            $data->audio_hashtags = (empty($this->hashtags)) ? "" : $this->hashtags;
            $data->save();
    
    
            // $ref = new AudioReferences;
            // $ref->audioref_userid = Auth::user()->id;
            // $ref->audioref_audioid = $data->id;
            // $ref->audioref_title = $this->ref_title;
            // $ref->audioref_link  = $this->ref_link;
            // $ref->audioref_status  = "active";
            // $ref->save();
    
            UserPodcastEpisodes::create([
                'poditem_podcastid' => $this->podcast_id,
                'poditem_audioid' => $data->id,
                'poditem_type' => 'Embed',
                'poditem_typestatus' => 'active',
                'podcast_status' => 'active',
            ]);
    
    
            // $audiofile = $this->audiofile->hashName();
            // $path = $this->audiofile->storeAs('audio',$audiofile);
    
            session()->flash('status', "You updated your podcast but its not publish. If you want to publish your podcast now hit the publish button.");
    
            // redirect()->to('/editor/dashboard');
            //redirect()->to('/editor/channel/podcast/'.$this->podcast_link);

            redirect()->to('/editor/podcast/update/'.$data->id);
    
    
        }
    
    public function mount($link){
        $data = UserPodcasts::where('podcast_uniquelink',$link);
        if($data->count() != 0){
            $this->podcast_id = $data->first()->id;
            $this->podcast_link= $link;
        }else{
            abort(404);
        }




    }

    public function render()
    {
        $categoryList = Category::orderBy('id', 'DESC')->where('category_status','active');
        return view('livewire.editor.editor-episode-create',compact('categoryList'));
    }
}
