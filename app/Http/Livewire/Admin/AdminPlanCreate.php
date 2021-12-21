<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\UserPlan;
use App\Models\UserPlanFeatures;


class AdminPlanCreate extends Component
{


	public $plan_name,$plan_description;
	public $pf_typeOne,$pf_typeTwo,$pf_typeThree,$a_typeOne,$a_typeTwo,$a_typeThree,$uf_typeOne,$uf_typeTwo,$uf_typeThree,$of_typeOne,$of_typeTwo,$of_typeThree,$of_typeFour,$of_typeFive,$of_typeSix,$result;

	// public $p2_checkbox = "",$p2_text = "";

	public function createPlan(){
		
		$plan = new UserPlan;
		$plan->plan_name = $this->plan_name;
		$plan->plan_description = $this->plan_description;
		$plan->plan_price = "0";
		$plan->plan_days = "0";
		$plan->plan_status = "active";
		$plan->save();

		$pfOne = new UserPlanFeatures;
		$pfOne->planoption_planid = $plan->id;
		$pfOne->planoption_name = "No Podcast Features";	
		$pfOne->planoption_description = "Lorem ipsum dolor sit amet, consectetur";
		$pfOne->planoption_options = ($this->pf_typeOne == 1 ) ? "check" : "uncheck";
		$pfOne->planoption_type = "p1";
		$pfOne->planoption_status = "active";
		$pfOne->save();

		$pfTwo = new UserPlanFeatures;
		$pfTwo->planoption_planid = $plan->id;
		$pfTwo->planoption_name = "Embed Code";	
		$pfTwo->planoption_description = "Lorem ipsum dolor sit amet, consectetur";
		$pfTwo->planoption_options = ($this->pf_typeTwo == 1 ) ? "check" : "uncheck";
		$pfTwo->planoption_type = "p2";
		$pfTwo->planoption_status = "active";
		$pfTwo->save();

		$pfThree = new UserPlanFeatures;
		$pfThree->planoption_planid = $plan->id;
		$pfThree->planoption_name = "Import Rss";	
		$pfThree->planoption_description = "Lorem ipsum dolor sit amet, consectetur";
		$pfThree->planoption_options = ($this->pf_typeThree == 1 ) ? "check" : "uncheck";
		$pfThree->planoption_type = "p3";
		$pfThree->planoption_status = "active";
		$pfThree->save();


		/* analytics */

		$atypeOne = new UserPlanFeatures;
		$atypeOne->planoption_planid = $plan->id;
		$atypeOne->planoption_name = "No Analytics";	
		$atypeOne->planoption_description = "Lorem ipsum dolor sit amet, consectetur";
		$atypeOne->planoption_options = ($this->a_typeOne == 1 ) ? "check" : "uncheck";
		$atypeOne->planoption_type = "a1";
		$atypeOne->planoption_status = "active";
		$atypeOne->save();


		$atypeTwo = new UserPlanFeatures;
		$atypeTwo->planoption_planid = $plan->id;
		$atypeTwo->planoption_name = "Default Analytics";	
		$atypeTwo->planoption_description = "Lorem ipsum dolor sit amet, consectetur";
		$atypeTwo->planoption_options = ($this->a_typeTwo == 1 ) ? "check" : "uncheck";
		$atypeTwo->planoption_type = "a2";
		$atypeTwo->planoption_status = "active";
		$atypeTwo->save();


		$atypeThree = new UserPlanFeatures;
		$atypeThree->planoption_planid = $plan->id;
		$atypeThree->planoption_name = "Advance Analytics";	
		$atypeThree->planoption_description = "Lorem ipsum dolor sit amet, consectetur";
		$atypeThree->planoption_options = ($this->a_typeThree == 1 ) ? "check" : "uncheck";
		$atypeThree->planoption_type = "a3";
		$atypeThree->planoption_status = "active";
		$atypeThree->save();
			
		/* Upload Features */

		$uftypeOne = new UserPlanFeatures;
		$uftypeOne->planoption_planid = $plan->id;
		$uftypeOne->planoption_name = "No Upload";	
		$uftypeOne->planoption_description = "Lorem ipsum dolor sit amet, consectetur";
		$uftypeOne->planoption_options = ($this->uf_typeOne == 1 ) ? "check" : "uncheck";
		$uftypeOne->planoption_type = "u1";
		$uftypeOne->planoption_status = "active";
		$uftypeOne->save();

		$uftypeTwo = new UserPlanFeatures;
		$uftypeTwo->planoption_planid = $plan->id;
		$uftypeTwo->planoption_name = "4 Podcast Per Month";	
		$uftypeTwo->planoption_description = "Lorem ipsum dolor sit amet, consectetur";
		$uftypeTwo->planoption_options = ($this->uf_typeTwo == 1 ) ? "check" : "uncheck";
		$uftypeTwo->planoption_type = "u2";
		$uftypeTwo->planoption_status = "active";
		$uftypeTwo->save();

		$uftypeThree = new UserPlanFeatures;
		$uftypeThree->planoption_planid = $plan->id;
		$uftypeThree->planoption_name = "8 Podcast Per Month";	
		$uftypeThree->planoption_description = "Lorem ipsum dolor sit amet, consectetur";
		$uftypeThree->planoption_options = ($this->uf_typeThree == 1 ) ? "check" : "uncheck";
		$uftypeThree->planoption_type = "u3";
		$uftypeThree->planoption_status = "active";
		$uftypeThree->save();

		/* Other Features */

		$oftypeOne = new UserPlanFeatures;
		$oftypeOne->planoption_planid = $plan->id;
		$oftypeOne->planoption_name = "Advertisement";	
		$oftypeOne->planoption_description = "Lorem ipsum dolor sit amet, consectetur";
		$oftypeOne->planoption_options = ($this->of_typeOne == 1 ) ? "check" : "uncheck";
		$oftypeOne->planoption_type = "o1";
		$oftypeOne->planoption_status = "active";
		$oftypeOne->save();


		$oftypeTwo = new UserPlanFeatures;
		$oftypeTwo->planoption_planid = $plan->id;
		$oftypeTwo->planoption_name = "Monitize";	
		$oftypeTwo->planoption_description = "Lorem ipsum dolor sit amet, consectetur";
		$oftypeTwo->planoption_options = ($this->of_typeTwo == 1 ) ? "check" : "uncheck";
		$oftypeTwo->planoption_type = "o2";
		$oftypeTwo->planoption_status = "active";
		$oftypeTwo->save();


		$oftypeThree = new UserPlanFeatures;
		$oftypeThree->planoption_planid = $plan->id;
		$oftypeThree->planoption_name = "Sponsorhip";	
		$oftypeThree->planoption_description = "Lorem ipsum dolor sit amet, consectetur";
		$oftypeThree->planoption_options = ($this->of_typeThree == 1 ) ? "check" : "uncheck";
		$oftypeThree->planoption_type = "o3";
		$oftypeThree->planoption_status = "active";
		$oftypeThree->save();


		$oftypeFour = new UserPlanFeatures;
		$oftypeFour->planoption_planid = $plan->id;
		$oftypeFour->planoption_name = "Reference";	
		$oftypeFour->planoption_description = "Lorem ipsum dolor sit amet, consectetur";
		$oftypeFour->planoption_options = ($this->of_typeFour == 1 ) ? "check" : "uncheck";
		$oftypeFour->planoption_type = "o4";
		$oftypeFour->planoption_status = "active";
		$oftypeFour->save();


		$oftypeFive = new UserPlanFeatures;
		$oftypeFive->planoption_planid = $plan->id;
		$oftypeFive->planoption_name = "QA";	
		$oftypeFive->planoption_description = "Lorem ipsum dolor sit amet, consectetur";
		$oftypeFive->planoption_options = ($this->of_typeFive == 1 ) ? "check" : "uncheck";
		$oftypeFive->planoption_type = "o5";
		$oftypeFive->planoption_status = "active";
		$oftypeFive->save();
		
		$oftypeSix = new UserPlanFeatures;
		$oftypeSix->planoption_planid = $plan->id;
		$oftypeSix->planoption_name = "Word Counter";	
		$oftypeSix->planoption_description = "Lorem ipsum dolor sit amet, consectetur";
		$oftypeSix->planoption_options = ($this->of_typeSix == 1 ) ? "check" : "uncheck";
		$oftypeSix->planoption_type = "o6";
		$oftypeSix->planoption_status = "active";
		$oftypeSix->save();
		


		session()->flash('status', 'New Plan Added');
        redirect()->to('admin/plans');   


		//$this->result = ($this->pf_typeOne == 1 ) ? "check" : "uncheck";

	}


	// public function noPodcast(){
	// 	if($this->pf_typeOne == 1){
	// 		$this->p2_checkbox = "disabled";
	// 		$this->p2_text = "line-through";
	// 	}else{
	// 		$this->p2_checkbox = "disabled";
	// 		$this->p2_text = "line-through";
	// 	}
		
	// }




	
    public function render()
    {
        return view('livewire.admin.admin-plan-create');
    }
}
