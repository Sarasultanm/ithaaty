<?php

namespace App\Http\Livewire\Editor;
use App\Models\{
    UserChannel,
    UserGallery,
    UserChannelSub,
    Category,
};
use Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditorChannelView extends Component
{


    use WithFileUploads;

    public $channel_photo,$channel_cover,$channel_name;


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
        $this->channel = UserChannel::where("id",$getLink->id)->first();
        $this->channel_list = Auth::user()->get_channels()->first();
        $this->channel_about = $this->channel->channel_description;
        $this->channel_uniquelink = $this->channel->channel_uniquelink;

        $this->sub_channel_list = Auth::user()->get_subchannels()->get();

         $this->allchannels = UserChannel::orderBy('id')->get();

    }

    public function render()
    {
         $categoryList = Category::orderBy('id', 'DESC')->where('category_status','active');
        return view('livewire.editor.editor-channel-view',compact('categoryList'));
    }
}
