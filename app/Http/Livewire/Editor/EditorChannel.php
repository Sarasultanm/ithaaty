<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\UserChannel;
use App\Models\UserGallery;
use Auth;
use Livewire\WithFileUploads;


class EditorChannel extends Component
{

    use WithFileUploads;


    public $channel_photo,$channel_cover,$channel_name;



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

        $channel = new UserChannel;
        $channel->channel_ownerid = Auth::user()->id;
        $channel->channel_name = $this->channel_name;
        $channel->channel_type = "channel_photo";
        $channel->channel_typestatus = "active";
        $channel->channel_gallery_id = $data->id;
        $channel->channel_gallery_cover_id = $data->id;
        $channel->channel_description = "";
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


    public function mount(){
        $this->checkChannel = Auth::user()->get_channels()->count();

        if($this->checkChannel != 0){
             $this->channel_list = Auth::user()->get_channels()->first();
             $this->channel_about = $this->channel_list->channel_description;
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
        return view('livewire.editor.editor-channel');
    }
}
