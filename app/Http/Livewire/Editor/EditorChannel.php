<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\{UserChannel, UserGallery, UserChannelSub, Category, Audio, User, UserMail, UserViews, UserCollaborator, UserPodcasts, UserNotifications};
use Auth;
use Mail;
use App\Mail\ChannelInvitation;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Livewire\WithFileUploads;

use App\Http\Controllers\Controller;

use App\Events\PodcastInvitationProcessed;
use App\Events\ChannelPrivateInviation;


class EditorChannel extends Component
{
    use WithFileUploads;

    public $channel_photo, $channel_cover, $channel_name, $podcast_photo, $podcast_name;
    public $search = "",
        $result,
        $emailInvitation,
        $emailCollabInvitation;

    protected $listeners = [
            'refreshParent' =>'$refresh'
            ];

    public $searchbar;

    public function getSearch(){

        redirect()->to('editor/s/'.$this->searchbar); 

    }

    public function renameChannel($channel_id){

        $channel = UserChannel::where("id", $channel_id);

        if (Auth::user()->id == $channel->first()->channel_ownerid) {
            $channel->update([
                'channel_name' => $this->channel_name,
            ]);

            session()->flash('status', 'Update Success');
            redirect()->to('/editor/channel');
        }

    }


    public function createPodcast($channel_id)
    {
        $this->validate([
            'podcast_photo' => 'required|image|max:1024',
            'podcast_name' => 'required|max:50',
        ]);

        $data = UserChannel::find($channel_id);

        if (Auth::user()->id == $data->channel_ownerid) {
            
            $image = Controller::makeImage('podcast_img', $this->podcast_photo, 'users/podcast_img');

            UserPodcasts::create([
                'podcast_ownerid' => Auth::user()->id,
                'podcast_channelid' => $channel_id,
                'podcast_title' => $this->podcast_name,
                'podcast_logo_id' => $image->id,
                'podcast_cover_id' => $image->id,
                'podcast_uniquelink' => Str::random(24),
            ]);
        }

        redirect()->to('/editor/channel');
    }

    public function createChannel()
    {
        $this->validate([
            'channel_photo' => 'required|image|max:1024',
            'channel_name' => 'required',
        ]);

        $checkChannelPhoto = UserGallery::where(['gallery_userid' => Auth::user()->id, 'gallery_type' => 'channel_photo', 'gallery_typestatus' => 'active']);

        if ($checkChannelPhoto->count() == 0) {

            $data = Controller::createImage('channel_photo',$this->channel_photo);

        } else {
            UserGallery::where('id', $checkChannelPhoto->first()->id)->update([
                'gallery_typestatus' => 'draft',
            ]);

            $data = Controller::createImage('channel_photo',$this->channel_photo);
            
        }

        $channel = new UserChannel();
        $channel->channel_ownerid = Auth::user()->id;
        $channel->channel_name = $this->channel_name;
        $channel->channel_type = "channel";
        $channel->channel_typestatus = "active";
        $channel->channel_gallery_id = $data->id;
        $channel->channel_gallery_cover_id = $data->id;
        $channel->channel_description = "empty";
        $channel->channel_uniquelink = Str::random(24);
        $channel->save();


        Controller::storeImage($this->channel_photo,'users/channe_img/');

        session()->flash('status', 'Channel Created');
        redirect()->to('/editor/channel');
    }

    public function createSubChannel()
    {
        $this->validate([
            'channel_photo' => 'required|image|max:1024',
            'channel_name' => 'required',
        ]);

        // $data = new UserGallery();
        // $data->gallery_userid = Auth::user()->id;
        // $data->gallery_type = "sub_channel_photo";
        // $data->gallery_typestatus = "active";
        // $data->gallery_path = $this->channel_photo->hashName();
        // $data->gallery_status = "active";
        // $data->save();

        $data = Controller::createImage('sub_channel_photo',$this->channel_photo);

        $channel = new UserChannel();
        $channel->channel_ownerid = Auth::user()->id;
        $channel->channel_name = $this->channel_name;
        $channel->channel_type = "sub_channel";
        $channel->channel_typestatus = "active";
        $channel->channel_gallery_id = $data->id;
        $channel->channel_gallery_cover_id = $data->id;
        $channel->channel_description = "empty";
        $channel->channel_uniquelink = Str::random(24);
        $channel->save();

        // $imagefile = $this->channel_photo->hashName();
        // // local
        // $local_storage = $this->channel_photo->storeAs('users/channe_img', $imagefile);
        // // s3
        // $s3_storage = $this->channel_photo->store('users/channe_img/', 's3');

        Controller::storeImage($this->channel_photo,'users/channe_img/');

        session()->flash('status', 'Channel Created');
        redirect()->to('/editor/channel');
    }

    public function updateAbout($channel_id)
    {
        $channel = UserChannel::where("id", $channel_id);

        if (Auth::user()->id == $channel->first()->channel_ownerid) {
            $channel->update([
                'channel_description' => $this->channel_about,
            ]);

            session()->flash('status', 'Update Success');
            redirect()->to('/editor/channel');
            // $this->emit('refreshParent');
        }
    }

    public function createChannelLink($channel_id)
    {
        $channel = UserChannel::where("id", $channel_id);

        if (Auth::user()->id == $channel->first()->channel_ownerid) {
            $channel->update([
                'channel_uniquelink' => $this->channel_uniquelink,
            ]);

            session()->flash('status', 'Update Link Success');
            redirect()->to('/editor/channel');
        }
    }

    public function saveCover($channel_id)
    {
        $this->validate([
            'channel_cover' => 'required|image|max:5024',
        ]);

        $channel = UserChannel::where("id", $channel_id);

        if (Auth::user()->id == $channel->first()->channel_ownerid) {
            $checkPhoto = UserGallery::where(['gallery_userid' => Auth::user()->id, 'gallery_type' => 'channel_cover', 'gallery_typestatus' => 'active']);

            if ($checkPhoto->count() == 0) {
              
                $data = Controller::createImage('channel_cover',$this->channel_cover);

            } else {
                UserGallery::where('id', $checkPhoto->first()->id)->update([
                    'gallery_typestatus' => 'draft',
                ]);

                $data = Controller::createImage('channel_cover',$this->channel_cover);

            }

            $channel->update([
                'channel_gallery_cover_id' => $data->id,
            ]);

            Controller::storeImage($this->channel_cover,'users/channel_cover/');

        }

        session()->flash('status', 'Update Cover Photo');
        redirect()->to('/editor/channel');
    }

    public function saveLogo($channel_id)
    {
        $this->validate([
            'channel_photo' => 'required|image|max:5024',
        ]);

        $channel = UserChannel::where("id", $channel_id);

        if (Auth::user()->id == $channel->first()->channel_ownerid) {
            $checkPhoto = UserGallery::where(['gallery_userid' => Auth::user()->id, 'gallery_type' => 'channel_photo', 'gallery_typestatus' => 'active']);

            if ($checkPhoto->count() == 0) {
                $data = new UserGallery();
                $data->gallery_userid = Auth::user()->id;
                $data->gallery_type = "channel_photo";
                $data->gallery_typestatus = "active";
                $data->gallery_path = $this->channel_photo->hashName();
                $data->gallery_status = "active";
                $data->save();
            } else {
                UserGallery::where('id', $checkPhoto->first()->id)->update([
                    'gallery_typestatus' => 'draft',
                ]);

                $data = new UserGallery();
                $data->gallery_userid = Auth::user()->id;
                $data->gallery_type = "channel_photo";
                $data->gallery_typestatus = "active";
                $data->gallery_path = $this->channel_photo->hashName();
                $data->gallery_status = "active";
                $data->save();
            }

            $channel->update([
                'channel_gallery_id' => $data->id,
            ]);

            $imagefile = $this->channel_photo->hashName();
            // local
            $local_storage = $this->channel_photo->storeAs('users/channe_img', $imagefile);
            // s3
            $s3_storage = $this->channel_photo->store('users/channe_img/', 's3');
        }

        session()->flash('status', 'Update Logo');
        redirect()->to('/editor/channel');
    }

    public function subChannel($id)
    {
        $data = new UserChannelSub();
        $data->sub_channelid = $id;
        $data->sub_userid = Auth::user()->id;
        $data->sub_type = "channel";
        $data->save();

        session()->flash('status', 'Subscribe Complete');
        redirect()->to('/editor/channel');
    }

    public function get_search()
    {
        return $this->result = User::search($this->search)->get();
    }

    public function sendInvitationByButtonClick($channel_id,$user_email)
    {
        // $this->validate([
        //     'emailInvitation' => 'required|string|email|max:50',
        // ]);

        // $channel = UserChannel::where('id', $channel_id)->first();

        // $user = User::findOrFail($channel->channel_ownerid);
        // $photo_link = $channel->get_channel_photo->gallery_path;
        // $channel_photo = config('app.s3_public_link') . "/users/channe_img/" . $photo_link;
        // $subcribers = $channel->get_subs()->count();

        // //asia time zone
        // $expiredDate = Carbon::now()
        //     ->addHour()
        //     ->timezone('Asia/Hong_Kong');
        // $mail_link = Str::random(30);
        // UserMail::create([
        //     'mail_sender_id'=>$user->first()->id,
        //     'mail_link_id'=> $mail_link,
        //     'mail_type'=>'channel_invitation',
        //     'mail_typestatus'=>'Pending',
        //     'mail_expired'=> $expiredDate
        // ]);
        
        // UserCollaborator::create([
        //     'usercol_ownerid'=>Auth::user()->id,
        //     'usercol_userid'=>$user->id,
        //     'usercol_channel_id'=> $channel->id,
        //     'usercol_email'=> $user_email,
        //     'usercol_type'=> 'channel_invitation',
        //     'usercol_typestatus'=> 'Pending'
        // ]);


        // //$this->sendEmail($user, $this->emailInvitation, $channel->channel_name, $channel_photo, $subcribers,$mail_link);
        // event(new ChannelPrivateInviation($user, $user_email, $channel->channel_name, $channel_photo, $subcribers,$mail_link,$channel->channel_privatecode));
        

        session()->flash('status', 'Email Invitation Send');
        redirect()->to('/editor/channel');
    }

    public function sendInvitation($channel_id)
    {
        $this->validate([
            'emailInvitation' => 'required|string|email|max:50',
        ]);

        $channel = UserChannel::where('id', $channel_id)->first();

        $user = User::findOrFail($channel->channel_ownerid);
        $photo_link = $channel->get_channel_photo->gallery_path;
        $channel_photo = config('app.s3_public_link') . "/users/channe_img/" . $photo_link;
        $subcribers = $channel->get_subs()->count();

        //asia time zone
        $expiredDate = Carbon::now()
            ->addHour()
            ->timezone('Asia/Hong_Kong');
        $mail_link = Str::random(30);

        $createMail = UserMail::create([
            'mail_sender_id'=>$user->first()->id,
            'mail_link_id'=> $mail_link,
            'mail_type'=>'channel_private_invitation',
            'mail_typestatus'=>'Pending',
            'mail_expired'=> $expiredDate,
            'mail_receiver_email' => $this->emailInvitation,
        ]);
        
        UserCollaborator::create([
            'usercol_ownerid'=>Auth::user()->id,
            'usercol_userid'=>$user->id,
            'usercol_channel_id'=> $channel->id,
            'usercol_email'=> $this->emailInvitation,
            'usercol_type'=> 'channel_private_invitation',
            'usercol_typestatus'=> 'Pending',
            'usercol_status_mail_id' => $createMail->id
        ]);

        $notif = new UserNotifications;
        $notif->notif_userid = Auth::user()->id;
        $notif->notif_type = "channel_private_invitation";
        $notif->notif_type_id = $user->id;
        $notif->notif_message = "You inviting ".$this->emailInvitation. " to your private channel.";
        $notif->status = "active";
        $notif->save();

        //$this->sendEmail($user, $this->emailInvitation, $channel->channel_name, $channel_photo, $subcribers,$mail_link);
        event(new ChannelPrivateInviation($user, $this->emailInvitation, $channel->channel_name, $channel_photo, $subcribers,$mail_link,$channel->channel_privatecode));
        

        session()->flash('status', 'Email Invitation Send');
        redirect()->to('/editor/channel');
    }


   



    public function sendEmail($user, $email, $channel_name, $channel_photo, $subcribers,$link)
    {
        Mail::to($email)->send(new ChannelInvitation($user, $channel_name, $channel_photo, $subcribers,$link));
    }


    public function updateChanneltoPrivate($id){

        $channel = UserChannel::where("id", $id);

        if (Auth::user()->id == $channel->first()->channel_ownerid) {
            $channel->update([
                'channel_typestatus' => "private",
                'channel_privatecode' => Str::random(24),    
            ]);

            session()->flash('status', 'Update Channel Visibility to private');
            redirect()->to('/editor/channel');
        }


    }

    public function updateChanneltoPublic($id){

        $channel = UserChannel::where("id", $id);

        if (Auth::user()->id == $channel->first()->channel_ownerid) {
            $channel->update([
                'channel_typestatus' => "active",
            ]);

            session()->flash('status', 'Update Channel Visibility to public');
            redirect()->to('/editor/channel');
        }


    }





    public function mount()
    {
        $this->checkChannel = Auth::user()
            ->get_channels()
            ->count();

        if ($this->checkChannel != 0) {
            $this->channel_list = Auth::user()
                ->get_channels()
                ->first();
            $this->channel_name = $this->channel_list->channel_name;
            $this->channel_about = $this->channel_list->channel_description;
            $this->channel_uniquelink = $this->channel_list->channel_uniquelink;
            $this->channel_privatecode = $this->channel_list->channel_privatecode;
            $this->channel_episodes = $this->channel_list->get_episode()->get();
            $this->sub_channel_list = Auth::user()
                ->channels()
                ->get();
        } else {
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
        $episodes = Audio::orderBy('id', 'DESC')->where('audio_editor', Auth::user()->id);
        $categoryList = Category::orderBy('id', 'DESC')->where('category_status', 'active');
        $mostViews = UserViews::where('view_ownerid', Auth::user()->id)
            ->orderBy('total', 'DESC')
            ->groupBy('view_audioid')
            ->selectRaw('count(*) as total, view_audioid')
            ->take(3)
            ->get();
        return view('livewire.editor.editor-channel', compact('categoryList', 'episodes', 'mostViews'));
    }
}
