<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\User;
use App\Models\Audio;
use App\Models\Category;
use App\Models\UserFollow;
use App\Models\UserGallery;
use Auth;
use Illuminate\Support\Facades\Hash;
use FeedReader;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditorSettings extends Component
{

     use WithFileUploads;

	 public $categoryTitle,$userName,$oldPass,$newPass,$rss_title,$rss_link,$rss_data,$item_title,$displayArr,$profilePhoto,$checkProfilePhoto,$userAlias;

     public $listMedia;
     public $arr_category = array();
     public $arr_checkbox = array();


    public function savePhoto()
    {
        $this->validate([
            'profilePhoto' => 'image|max:1024',
        ]);

        $checkProfile = UserGallery::where(['gallery_userid'=>Auth::user()->id,'gallery_type'=>'profile','gallery_typestatus'=>'active']);

        if($checkProfile->count() == 0){

            $data = New UserGallery;
            $data->gallery_userid = Auth::user()->id;
            $data->gallery_type = "profile";
            $data->gallery_typestatus = "active";
            $data->gallery_path = $this->profilePhoto->hashName();
            $data->gallery_status = "active";
            $data->save();

        }else{  

            UserGallery::where('id',$checkProfile->first()->id)
            ->update([
                'gallery_typestatus'=> 'draft',
            ]);

            $data = New UserGallery;
            $data->gallery_userid = Auth::user()->id;
            $data->gallery_type = "profile";
            $data->gallery_typestatus = "active";
            $data->gallery_path = $this->profilePhoto->hashName();
            $data->gallery_status = "active";
            $data->save();

        }

       
        
        $imagefile = $this->profilePhoto->hashName();
        // local
        $local_storage = $this->profilePhoto->storeAs('users/profile_img',$imagefile);
        // s3
        $s3_storage = $this->profilePhoto->store('users/profile_img/', 's3');

        

        session()->flash('status', 'Profile Picture Updated');
        redirect()->to('/editor/settings');

    }

	 public function addCategory(){

	    // $this->validate();	

        $data = new Category;
        $data->category_name =  $this->categoryTitle;
        $data->category_status = "active";
        $data->category_owner = Auth::user()->id;
        $data->save();

        // $audiofile = $this->audiofile->hashName();
        // $path = $this->audiofile->storeAs('audio',$audiofile);

        session()->flash('status', 'Post Success');

        redirect()->to('/editor/settings');


	}

    public function updateName(){

        Auth::user()->update(['alias'=>$this->userAlias]);    

        session()->flash('status', 'Update Success');
        redirect()->to('/editor/settings');



    }

    public function updatePass(){

        $users = Auth::user();
        $getPass = $users->password;
        $oPass = $this->oldPass;
        $nPass = $this->newPass; 

        if(Hash::check($oPass,$getPass)){

            $users->update(['password'=> Hash::make($nPass)]);

            session()->flash('status', 'Password has successfully change');  

        }else{
           session()->flash('status', 'Password Mismatch');     
        }

        redirect()->to('/editor/settings');

    }



    public function loadRss(){

        $data = FeedReader::read($this->rss_link);
        // $items_feed = $data;
        // $xml = simplexml_load_file("https://www.w3schools.com/php/note.xml");
        $result = [
            'title' => $data->get_title(),
            'description' => $data->get_description(),
            'link' => $data->get_link(),
            'author' => $data->get_author()->get_name(),
            'image_url' => $data->get_image_url(),
            'item_quantity' =>$data->get_item_quantity(),
            // 'native_xml'=> var_dump($xml)
        ];

     


            foreach ($data->get_items(0,$data->get_item_quantity()) as $item) {
                $i['title'] = $item->get_title();
                $i['description'] = str_replace( ['<p>','</p>'], '',$item->get_description());
                $i['link'] = $item->get_link();
                $i['embed'] = str_replace( 'episodes/', 'embed/episodes/', $item->get_link() );
                $i['content'] = $item->get_content();
                $i['links'] = $item->get_link();
                $i['id'] = $item->get_id();
                $i['category'] = $item->get_category();
                // $i['season'] = $item->get_item_tags('itunes','season');
                // $i['audio_link'] = $item->get_enclosures()->get_link();
            // return $data[0]['data'];
                // $i['source'] = $xml->season;
                // $i['season_daw'] =  $i['season']["data"];


                foreach ($item->get_enclosures() as $enclosure)
                {
                    // echo $enclosure->embed();
                    //$i['enclosure_link'] = $enclosure->get_link();
                     $i['enclosure_link'] = $enclosure->get_link();;
                }


                // $i['tags'] = $item->get_item_tags('','itunes:season');
                // $i['episode'] = $item->get_episode();
                // $media_group = $item->get_item_tags('http://search.yahoo.com/mrss/', 'group');
                // $media_content = $media_group[0]['child']['http://search.yahoo.com/mrss/']['content'];
                // $i['tags_group'] = $item->get_item_tags('','itunes:season');
                // $i['season'] = $i['tags_group'][0]["itunes:season"];

                // $i['season'] = $item->get_item_tags('itunes:season','itunes:season')[0]["itunes:season"];


                $data = new Audio;
                $data->audio_editor = Auth::user()->id;
                $data->audio_name = $item->get_title();
                $data->audio_season = "1";
                $data->audio_episode = "1";
                $data->audio_category = "1";
                $data->audio_tags = "none";
                $data->audio_status = "public";
                $data->audio_summary = str_replace( ['<p>','</p>'], '',$item->get_description());
                $data->audio_path = $i['enclosure_link'];
                $data->audio_type = "RSS";
                $data->audio_hashtags = "";
                $data->save();



                $result['items'][] = $i;



            }


        // $this->item_title = $result1;   
        $this->rss_data =  $result;  
        // $this->native_xml = $xml;
    }



    public function mount(){

        $this->userAlias = Auth::user()->alias;
        // $this->checkProfilePhoto = Auth::user()->get_gallery('profile','active');

    }   

    public function saveArray(){

        $this->displayArr = $this->arr_checkbox;
        // $this->listMedia = count($this->arr_checkbox);
        // foreach ($this->arr_checkbox as $value) {
          
        //     if($value == true){
        //         $this->displayArr = $value;
        //     }


        // }





    }


    public function render()
    {

    	// $categoryList = Category::where('category_owner',Auth::user()->id);
        $categoryList = Category::orderBy('id', 'DESC')->where('category_status','active');

        return view('livewire.editor.editor-settings',compact('categoryList'));
    }
}
