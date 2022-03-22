 <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
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
         <!--  <div class="w-full mb-5 ">
          	 <h1 class="text-xl font-bold text-gray-800">Create you Ads</h1> 
          </div> -->

           <div class="w-full ">
          	 <x-auth-session-status-custom class="mt-4 mb-4" :status="session('status')" />
          </div>
          
          @if($checkAds->count() == 0 )
          <div class="mt-4">

          <div class="w-full mb-5 ">
          	<div class="">
          		 <h1 class="flex-1 text-xl font-bold text-gray-800">Ads Information</h1> 
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
                      <input type="text" name="name" id="name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm " wire:model="ads_name">

                    </div>
		        </div>
		        <div class="mt-5">
                    <label for="email" class="block text-sm font-medium text-gray-700">Company Website</label>
                    <div class="mt-1">
                      <input type="text" name="website" id="website" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="ads_website">

                    </div>
		        </div>

		        <div class="mt-5">
                    <label for="email" class="block text-sm font-medium text-gray-700">Company Location</label>
                    <div class="mt-1">
                      <input type="text" name="location" id="location" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="ads_location">

                    </div>
		        </div>

		         <div class="mt-5">
                    <label for="email" class="block text-sm font-medium text-gray-700">Upload Logo</label>
                    <div class="mt-1">
                      <input type="file"  class="" wire:model="ads_logo">
                    </div>
				</div>
		    </div>

		     <div class="w-full pt-5 mt-5 border-t-2 border-custom-pink">
	          	<div class="">
	          		 <h1 class="flex-1 text-xl font-bold text-gray-800">Add Supporting files</h1> 
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
                      <input type="text" name="location" id="location" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="ads_file">

                    </div>
				      </div>
	          	
	       </div>
  			<div class="mt-3 mb-5 text-right sm:mt-5">
  				              			
  		        <button wire:click="saveAds()" class="inline-flex justify-center px-4 py-2 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-custom-pink hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md">
  		         Save 
  		        </button>
  			</div>

        	<!-- table list-->

        </div>
        @else

          @if($checkAds->first()->ads_status == "Pending")


            <div class="w-full mb-5 ">
                <div class="">
                   <h1 class="flex-1 text-xl font-bold text-gray-800">Company Status</h1> 
                    <p class="mt-1 text-sm text-gray-500">
                        Please wait the confirmation for your company.
                      </p>
                </div>
                
              </div>

             <div class="mb-2">
                      <div class="relative flex items-center px-3 py-5 space-x-3 bg-white hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 ">
                        <div class="flex-shrink-0">
                          <img class="w-auto h-20" src="{{ asset('ads/company/'.$checkAds->first()->ads_logo) }}" alt="">
                        </div>
                        <div class="flex-1 min-w-0">
                          <a href="#" class="focus:outline-none">
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            <p class="font-bold text-gray-900 text-md">
                              {{ $checkAds->first()->ads_name }}
                            </p>
                            <p class="text-sm text-gray-500 truncate">
                              <svg xmlns="http://www.w3.org/2000/svg" class="float-left w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                              </svg>
                               {{ $checkAds->first()->ads_website }}
                            </p>
                             <p class="text-sm text-gray-500 truncate">
                              <svg xmlns="http://www.w3.org/2000/svg" class="float-left w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>
                              {{ $checkAds->first()->ads_location }}
                            </p>
                          </a>
                        </div>
                        <div class="flex">
                           <button class="inline-flex justify-center px-4 py-2 text-base font-medium text-black border border-transparent border-gray-300 rounded-md shadow-sm sm:col-start-2 sm:text-md">
                             {{ $checkAds->first()->ads_status }}
                            </button>
                        </div>
                      </div>
              </div>


          @elseif($checkAds->first()->ads_status == "Confirm")       


          <!-- This example requires Tailwind CSS v2.0+ -->
          <div>

             <div class="w-full mb-5 ">
                <div class="flex">
                  <div class="flex-1">
                    <h1 class="text-xl font-bold text-gray-800">Ads Video Details</h1> 
                    <p class="mt-1 text-sm text-gray-500">
                        This information will be displayed publicly so be careful what you share.
                    </p>
                  </div>
                    <a href="{{ route('editorAdsCreate') }}" class="inline-flex justify-center px-4 py-2 mt-5 text-base font-medium text-white border border-transparent border-gray-300 rounded-md shadow-sm bg-custom-pink sm:col-start-2 sm:text-md">
                      Create Ads
                    </a>
                </div>
                
              </div>

              <!-- tab list -->
            <div x-data="{
                  openTab: 4,
                  activeClasses: 'border-custom-pink text-custom-pink font-bold',
                  inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
                }" 
                class="">


                 <div class="border-b border-gray-200">
                      <ul class="flex -mb-px" >
                        <li @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses"   class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer" >
                          <a>Details</a>
                        </li>
                        <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer">
                          <a>Media Ads</a>
                        </li>
                        <li @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer">
                          <a>Social Ads</a>
                        </li>
                        <li @click="openTab = 4" :class="openTab === 4 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer">
                          <a>Context Ads</a>
                        </li>
                        {{-- <li @click="openTab = 3"  :class="openTab === 3 ? activeClasses : inactiveClasses"   class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer" >
                            <a>Create Ads</a>
                        </li> --}}
                      </ul>
                  </div>


                  <div class="w-full pt-4">

                      <div x-show="openTab === 1">
                        @include('livewire.editor.ads.tabs.details') 
                      </div> 
                      <div  x-show="openTab === 2">
                        @include('livewire.editor.ads.tabs.media-ads-list') 
                      </div>
                      <div  x-show="openTab === 3">
                        @include('livewire.editor.ads.tabs.social-ads-list') 
                      </div> 
                      <div  x-show="openTab === 4">
                        @include('livewire.editor.ads.tabs.context-ads-list') 
                      </div> 



                  </div>








            </div>

          
          </div>



          @else

          <div class="w-full mb-5 ">
              <div class="">
                 <h1 class="flex-1 text-xl font-bold text-gray-800">Company Status</h1> 
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