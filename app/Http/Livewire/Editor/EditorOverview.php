<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\UserLikes;
use App\Models\UserComments;
use App\Models\UserFollow;
use App\Models\UserViews;
use App\Models\Audio;
use App\Models\AudioTimeStats;
use App\Models\UserChannel;
use App\Models\User;
use Auth;
use Carbon\Carbon;

class EditorOverview extends Component
{


	public $searchbar;


    public function getSearch(){

        redirect()->to('editor/s/'.$this->searchbar); 

    }
	public function getTimeByString($watchtime){
		$init = round($watchtime,0);
		$day = floor($init / 86400);
		$hours = floor(($init -($day*86400)) / 3600);
		$minutes = floor(($init / 60) % 60);
		$seconds = $init % 60;
		
		$totalInString = $hours.'hrs :'.$minutes.'min :'.$seconds.'s';

		return $totalInString;
	}


	public function getTotalWatchTimePerAudio($audio_id){

		$today = Carbon::now()->format('d');
		$data = AudioTimeStats::where(['ats_ownerid'=>Auth::user()->id,'ats_audioid'=>$audio_id])->get();
		$getWatchtime = 0;

		foreach ($data->groupby('ats_userid') as $totaList){
			$getWatchtime = $getWatchtime +  $totaList->max('ats_viewedtime');
		}

		// $init = round($getWatchtime,0);
		// $day = floor($init / 86400);
		// $hours = floor(($init -($day*86400)) / 3600);
		// $minutes = floor(($init / 60) % 60);
		// $seconds = $init % 60;
		
		// $totalInString = $hours.'hrs :'.$minutes.'min :'.$seconds.'s';

		return $getWatchtime;


	}

	public function getGenderPerAudio($audio_id){

		$today = Carbon::now()->format('d');
		$data = AudioTimeStats::where(['ats_ownerid'=>Auth::user()->id,'ats_audioid'=>$audio_id])->get();
		$gender ="";
		$female = 0;
		$male = 0;
		foreach ($data->groupby('ats_userid') as $totaList){
			
			$getUser = User::find($totaList->first()->ats_userid);
			if($getUser->gender == "Female"){
				$female++;
			}else{
				$male++;
			}
			$gender = $gender."-".$getUser->gender;
			
		}

		// $init = round($getWatchtime,0);
		// $day = floor($init / 86400);
		// $hours = floor(($init -($day*86400)) / 3600);
		// $minutes = floor(($init / 60) % 60);
		// $seconds = $init % 60;
		
		// $totalInString = $hours.'hrs :'.$minutes.'min :'.$seconds.'s';
		$dataReturn = array(
			'gender' => $gender,
			'totalfemale' => $female,
			'totalmale' => $male
		);
		return $dataReturn;


	}


	public function getTotalWatchByChannel(){

		$channel = UserChannel::where('channel_ownerid',Auth::user()->id)->get();
		$getChannelTotalHrs = 0;
		foreach($channel->get_podcast()->get() as $podcast_items){




		}
	
	}

	public function getTotalWatchTime(){

		$today = Carbon::now()->format('d');
		$data = AudioTimeStats::where(['ats_ownerid'=>Auth::user()->id])->get();
		//$data = Auth::user()->get_audiotimestats()->get();
		$getWatchtime = 0;

		foreach ($data->groupby('ats_userid') as $totaList){
			$getWatchtime = $getWatchtime +  $totaList->max('ats_viewedtime');
		}

		$init = round($getWatchtime,0);
		$day = floor($init / 86400);
		$hours = floor(($init -($day*86400)) / 3600);
		$minutes = floor(($init / 60) % 60);
		$seconds = $init % 60;
		
		$totalInString = $hours.'hrs :'.$minutes.'min :'.$seconds.'s';

		return $totalInString;


	}

	public function getTodaysWatchTime(){

		$today = Carbon::now()->format('d');
		$data = Auth::user()->get_audiotimestats()->whereDay('created_at', date($today));
		$getWatchtime = 0;

		foreach($data->get()->groupby('ats_userid') as $todayList ){
			$getWatchtime = $getWatchtime +  $todayList->max('ats_viewedtime');

		}

		$init = round($getWatchtime,0);
		$day = floor($init / 86400);
		$hours = floor(($init -($day*86400)) / 3600);
		$minutes = floor(($init / 60) % 60);
		$seconds = $init % 60;
		
		$totalInString = $hours.'hrs :'.$minutes.'min :'.$seconds.'s';

		return $totalInString;


	}

	public function getMonthWatchTime(){

		$today = Carbon::now()->month;
		$data = AudioTimeStats::where('ats_ownerid',Auth::user()->id)->whereMonth('created_at', date('$today'));
		// $data = Auth::user()->get_audiotimestats()->whereMonth('created_at', date($today));
		$getWatchtime = 0;

		foreach($data->get()->groupby('ats_userid') as $todayList ){
			$getWatchtime = $getWatchtime +  $todayList->max('ats_viewedtime');

		}

		$init = round($getWatchtime,0);
		$day = floor($init / 86400);
		$hours = floor(($init -($day*86400)) / 3600);
		$minutes = floor(($init / 60) % 60);
		$seconds = $init % 60;
		
		$totalInString = $hours.'hrs :'.$minutes.'min :'.$seconds.'s';

		return $totalInString;


	}




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

        $mostViews = UserViews::where('view_ownerid',Auth::user()->id)->orderBy('total','DESC')->groupBy('view_audioid')->selectRaw('count(*) as total, view_audioid')->take(3)->get();

        $topOneView = UserViews::where('view_ownerid',Auth::user()->id)->orderBy('total','DESC')->groupBy('view_audioid')->selectRaw('count(*) as total, view_audioid')->take(1)->first();
		
		$totalWatchTime = $this->getTotalWatchTime();
		$todayWatchTime = $this->getTodaysWatchTime();
		$monthlyWatchTime = $this->getMonthWatchTime();
        $audioList = Audio::orderBy('id', 'DESC')->where('audio_editor',Auth::user()->id);
	
        return view('livewire.editor.editor-overview',compact('monthlyWatchTime','todayWatchTime','totalWatchTime','recentLikes','recentComments','jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec','followers','mostViews','topOneView','audioList'));

    }
}
