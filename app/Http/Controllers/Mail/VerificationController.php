<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{
    UserMail,
    UserCollaborator,
    User,
};

use App\Repo\UserRepositories;


class VerificationController extends Controller
{

    protected $userRepo;
    //public $userRepos = UserRepositories::class;
    //private UserRepositories $userRepos;

    public function __construct(UserRepositories $userRepo){
        $this->userRepo = $userRepo;
    }


    public function verifyChannelInvitation($link){
        
        return $this->userRepo->getUsersById('2')->name;
    }
}
