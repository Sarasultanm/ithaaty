<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{
    UserMail,
    UserCollaborator,
    User,
    ChannelAccessList,
    UserChannel,
};

use App\Repo\UserRepositories;
use Illuminate\Support\Carbon;


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

    public function verifyPrivateChannelInvitation($link){
        

        $mail = UserMail::where('mail_link_id',$link);

        $dateResult = $this->verifyMailExpiredDate($mail->first()->mail_expired);

        if($dateResult == "Active"){


            $user_collab = UserCollaborator::where('usercol_status_mail_id',$mail->first()->id);  

            if($user_collab->first()->usercol_typestatus == 'Pending'){

                $user_collab->update([
                    'usercol_typestatus'=>'active'       
               ]);    
   
       
               $mail->update(['mail_typestatus'=>'active']);
   
               $channel = UserChannel::where('id',$user_collab->first()->usercol_channel_id)->first();

               ChannelAccessList::create([
                   'cal_channel_id'=>$user_collab->first()->usercol_channel_id,
                   'cal_userid'=>'0',
                   'cal_type'=>'channel_private_invitation',
                   'cal_expireddate'=>$mail->first()->mail_expired,
                   'cal_receiver_email'=>$mail->first()->mail_receiver_email,
                   'cal_channel_private_code'=>$channel->channel_privatecode
               ]);
            }
            
            $message = "Activeted click here to login <a href='http://127.0.0.1:8000/login'>Login</a>";

        }else{
            $message = "Email Expired";

        }

        return $message;

    }


    public function verifyMailExpiredDate($end){

        $now = Carbon::now();
        $expiredDate = Carbon::parse($end)->format('d.m.Y h:m:sa');

        if ($now->between($now->format('d.m.Y h:m:sa'), $expiredDate)) {
            return 'Active';
        } else {
            return 'Expired';
        }

    }

    // $now = Carbon::now();
    // $startDate = Carbon::parse($yourModelObject['created_at'])->format('d.m.Y h:m:sa');
    // $endDate = Carbon::parse($yourModelObject['created_at'])->addMinutes(720)->format('d.m.Y h:m:sa');

    // if ($now->between($startDate, $endDate)) {
    //     return 'Date is Active';
    // } else {
    //     return 'Date is Expired';
    // }

    
}
