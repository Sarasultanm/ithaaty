<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\{
    User,
    UserPodcasts,
    Category,
    PodcastCategories,
    Audio,
};


class EditorEpisodeView extends Component
{


    public function checkLink($link){

        $data = UserPodcasts::where('podcast_uniquelink',$link);
        if($data->count() != 0){
            return true;
        }else{
            return false;
        }
    }

    public function mount($link,$id){

        if($this->checkLink($link) == true && Audio::where('id',$id)->count() != 0 ){
         $this->podcast =  UserPodcasts::where('podcast_uniquelink',$link)->first();
         $this->podcast_uniquelink = $this->podcast->podcast_uniquelink;
         $this->episode = Audio::where('id',$id)->first();
        }else{
            abort(404);
        }


    }

    public function render()
    {
        return view('livewire.editor.editor-episode-view');
    }
}
