 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings Dashboard') }}
        </h2>
  </x-slot>

   <div class="">
        <div class="">
            


<div class="min-h-screen bg-gray-100">
  <!--
    When the mobile menu is open, add `overflow-hidden` to the `body` element to prevent double scrollbars

    Menu open: "fixed inset-0 z-40 overflow-y-auto", Menu closed: ""
  -->
   @include('layouts.editor.header')

  <div class="py-10">

    <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
      <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
      	<!-- sidebar -->
        @include('layouts.editor.sidebar')
        <!-- sidebar -->
      </div>
      <main class="col-span-10">

        <div class="mt-4">
          <div class="mb-5 w-full ">
          	 <h1 class="font-bold text-gray-800 text-xl">Create you Ads</h1> 
          </div>

           <div class="w-full ">
          	 <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>
          
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

        	<div class="border-t-2 border-green-500 ">	
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
                    <label for="email" class="block text-sm font-medium text-gray-700">Upload Logo</label>
                    <div class="mt-1">
                      <input type="file"  class="" wire:model="ads_logo">
                    </div>
				</div>
		    </div>
			<div class="mt-3 text-right sm:mt-5 mb-5">
				              			
		        <button wire:click="addAds()" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md">
		         Save 
		        </button>
			</div>

        	<!-- table list-->

        </div>


          
            <!-- More questions... -->
          
        </div>
      </main>
      <!-- aside -->
    
      <!-- aside -->
    </div>
  </div>
</div>





















        </div>
</div>