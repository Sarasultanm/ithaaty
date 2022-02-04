<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\UserPlan;
use App\Models\UserPlanFeatures;

class AdminPlanUpdate extends Component
{

    public $plan_id,$plan_name,$plan_description;
    public $pf_typeOne,$pf_typeTwo,$pf_typeThree,$a_typeOne,$a_typeTwo,$a_typeThree,$uf_typeOne,$uf_typeTwo,$uf_typeThree,$of_typeOne,$of_typeTwo,$of_typeThree,$of_typeFour,$of_typeFive,$of_typeSix,$of_typeSeven,$of_typeEight,$of_typeNine,$of_typeTen,$result;

    public $sf_typeOne,$sf_typeTwo,$sf_typeThree,$sf_typeFour,$sf_typeFive;



    public function updatePlan($id){
        $data = UserPlan::findOrFail($id);

        UserPlan::where('id',$id)
            ->update([
                'plan_name'=> $this->plan_name,
                'plan_description'=> $this->plan_description,
            ]);

        /* social features */ 
        $this->upCreate($id,'Share','s1',$this->sf_typeOne);
        $this->upCreate($id,'Comments','s2',$this->sf_typeTwo);
        $this->upCreate($id,'Friends','s3',$this->sf_typeThree);
        $this->upCreate($id,'Playlist','s4',$this->sf_typeFour);
        $this->upCreate($id,'Favorite','s5',$this->sf_typeFive);
        /* podcast features */ 
        $this->upCreate($id,'No Podcast Features','p1',$this->pf_typeOne);
        $this->upCreate($id,'Embed Code','p2',$this->pf_typeTwo);
        $this->upCreate($id,'Import Rss','p3',$this->pf_typeThree);
        /* analytics */
        $this->upCreate($id,'No Analytics','a1',$this->a_typeOne);
        $this->upCreate($id,'Default Analytics','a2',$this->a_typeTwo);
        $this->upCreate($id,'Advance Analytics','a3',$this->a_typeThree);
        /* Upload Features */
        $this->upCreate($id,'No Upload','u1',$this->uf_typeOne);
        $this->upCreate($id,'4GB Podcast Per Month','u2',$this->uf_typeTwo);
        $this->upCreate($id,'8GB Podcast Per Month','u3',$this->uf_typeThree);
        /* Other Features */
        $this->upCreate($id,'Advertisement','o1',$this->of_typeOne);
        $this->upCreate($id,'Monitize','o2',$this->of_typeTwo);
        $this->upCreate($id,'Sponsorhip','o3',$this->of_typeThree);
        $this->upCreate($id,'Reference','o4',$this->of_typeFour);
        $this->upCreate($id,'QA','o5',$this->of_typeFive);
        $this->upCreate($id,'Word Counter','o6',$this->of_typeSix);
        $this->upCreate($id,'Default Affiliation','o7',$this->of_typeSeven);
        $this->upCreate($id,'Chapter Breakdown','o8',$this->of_typeEight);    
        $this->upCreate($id,'Affiliate Marketing Features','o9',$this->of_typeNine);    
        $this->upCreate($id,'Create Channels','o10',$this->of_typeTen);

        session()->flash('status',"Plan Updated");
        redirect()->to('admin/plans/update/'.$id);  
    }



    public function upCreate($id,$label,$type,$result){
        $data = UserPlanFeatures::where(['planoption_planid'=>$id,'planoption_type'=>$type])->count();
 
        if ($data != 0) {
            // return "Update Data";
            UserPlanFeatures::where(['planoption_planid'=>$id,'planoption_type'=>$type])
            ->update(['planoption_description'=>$label,'planoption_options'=> ($result == true ) ? "check" : "uncheck" ]);

        } else {
            // return "Save new record";
            $types = new UserPlanFeatures;
            $types->planoption_planid = $id;
            $types->planoption_name = $label;   
            $types->planoption_description = "Lorem ipsum dolor sit amet, consectetur";
            $types->planoption_options = ($result == true ) ? "check" : "uncheck";
            $types->planoption_type = $type;
            $types->planoption_status = "active";
            $types->save();

        }
         
    }

    public function get_Datatypes($id,$type){

        $data = UserPlan::findOrFail($id);
        // $check_types = $data->get_type($type)->first()->planoption_options;
        $check_types = $data->get_type($type)->count();
        if($check_types != 0){
            $type = $data->get_type($type)->first()->planoption_options;
            if($type == "check"){
                return true;
            }else{
                return false;
            }
            
        }else{
            return false;
        }


    }


    public function mount($id){
         $data = UserPlan::findOrFail($id);
         $this->plan_id = $data->id;
         $this->plan_name = $data->plan_name;
         $this->plan_description = $data->plan_description;
         
         $this->pf_typeOne = $this->get_Datatypes($id,'p1');
         $this->pf_typeTwo = $this->get_Datatypes($id,'p2');
         $this->pf_typeThree = $this->get_Datatypes($id,'p3');

         $this->a_typeOne = $this->get_Datatypes($id,'a1');
         $this->a_typeTwo = $this->get_Datatypes($id,'a2');
         $this->a_typeThree = $this->get_Datatypes($id,'a3');

         $this->uf_typeOne = $this->get_Datatypes($id,'u1');
         $this->uf_typeTwo = $this->get_Datatypes($id,'u2');
         $this->uf_typeThree = $this->get_Datatypes($id,'u3');

         $this->sf_typeOne = $this->get_Datatypes($id,'s1');
         $this->sf_typeTwo = $this->get_Datatypes($id,'s2');
         $this->sf_typeThree = $this->get_Datatypes($id,'s3');
         $this->sf_typeFour = $this->get_Datatypes($id,'s4');
         $this->sf_typeFive = $this->get_Datatypes($id,'s5');

         $this->of_typeOne = $this->get_Datatypes($id,'o1');
         $this->of_typeTwo = $this->get_Datatypes($id,'o2');
         $this->of_typeThree = $this->get_Datatypes($id,'o3');
         $this->of_typeFour = $this->get_Datatypes($id,'o4');
         $this->of_typeFive = $this->get_Datatypes($id,'o5');
         $this->of_typeSix = $this->get_Datatypes($id,'o6');
         $this->of_typeSeven = $this->get_Datatypes($id,'o7');
         $this->of_typeEight = $this->get_Datatypes($id,'o8');
         $this->of_typeNine = $this->get_Datatypes($id,'o9');
         $this->of_typeTen = $this->get_Datatypes($id,'o10');
    }



    public function render()
    {
        return view('livewire.admin.admin-plan-update');
    }
}
