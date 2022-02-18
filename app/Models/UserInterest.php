<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model
{
    use HasFactory;

    protected $fillable = [
        'interest_ownerid',
        'interest_id',
        'interest_type',
        'interest_typestatus',
    ];



    


}
