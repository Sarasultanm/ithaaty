<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\User;
use App\Models\Audio;
use App\Models\Category;
use App\Models\UserFollow;
use App\Models\UserFav;
use Auth;
use FeedReader;

class EditorPodcast extends Component
{


	public $ea_id,$ea_name,$ea_season,$ea_episode,$ea_category,$ea_summary,$ea_path,$ea_type,$uploadType,$category;

    public $rss_link;

	  protected $rules = [
        'ea_name' => 'required',
        'ea_season' => 'required',
        'ea_episode' => 'required',
        'ea_category' => 'required',
        'ea_summary' => 'required',
        'audio' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
	    ];


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
            	'audio_category'=> $this->ea_category,
            	'audio_summary'=> $this->ea_summary,
            	'audio_path'=> $this->ea_path,
            	'audio_type'=> $this->uploadType
            ]);
    
     session()->flash('status', 'Post Updated.');

	 redirect()->to('editor/podcast');     

    }

    public function getPostByCat($cat_id){

        $data = Audio::where(['audio_editor'=>Auth::user()->id,'audio_category'=>$cat_id]);

        return $data;

    }

    // public function mount($id)
    // { 

    //     $this->getPostByCat = $this->getPostByCat($id);
    // }    



    public function render()
    {	
    	$categoryList = Category::orderBy('id', 'DESC')->where('category_status','active');
    	$audioList = Audio::where('audio_editor',Auth::user()->id)->orderBy('id', 'DESC');
    	$topPodcast = Audio::orderBy('id', 'DESC')->where('audio_editor',Auth::user()->id)->take(3)->get();
    	$following = UserFollow::where('follow_userid',Auth::user()->id);
    	$favorite = UserFav::where('favs_userid',Auth::user()->id);
        return view('livewire.editor.editor-podcast',compact('audioList','categoryList','topPodcast','following','favorite'));
    }
}
