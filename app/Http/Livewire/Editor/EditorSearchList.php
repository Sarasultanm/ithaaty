<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\Audio;
use App\Models\User;
use App\Models\UserChannel;
use App\Models\UserFollow;
use App\Models\UserPodcasts;
use App\Models\UserPodcastEpisodes;
use App\Models\UserNotifications;

use Auth;

class EditorSearchList extends Component
{



    public $searchbar;


    public function getSearch(){

        redirect()->to('editor/s/'.$this->searchbar); 

    }



    public function mount($keyword){

        $this->userSearchResult = User::search($keyword)->get();
        $this->channelSearchResult = UserChannel::search($keyword)->get();
        $this->podcastSearchResult = UserPodcasts::search($keyword)->get();
        $this->episodeSearchResult = Audio::search($keyword)->get();
    }



    public function render()
    {


        return view('livewire.editor.editor-search-list');
    }
}
