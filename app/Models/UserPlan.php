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

    public function check_features($type){
        return $this->belongsTo('App\Models\UserPlanFeatures','id','planoption_planid')->where(['planoption_type'=>$type,'planoption_options'=>'check']);
    }
    public function get_type($type){
        return $this->belongsTo('App\Models\UserPlanFeatures','id','planoption_planid')->where('planoption_type',$type);
    }


}
