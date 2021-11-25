<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\Audio;
use App\Models\User;
use App\Models\Category;
use App\Models\AudioReferences;
use App\Models\AudioSponsor;
use App\Models\AudioAffiliate;
use App\Models\UserQa;
use Auth;

use Livewire\WithFileUploads;

class EditorUpdatePost extends Component
{
    use WithFileUploads;


	public $audio,$a_id,$title,$season,$episode,$category,$summary,$embedlink,$hashtags,$ref_title,$ref_link,$checkAudio,$status;
    public $spon_name,$spon_website,$spon_location,$spon_linkloc,$spon_image,$afi_link,$afi_title,$qa_question;
	protected $listeners = [
        'refreshParent' =>'$refresh'
        ];

    protected $rules = [
        'title' => 'required',
        'season' => 'required',
        'episode' => 'required',
        'status' => 'required',
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
            $this->status = $data->audio_status;

        }else{
        	$this->checkAudio = "false";
        }

       



    }


    public function updateInfo(){

    	$data = Audio::findOrFail($this->a_id);

    	if(Auth::user()->id == $data->audio_editor){

    	Audio::where('id',$this->a_id)
            ->update([
            	'audio_name'=> $this->title,
            	'audio_season'=> $this->season,
            	'audio_episode'=> $this->episode,
            	'audio_category'=> $this->category,
            	'audio_summary'=> $this->summary,
                'audio_status'=> $this->status,
            ]);
    
	     session()->flash('status', 'Podcast Info Updated.');

		 redirect()->to('editor/podcast/update/'.$this->a_id);   

		}else{
		  redirect()->to('editor/dashboard');   	
		} 


    }

    public function updateEmbed(){

        $data = Audio::findOrFail($this->a_id);

        if(Auth::user()->id == $data->audio_editor){

         Audio::where('id',$this->a_id)
            ->update([
                'audio_path'=> $this->embedlink,
                'audio_hashtags'=> $this->hashtags,
            ]);
    
         session()->flash('status', 'Podcast Embed Updated.');

         redirect()->to('editor/podcast/update/'.$this->a_id);   

        }else{
          redirect()->to('editor/dashboard');       
        } 


    }

    public function addSponsor(){

        $data = Audio::findOrFail($this->a_id);

        if(Auth::user()->id == $data->audio_editor){

            if($this->spon_image){ 

                $spon = new AudioSponsor;
                $spon->audiospon_userid = Auth::user()->id;
                $spon->audiospon_audioid = $this->a_id;
                $spon->audiospon_name = $this->spon_name;
                $spon->audiospon_website = $this->spon_website;
                $spon->audiospon_location = $this->spon_location;
                $spon->audiospon_linktolocation = $this->spon_linkloc;
                $spon->audiospon_imgpath = $this->spon_image->hashName();
                $spon->audiospon_appearancetype = "empty";
                $spon->audiospon_min1 = "empty";
                $spon->audiospon_min2 = "empty";
                $spon->audiospon_status = "empty";
                $spon->save();  

                $imagefile = $this->spon_image->hashName();
                $path = $this->spon_image->storeAs('sponsor',$imagefile);

                session()->flash('status', 'Added new Sponsor');

                redirect()->to('editor/podcast/update/'.$this->a_id); 

            }else{

                session()->flash('status', 'Sponsor Image not loaded');

                redirect()->to('editor/podcast/update/'.$this->a_id); 

            }

        }else{
          redirect()->to('editor/dashboard');       
        } 


    }


   public function clearRefFields(){
       $this->ref_title = null;
       $this->ref_link = null;
   }
  public function clearAfiFields(){
       $this->afi_title = null;
       $this->afi_link = null;
   }
   public function clearQaFields(){
       $this->qa_question = null;
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

    public function addAffiliate($audioid){
        
        $data = new AudioAffiliate;
        $data->audioafi_userid = Auth::user()->id;
        $data->audioafi_audioid = $audioid;
        $data->audioafi_title = $this->afi_title;
        $data->audioafi_link = $this->afi_link;
        $data->audioafi_status = "active";
        $data->save();

        session()->flash('status', 'New Affiliate Added');

        $this->clearAfiFields();
        
        $this->emit('refreshParent');

        // redirect()->to('editor/podcast/update/'.$this->a_id);  

    }

    public function addQuestion($audioid){
        
        $data = new UserQa;
        $data->qa_audioid = $audioid;
        $data->qa_question = $this->qa_question;
        $data->qa_status = "active";
        $data->save();

        session()->flash('status', 'New Question Added');

        $this->clearQaFields();
        
        $this->emit('refreshParent');

        // redirect()->to('editor/podcast/update/'.$this->a_id);  

    }




    public function render()
    {


    	$categoryList = Category::orderBy('id', 'DESC')->where('category_status','active');
        return view('livewire.editor.editor-update-post',compact('categoryList'));
    }
}
