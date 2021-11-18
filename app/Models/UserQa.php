<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQa extends Model
{
    use HasFactory;

    public function get_answer(){
        return $this->hasMany('App\Models\UserQanswer', 'qn_qaid','id');
    }  
}
