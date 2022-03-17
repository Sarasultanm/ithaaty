<?php

namespace App\Http\Livewire\Collaborators;

use Livewire\Component;
use App\Models\{
    User,
    UserCollaborator,
};

use App\Repo\CollaboratorRepositories;
use Auth;

class CollaboratorsDashboard extends Component
{



    // public function mount(CollaboratorRepositories $collaborator){
    //     $this->collaborator = $collaborator->getCollaboratorByUserId(Auth::user()->id)->first();
    // }

    
    public function render(CollaboratorRepositories $collaborator)
    {

        $channel = $collaborator->getCollaboratorChannel();

        return view('livewire.collaborators.collaborators-dashboard',compact('channel'));
        
    }
}
