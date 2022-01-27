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
          <div class="mb-5 w-full ">
          	 <h1 class="font-bold text-gray-800 text-xl">Settings</h1> 
          </div>

           <div class="w-full ">
          	 <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>
          
             <div 
			    x-data="{
			      openTab: 3,
			      activeClasses: 'border-custom-pink text-custom-pink',
			      inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
			    }" 
			    class=""
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

        @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
        @else
        	 @if(Auth::user()->get_plan->check_features('p3')->count() != 0 )
			      <li @click="openTab = 1" :class="openTab === 1 ? activeClasses : inactiveClasses" class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm" >
			        <a>RSS Feed</a>
			      </li>
			      @endif
			  @endif

			  <li @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm">
			        <a>Customize</a>
			      </li>
			    </ul>
			  </div>
			
			    <div class="w-full pt-4">
			    	<div x-show="openTab === 3">

			    			<section>
					            <div class="shadow sm:rounded-md sm:overflow-hidden">
					              <div class="bg-white py-6 px-4 sm:p-6">
					                <div>
					                  <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Customization</h2>
					                  <p class="mt-1 text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla est turpis</p>
					                </div>
					               
					                <div class="mt-6 grid grid-cols-4 gap-6">
					                  <div class="col-span-4 sm:col-span-4">

					                  	<!-- color picker -->
					                   <!--  <div x-data="{isOpen: false, colors: ['#2196F3', '#009688', '#9C27B0', '#FFEB3B', '#afbbc9', '#4CAF50', '#2d3748', '#f56565', '#ed64a6'], colorSelected: '#009688'}" x-cloak>
																<div class="w-full">
																	 
																	<div class="mb-5">
																		<div class="flex items-center">
																			<div>
																				<label for="colorSelected" class="block font-regular mb-1">Header Background Colors</label>
																				<input id="colorSelected" type="text" placeholder="Pick a color"
																					class="border border-transparent shadow px-4 py-2 leading-normal text-gray-700 bg-white rounded-md focus:outline-none focus:shadow-outline"
																					readonly 
																					x-model="colorSelected"
																					wire:model="header_bg">
																			</div>
																			<div class="relative ml-3 mt-8">
																				<button type="button" @click="isOpen = !isOpen" 
																					class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow"
																					:style="`background: ${colorSelected}; color: white`"
																				>
																					<svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z"/><path d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z"/></svg>
																				</button>

																				<div x-show="isOpen" @click.away="isOpen = false" x-transition:enter="transition ease-out duration-100 transform"
																					x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
																					x-transition:leave="transition ease-in duration-75 transform"
																					x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
																					class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg z-30">
																					<div class="rounded-md bg-white shadow-xs px-4 py-3">
																						<div class="flex flex-wrap -mx-2">
																						<template x-for="(color, index) in colors" :key="index">
																							<div 
																								class="px-2"
																							>
																								<template x-if="colorSelected === color">	
																									<div
																										class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white"
																										:style="`background: ${color}; box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);`"
																									></div>
																								</template>
																								
																								<template x-if="colorSelected != color">
																									<div
																										@click="colorSelected = color"
																										@keydown.enter="colorSelected = color"
																										role="checkbox"
																										  tabindex="0"
																										  :aria-checked="colorSelected"	
																										class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white focus:outline-none focus:shadow-outline"
																										:style="`background: ${color};`"

																									></div>
																								</template>
																							</div>
																						</template>
																					</div>
																					</div>
																				</div>
																			</div>
																			<div class="relative ml-3 mt-8">
																				<button wire:click="saveCustom()" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white">Save Changes
									                		</button>
																			</div>
																		</div>
																	</div>
																	 
																</div>
															</div> -->
															<!-- color picker -->
															
															<!-- color picker -->
					                    <div x-data="{isOpen: false,header_bg:'{{$this->header_bg}}'}" x-cloak>
																<div class="w-full">
																	 
																	<div class="mb-5">
																		<div class="flex items-center">
																			<div>
																				<label for="colorSelected" class="block font-regular mb-1">Header Background Colors</label>
																				<input id="colorSelected" type="text" placeholder="Pick a color"
																					class="border border-transparent shadow px-4 py-2 leading-normal text-gray-700 bg-white rounded-md focus:outline-none focus:shadow-outline"
																					wire:model="header_bg" >
																			</div>
																			<div class="relative ml-3 mt-8">
																				<button type="button" @click="isOpen = !isOpen" 
																					class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow bg-custom-pink text-white"
																					:style="`background: ${header_bg}; color: white`"
																				>
																					<svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z"/><path d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z"/></svg>
																				</button>

																				<div x-show="isOpen" @click.away="isOpen = false" x-transition:enter="transition ease-out duration-100 transform"
																					x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
																					x-transition:leave="transition ease-in duration-75 transform"
																					x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
																					class="origin-top-right absolute right-0 mt-2 w-52 rounded-md shadow-lg z-30">
																					<div class="rounded-md bg-white shadow-xs px-4 py-3">
																						<div class="flex flex-wrap -mx-2">
																						  @foreach($colors as $color)
																							<div class="px-2">
																								 
																									<button wire:click="putColor('header','{{$color}}')" class="w-8 h-8 inline-flex rounded-full cursor-pointer border-solid border-white border-4 focus:outline-none focus:shadow-outline" 
																									:style="`background: {{$color}};box-shadow: 0 0 0 1px rgb(0 0 0 / 10%);`"
																									></button>
																									
																								
																									
																							</div>
																							@endforeach	
																						
																					</div>
																					</div>
																				</div>
																			</div>
																			<div class="relative ml-3 mt-8">
																				<button wire:click="updateBackground('header')" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white">Save Changes
									                		</button>
																			</div>
																		</div>
																	</div>
																	 
																</div>
															</div>
															<!-- color picker -->
															<div class="relative">
															  <div class="absolute inset-0 flex items-center" aria-hidden="true">
															    <div class="w-full border-t border-gray-300"></div>
															  </div>
															  <div class="relative flex justify-center">
															    <span class="bg-white px-2 text-gray-500">
															      <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
															        <path fill="#6B7280" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
															      </svg>
															    </span>
															  </div>
															</div>
															<!-- color picker -->
					                    <div x-data="{isOpen: false,page_bg:'{{$this->page_bg}}'}" x-cloak>
																<div class="w-full">
																	 
																	<div class="mb-5">
																		<div class="flex items-center">
																			<div>
																				<label for="colorSelected" class="block font-regular mb-1">Page Background Colors</label>
																				<input id="colorSelected" type="text" placeholder="Pick a color"
																					class="border border-transparent shadow px-4 py-2 leading-normal text-gray-700 bg-white rounded-md focus:outline-none focus:shadow-outline"
																					wire:model="page_bg" >
																			</div>
																			<div class="relative ml-3 mt-8">
																				<button type="button" @click="isOpen = !isOpen" 
																					class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow bg-custom-pink text-white"
																					:style="`background: ${page_bg}; color: white`"
																				>
																					<svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z"/><path d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z"/></svg>
																				</button>

																				<div x-show="isOpen" @click.away="isOpen = false" x-transition:enter="transition ease-out duration-100 transform"
																					x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
																					x-transition:leave="transition ease-in duration-75 transform"
																					x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
																					class="origin-top-right absolute right-0 mt-2 w-52 rounded-md shadow-lg z-30">
																					<div class="rounded-md bg-white shadow-xs px-4 py-3">
																						<div class="flex flex-wrap -mx-2">
																						  @foreach($colors as $color)
																							<div class="px-2">
																								 
																									<button wire:click="putColor('page','{{$color}}')" class="w-8 h-8 inline-flex rounded-full cursor-pointer border-solid border-white border-4 focus:outline-none focus:shadow-outline" 
																									:style="`background: {{$color}};box-shadow: 0 0 0 1px rgb(0 0 0 / 10%);`"
																									></button>
																									
																								
																									
																							</div>
																							@endforeach	
																						
																					</div>
																					</div>
																				</div>
																			</div>
																			<div class="relative ml-3 mt-8">
																				<button wire:click="updateBackground('page')" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white">Save Changes
									                		</button>
																			</div>
																		</div>
																	</div>
																	 
																</div>
															</div>
															<!-- color picker -->


					                  </div>
					                
					                  <div class="col-span-6 sm:col-span-4 text-right mt-36">
					                    	
					                		&nbsp;
					                  </div>


					                </div>
					              </div>
					            </div>
						    </section>

			    	</div>

			      <div x-show="openTab === 4">
			      	
			      	 <section>

			           <form wire:submit.prevent="updateAlias"> 
			            <div class="shadow sm:rounded-md sm:overflow-hidden">
			              <div class="bg-white py-6 px-4 sm:p-6">
			                <div>
			                  <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Channel</h2>
			                  <p class="mt-1 text-sm text-gray-500">Update your personal information.</p>
			                </div>

			                <div class="mt-6 grid grid-cols-4 gap-6">

			                  <div class="col-span-4 xl:col-span-2 lg:col-span-2 sm:col-span-3">
			                  	<h3 class="text-md leading-6 font-medium text-gray-900">Channel Name</h3>
			                    <input wire:model="userAlias" type="text" name="first_name" id="first_name" autocomplete="cc-given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
			                  </div>

			                  <div class="col-span-4 xl:col-span-2 lg:col-span-2 sm:col-span-1 text-right">
			                    <button type="submit" class="mt-5 bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">Update</button>
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
			                        <input type="text" class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300" wire:model="userName" wire:keydown.enter="updateName()">
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
			     	  @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")

         

        		@else
        		@if(Auth::user()->get_plan->check_features('p3')->count() != 0 )
			     
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
			                    <button wire:click="loadRss()" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white">Upload RSS
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

				    @if(Auth::user()->get_audio_type('Upload')->count() != 0 )
						    	@if(Auth::user()->get_rsslink->count() == 0)
						    		<section class="mt-5">
						            <div class="shadow sm:rounded-md sm:overflow-hidden">
						              <div class="bg-white py-6 px-4 sm:p-6">
						                <div class="grid grid-cols-4 gap-6">
						                  <div class="col-span-4 sm:col-span-2">
						                    <!-- <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Create RSS Link</h2> -->
						                  <p class="mt-1 text-sm text-gray-500">Create your unique rss code to generate a custom rss link.</p>
						                
																  <div class="mt-1 flex rounded-md shadow-sm">
																    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
																     https://ithaaty.com/feed/
																    </span>
																    <input type="text" name="company-website" id="company-website" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300" wire:model="rss_name" placeholder="Enter Text here">

																  </div>
																	@error('rss_name') <span class="text-xs text-red-600">Required Fields</span> @enderror
						                  </div>
						                  <div class="col-span-4 sm:col-span-2 text-right mt-5">
						                    <button wire:click="createRssLink()" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white">Create Link
						                		</button>
						                  </div>
						                </div>
						              </div>
						            </div>
							    </section>


						    	@else
						    		<section class="mt-5">
								            <div class="shadow sm:rounded-md sm:overflow-hidden">
								              <div class="bg-white py-6 px-4 sm:p-6">
								                <div class="grid grid-cols-4 gap-6">
								                  <div class="col-span-4 sm:col-span-2">
								                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">RSS Links.</h2>
								                  <p class="mt-1 text-sm text-gray-500">Your RSS feed allows your podcast to appear in other podcast apps.<br> This is your rss link <b><a target="_blank" href="{{ route('generateFeed',['rsslink' => Auth::user()->get_rsslink->first()->rss_links]) }}" >( https://ithaaty.com/feed/{{Auth::user()->get_rsslink->first()->rss_links}} )</a></b></p>
								                  <p class="pt-2"> </p>
								                  </div>
								                  <div class="col-span-4 sm:col-span-2 text-right mt-4">
								                    <a target="_blank" href="{{ route('generateFeed',['rsslink' => Auth::user()->get_rsslink->first()->rss_links]) }}" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white">
								                  Open RSS
								                </a>
								                  </div>
								                </div>
								              </div>
								            </div>
									    </section>

						    	@endif
				     @endif

				    @endif
						@endif
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