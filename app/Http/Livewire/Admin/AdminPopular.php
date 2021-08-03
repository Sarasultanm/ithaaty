<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\UserLikes;


class AdminPopular extends Component
{
    public function render()
    {
    	$mostlike = UserLikes::orderBy('total','DESC')->groupBy('like_audioid')->selectRaw('count(*) as total, like_audioid')->get();
        return view('livewire.admin.admin-popular',compact('mostlike'));
    }
}
