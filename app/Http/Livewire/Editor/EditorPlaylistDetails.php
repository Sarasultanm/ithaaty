<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\UserPlaylist;
use Auth;

class EditorPlaylistDetails extends Component
{

	public $playlist_title,$playlist_status,$playlist_public,$playlist_private;

	public function createPlaylist(){

            $data = new UserPlaylist;
            $data->playlist_userid = Auth::User()->id;
            $data->playlist_title = $this->playlist_title;
            $data->playlist_status = $this->playlist_status;
            $data->save();

            session()->flash('status', 'New Playlist created');
            redirect()->to('/editor/playlist');

    }



    public function render()
    {

    	$playlist = UserPlaylist::where('playlist_userid',Auth::user()->id);


        return view('livewire.editor.editor-playlist-details',compact('playlist'));
    }
}
