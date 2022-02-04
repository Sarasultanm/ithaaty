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


    public $channel_photo,$channel_name;


    public function createChannel(){

        $this->validate([
            'channel_photo' => 'required|image|max:1024',
            'channel_name' => 'required',
        ]);

        $checkChannelPhoto = UserGallery::where(['gallery_userid'=>Auth::user()->id,'gallery_type'=>'channel','gallery_typestatus'=>'active']);

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
        $channel->save();


        $imagefile = $this->channel_photo->hashName();
        // local
        $local_storage = $this->channel_photo->storeAs('users/channe_img',$imagefile);
        // s3
        $s3_storage = $this->channel_photo->store('users/channe_img/', 's3');

        

        session()->flash('status', 'Channel Created');
        redirect()->to('/editor/channel');


    }


    public function mount(){
        $this->channel_list = Auth::user()->get_channels()->first();
    }


    public function render()
    {
        return view('livewire.editor.editor-channel');
    }
}
