<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMail extends Model
{
    use HasFactory;

    protected $fillable = [
        'mail_sender_id',
        'mail_reciever_id',
        'mail_link_id',
        'mail_type',
        'mail_typestatus',
        'mail_expired',
        'mail_status',
    ];




    



}
