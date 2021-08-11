<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\UserLikes;
use App\Models\UserComments;
use App\Models\UserFollow;
use Auth;

class EditorSubscriberOverview extends Component
{
    public function render()
    {

    	$recentLikes = UserLikes::orderBy('id','DESC')->where('like_userid',Auth::user()->id)->take(2)->get();
    	$recentComments = UserComments::orderBy('id','DESC')->where('coms_userid',Auth::user()->id)->take(2)->get();
        return view('livewire.editor.editor-subscriber-overview',compact('recentLikes','recentComments'));
    }
}
