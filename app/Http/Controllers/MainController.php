<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Audio;
use App\Models\Category;
use App\Models\UserFollow;
use App\Models\UserFav;
use App\Models\UserLikes;
use App\Models\UserPlaylist;
use App\Models\UserNotes;
use App\Models\UserRssLink;
use App\Models\UserPodcasts;
use Auth;



class MainController extends Controller
{
 



	public function viewUsers($id){

		$userData = User::where('id',$id)->first();

		return view('livewire.editor.editor-view-users',compact('userData'));
	}

	public function viewPost($id){

		$audio = Audio::where('id',$id)->first();
		$randomList = User::inRandomOrder()->take(3)->get();
		$mostlike = UserLikes::orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->take(1);
		$getHashtags = Audio::where('audio_hashtags', 'like', '%music%')->count();
		return view('post',compact('audio','randomList','mostlike','getHashtags'));
	}


	public function viewNotes($id){
		$notes = UserNotes::where('id',$id)->first();
		$audio = Audio::where('id',$notes->notes_audioid)->first();
		$randomList = User::inRandomOrder()->take(3)->get();
		$mostlike = UserLikes::orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->take(1);
		$getHashtags = Audio::where('audio_hashtags', 'like', '%music%')->count();
		return view('notes',compact('audio','randomList','mostlike','getHashtags','notes'));
	}

	public function viewEmbed($id){

		$audio = Audio::where('id',$id)->first();
		$randomList = User::inRandomOrder()->take(3)->get();
		$mostlike = UserLikes::orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->take(1);
		return view('embed',compact('audio','randomList','mostlike'));
	}


	public function viewPlaylist($id){

		$audio = Audio::where('id',$id)->first();
		$randomList = User::inRandomOrder()->take(3)->get();
		$mostlike = UserLikes::orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->take(1);
		$playlist = UserPlaylist::where('id',$id)->first();
		$getHashtags = Audio::where('audio_hashtags', 'like', '%music%')->count();
		return view('playlist',compact('audio','randomList','mostlike','playlist','getHashtags'));
	}



	public function viewPopular(){

		$randomList = User::inRandomOrder()->take(3)->get();
		$mostlike = UserLikes::orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->get();
		return view('popular',compact('randomList','mostlike'));
	}

	public function viewTrending(){

		$randomList = User::inRandomOrder()->take(3)->get();
		$mostlike = UserLikes::orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->get();
		return view('trending',compact('randomList','mostlike'));
	}

	public function viewPodcaster(){

		$randomList = User::inRandomOrder()->take(3)->get();
		$mostlike = UserLikes::orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->get();
		$podcaster = User::where('roles','editor');
		$podcast_lists = UserPodcasts::where('podcast_status','active')->get();
		return view('podcaster',compact('randomList','mostlike','podcaster','podcast_lists'));
	}

	public function viewPodcast(){

		$randomList = User::inRandomOrder()->take(3)->get();
		$mostlike = UserLikes::orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->get();
		$podcaster = User::where('roles','editor');
		$podcast_lists = UserPodcasts::where('podcast_status','active')->get();
		return view('podcast',compact('randomList','mostlike','podcaster','podcast_lists'));
	}

	public function viewAboutus(){

		$randomList = User::inRandomOrder()->take(3)->get();
		$mostlike = UserLikes::orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->get();
		$podcaster = User::where('roles','editor');
		return view('about-page',compact('randomList','mostlike','podcaster'));
	}

	public function viewAdvertise(){

		$randomList = User::inRandomOrder()->take(3)->get();
		$mostlike = UserLikes::orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->get();
		$podcaster = User::where('roles','editor');
	}

	public function viewRss(){

		return view('ads-page',compact('randomList','mostlike','podcaster'));
		return view('rss');
	}


	public function about(){

		$likes = UserLikes::orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->take(10);
		$num = 1;
		return view('about',compact('likes'))->with('num');
	}

	public function feedRSS($rsslink)
    {
    	$get_rsslink = UserRssLink::where('rss_links',$rsslink)->first();
    	$feeds  = Audio::where(['audio_editor'=>$get_rsslink->rss_ownerid,'audio_type'=>'Upload'])->get();
    	$users = User::where('id',$get_rsslink->rss_ownerid)->first();
    	$amazon_link = config('app.s3_public_link');
        return response()->view('rss.feed',compact('feeds','users','amazon_link'))->header('Content-Type', 'application/xml');

    }

	public function viewGenerateRSS($username){
		$name = $username;

		return view('rss.feed',compact('name'));
	}


	public function checkLogin(){
		if(Auth::check()){
			if(Auth::user()->roles ="admin"){
				return "admin";
			}else{
				return "editor";
			}
		}else{
			return "NotLogin";
		}
	}


}
