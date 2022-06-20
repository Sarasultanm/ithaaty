<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\UserPlan;
use App\Models\UserPlanFeatures;
use App\Models\User;
use Auth;

class EditorPlans extends Component
{


    public $searchbar;


    public function getSearch(){

        redirect()->to('editor/s/'.$this->searchbar); 

    }








    public function buyPlan($plan_id){

        User::where('id',Auth::user()->id)
            ->update(['plan'=>$plan_id]);
       
       session()->flash('status', 'Plan Updated Complete');
       redirect()->to('editor/plans');

    }

    public function render()
    {   
        $planList = UserPlan::whereIn('plan_status', ['active','default'])->get();
        return view('livewire.editor.editor-plans',compact('planList'));
    }
}
