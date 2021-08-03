<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Audio;
use App\Models\UserFollow;

class AdminDashboard extends Component
{
    public function render()
    {
    	
    	$totalpodcaster = Audio::distinct()->count('audio_editor');
    	$totalfollower = UserFollow::distinct()->count('follow_userid');
    	$podcaster = User::where('roles','editor');

        return view('livewire.admin.admin-dashboard',compact('podcaster','totalpodcaster','totalfollower'));
    }
}
