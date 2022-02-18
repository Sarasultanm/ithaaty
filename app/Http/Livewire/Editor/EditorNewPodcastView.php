<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\{
    User,
    UserPodcasts,
    Category,
};


class EditorNewPodcastView extends Component
{



    public function checkLink($link){

        $data = UserPodcasts::where('podcast_uniquelink',$link);

        if($data->count() != 0){
            return true;
        }else{
            return false;
        }



    }

    public function mount($link){

        if($this->checkLink($link) == true){
         $this->podcast =  UserPodcasts::where('podcast_uniquelink',$link)->first();
         $this->podcast_uniquelink = $this->podcast->podcast_uniquelink;
        }else{
            abort(404);
        }


    }

    public function render()
    {   
        $categories = Category::orderBy('id')->where('category_status','active')->get();
        return view('livewire.editor.editor-new-podcast-view',compact('categories'));
    }
}
