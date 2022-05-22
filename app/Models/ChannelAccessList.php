<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelAccessList extends Model
{
    use HasFactory;

    protected $fillable = [
        'cal_channel_id',
        'cal_userid',
        'cal_type',
        'cal_expireddate',
        'cal_receiver_email',
        'cal_channel_private_code',
    ];



}
