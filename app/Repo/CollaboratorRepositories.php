<?php

namespace App\Repo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{
    UserCollaborator,
    User,
};
use Auth;

class CollaboratorRepositories
{

    protected $user,$userCollaborator;

    public function __construct(User $user,UserCollaborator $userCollaborator) {
        $this->user = $user;
        $this->userCollaborator = $userCollaborator;
    }

    public function Auth(){
        return Auth::user();
    }

    public function AuthId(){
        return Auth::user()->id;
    }
   

    public function getAuthCollab(){
        return $this->getCollaborator()->where('usercol_userid',$this->AuthId()); 
    }

    public function getCollaborator(){
        return $this->userCollaborator; 
    }

    public function getAuthCollaborator(){
        return $this->Auth()->get_user_collaborators; 
       // return $this->getCollaborator()->where('usercol_userid',Auth::user()->id);
    }

    public function getCollaboratorById($id){
        return $this->getCollaborator()->find($id); 
    }

    public function getCollaboratorByUserId($usercol_userid){
        return $this->getCollaborator()->where('usercol_userid',$usercol_userid); 
    }   

    public function getCollaboratorAdmin(){
        return Auth::user()->get_user_collaborators->usercol_ownerid;
    }

    public function getCollaboratorChannel(){
        return Auth::user()->get_user_collaborators->get_channel;

    }


    
}


?>