<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\UserPlan;
use App\Models\UserPlanFeatures;
use App\Models\Category;

class AdminPlans extends Component
{

	public $plan_name,$plan_description;
	public $pf_typeOne,$pf_typeTwo,$pf_typeThree,$a_typeOne,$a_typeTwo,$a_typeThree,$uf_typeOne,$uf_typeTwo,$uf_typeThree,$of_typeOne,$of_typeTwo,$of_typeThree,$of_typeFour,$of_typeFive,$of_typeSix,$result;


	public function setDefault($id){

        $checkPlan = UserPlan::where('plan_status','default')->count();

		UserPlan::where('id',$id)
            ->update(['plan_status'=> 'default']);
    
        session()->flash('status', 'Plan Updated Complete');
        
        redirect()->to('admin/plans');

	}


    public function render()
    {	
    	$category_list = Category::where('category_status','active')->get();
    	$planList = UserPlan::whereIn('plan_status', ['active','default'])->get();
        return view('livewire.admin.admin-plans',compact('category_list','planList'));
    }
}
