<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;



class AdminSettings extends Component
{

	public $categoryTitle,$userName,$oldPass,$newPass;

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

     public function mount(){

        $this->userName = Auth::user()->name;

    }   




    public function render()
    {
        return view('livewire.admin.admin-settings');
    }
}
