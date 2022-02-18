<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Category;
use App\Models\Interest;
use Auth;
use Illuminate\Support\Facades\Hash;



class AdminSettings extends Component
{

	public $categoryTitle,$userName,$oldPass,$newPass;
   public $title,$in_desc;




   public function addInterest(){

         $this->validate([
               'title' => 'required|string|unique:interests|max:50',
               'in_desc'=>'required'
         ]);

         Interest::create([
            'title'=> $this->title,
            'description' => $this->in_desc,
            'type'=>'interest',
         ]);


         session()->flash('status', 'Add new Interest');

         redirect()->to('/admin/settings');

   }

   public function updatedTitle(){
        $this->validate([
               'title' => 'unique:interests|max:50'
         ]);

   }

       
 





	public function updateName(){

        Auth::user()->update(['name'=>$this->userName]);    

        session()->flash('status', 'Update Success');

        redirect()->to('/admin/settings');

    }

    public function updatePass(){

        $users = Auth::user();
        $getPass = $users->password;
        $oPass = $this->oldPass;
        $nPass = $this->newPass; 

        if(Hash::check($oPass,$getPass)){

            $users->update(['password'=> Hash::make($nPass)]);

            session()->flash('status', 'Password has successfully change');  

        }else{
           session()->flash('status', 'Password Mismatch');     
        }

        redirect()->to('/admin/settings');

    }

     public function addCategory(){

        $data = new Category;
        $data->category_name =  $this->categoryTitle;
        $data->category_status = "active";
        $data->category_owner = Auth::user()->id;
        $data->save();

        session()->flash('status', 'Category Successfully added');

        redirect()->to('/admin/settings');

    }

     public function mount(){

        $this->userName = Auth::user()->name;

    }   




    public function render()
    {

        $category_list = Category::where('category_status','active')->get();
        $interest_list = Interest::where('status','active')->get();

        return view('livewire.admin.admin-settings',compact('category_list','interest_list'));
    }
}
