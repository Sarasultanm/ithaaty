<?php

namespace App\Repo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{
    UserMail,
    UserCollaborator,
    User,
};

use Auth;

class UserRepositories
{

    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }



    public function getUsers(){
        return $this->user; 
    }

    public function getUsersById($id){
        return $this->getUsers()->find($id); 
    }

    

    
}


?>