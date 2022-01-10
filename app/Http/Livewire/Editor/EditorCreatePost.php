<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use Auth;
use App\Models\User;
use App\Models\Audio;
use App\Models\Category;
use App\Models\AudioReferences;
use Livewire\WithFileUploads;


class EditorCreatePost extends Component
{
    use WithFileUploads;
	
	public $count = 0;
 	
	public $title,$season,$episode,$category,$summary,$embedlink,$hashtags,$status,$audio;


    public $showSummary = true;

	protected $listeners = [
        'refreshParent' =>'$refresh'
        ];

 //    protected $rules = [
 //        'title' => 'required',
 //        'season' => 'required',
 //        'episode' => 'required',
 //        'status' => 'required',
 //        'category' => 'required',
 //        // 'summary' => 'required',
 //        'audio' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,mp4,wav',
 //        'embedlink' => 'required',
 //        // 'hashtags' => 'required',
 //        // 'ref_title' => 'required',
 //        // 'ref_link' => 'required',
	// ];

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




        // $audiofile = $this->audiofile->hashName();
        // $path = $this->audiofile->storeAs('audio',$audiofile);

        session()->flash('status', "You updated your podcast but its not publish. If you want to publish your podcast now hit the publish button.");

        // redirect()->to('/editor/dashboard');
        redirect()->to('/editor/podcast/update/'.$data->id);



	}









    public function render()
    {
    	$categoryList = Category::orderBy('id', 'DESC')->where('category_status','active');
        return view('livewire.editor.editor-create-post',compact('categoryList'));
    }
}
