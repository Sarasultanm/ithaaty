<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AudioTimeStats;
use App\Models\Audio;
use App\Models\UserViews;
use Auth;


class PlayerController extends Controller
{
    

    public function store(Request $request){

        // AudioTimeStats::create([
        //     'ats_userid'=> Auth::user()->id,
        //     'ats_audioid' => $request->audioid,
        //     'ats_viewedtime' => $request->currenttime,
        //     'ats_audiolenght' => $request->lenghttime
        // ]);
        $data = Audio::find($request->audioid);

        AudioTimeStats::create([
            'ats_userid'=> Auth::user()->id,
            'ats_audioid' => $request->audioid,
            'ats_ownerid' => $data->audio_editor,
            'ats_viewedtime' =>$request->video_time,
            'ats_audiolenght' => $request->video_lenght
        ]);
        
        UserViews::create([
            'view_userid'=> Auth::user()->id,
            'view_audioid'=> $request->audioid,
            'view_type'=>"view",
            'view_status'=>"active",
            'view_ownerid'=> $data->audio_editor,
            'user_ip'=> $_SERVER['REMOTE_ADDR']
        ]);




        return response()->json(['success'=>'Ajax request submitted successfully']);

    }
}
