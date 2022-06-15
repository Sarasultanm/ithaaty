<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\{
    User,
    UserPodcasts,
    Category,
    PodcastCategories,
    UserChannelSub,
};

use Auth;

class EditorNewPodcastView extends Component
{

    public function subcriber($id){

        $data = new UserChannelSub;
        $data->sub_channelid = $id;
        $data->sub_userid = Auth::user()->id;
        $data->sub_type  = "channel";
        $data->save();


        session()->flash('status', 'Subcribe Success');
        redirect()->to('editor/channel/podcast/'.$this->podcast_uniquelink);  

    }


    public function addCategory($category_id){


        $data = PodcastCategories::where(['pc_categoryid'=>$category_id,'pc_podcastid'=>$this->podcast->id]);
       
        if($data->count() == 0){
             PodcastCategories::create([
                'pc_categoryid'=>$category_id,
                'pc_podcastid'=>$this->podcast->id,
            ]);
        }else{
            $data->update(['pc_typestatus' => 'active']);
        }
       
        
        session()->flash('status', 'New Category Added');
        redirect()->to('editor/channel/podcast/'.$this->podcast_uniquelink);  


    }
    public function removeCategory($category_id){
       
     
        PodcastCategories::where([
            'pc_categoryid'=>$category_id,
            'pc_podcastid'=>$this->podcast->id]
        )->update(['pc_typestatus' => 'remove']);
     
        session()->flash('status', 'Category Remove');
        redirect()->to('editor/channel/podcast/'.$this->podcast_uniquelink);  


    }


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
