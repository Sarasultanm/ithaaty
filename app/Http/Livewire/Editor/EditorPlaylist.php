<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\UserPlaylist;
use App\Models\UserFriends;
use App\Models\UserPlaylistShared;
use Auth;

class EditorPlaylist extends Component
{

	public $playlist,$friends;



	public function sharedPlaylist($playlist_id){

		 $this->validate([
		 	'friends' => 'required',
		 ]);

		$data = new UserPlaylistShared;
		$data->plshared_playlistid = $playlist_id;
		$data->plshared_userid = $this->friends;
		$data->plshared_role = "editor";
		$data->save();


		 session()->flash('status', 'Playlist Succesfully shared');
         redirect()->to('/editor/playlist/'.$playlist_id);



	}

	 public function shareButton($socialMedia,$id){
        if($socialMedia == "facebook"){
             $link ="https://www.facebook.com/sharer/sharer.php?u=https://ithaaty.com/playlist/".$id;
        }else{
            $link = "https://twitter.com/intent/tweet?url=https://ithaaty.com/playlist/".$id;
        }
        redirect()->to($link);
    }



	public function mount($id){
		$this->playlist = UserPlaylist::where('id',$id)->first();
	}

    public function render()
    {
    	$friendList = UserFriends::where('friend_userid',Auth::user()->id)->orWhere('friend_requestid',Auth::user()->id)->get();
    	
        return view('livewire.editor.editor-playlist',compact('friendList'));
    }
}
