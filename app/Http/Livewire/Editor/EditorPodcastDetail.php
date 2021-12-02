<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\Audio;
use App\Models\User;
use App\Models\UserViews;
use App\Models\Category;
use App\Models\UserComments;
use Auth;


class EditorPodcastDetail extends Component
{
	public $audio;
    public $jan_views,$feb_views,$mar_views,$apr_views,$may_views,$jun_views,$jul_views,$aug_views,$sep_views,$oct_views,$nov_views,$dec_views;
    public $wordCount,$getEp;


	public function mount($id)
    {
        $this->audio = Audio::where('id',$id)->first();
        $this->jan_views = UserViews::where('view_audioid',$id)->whereMonth('created_at', date('01'))->whereYear('created_at', date('Y'))->count();
        $this->feb_views = UserViews::where('view_audioid',$id)->whereMonth('created_at', date('02'))->whereYear('created_at', date('Y'))->count();
        $this->mar_views = UserViews::where('view_audioid',$id)->whereMonth('created_at', date('03'))->whereYear('created_at', date('Y'))->count();
        $this->apr_views = UserViews::where('view_audioid',$id)->whereMonth('created_at', date('04'))->whereYear('created_at', date('Y'))->count();
        $this->may_views = UserViews::where('view_audioid',$id)->whereMonth('created_at', date('05'))->whereYear('created_at', date('Y'))->count();
        $this->jun_views = UserViews::where('view_audioid',$id)->whereMonth('created_at', date('06'))->whereYear('created_at', date('Y'))->count(); 
        $this->jul_views = UserViews::where('view_audioid',$id)->whereMonth('created_at', date('07'))->whereYear('created_at', date('Y'))->count();
        $this->aug_views = UserViews::where('view_audioid',$id)->whereMonth('created_at', date('08'))->whereYear('created_at', date('Y'))->count();
        $this->sep_views = UserViews::where('view_audioid',$id)->whereMonth('created_at', date('09'))->whereYear('created_at', date('Y'))->count();
        $this->oct_views = UserViews::where('view_audioid',$id)->whereMonth('created_at', date('10'))->whereYear('created_at', date('Y'))->count();
        $this->nov_views = UserViews::where('view_audioid',$id)->whereMonth('created_at', date('11'))->whereYear('created_at', date('Y'))->count();
        $this->dec_views = UserViews::where('view_audioid',$id)->whereMonth('created_at', date('12'))->whereYear('created_at', date('Y'))->count();
        $this->wordCount = $this->wordCounter($id);

    }
    public function getEpisodes($audio_category){
        $data = Audio::where(['audio_editor'=>Auth::user()->id,'audio_category'=>$audio_category])->orderBy('id', 'DESC');
        return $data;
    }

    public function wordCounter($id){

        $audio_coms = UserComments::where('coms_audioid',$id);

        if($audio_coms->count() != 0) {

            foreach ($audio_coms->get() as $comments) {
          
                 $getComs[] = $comments->coms_message;
            }

            $mergeComs = implode(' ', $getComs); 
            $arryComs = explode(' ', $mergeComs);
            $marks = $this->wordFilter();

            for ($i=0; $i < str_word_count($mergeComs) ; $i++){

                if(!in_array($arryComs[$i],$marks)){
                    $wordArray[] = $arryComs[$i]."(".substr_count($mergeComs, $arryComs[$i]).")";
               }


            }

             return $wordArray;
        }else{
             return $wordArray = 0;
        }

    }

    public function wordFilter(){

        return array('is','a','are','hi','Hi',' ');

    }


    public function render()
    {
        $audioList = Audio::orderBy('id', 'DESC')->where('audio_editor',Auth::user()->id);
    	$getHashtags = Audio::where('audio_hashtags', 'like', '%music%')->count();
        return view('livewire.editor.editor-podcast-detail',compact('getHashtags','audioList'));
    }
}
