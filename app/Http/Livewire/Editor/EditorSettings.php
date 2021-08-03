<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use App\Models\User;
use App\Models\Audio;
use App\Models\Category;
use App\Models\UserFollow;
use Auth;
use Illuminate\Support\Facades\Hash;

class EditorSettings extends Component
{


	 public $categoryTitle,$userName,$oldPass,$newPass;



	 public function addCategory(){

	    // $this->validate();	

        $data = new Category;
        $data->category_name =  $this->categoryTitle;
        $data->category_status = "active";
        $data->category_owner = Auth::user()->id;
        $data->save();

        // $audiofile = $this->audiofile->hashName();
        // $path = $this->audiofile->storeAs('audio',$audiofile);

        session()->flash('status', 'Post Success');

        redirect()->to('/editor/settings');


	}

    public function updateName(){

        Auth::user()->update(['name'=>$this->userName]);    

        session()->flash('status', 'Update Success');

        redirect()->to('/editor/settings');



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

        redirect()->to('/editor/settings');

    }





    public function mount(){

        $this->userName = Auth::user()->name;

    }   

    public function render()
    {

    	$categoryList = Category::where('category_owner',Auth::user()->id);

        return view('livewire.editor.editor-settings',compact('categoryList'));
    }
}
