<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{

    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'type',
    ];


    public function checkUserInterest($userid){
        return $this->belongsTo('App\Models\UserInterest','id','interest_id')->where(['interest_ownerid'=>$userid,'interest_typestatus'=>'check']);
    }









}
