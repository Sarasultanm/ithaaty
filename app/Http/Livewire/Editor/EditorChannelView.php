<?php

namespace App\Http\Livewire\Editor;
use App\Models\{
    UserChannel,
    UserGallery,
    UserChannelSub,
    Category,
    UserPodcasts,
    User,
    UserMail,
    UserCollaborator,
    ChannelAccessList,
};
use Auth;
use Mail;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Livewire\Component;

use App\Mail\ChannelInvitation;
use App\Http\Controllers\Controller;

use App\Events\PodcastInvitationProcessed;


class EditorChannelView extends Component
{


    use WithFileUploads;

    public $channel_photo,$podcast_photo,$podcast_name,$channel_cover,$channel_name;
    public $search = "",$result,$emailInvitation;
    public $vpc_email,$vpc_code;



    public function get_search()
    {
        return $this->result = User::search($this->search)->get();
    }



    public function verifyPrivateCode($id){


        $check = ChannelAccessList::where([
            'cal_receiver_email'=>$this->vpc_email,
            'cal_channel_private_code'=>$this->vpc_code,
        ]);

        if($check->count() != 0){

            $dateResult = $this->verifyMailExpiredDate($check->first()->cal_expireddate);

            if($dateResult == "Active"){

                $check->update([
                    'cal_typestatus'=>'access'
                ]);
                
                UserCollaborator::where([
                    'usercol_channel_id'=>$check->first()->cal_channel_id ,
                    'usercol_email'=>$check->first()->cal_receiver_email
                ])->update(['usercol_typestatus'=>'Access']);

                session()->flash('status', 'Success');
                redirect()->to('/editor/channel/'.$this->channel_uniquelink);

            }else{

                session()->flash('status', 'Failed to verify expired code');
                redirect()->to('/editor/channel/'.$this->channel_uniquelink);

            }

        }else{
            session()->flash('status', 'Not found');
            redirect()->to('/editor/channel/'.$this->channel_uniquelink);
        }


    }

    public function verifyMailExpiredDate($end){

        $now = Carbon::now();
        $expiredDate = Carbon::parse($end)->format('d.m.Y h:m:sa');

        if ($now->between($now->format('d.m.Y h:m:sa'), $expiredDate)) {
            return 'Active';
        } else {
            return 'Expired';
        }

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
            'mail_sender_id'=>$user->id,
            'mail_link_id'=> $mail_link,
            'mail_type'=>'channel_collaborator',
            'mail_typestatus'=>'active',
            'mail_expired'=> $expiredDate,
            'mail_receiver_email' => $this->emailInvitation,
        ]);

        UserCollaborator::create([
            'usercol_ownerid'=>Auth::user()->id,
            'usercol_userid'=>$user->id,
            'usercol_channel_id'=> $channel->id,
            'usercol_email'=> $this->emailInvitation,
            'usercol_type'=> 'channel_collaborator',
            'usercol_typestatus'=> 'active',
            'usercol_status_mail_id' => $createMail->id
        ]);



       // $this->sendEmail($user, $this->emailInvitation, $channel->channel_name, $channel_photo, $subcribers,$mail_link);

        event(new PodcastInvitationProcessed($user, $this->emailInvitation, $channel->channel_name, $channel_photo, $subcribers,$mail_link));

        session()->flash('status', 'Email Invitation Send');
        redirect()->to('/editor/channel/'.$channel->channel_uniquelink);
    }

    public function sendEmail($user, $email, $channel_name, $channel_photo, $subcribers,$link)
    {
        Mail::to($email)->send(new ChannelInvitation($user, $channel_name, $channel_photo, $subcribers,$link));
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

        redirect()->to('/editor/channel/'.$data->channel_uniquelink);

        //redirect()->to('/editor/channel');
    }

    public function saveLogo($channel_id){

        $this->validate([
            'channel_photo' => 'required|image|max:5024',
        ]);


        $channel = UserChannel::where("id",$channel_id);


        if(Auth::user()->id == $channel->first()->channel_ownerid){

            $data = New UserGallery;
            $data->gallery_userid = Auth::user()->id;
            $data->gallery_type = "sub_channel_photo";
            $data->gallery_typestatus = "active";
            $data->gallery_path = $this->channel_photo->hashName();
            $data->gallery_status = "active";
            $data->save();

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
        redirect()->to('/editor/channel/'.$channel->first()->channel_uniquelink);


    }

    public function saveCover($channel_id){

        $this->validate([
            'channel_cover' => 'required|image|max:5024',
        ]);


        $channel = UserChannel::where("id",$channel_id);


        if(Auth::user()->id == $channel->first()->channel_ownerid){


            $data = New UserGallery;
            $data->gallery_userid = Auth::user()->id;
            $data->gallery_type = "sub_channel_cover";
            $data->gallery_typestatus = "active";
            $data->gallery_path = $this->channel_cover->hashName();
            $data->gallery_status = "active";
            $data->save();


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
        redirect()->to('/editor/channel/'.$channel->first()->channel_uniquelink);
        


    }

    public function updateAbout($channel_id){
        
         $channel = UserChannel::where("id",$channel_id);

          if(Auth::user()->id == $channel->first()->channel_ownerid){

             $channel->update([
                'channel_description'=> $this->channel_about
             ]);

            session()->flash('status', 'Update Success');
            redirect()->to('/editor/channel/'.$channel->first()->channel_uniquelink);

          }

    }

    public function mount($link){

        $getLink = UserChannel::where('channel_uniquelink',$link)->first();
        if($getLink){

        $this->channel = UserChannel::where("id",$getLink->id)->first();
        $this->channel_list = Auth::user()->get_channels()->first();
        $this->channel_about = $this->channel->channel_description;
        $this->channel_uniquelink = $this->channel->channel_uniquelink;

        //$this->sub_channel_list = Auth::user()->channels()->get();
        $this->sub_channel_list = UserChannel::where('channel_ownerid',$getLink->channel_ownerid)->get();

        $this->allchannels = UserChannel::orderBy('id')->get();

        $this->channel_episodes = $this->channel->get_episode()->get();
            
        }else{
            abort(404);
        }

    }

    public function render()
    {
        $categoryList = Category::orderBy('id', 'DESC')->where('category_status','active');
        return view('livewire.editor.editor-channel-view',compact('categoryList'));
    }
}
