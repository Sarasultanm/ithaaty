<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserComments;
use App\Models\Audio;
use Illuminate\Support\Facades\DB;
class User_comment extends Controller
{
    /**
     * Display a listing of the resource.
     *s
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function Search_comment(Request $request){

        // $fields=$request->validate([
        //     'setup_ownerid'=>'required|string',
        // ]);

        // $search = '%'.$request->input('searchdata').'%';

        $usercomment= DB::table('audio')
        ->join('user_comments', 'user_comments.coms_audioid', '=', 'audio.id')
            ->select('audio.id','audio.audio_name','audio.audio_episode','user_comments.coms_message')
        ->where('user_comments.coms_status','active')
        ->get();





        return response($usercomment, 201);



        }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
