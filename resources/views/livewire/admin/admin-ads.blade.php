


 <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Admin Ads') }}
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

         <div class="w-full ">
          	
          	 <x-auth-session-status-custom class="mt-4 mb-4" :status="session('status')" />
          	 
          </div>


          <div class="w-full mb-5 ">
          	<div class="flex">
          		 <h1 class="flex-1 text-xl font-bold text-gray-800">Ads List</h1> 
          	   <a href="{{route('adminAdsCreate')}}" class="inline-flex justify-center px-4 py-2 text-base font-medium text-white bg-green-500 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Add New
                </a> 
          	</div>
          	
          </div>
        	

        	<!-- table list -->
        	<div x-data="{
			      openTab: 1,
			      activeClasses: 'border-indigo-500 text-indigo-600',
			      inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
			    }" 
			    class="">



			    <div class="border-b border-gray-200">
				  	<ul class="flex -mb-px" >
				      <li @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses"   class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer" >
				        <a>Company List</a>
				      </li>
				      <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer">
				        <a>Media Ads List</a>
				      </li>
					  <li @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer">
				        <a>Social Ads List</a>
				      </li>
					  <li @click="openTab = 4" :class="openTab === 4 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer">
				        <a>Context Ads List</a>
				      </li>
				    </ul>
				</div>


				<div class="w-full pt-4">

					<div x-show="openTab === 1">
                        @include('livewire.admin.admin-ads.tabs.company-list') 
					</div> 
					<div  x-show="openTab === 2">
						@include('livewire.admin.admin-ads.tabs.media-ads-list') 
					</div>
					<div  x-show="openTab === 3">
						@include('livewire.admin.admin-ads.tabs.social-ads-list') 
					</div> 
					<div  x-show="openTab === 4">
						@include('livewire.admin.admin-ads.tabs.context-ads-list') 
					</div> 	

					
				</div>	


			</div>    

        	<!-- table list -->




        	<!-- table list-->

        </div>
      </main>
      <!-- aside -->
     
      <!-- aside -->
    </div>
  </div>
</div>



















  <!--  <div class="bottom-0 hidden text-xs" wire:poll.750ms> Current time: {{ now() }} </div> -->

        </div>
</div>






