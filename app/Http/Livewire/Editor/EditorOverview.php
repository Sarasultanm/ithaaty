<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\UserLikes;
use App\Models\UserComments;
use App\Models\UserFollow;
use Auth;

class EditorOverview extends Component
{
    public function render()
    {
    	$recentLikes = UserLikes::orderBy('id','DESC')->where('like_userid',Auth::user()->id)->take(2)->get();
    	$recentComments = UserComments::orderBy('id','DESC')->where('coms_userid',Auth::user()->id)->take(2)->get();
    	$jan = Userfollow::where('follow_userfollowing',Auth::user()->id)->whereMonth('created_at', date('01'))->whereYear('created_at', date('Y'))->count();
    	$feb = Userfollow::where('follow_userfollowing',Auth::user()->id)->whereMonth('created_at', date('02'))->whereYear('created_at', date('Y'))->count();
    	$mar = Userfollow::where('follow_userfollowing',Auth::user()->id)->whereMonth('created_at', date('03'))->whereYear('created_at', date('Y'))->count();
    	$apr = Userfollow::where('follow_userfollowing',Auth::user()->id)->whereMonth('created_at', date('04'))->whereYear('created_at', date('Y'))->count();
    	$may = Userfollow::where('follow_userfollowing',Auth::user()->id)->whereMonth('created_at', date('05'))->whereYear('created_at', date('Y'))->count();
    	$jun = Userfollow::where('follow_userfollowing',Auth::user()->id)->whereMonth('created_at', date('06'))->whereYear('created_at', date('Y'))->count();
    	$jul = Userfollow::where('follow_userfollowing',Auth::user()->id)->whereMonth('created_at', date('07'))->whereYear('created_at', date('Y'))->count();
    	$aug = Userfollow::where('follow_userfollowing',Auth::user()->id)->whereMonth('created_at', date('08'))->whereYear('created_at', date('Y'))->count();
    	$sep = Userfollow::where('follow_userfollowing',Auth::user()->id)->whereMonth('created_at', date('09'))->whereYear('created_at', date('Y'))->count();
    	$oct = Userfollow::where('follow_userfollowing',Auth::user()->id)->whereMonth('created_at', date('10'))->whereYear('created_at', date('Y'))->count();
    	$nov = Userfollow::where('follow_userfollowing',Auth::user()->id)->whereMonth('created_at', date('11'))->whereYear('created_at', date('Y'))->count();
    	$dec = Userfollow::where('follow_userfollowing',Auth::user()->id)->whereMonth('created_at', date('12'))->whereYear('created_at', date('Y'))->count();
    	// $PrescriptionTbl::whereDate('created_at', date('Y-m-d'))->get();
        $followers = UserFollow::where('follow_userfollowing',Auth::user()->id);
        return view('livewire.editor.editor-overview',compact('recentLikes','recentComments','jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec','followers'));

    }
}
