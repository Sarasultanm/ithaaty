<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\UserLikes;
use App\Models\UserComments;
use App\Models\UserFollow;
use Auth;

class EditorSubscriberOverview extends Component
{

	public $jan_likes,$feb_likes,$mar_likes,$apr_likes,$may_likes,$jun_likes,$jul_likes,$aug_likes,$sep_likes,$oct_likes,$nov_likes,$dec_likes;
	public $jan_coms,$feb_coms,$mar_coms,$apr_coms,$may_coms,$jun_coms,$jul_coms,$aug_coms,$sep_coms,$oct_coms,$nov_coms,$dec_coms;

	public function mount(){

        
        $this->jan_likes = UserLikes::where('like_ownerid',Auth::user()->id)->whereMonth('created_at', date('01'))->whereYear('created_at', date('Y'))->count();
    	$this->feb_likes = UserLikes::where('like_ownerid',Auth::user()->id)->whereMonth('created_at', date('02'))->whereYear('created_at', date('Y'))->count();
    	$this->mar_likes = UserLikes::where('like_ownerid',Auth::user()->id)->whereMonth('created_at', date('03'))->whereYear('created_at', date('Y'))->count();
    	$this->apr_likes = UserLikes::where('like_ownerid',Auth::user()->id)->whereMonth('created_at', date('04'))->whereYear('created_at', date('Y'))->count();
    	$this->may_likes = UserLikes::where('like_ownerid',Auth::user()->id)->whereMonth('created_at', date('05'))->whereYear('created_at', date('Y'))->count();
    	$this->jun_likes = UserLikes::where('like_ownerid',Auth::user()->id)->whereMonth('created_at', date('06'))->whereYear('created_at', date('Y'))->count();
    	$this->jul_likes = UserLikes::where('like_ownerid',Auth::user()->id)->whereMonth('created_at', date('07'))->whereYear('created_at', date('Y'))->count();
    	$this->aug_likes = UserLikes::where('like_ownerid',Auth::user()->id)->whereMonth('created_at', date('08'))->whereYear('created_at', date('Y'))->count();
    	$this->sep_likes = UserLikes::where('like_ownerid',Auth::user()->id)->whereMonth('created_at', date('09'))->whereYear('created_at', date('Y'))->count();
    	$this->oct_likes = UserLikes::where('like_ownerid',Auth::user()->id)->whereMonth('created_at', date('10'))->whereYear('created_at', date('Y'))->count();
    	$this->nov_likes = UserLikes::where('like_ownerid',Auth::user()->id)->whereMonth('created_at', date('11'))->whereYear('created_at', date('Y'))->count();
    	$this->dec_likes = UserLikes::where('like_ownerid',Auth::user()->id)->whereMonth('created_at', date('12'))->whereYear('created_at', date('Y'))->count();

    	$this->jan_coms = UserComments::where('coms_ownerid',Auth::user()->id)->whereMonth('created_at', date('01'))->whereYear('created_at', date('Y'))->count();
		$this->feb_coms = UserComments::where('coms_ownerid',Auth::user()->id)->whereMonth('created_at', date('02'))->whereYear('created_at', date('Y'))->count();
		$this->mar_coms = UserComments::where('coms_ownerid',Auth::user()->id)->whereMonth('created_at', date('03'))->whereYear('created_at', date('Y'))->count();
		$this->apr_coms = UserComments::where('coms_ownerid',Auth::user()->id)->whereMonth('created_at', date('04'))->whereYear('created_at', date('Y'))->count();
		$this->may_coms = UserComments::where('coms_ownerid',Auth::user()->id)->whereMonth('created_at', date('05'))->whereYear('created_at', date('Y'))->count();
		$this->jun_coms = UserComments::where('coms_ownerid',Auth::user()->id)->whereMonth('created_at', date('06'))->whereYear('created_at', date('Y'))->count(); 
		$this->jul_coms = UserComments::where('coms_ownerid',Auth::user()->id)->whereMonth('created_at', date('07'))->whereYear('created_at', date('Y'))->count();
		$this->aug_coms = UserComments::where('coms_ownerid',Auth::user()->id)->whereMonth('created_at', date('08'))->whereYear('created_at', date('Y'))->count();
		$this->sep_coms = UserComments::where('coms_ownerid',Auth::user()->id)->whereMonth('created_at', date('09'))->whereYear('created_at', date('Y'))->count();
		$this->oct_coms = UserComments::where('coms_ownerid',Auth::user()->id)->whereMonth('created_at', date('10'))->whereYear('created_at', date('Y'))->count();
		$this->nov_coms = UserComments::where('coms_ownerid',Auth::user()->id)->whereMonth('created_at', date('11'))->whereYear('created_at', date('Y'))->count();
		$this->dec_coms = UserComments::where('coms_ownerid',Auth::user()->id)->whereMonth('created_at', date('12'))->whereYear('created_at', date('Y'))->count();











    }   


    public function render()
    {

    	$recentLikes = UserLikes::orderBy('id','DESC')->where('like_userid',Auth::user()->id)->take(2)->get();
    	$recentComments = UserComments::orderBy('id','DESC')->where('coms_userid',Auth::user()->id)->take(2)->get();
    	$followers = UserFollow::where('follow_userfollowing',Auth::user()->id);

    	

    	



        return view('livewire.editor.editor-subscriber-overview',compact('recentLikes','recentComments','followers'));
    }
}
