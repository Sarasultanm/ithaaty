<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\{
    UserChannel,
    UserGallery,
    UserChannelSub,
    Category,
    Audio,
    User,
    UserMail,
    UserCollaborator,
};
use Auth;
use Mail;
use App\Mail\ChannelInvitation;

use Illuminate\Support\Str; 
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;




use Livewire\WithFileUploads;


class EditorChannel extends Component
{

    use WithFileUploads;


    public $channel_photo,$channel_cover,$channel_name;
    public $search = "",$result,$emailInvitation;


    public function createChannel(){

        $this->validate([
            'channel_photo' => 'required|image|max:1024',
            'channel_name' => 'required',
        ]);

        $checkChannelPhoto = UserGallery::where(['gallery_userid'=>Auth::user()->id,'gallery_type'=>'channel_photo','gallery_typestatus'=>'active']);

        if($checkChannelPhoto->count() == 0){

            $data = New UserGallery;
            $data->gallery_userid = Auth::user()->id;
            $data->gallery_type = "channel_photo";
            $data->gallery_typestatus = "active";
            $data->gallery_path = $this->channel_photo->hashName();
            $data->gallery_status = "active";
            $data->save();

        }else{

            UserGallery::where('id',$checkChannelPhoto->first()->id)
            ->update([
                'gallery_typestatus'=> 'draft',
            ]);

            $data = New UserGallery;
            $data->gallery_userid = Auth::user()->id;
            $data->gallery_type = "channel_photo";
            $data->gallery_typestatus = "active";
            $data->gallery_path = $this->channel_photo->hashName();
            $data->gallery_status = "active";
            $data->save();

        }

        $randomStr = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz"), 0, 24);

        $channel = new UserChannel;
        $channel->channel_ownerid = Auth::user()->id;
        $channel->channel_name = $this->channel_name;
        $channel->channel_type = "channel";
        $channel->channel_typestatus = "active";
        $channel->channel_gallery_id = $data->id;
        $channel->channel_gallery_cover_id = $data->id;
        $channel->channel_description = "empty";
        $channel->channel_uniquelink = $randomStr;
        $channel->save();


        $imagefile = $this->channel_photo->hashName();
        // local
        $local_storage = $this->channel_photo->storeAs('users/channe_img',$imagefile);
        // s3
        $s3_storage = $this->channel_photo->store('users/channe_img/', 's3');

        

        session()->flash('status', 'Channel Created');
        redirect()->to('/editor/channel');


    }

    public function createSubChannel(){

        $this->validate([
            'channel_photo' => 'required|image|max:1024',
            'channel_name' => 'required',
        ]);


        $data = New UserGallery;
        $data->gallery_userid = Auth::user()->id;
        $data->gallery_type = "sub_channel_photo";
        $data->gallery_typestatus = "active";
        $data->gallery_path = $this->channel_photo->hashName();
        $data->gallery_status = "active";
        $data->save();

        $randomStr = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz"), 0, 24);

        $channel = new UserChannel;
        $channel->channel_ownerid = Auth::user()->id;
        $channel->channel_name = $this->channel_name;
        $channel->channel_type = "sub_channel";
        $channel->channel_typestatus = "active";
        $channel->channel_gallery_id = $data->id;
        $channel->channel_gallery_cover_id = $data->id;
        $channel->channel_description = "empty";
        $channel->channel_uniquelink = $randomStr;
        $channel->save();


        $imagefile = $this->channel_photo->hashName();
        // local
        $local_storage = $this->channel_photo->storeAs('users/channe_img',$imagefile);
        // s3
        $s3_storage = $this->channel_photo->store('users/channe_img/', 's3');

        

        session()->flash('status', 'Channel Created');
        redirect()->to('/editor/channel');


    }


    public function updateAbout($channel_id){
        
         $channel = UserChannel::where("id",$channel_id);

          if(Auth::user()->id == $channel->first()->channel_ownerid){

             $channel->update([
                'channel_description'=> $this->channel_about
             ]);

            session()->flash('status', 'Update Success');
            redirect()->to('/editor/channel');

          }

    }


    public function createChannelLink($channel_id){

         $channel = UserChannel::where("id",$channel_id);

          if(Auth::user()->id == $channel->first()->channel_ownerid){

             $channel->update([
                'channel_uniquelink'=> $this->channel_uniquelink
             ]);

            session()->flash('status', 'Update Link Success');
            redirect()->to('/editor/channel');

          }
    }

    public function saveCover($channel_id){

        $this->validate([
            'channel_cover' => 'required|image|max:5024',
        ]);


        $channel = UserChannel::where("id",$channel_id);


        if(Auth::user()->id == $channel->first()->channel_ownerid){


            $checkPhoto = UserGallery::where(['gallery_userid'=>Auth::user()->id,'gallery_type'=>'channel_cover','gallery_typestatus'=>'active']);

            if($checkPhoto->count() == 0){

                $data = New UserGallery;
                $data->gallery_userid = Auth::user()->id;
                $data->gallery_type = "channel_cover";
                $data->gallery_typestatus = "active";
                $data->gallery_path = $this->channel_cover->hashName();
                $data->gallery_status = "active";
                $data->save();

            }else{

                UserGallery::where('id',$checkPhoto->first()->id)
                ->update([
                    'gallery_typestatus'=> 'draft',
                ]);

                $data = New UserGallery;
                $data->gallery_userid = Auth::user()->id;
                $data->gallery_type = "channel_cover";
                $data->gallery_typestatus = "active";
                $data->gallery_path = $this->channel_cover->hashName();
                $data->gallery_status = "active";
                $data->save();

            }

            $channel->update([
                'channel_gallery_cover_id'=> $data->id
            ]);


            $imagefile = $this->channel_cover->hashName();
            // local
            $local_storage = $this->channel_cover->storeAs('users/channel_cover',$imagefile);
            // s3
            $s3_storage = $this->channel_cover->store('users/channel_cover/', 's3');


        }



        session()->flash('status', 'Update Cover Photo');
        redirect()->to('/editor/channel');
        


    }

    public function saveLogo($channel_id){

        $this->validate([
            'channel_photo' => 'required|image|max:5024',
        ]);


        $channel = UserChannel::where("id",$channel_id);


        if(Auth::user()->id == $channel->first()->channel_ownerid){


            $checkPhoto = UserGallery::where(['gallery_userid'=>Auth::user()->id,'gallery_type'=>'channel_photo','gallery_typestatus'=>'active']);

            if($checkPhoto->count() == 0){

                $data = New UserGallery;
                $data->gallery_userid = Auth::user()->id;
                $data->gallery_type = "channel_photo";
                $data->gallery_typestatus = "active";
                $data->gallery_path = $this->channel_photo->hashName();
                $data->gallery_status = "active";
                $data->save();

            }else{

                UserGallery::where('id',$checkPhoto->first()->id)
                ->update([
                    'gallery_typestatus'=> 'draft',
                ]);

                $data = New UserGallery;
                $data->gallery_userid = Auth::user()->id;
                $data->gallery_type = "channel_photo";
                $data->gallery_typestatus = "active";
                $data->gallery_path = $this->channel_photo->hashName();
                $data->gallery_status = "active";
                $data->save();

            }

            $channel->update([
                'channel_gallery_id'=> $data->id
            ]);


            $imagefile = $this->channel_photo->hashName();
            // local
            $local_storage = $this->channel_photo->storeAs('users/channe_img',$imagefile);
            // s3
            $s3_storage = $this->channel_photo->store('users/channe_img/', 's3');


        }


        session()->flash('status', 'Update Logo');
        redirect()->to('/editor/channel');


    }


     public function subChannel($id){

        $data = new UserChannelSub;
        $data->sub_channelid = $id;
        $data->sub_userid = Auth::user()->id;
        $data->sub_type  = "channel";
        $data->save();

        session()->flash('status', 'Subscribe Complete');
        redirect()->to('/editor/channel');

    }


    public function get_search(){

        return $this->result = User::search($this->search)->get();

    }


    public function sendInvitation($channel_id){

        $this->validate([
            'emailInvitation' => 'required|string|email|max:50',
        ]);

        $channel = UserChannel::where('id',$channel_id)->first();

        $user = User::findOrFail($channel->channel_ownerid);
        $photo_link = $channel->get_channel_photo->gallery_path;
        $channel_photo = config('app.s3_public_link')."/users/channe_img/".$photo_link;
        $subcribers =  $channel->get_subs()->count();

        //asia time zone
        $expiredDate = Carbon::now()->addHour()->timezone('Asia/Hong_Kong');

        // UserMail::create([
        //     'mail_sender_id'=>$user->first()->id,
        //     'mail_link_id'=> Str::random(30),
        //     'mail_type'=>'channel_invitation',
        //     'mail_typestatus'=>'active',
        //     'mail_expired'=> $expiredDate
        // ]);

        // UserCollaborator::create([
        //     'usercol_userid'=>$user->first()->id,
        //     'usercol_channel_id'=> $channel->first()->id,
        //     'usercol_email'=> $this->emailInvitation,
        //     'usercol_type'=> 'channel_invitation',
        //     'usercol_typestatus'=> 'active'
        // ]);


        $this->sendEmail($user,$this->emailInvitation,$channel->channel_name,$channel_photo,$subcribers);


       session()->flash('status', 'Email Invitation Send'.$expiredDate);
       redirect()->to('/editor/channel');

    }

     public function sendEmail($user,$email,$channel_name,$channel_photo,$subcribers){
        Mail::to($email)->send(new ChannelInvitation($user,$channel_name,$channel_photo,$subcribers));
    }




    public function mount(){
        $this->checkChannel = Auth::user()->get_channels()->count();

        if($this->checkChannel != 0){
             $this->channel_list = Auth::user()->get_channels()->first();
             $this->channel_about = $this->channel_list->channel_description;
             $this->channel_uniquelink = $this->channel_list->channel_uniquelink;
             $this->channel_episodes = $this->channel_list->get_episode()->get();
             $this->sub_channel_list = Auth::user()->channels()->get();


        }else{
            $this->channel_about = ""; 
        }
       
        // if($this->channel_list->channel_description){
        //     $this->channel_about = $this->channel_list->channel_description;
        // }else{
        //    $this->channel_about = ""; 
        // }
        $this->allchannels = UserChannel::orderBy('id')->get();
       

    }


    public function render()
    {
        $episodes = Audio::orderBy('id','DESC')->where('audio_editor',Auth::user()->id);
        $categoryList = Category::orderBy('id', 'DESC')->where('category_status','active');
        return view('livewire.editor.editor-channel',compact('categoryList','episodes'));
    }
}
