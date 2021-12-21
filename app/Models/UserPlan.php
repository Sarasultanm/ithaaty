<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    use HasFactory;


      public function get_features(){
        return $this->hasMany('App\Models\UserPlanFeatures', 'planoption_planid','id');
    }
}
