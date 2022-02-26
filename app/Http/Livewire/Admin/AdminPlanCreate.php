<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\UserPlan;
use App\Models\UserPlanFeatures;


class AdminPlanCreate extends Component
{


	public $plan_name,$plan_description;
	public $pf_typeOne,$pf_typeTwo,$pf_typeThree,$a_typeOne,$a_typeTwo,$a_typeThree,$uf_typeOne,$uf_typeTwo,$uf_typeThree,$of_typeOne,$of_typeTwo,$of_typeThree,$of_typeFour,$of_typeFive,$of_typeSix,$of_typeSeven,$of_typeEight,$of_typeNine,$of_typeTen,$result;

    public $sf_typeOne,$sf_typeTwo,$sf_typeThree,$sf_typeFour,$sf_typeFive;



	// public $p2_checkbox = "",$p2_text = "";

	public function createPlan(){
		
		$plan = new UserPlan;
		$plan->plan_name = $this->plan_name;
		$plan->plan_description = $this->plan_description;
		$plan->plan_price = "0";
		$plan->plan_days = "0";
		$plan->plan_status = "active";
		$plan->save();

		/* podcast features */ 

		$this->onCreate($plan->id,'Share','s1',$this->sf_typeOne);
        $this->onCreate($plan->id,'Comments','s2',$this->sf_typeTwo);
        $this->onCreate($plan->id,'Friends','s3',$this->sf_typeThree);
        $this->onCreate($plan->id,'Playlist','s4',$this->sf_typeFour);
        $this->onCreate($plan->id,'Favorite','s5',$this->sf_typeFive);
        /* podcast features */ 
        $this->onCreate($plan->id,'No Podcast Features','p1',$this->pf_typeOne);
        $this->onCreate($plan->id,'Embed Code','p2',$this->pf_typeTwo);
        $this->onCreate($plan->id,'Import Rss','p3',$this->pf_typeThree);
        /* analytics */
        $this->onCreate($plan->id,'No Analytics','a1',$this->a_typeOne);
        $this->onCreate($plan->id,'Default Analytics','a2',$this->a_typeTwo);
        $this->onCreate($plan->id,'Advance Analytics','a3',$this->a_typeThree);
        /* Upload Features */
        $this->onCreate($plan->id,'No Upload','u1',$this->uf_typeOne);
        $this->onCreate($plan->id,'4GB Podcast Per Month','u2',$this->uf_typeTwo);
        $this->onCreate($plan->id,'8GB Podcast Per Month','u3',$this->uf_typeThree);
        /* Other Features */
        $this->onCreate($plan->id,'Advertisement','o1',$this->of_typeOne);
        $this->onCreate($plan->id,'Monitize','o2',$this->of_typeTwo);
        $this->onCreate($plan->id,'Sponsorhip','o3',$this->of_typeThree);
        $this->onCreate($plan->id,'Reference','o4',$this->of_typeFour);
        $this->onCreate($plan->id,'QA','o5',$this->of_typeFive);
        $this->onCreate($plan->id,'Word Counter','o6',$this->of_typeSix);
        $this->onCreate($plan->id,'Default Affiliation','o7',$this->of_typeSeven);
        $this->onCreate($plan->id,'Chapter Breakdown','o8',$this->of_typeEight);    
        $this->onCreate($plan->id,'Affiliate Marketing Features','o9',$this->of_typeNine);  
        $this->onCreate($plan->id,'Create Channels','o10',$this->of_typeTen);  
        $this->onCreate($plan->id,'Create Multiple Channels','o11',$this->of_typeEleven);  
		


		session()->flash('status', 'New Plan Added');
        redirect()->to('admin/plans');   


		//$this->result = ($this->pf_typeOne == 1 ) ? "check" : "uncheck";

	}

	public function onCreate($id,$label,$type,$result){
        
		$types = new UserPlanFeatures;
        $types->planoption_planid = $id;
        $types->planoption_name = $label;   
        $types->planoption_description = "Lorem ipsum dolor sit amet, consectetur";
        $types->planoption_options = ($result == true ) ? "check" : "uncheck";
        $types->planoption_type = $type;
        $types->planoption_status = "active";
        $types->save();
         
    }


	
    public function render()
    {
        return view('livewire.admin.admin-plan-create');
    }
}
