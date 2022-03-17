 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings Dashboard') }}
        </h2>
  </x-slot>

   <div class="">
        <div class="">
            


@if(Auth::user()->get_csm('csm_pagebg','active')->count() != 0 )
   <div class="min-h-screen" style="background:{{Auth::user()->get_csm('csm_pagebg','active')->first()->csm_value }};">
@else
   <div class="min-h-screen bg-gray-100">
@endif
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
      <main class="xl:col-span-10 lg:col-span-9">

        <div class="mt-4">
         <!--  <div class="mb-5 w-full ">
          	 <h1 class="font-bold text-gray-800 text-xl">Create you Ads</h1> 
          </div> -->

           <div class="w-full ">
          	 <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>
          
          @if($checkAds->count() == 0 )
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
                    <label for="email" class="block text-sm font-medium text-gray-700">Upload Logo</label>
                    <div class="mt-1">
                      <input type="file"  class="" wire:model="ads_logo">
                    </div>
				</div>
		    </div>

		     <div class="mt-5 w-full border-t-2 border-custom-pink pt-5">
	          	<div class="">
	          		 <h1 class="flex-1  font-bold text-gray-800 text-xl">Add Supporting files</h1> 
	          	  	<p class="mt-1 text-sm text-gray-500">
	                    Put the link of the supported files.
	                  </p>
	          	</div>

	          	 <div class="mt-5">
                    <!-- <label for="email" class="block text-sm font-medium text-gray-700">Upload File</label>
                    <div class="mt-1">
                      <input type="file"  class="" wire:model="ads_file">
                    </div> -->
                    <div class="mt-1">
                      <input type="text" name="location" id="location" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="ads_file">

                    </div>
				      </div>
	          	
	       </div>
  			<div class="mt-3 text-right sm:mt-5 mb-5">
  				              			
  		        <button wire:click="saveAds()" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md">
  		         Save 
  		        </button>
  			</div>

        	<!-- table list-->

        </div>
        @else

          @if($checkAds->first()->ads_status == "Pending")


            <div class="mb-5 w-full ">
                <div class="">
                   <h1 class="flex-1  font-bold text-gray-800 text-xl">Company Status</h1> 
                    <p class="mt-1 text-sm text-gray-500">
                        Please wait the confirmation for your company.
                      </p>
                </div>
                
              </div>

             <div class="mb-2">
                      <div class="relative   bg-white py-5 px-3 flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 ">
                        <div class="flex-shrink-0">
                          <img class="h-20 w-auto" src="{{ asset('ads/company/'.$checkAds->first()->ads_logo) }}" alt="">
                        </div>
                        <div class="flex-1 min-w-0">
                          <a href="#" class="focus:outline-none">
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            <p class="text-md font-bold text-gray-900">
                              {{ $checkAds->first()->ads_name }}
                            </p>
                            <p class="text-sm text-gray-500 truncate">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 float-left mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                              </svg>
                               {{ $checkAds->first()->ads_website }}
                            </p>
                             <p class="text-sm text-gray-500 truncate">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5  float-left  mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>
                              {{ $checkAds->first()->ads_location }}
                            </p>
                          </a>
                        </div>
                        <div class="flex">
                           <button class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2  text-base font-medium text-black border-gray-300 sm:col-start-2 sm:text-md">
                             {{ $checkAds->first()->ads_status }}
                            </button>
                        </div>
                      </div>
              </div>


          @elseif($checkAds->first()->ads_status == "Confirm")       


          <!-- This example requires Tailwind CSS v2.0+ -->
          <div>

             <div class="mb-5 w-full ">
                <div class="flex">
                  <div class="flex-1">
                    <h1 class="font-bold text-gray-800 text-xl">Ads Video Details</h1> 
                    <p class="mt-1 text-sm text-gray-500">
                        This information will be displayed publicly so be careful what you share.
                    </p>
                  </div>
                    <a href="{{ route('editorAdsCreate') }}" class="mt-5 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2  text-base font-medium text-white border-gray-300 bg-custom-pink  sm:col-start-2 sm:text-md">
                      Create Ads
                    </a>
                </div>
                
              </div>

              <!-- tab list -->
            <div x-data="{
                  openTab: 1,
                  activeClasses: 'border-custom-pink text-custom-pink font-bold',
                  inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
                }" 
                class="">


                 <div class="border-b border-gray-200">
                      <ul class="-mb-px flex" >
                        <li @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
                          <a>Details</a>
                        </li>
                        <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                          <a>Ads List</a>
                        </li>
                        {{-- <li @click="openTab = 3"  :class="openTab === 3 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
                            <a>Create Ads</a>
                        </li> --}}
                      </ul>
                  </div>


                  <div class="w-full pt-4">

                      <div x-show="openTab === 1">
                        @include('livewire.editor.ads.tabs.details') 
                      </div> 

                      <div  x-show="openTab === 2">
                        @include('livewire.editor.ads.tabs.ads-list') 
                      </div>
                      <div  x-show="openTab === 3">
                        {{-- @include('livewire.editor.ads.tabs.create-ads')  --}}
                      </div> 



                  </div>








            </div>

          
          </div>



          @else

          <div class="mb-5 w-full ">
              <div class="">
                 <h1 class="flex-1  font-bold text-gray-800 text-xl">Company Status</h1> 
                  <p class="mt-1 text-sm text-gray-500">
                      Please wait the confirmation for your company.
                    </p>
              </div> 
          </div>

          

          @endif



          



        @endif

          
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