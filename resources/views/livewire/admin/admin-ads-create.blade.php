


 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Create') }}
        </h2>
  </x-slot>

 <div class="">
 <div class="">
            


<div class="min-h-screen bg-gray-100">
  <!--
    When the mobile menu is open, add `overflow-hidden` to the `body` element to prevent double scrollbars

    Menu open: "fixed inset-0 z-40 overflow-y-auto", Menu closed: ""
  -->


  <div class="py-10">

    <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
      <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
      	<!-- sidebar -->
        @include('layouts.admin.sidebar')
        <!-- sidebar -->
      </div>
      <main class="lg:col-span-12 xl:col-span-10">

        <div class="mt-4">
          <div class="mb-5 w-full ">
          	<div class="">
          		 <h1 class="flex-1  font-bold text-gray-800 text-xl">Ads Information</h1> 
          	  	<p class="mt-1 text-sm text-gray-500">
                    This information will be displayed publicly so be careful what you share.
                  </p>
          	</div>
          	
          </div>
        	 
        	<!-- table list -->

        	<div class="border-t-2 border-custom-pink ">	
	        	<div class="mt-5">
                    <label for="email" class="block text-sm font-medium text-gray-700">Company Name</label>
                    <div class="mt-1">
                      <input type="text" name="name" id="name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md " wire:model="ads_name">

                    </div>
		        </div>
		        <div class="mt-5">
                    <label for="email" class="block text-sm font-medium text-gray-700">Company Website</label>
                    <div class="mt-1">
                      <input type="text" name="website" id="website" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="ads_website">

                    </div>
		        </div>

		        <div class="mt-5">
                    <label for="email" class="block text-sm font-medium text-gray-700">Company Location</label>
                    <div class="mt-1">
                      <input type="text" name="location" id="location" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="ads_location">

                    </div>
		        </div>

		         <div class="mt-5">
               <div x-data="{ isUploading: false, progress: 0, success: false, error:false }" 
                 x-on:livewire-upload-start="isUploading = true"
                 x-on:livewire-upload-finish="isUploading = false,success = true" 
                 x-on:livewire-upload-error="isUploading = false,error= true"
                 x-on:livewire-upload-progress="progress = $event.detail.progress">

                    <label for="email" class="block text-sm font-medium text-gray-700">Upload Logo</label>
                    <div class="mt-1">
                      <input type="file"  class="" wire:model="ads_logo">
                    </div>

                    <div class="mt-5">
                      <div x-show="isUploading"  class="relative pt-1">
                        <div class="text-center text-gray-700">
                          Please wait while uploading the file .. <input x-bind:value="`${progress}%`" disabled style="width: 60px;">
                        </div>
                        <div  class="overflow-hidden h-2 text-xs flex rounded bg-purple-200 progress">
                          <div x-bind:style="`width:${progress}%`"
                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-custom-pink"
                          ></div>
                        </div>

                      </div>
                      <p x-show="success" class="text-center text-custom-pink font-bold text-gray-800 text-sm">File Upload Complete</p> 
                       <p x-show="error" class="text-center font-bold text-red-800 text-sm">*Error to upload the file</p> 
                    </div>

                  <!--   <div class="mt">
                      @if($ads_logo)
                         <p class="flex-1 font-regular text-gray-800 text-sm">File Upload Complete</p> 
                      @endif
                    </div>
 -->

                   </div>

				    </div>


		    </div>
  			<div class="mt-3 text-right sm:mt-5 mb-5">
  				              			
  		        <button wire:click="addAds()" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md">
  		         Save 
  		        </button>
  			</div>

        	<!-- table list-->

        </div>
        
      </main>
      <!-- aside -->
     
      <!-- aside -->
    </div>
  </div>
</div>



















  <!--  <div class="text-xs bottom-0 hidden" wire:poll.750ms> Current time: {{ now() }} </div> -->

        </div>
</div>






