<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\User;
use App\Models\Audio;
use App\Models\Category;
use App\Models\UserFollow;
use App\Models\UserFav;
use Auth;


class EditorPodcast extends Component
{


	public $ea_id,$ea_name,$ea_season,$ea_episode,$ea_category,$ea_summary,$ea_path,$ea_type,$uploadType,$category;


	  protected $rules = [
        'ea_name' => 'required',
        'ea_season' => 'required',
        'ea_episode' => 'required',
        'ea_category' => 'required',
        'ea_summary' => 'required',
        'audio' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
	    ];






	public function editdata($id)
    {
        $data = Audio::findOrFail($id);
        $this->ea_id = $data->id;
        $this->ea_name = $data->audio_name;
        $this->ea_season = $data->audio_season;
        $this->ea_episode = $data->audio_episode;
        $this->ea_category = $data->audio_category;
        $this->ea_summary = $data->audio_summary;
        $this->ea_path = $data->audio_path;
        $this->ea_type = $data->audio_type;
       

    }


    public function updatepost(){

    	Audio::where('id',$this->ea_id)
            ->update([
            	'audio_name'=> $this->ea_name,
            	'audio_season'=> $this->ea_season,
            	'audio_episode'=> $this->ea_episode,
            	'audio_category'=> $this->category,
            	'audio_summary'=> $this->ea_summary,
            	'audio_path'=> $this->ea_path,
            	'audio_type'=> $this->uploadType
            ]);
    
     session()->flash('status', 'Post Updated.');

	 redirect()->to('editor/podcast');     

    }



    public function render()
    {	
    	$categoryList = Category::orderBy('id', 'DESC')->where('category_owner',Auth::user()->id);
    	$audioList = Audio::orderBy('id', 'DESC')->where('audio_editor',Auth::user()->id);
    	$topPodcast = Audio::orderBy('id', 'DESC')->where('audio_editor',Auth::user()->id)->take(3)->get();
    	$following = UserFollow::where('follow_userid',Auth::user()->id);
    	$favorite = UserFav::where('favs_userid',Auth::user()->id);
        return view('livewire.editor.editor-podcast',compact('audioList','categoryList','topPodcast','following','favorite'));
    }
}
