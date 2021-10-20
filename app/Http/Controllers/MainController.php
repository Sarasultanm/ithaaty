<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Audio;
use App\Models\Category;
use App\Models\UserFollow;
use App\Models\UserFav;
use App\Models\UserLikes;
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
		return view('post',compact('audio','randomList','mostlike'));
	}

	public function viewEmbed($id){

		$audio = Audio::where('id',$id)->first();
		$randomList = User::inRandomOrder()->take(3)->get();
		$mostlike = UserLikes::orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->take(1);
		return view('embed',compact('audio','randomList','mostlike'));
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
		return view('podcaster',compact('randomList','mostlike','podcaster'));
	}



	public function about(){

		$likes = UserLikes::orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->take(8);
		$num = 1;
		return view('about',compact('likes'))->with('num');
	}



}
