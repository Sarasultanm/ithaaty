<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\UserNotifications;
use Livewire\WithPagination;
use Auth;

class EditorNotification extends Component
{

	use WithPagination;

    public function render()
    {


    	// $notif_list = UserNotifications::orderBy('id', 'DESC')->where('notif_userid',Auth::user()->id)->get();

     //    return view('livewire.editor.editor-notification',compact('notif_list'));


        // return view('livewire.players.players-history', [
        //     'fight_logs' => FightLog::where('fightlog_usersid',Auth::user()->id)->paginate(10),
        // ]);


        return view('livewire.editor.editor-notification',[
        	'notif_list'=>UserNotifications::orderBy('id', 'DESC')->where('notif_userid',Auth::user()->id)->paginate(20),
        ]);





    }
}
