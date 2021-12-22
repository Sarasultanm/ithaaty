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
			      openTab: 4,
			      activeClasses: 'border-custom-pink text-custom-pink',
			      inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
			    }" 
			    class="p-6"
			  >
			  <div class="border-b border-gray-200">
			  	<ul class="-mb-px flex" >
			      <li @click="openTab = 4"  :class="openTab === 4 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm" >
			        <a>Profile</a>
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
			                  	<h3 class="text-md leading-6 font-medium text-gray-900">Username</h3>
			                    <input wire:model="userAlias" type="text" name="first_name" id="first_name" autocomplete="cc-given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
			                  </div>

			                  <div class="col-span-4 sm:col-span-4 text-right">
			                    <button type="submit" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">Update</button>
			                  </div>

			                </div>



			              </div>
			             
			            </div>
			          </form>

				    </section>

				    <section class="mt-5">

			        	<div class="mt-6 flex flex-col lg:flex-row shadow sm:rounded-md sm:overflow-hidden bg-white py-6 px-4 ">
			                  <div class="flex-grow space-y-6 ">
			                    <div>
			                      <label for="username" class="block text-sm font-medium text-gray-700">
			                        Name
			                      </label>
			                      <div class="mt-1 rounded-md shadow-sm flex">
			                       <!--  <span class="bg-gray-50 border border-r-0 border-gray-300 rounded-l-md px-3 inline-flex items-center text-gray-500 sm:text-sm">
			                          workcation.com/
			                        </span>
			                        <input type="text" name="username" id="username" autocomplete="username" class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300" value="deblewis"> -->
			                        <!-- <span class="bg-gray-50 border border-r-0 border-gray-300 rounded-l-md px-3 inline-flex items-center text-gray-500 sm:text-sm">
			                          workcation.com/
			                        </span> -->
			                        <input type="text" name="username" id="username" autocomplete="username" class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300" value="deblewis">
			                      </div>
			                    </div>

			                    <div>
			                      <label for="about" class="block text-sm font-medium text-gray-700">
			                        About
			                      </label>
			                      <div class="mt-1">
			                        <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-sky-500 focus:border-sky-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
			                      </div>
			                      <p class="mt-2 text-sm text-gray-500">
			                        Brief description for your profile. URLs are hyperlinked.
			                      </p>
			                    </div>
			                  </div>

			                  <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
			                    <p class="text-sm font-medium text-gray-700" aria-hidden="true">
			                      Photo
			                    </p>
			                    <!-- <div class="mt-1 lg:hidden">
			                      <div class="flex items-center">
			                        <div class="flex-shrink-0 inline-block rounded-full overflow-hidden h-12 w-12" aria-hidden="true">
			                          <img class="rounded-full h-full w-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=320&amp;h=320&amp;q=80" alt="">
			                        </div>
			                        <div class="ml-5 rounded-md shadow-sm">
			                          <div class="group relative border border-gray-300 rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-sky-500">
			                            <label for="mobile-user-photo" class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
			                              <span>Change</span>
			                              <span class="sr-only"> user photo</span>
			                            </label>
			                            <input id="mobile-user-photo" name="user-photo" type="file" class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
			                          </div>
			                        </div>
			                      </div>
			                    </div> -->
			                    <div x-data="{ isUploading: false, progress: 0, success: false, error:false }" 
                                               x-on:livewire-upload-start="isUploading = true"
                                               x-on:livewire-upload-finish="isUploading = false,success = true" 
                                               x-on:livewire-upload-error="isUploading = false,error= true"
                                               x-on:livewire-upload-progress="progress = $event.detail.progress">

			                                <div class="hidden relative rounded-full overflow-hidden lg:block">
			                                 @if(Auth::user()->get_profilephoto->count() == 0)

				                                  @if($profilePhoto)
							                    		  <img class="relative rounded-full w-40 h-40" src="{{ $profilePhoto->temporaryUrl() }}" alt="">
							                      @else
							                    		  <img class="relative rounded-full w-40 h-40" src="{{ asset('images/default_user.jpg') }}" alt=""> 
							                      @endif

			                                 @else

			                                 	  @if($profilePhoto) 
							                    		  <img class="relative rounded-full w-40 h-40" src="{{ $profilePhoto->temporaryUrl() }}" alt="">
							                      @else
							                      		  <?php 
							                      		  	$img_path = Auth::user()->get_profilephoto->first()->gallery_path; 
							                      		  ?>
							                    		  <img class="relative rounded-full w-40 h-40" src="{{ asset('users/profile_img/'.$img_path) }}" alt=""> 
							                      @endif

			                                 @endif
						                    <!--   @if($profilePhoto)
						                    		  <img class="relative rounded-full w-40 h-40" src="{{ $profilePhoto->temporaryUrl() }}" alt="">
						                      @else
						                    		  <img class="relative rounded-full w-40 h-40" src="{{ asset('images/default_user.jpg') }}" alt=""> 
						                      @endif -->
						                      
						                      <label for="desktop-user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
						                        <button>Change</button>
						                        <span class="sr-only"> user photo</span>
						                        <input type="file" id="desktop-user-photo" name="user-photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md" wire:model="profilePhoto">
						                      </label>
						                    </div>

                                               <div class="mt-5">
                                                <div x-show="isUploading"  class="relative pt-1">
                                                 <!--  <div class="text-center text-gray-700">
                                                    Please wait while uploading the file .. <input x-bind:value="`${progress}%`" disabled style="width: 60px;">
                                                  </div> -->
                                                  <div  class="overflow-hidden h-2 text-xs flex rounded bg-purple-200 progress">
                                                    <div x-bind:style="`width:${progress}%`"
                                                      class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-custom-pink"
                                                    ></div>
                                                  </div>
                                                </div>
                                                <center>
                                                	<button wire:click="savePhoto()" x-show="success" class="py-2 px-4 text-center  text-white bg-custom-pink font-bold text-sm">Save Changes</button>
                                                </center>
                                                <!-- <button type="submit" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">Update</button> -->

                                                 <p x-show="error" class="text-center font-bold text-red-800 text-sm">*Error to upload the file</p> 
                                              </div>

                                </div>
			            

			                  </div>
			                </div>
			        

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


				    <section class="mt-5">

			
			            <div class="shadow sm:rounded-md sm:overflow-hidden">
			              <div class="bg-white py-6 px-4 sm:p-6">
			                <div class="grid grid-cols-4 gap-6">
			                  <div class="col-span-4 sm:col-span-2">
			                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Generete your RSS link.</h2>
			                  <p class="mt-1 text-sm text-gray-500">Your RSS feed allows your podcast to appear in other podcast apps</p>
			                  </div>

			                  <div class="col-span-4 sm:col-span-2 text-right mt-4">
			                    <a href="" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white">
			                   Open Rss
			                </a>
			                  </div>

			                </div>
			              </div>
			             
			            </div>

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