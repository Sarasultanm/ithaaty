<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Ads;
use Livewire\WithFileUploads;

class AdminCreateAds extends Component
{

	use WithFileUploads;

	public $company_name,$company_web,$company_location,$company_file;


	public function saveData(){

		if($this->company_file){ 

			$data = new Ads;
			$data->ads_name = $this->company_name;
			$data->ads_website = $this->company_web;
			$data->ads_location = $this->company_location;
			$data->ads_linktolocation = "empty";
			$data->ads_logo = $this->company_file->hashName();
			$data->ads_status = "empty";
			$data->ads_ownerid = 1;
			$data->ads_filetype = "empty";
			$data->ads_filelink = "empty";
			$data->ads_filepath = "empty";
			$data->save();

			$imagefile = $this->company_file->hashName();
	        $path = $this->company_file->storeAs('samplestorage',$imagefile);


	        session()->flash('status', 'Added new Company');

	        redirect()->to('admin/ads/');   


		}else{

			session()->flash('status', 'Company image not loaded');

	        redirect()->to('admin/ads/');  

		}

		

	}


    public function render()
    {
        return view('livewire.admin.admin-create-ads');
    }
}
