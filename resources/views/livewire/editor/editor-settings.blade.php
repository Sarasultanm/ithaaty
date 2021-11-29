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
          	 <h1 class="font-bold text-gray-800 text-xl">Settings</h1> 
          </div>

           <div class="w-full ">
          	 <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>
          
             <div 
			    x-data="{
			      openTab: 1,
			      activeClasses: 'border-custom-pink text-custom-pink',
			      inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
			    }" 
			    class="p-6"
			  >
			  <div class="border-b border-gray-200">
			  	<ul class="-mb-px flex" >
			      <li @click="openTab = 4"  :class="openTab === 4 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm" >
			        <a>My Account </a>
			      </li>
			      <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm">
			        <a>Password</a>
			      </li>
			     <!--  <li @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses" class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm" >
			        <a>Categories</a>
			      </li> -->
			      <li @click="openTab = 1" :class="openTab === 1 ? activeClasses : inactiveClasses" class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm" >
			        <a>RSS Feed</a>
			      </li>
			    </ul>
			  </div>
			
			    <div class="w-full pt-4">
			      <div x-show="openTab === 4">
			      	
			      	 <section>

			           <form wire:submit.prevent="updateName"> 
			            <div class="shadow sm:rounded-md sm:overflow-hidden">
			              <div class="bg-white py-6 px-4 sm:p-6">
			                <div>
			                  <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">User Profile</h2>
			                  <p class="mt-1 text-sm text-gray-500">Update your personal information.</p>
			                </div>

			                <div class="mt-6 grid grid-cols-4 gap-6">

			                  <div class="col-span-4 sm:col-span-4">
			                  	<h3 class="text-md leading-6 font-medium text-gray-900">Name</h3>
			                    <input wire:model="userName" type="text" name="first_name" id="first_name" autocomplete="cc-given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
			                  </div>

			                  <div class="col-span-4 sm:col-span-4 text-right">
			                    <button type="submit" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">Update</button>
			                  </div>

			                </div>



			              </div>
			             
			            </div>
			          </form>

				    </section>


			      </div>
			      <div x-show="openTab === 2">
			      	
			      	<section>

			           <form wire:submit.prevent="updatePass"> 
			            <div class="shadow sm:rounded-md sm:overflow-hidden">
			              <div class="bg-white py-6 px-4 sm:p-6">
			                <div>
			                  <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Password</h2>
			                  <p class="mt-1 text-sm text-gray-500">Update your password.</p>
			                </div>

			                <div class="mt-6 grid grid-cols-4 gap-6">

			                  <div class="col-span-4 sm:col-span-4">
			                   <h3 class="text-md leading-6 font-medium text-gray-900">Old Password</h3>
			                    <input wire:model="oldPass" type="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
			                  </div>

			                  <div class="col-span-4 sm:col-span-4">
			                   <h3 class="text-md leading-6 font-medium text-gray-900">New Password</h3>
			                    <input wire:model="newPass" type="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
			                  </div>

			                  <div class="col-span-4 sm:col-span-4 text-right">
			                    <button type="submit" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex float-right text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">Update</button>
			                  </div>

			                </div>



			              </div>
			             
			            </div>
			          </form>

				    </section>


			      </div>

			     <div x-show="openTab === 1">
			     	<section aria-labelledby="payment_details_heading">

			
			            <div class="shadow sm:rounded-md sm:overflow-hidden">
			              <div class="bg-white py-6 px-4 sm:p-6">
			                <div>
			                  <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">RSS Link</h2>
			                  <p class="mt-1 text-sm text-gray-500">Your RSS feed allows your podcast to appear in other podcast apps, in some cases automatically.</p>
			                </div>

			                <div class="mt-6 grid grid-cols-4 gap-6">
			                  <div class="col-span-4 sm:col-span-2">
			                    <input wire:model="rss_link" type="text" name="first_name" id="first_name" autocomplete="cc-given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
			                  </div>

			                  <div class="col-span-4 sm:col-span-2 text-right">
			                    <button wire:click="loadRss()" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white">
			                  Load RSS
			                </button>
			                  </div>

			                </div>
			              </div>
			             
			            </div>

				    </section>

				     <section >

				    	<?php $rss_quatity = $rss_data['item_quantity'] ?? 0; ?>
				 
						 <?php for ($i = 0; $i < $rss_quatity; $i++){ ?>
			            <div class="shadow sm:rounded-md sm:overflow-hidden mt-5">
			              <div class="bg-white py-6 px-4 sm:p-6">
			                <div class="grid grid-cols-4 gap-6">
			                  <div class="col-span-1 ">
			                  	<img class="w-full h-auto " loading="lazy" src="{{ $rss_data['image_url'] ?? ''  }}" alt="">
			                  </div>
			                  <div class="col-span-3 text-left relative">
			                   		<h2 class="text-lg leading-6 font-bold text-gray-900">{{ $rss_data["items"][$i]['title'] ?? ''  }}</h2>
			                   		<p class="mt-1 text-sm text-gray-500">Author : {{ $rss_data["author"] ?? ''  }}</p>
			                  		<p class="mt-5 text-md text-gray-500">{{ $rss_data["items"][$i]['description'] ?? ''  }}</p>
			                  		<div class="mt-5 mb-5">
					       
								</div>

									
			                  </div>


			                </div>
			              </div>
			             
			            </div>
			             <?php } ?>
			             
					   
				    </section>
				
			     </div>	
			    </div>
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