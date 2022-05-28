<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\User;
use App\Models\UserFollow;
use App\Models\UserNotifications;
use Auth;

class EditorSearchList extends Component
{
    public function render()
    {


        return view('livewire.editor.editor-search-list');
    }
}
