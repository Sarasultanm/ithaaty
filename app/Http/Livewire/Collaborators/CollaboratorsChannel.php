<?php

namespace App\Http\Livewire\Collaborators;

use Livewire\Component;

use Auth;
use App\Models\{
    User,
    UserCollaborator,
    UserChannel,
    UserPodcasts,
};

use App\Repo\CollaboratorRepositories;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

use Livewire\WithFileUploads;

use App\Http\Controllers\Controller;

class CollaboratorsChannel extends Component
{

    use WithFileUploads;


    public $podcast_photo,$podcast_name,$result;

    public $auth_collab;

    public function mount(CollaboratorRepositories $collaborator){
        $this->auth_collab = $collaborator->getAuthCollaborator();
        $this->result = $collaborator->getAuthCollab()->first();
    }

    public function createPodcast($channel_id)
    {

        $data = UserChannel::find($channel_id);

        $this->validate([
            'podcast_photo' => 'required|image|max:1024',
            'podcast_name' => 'required|max:50',
        ]);

        if ($this->auth_collab->usercol_ownerid == $data->channel_ownerid) {
            
            $image = Controller::makeImage('podcast_img', $this->podcast_photo, 'users/podcast_img');

            UserPodcasts::create([
                'podcast_ownerid' => $this->auth_collab->usercol_ownerid,
                'podcast_channelid' => $channel_id,
                'podcast_title' => $this->podcast_name,
                'podcast_logo_id' => $image->id,
                'podcast_cover_id' => $image->id,
                'podcast_uniquelink' => Str::random(24),
            ]);
        }

        session()->flash('status', 'New Podcast Added');    
        redirect()->to('/collaborators/channel');
    }

    public function render(CollaboratorRepositories $collaborator)
    {
        $channel = $collaborator->getCollaboratorChannel();
        return view('livewire.collaborators.collaborators-channel',compact('channel'));
    }
}
