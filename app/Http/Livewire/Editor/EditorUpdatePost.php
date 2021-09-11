<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\Audio;
use App\Models\User;
use App\Models\Category;
use App\Models\AudioReferences;
use Auth;


class EditorUpdatePost extends Component
{
	public $audio,$a_id,$title,$season,$episode,$category,$summary,$embedlink,$hashtags,$ref_title,$ref_link,$checkAudio;

	protected $listeners = [
        'refreshParent' =>'$refresh'
        ];

    protected $rules = [
        'title' => 'required',
        'season' => 'required',
        'episode' => 'required',
        'category' => 'required',
        'summary' => 'required',
        // 'audio' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
        'embedlink' => 'required',
        'hashtags' => 'required',
        'ref_title' => 'required',
        'ref_link' => 'required',
	];




	public function mount($id)
    {
        $data = Audio::findOrFail($id);

        if(Auth::user()->id == $data->audio_editor){

        	$this->audio = $data;
        	$this->checkAudio = "true";
        	$this->a_id = $data->id;
	        $this->title = $data->audio_name;
	        $this->season = $data->audio_season;
	        $this->episode = $data->audio_episode;
	        $this->category = $data->audio_category;
	        $this->summary = $data->audio_summary;
	        $this->embedlink = $data->audio_path;
	        $this->hashtags = $data->audio_hashtags;


        }else{
        	$this->checkAudio = "false";
        }

       



    }


    public function updatepost(){

    	$data = Audio::findOrFail($this->a_id);

    	if(Auth::user()->id == $data->audio_editor){

    	Audio::where('id',$this->a_id)
            ->update([
            	'audio_name'=> $this->title,
            	'audio_season'=> $this->season,
            	'audio_episode'=> $this->episode,
            	'audio_category'=> $this->category,
            	'audio_summary'=> $this->summary,
            	'audio_path'=> $this->embedlink,
            	'audio_hashtags'=> $this->hashtags,
            ]);
    
	     session()->flash('status', 'Podcast Updated.');

		 redirect()->to('editor/podcast/update/'.$this->a_id);   

		}else{
		  redirect()->to('editor/dashboard');   	
		} 


    }


   public function clearRefFields(){
       $this->ref_title = null;
       $this->ref_link = null;
   }

    public function addReference($audioid){
    	
    	$data = new AudioReferences;
    	$data->audioref_userid = Auth::user()->id;
    	$data->audioref_audioid = $audioid;
    	$data->audioref_title = $this->ref_title;
    	$data->audioref_link = $this->ref_link;
    	$data->audioref_status = "active";
    	$data->save();

    	session()->flash('status', 'New Reference Added');

    	$this->clearRefFields();
    	
    	$this->emit('refreshParent');

    	// redirect()->to('editor/podcast/update/'.$this->a_id);  

    }




    public function render()
    {


    	$categoryList = Category::orderBy('id', 'DESC')->where('category_status','active');
        return view('livewire.editor.editor-update-post',compact('categoryList'));
    }
}
