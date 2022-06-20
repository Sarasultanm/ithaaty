<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\UserPlaylist;
use App\Models\UserPlaylistShared;
use Auth;

class EditorPlaylistDetails extends Component
{

	public $playlist_title,$playlist_status,$playlist_public,$playlist_private;



     protected $rules = [
        'playlist_title' => 'required',
        'playlist_status' => 'required',
    ];

    
	public $searchbar;


  public function getSearch(){

      redirect()->to('editor/s/'.$this->searchbar); 

  }

    


	public function createPlaylist(){

            $this->validate();

            $data = new UserPlaylist;
            $data->playlist_userid = Auth::User()->id;
            $data->playlist_title = $this->playlist_title;
            $data->playlist_status = $this->playlist_status;
            $data->save();

            session()->flash('status', 'New Playlist created');
            redirect()->to('/editor/playlist');

    }

    public function restorePlaylist($id){

      UserPlaylist::where('id',$id)->update([
          'playlist_status'=>'Private'
      ]);
  
      session()->flash('status', 'Playlist Succesfully restore');
      redirect()->to('/editor/playlist/');
  
    }

    public function render()
    {

    	$playlist = UserPlaylist::where('playlist_userid',Auth::user()->id);
      $sharedplaylist = UserPlaylistShared::where('plshared_userid',Auth::user()->id);

        return view('livewire.editor.editor-playlist-details',compact('playlist','sharedplaylist'));
    }
}
