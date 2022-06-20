<?php

namespace App\Http\Livewire\Editor;

use Auth;
use FeedReader;
use Livewire\Component;
use App\Models\{
    User,
    Audio,
    Category,
    UserFollow,
    UserGallery,
    UserRssLink,
    UserCustomization,
    UserSocialLinks,
    UserInterest,
    Interest,
    UserCollaborator,
    UserChannel,
    UserMail,
    UserNotifications
};

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Livewire\WithFileUploads;

use App\Events\UserChangePasswordEvents;
use App\Events\UserCreateCollaboratorEvents;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class EditorSettings extends Component
{

     use WithFileUploads;

	 public $categoryTitle,$userName,$userAbout,$userCountry,$oldPass,$newPass,$rss_title,$rss_link,$rss_data,$item_title,$displayArr,$profilePhoto,$checkProfilePhoto,$userAlias,$rss_name,$header_bg,$page_bg;

     public $listMedia;
     public $arr_category = array();
     public $arr_checkbox = array();
     public $colors = array();
     public $userFacebook,$userTwitter,$userInstagram;
     public $colab_username,$email,$colab_password,$colab_channel;

    
	public $searchbar;


    public function getSearch(){

        redirect()->to('editor/s/'.$this->searchbar); 

    }


    public function addUsers(){
        $this->validate([
            'colab_username' => 'required|string|max:50',
            'email' => 'required|string|email|max:50|unique:users',
            'colab_password' => 'required',
        ]);

        $channel = UserChannel::where('id', $this->colab_channel)->first();

        $photo_link = $channel->get_channel_photo->gallery_path;
        $channel_photo = config('app.s3_public_link') . "/users/channe_img/" . $photo_link;
        $subcribers = $channel->get_subs()->count();

        //asia time zone
        $expiredDate = Carbon::now()
            ->addHour()
            ->timezone('Asia/Hong_Kong');

        $mail_link = Str::random(30);
        $verified_link =  Str::random(25);

        $user = User::create([
            'name' => $this->colab_username,
            'email' => $this->email,
            'password' => Hash::make($this->colab_password),
            'roles' => 'collaborators',
            'gender' => ' ',
            'birthday' => ' ',
            'country' => ' ',
            'age' => ' ',
            'plan' => ' ',
            'alias' => ' ',
            'about' => ' ',
            'verified_user' => '1',
            'verified_link' => $verified_link
        ]);

        $createMail = UserMail::create([
            'mail_sender_id'=>$user->first()->id,
            'mail_link_id'=> $mail_link,
            'mail_type'=>'channel_collaborators',
            'mail_typestatus'=>'Pending',
            'mail_expired'=> $expiredDate,
            'mail_receiver_email' => $this->email,
        ]);
      
        $createCollab = UserCollaborator::create([
            'usercol_ownerid'=>Auth::user()->id,
            'usercol_userid'=>$user->id,
            'usercol_channel_id'=> $channel->id,
            'usercol_email'=> $this->email,
            'usercol_type'=> 'channel_collaborators',
            'usercol_typestatus'=> 'Pending',
            'usercol_status_mail_id' => $createMail->id
        ]);

        $notif = new UserNotifications;
        $notif->notif_userid = Auth::user()->id;
        $notif->notif_type = "channel_collaborators";
        $notif->notif_type_id = $createCollab->id;
        $notif->notif_message = "You inviting ".$this->email. " to your private channel as Collaborators.";
        $notif->status = "active";
        $notif->save();

        // UserCollaborator::create([
        //     'usercol_ownerid'=>Auth::user()->id,
        //     'usercol_userid'=>$user->id,
        //     'usercol_channel_id'=> $this->colab_channel,
        //     'usercol_email'=> 0,
        //     'usercol_type'=> 'Channel Editor',
        //     'usercol_typestatus'=> 'active'
        // ]);


        event(new UserCreateCollaboratorEvents(
            $user, 
            Auth::user()->email, 
            $channel->channel_name, 
            $channel_photo, 
            $subcribers,
            $mail_link,
            $this->colab_password)
        );
       


        session()->flash('status', 'Add new Users');
        redirect()->to('/editor/settings');

    }

    public function updateSocialLink($social_type){


        $link = (($social_type == 'Facebook') 
                    ? $this->userFacebook 
                    : (($social_type == 'Twitter') 
                      ? $this->userTwitter
                      : $this->userInstagram
                ));

       
        $checkLink = UserSocialLinks::where(['social_ownerid'=>Auth::user()->id,'social_type'=>$social_type,'social_typestatus'=>'active']);

        if($checkLink->count() == 0){

            $data = New UserSocialLinks;
            $data->social_ownerid = Auth::user()->id;
            $data->social_type = $social_type;
            $data->social_typestatus = "active";
            $data->social_link = $link;
            $data->social_status = "active";
            $data->save();

        }else{  

            UserSocialLinks::where('id',$checkLink->first()->id)
            ->update([
                'social_typestatus'=> 'draft',
            ]);

            $data = New UserSocialLinks;
            $data->social_ownerid = Auth::user()->id;
            $data->social_type = $social_type;
            $data->social_typestatus = "active";
            $data->social_link = $link;
            $data->social_status = "active";
            $data->save();

        }

        session()->flash('status', 'Updated Link Complete');
        redirect()->to('/editor/settings');
        
    }


    public function savePhoto()
    {
        $this->validate([
            'profilePhoto' => 'image|max:1024',
        ]);

        $checkProfile =  Auth::user()->get_gallery('profile','active');
  
        if($checkProfile->count() == 0){

            $data = Controller::createImage('profile',$this->profilePhoto);

        }else{  

            UserGallery::where('id',$checkProfile->first()->id)
            ->update([
                'gallery_typestatus'=> 'draft',
            ]);

            $data = Controller::createImage('profile',$this->profilePhoto);

        }

       Controller::storeImage($this->profilePhoto,'users/profile_img/');

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

   

    public function updatePass(){

        $users = Auth::user();
        $getPass = $users->password;
        $oPass = $this->oldPass;
        $nPass = $this->newPass; 

        if(Hash::check($oPass,$getPass)){

            event(new UserChangePasswordEvents($users->email,$nPass));

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
            // 'author' => $data->get_author()->get_name(),
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
                $data->audio_category = "none";
                $data->audio_tags = "none";
                $data->audio_status = "public";
                $data->audio_summary = str_replace( ['<p>','</p>'], '',$item->get_description());
                $data->audio_path = $i['enclosure_link'];
                $data->audio_type = "RSS";
                $data->audio_hashtags = "";
                $data->audio_publish = "Draft";
                $data->save();



                $result['items'][] = $i;



            }


        // $this->item_title = $result1;   
        $this->rss_data =  $result;  
        // $this->native_xml = $xml;
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

    // public function updateAlias(){

    //     Auth::user()->update(['alias'=>$this->userAlias]);    

    //     session()->flash('status', 'Update Success');
    //     redirect()->to('/editor/settings');
    // }

    // public function updateName(){
    //     Auth::user()->update(['name'=>$this->userName]);  
    // }

    // public function updateAbout(){
    //     Auth::user()->update(['about'=>$this->userAbout]);

    //     session()->flash('status', 'About Us Updated');
    //     redirect()->to('/editor/settings');   
    // }

    //  public function updateCountry(){
    //     Auth::user()->update(['country'=>$this->userCountry]);

    //     session()->flash('status', 'Country Updated');
    //     redirect()->to('/editor/settings');   
    // }

    public function updateProfile(){
        Auth::user()->update([
            'name'=>$this->userName,
            'about'=>$this->userAbout,
            'country'=>$this->userCountry,
            'alias'=>$this->userAlias
        ]);

        session()->flash('status', 'About Us Updated');
        redirect()->to('/editor/settings');
    }


    public function createRssLink(){
        $this->validate([
            'rss_name'=>'required'
        ]);

        $data = UserRssLink::where('rss_links',$this->rss_name);

        if($data->count() == 0){
            $rss = new UserRssLink;
            $rss->rss_ownerid = Auth::user()->id;
            $rss->rss_links = $this->rss_name;
            $rss->rss_type = "links";
            $rss->save();
            session()->flash('status', 'RSS Link created');
            redirect()->to('/editor/settings');     
        }else{
            session()->flash('status', 'RSS link already exists');
            redirect()->to('/editor/settings');   
        }
    }

    public function updateBackground($parts){

        $type  = ($parts == 'header') ? "csm_headerbg" : "csm_pagebg";
        $value = ($parts == 'header') ? $this->header_bg : $this->page_bg;
        $checkColors = UserCustomization::where(['csm_ownerid'=>Auth::user()->id,'csm_type'=>$type,'csm_typestatus'=>'active']);


        if($checkColors->count() == 0){
                $data = new UserCustomization;
                $data->csm_ownerid = Auth::user()->id;
                $data->csm_type = $type;
                $data->csm_typestatus = "active";
                $data->csm_value = $value;
                $data->save();
        }else{

            UserCustomization::where('id',$checkColors->first()->id)
            ->update([
                'csm_typestatus'=> 'draft',
            ]);

            $data = new UserCustomization;
            $data->csm_ownerid = Auth::user()->id;
            $data->csm_type = $type;
            $data->csm_typestatus = "active";
            $data->csm_value = $value;
            $data->save();
        }

        session()->flash('status', 'Background Updated');
        redirect()->to('/editor/settings');  
    }

    public function putColor($type,$color){
       if($type == 'header'){
        $this->header_bg = $color;
       }else{
        $this->page_bg = $color;
       } 
       
    }

    public function checkColor($type){
        if(Auth::user()->get_csm($type,'active')->count() != 0){
            $data = Auth::user()->get_csm($type,'active')->first()->csm_value;
        }else{
            $data = "#f98b88";
        }
        return $data;
    }

    public function checkSocialLink($type){
        if(Auth::user()->get_socialLink($type,"active")->count() != 0){
            $data = Auth::user()->get_socialLink($type,"active")->first()->social_link;
        }else{
            $data = "";
        }
        return $data;
    }

    public function mount(){

        $this->userAlias = Auth::user()->alias;
        $this->userName = Auth::user()->name;
        $this->userAbout = Auth::user()->about;
        $this->header_bg = $this->checkColor('csm_headerbg');
        $this->page_bg = $this->checkColor('csm_pagebg');
        $this->userCountry = Auth::user()->country;
        $this->userFacebook = $this->checkSocialLink('Facebook');
        $this->userInstagram = $this->checkSocialLink('Instagram');
        $this->userTwitter = $this->checkSocialLink('Twitter');

        $this->colors = ['#f98b88','#2196F3', '#009688','#f7fafc','#9C27B0', '#FFEB3B', '#afbbc9', '#4CAF50', '#2d3748', '#f56565', '#ed64a6','#009688','#5f7c84','#d3e579'];
        // $this->checkProfilePhoto = Auth::user()->get_gallery('profile','active');

    }   

    public function updateInterest($interest_id){

        $data = UserInterest::where(['interest_ownerid'=>Auth::user()->id,'interest_id'=>$interest_id]);

        $data->update(['interest_typestatus' => 'uncheck']);

        session()->flash('status', 'Updated Interest');
        redirect()->to('/editor/settings');  

    }

    
    public function addInterest($interest_id){


            UserInterest::create([
                'interest_ownerid'=>Auth::user()->id,
                'interest_id'=>$interest_id,
                'interest_type'=>"interest",
                'interest_typestatus' => "check"
            ]);

            session()->flash('status', 'Add new  Interest');
            redirect()->to('/editor/settings');  
  
    }





    public function render()
    {

    	// $categoryList = Category::where('category_owner',Auth::user()->id);
        $categoryList = Category::orderBy('id', 'DESC')->where('category_status','active');
        $interest_list = Interest::where('status','active')->get();
        return view('livewire.editor.editor-settings',compact('categoryList','interest_list'));
    }
}
