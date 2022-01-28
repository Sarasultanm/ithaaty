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
			      openTab: 4,
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
			                      <label class="block text-sm font-medium text-gray-700">
			                        Country
			                      </label>
			                      <div class="mt-1">
															  <div class="mt-1 flex">
															    <div class="relative flex items-stretch flex-grow focus-within:z-10">
															      <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
															        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
																			  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
																			</svg>
															      </div>
															      <select wire:model="userCountry" class=" block w-full rounded-none rounded-md pl-10 sm:text-sm border-gray-300 mr-3  rounded-md shadow-sm ">
										                    <option selected="" disabled="">Select Country</option>
										                    <option value="Afganistan">Afghanistan</option>
										                    <option value="Albania">Albania</option>
										                    <option value="Algeria">Algeria</option>
										                    <option value="American-Samoa">American Samoa</option>
										                    <option value="Andorra">Andorra</option>
										                    <option value="Angola">Angola</option>
										                    <option value="Anguilla">Anguilla</option>
										                    <option value="Antigua-&-Barbuda">Antigua & Barbuda</option>
										                    <option value="Argentina">Argentina</option>
										                    <option value="Armenia">Armenia</option>
										                    <option value="Aruba">Aruba</option>
										                    <option value="Australia">Australia</option>
										                    <option value="Austria">Austria</option>
										                    <option value="Azerbaijan">Azerbaijan</option>
										                    <option value="Bahamas">Bahamas</option>
										                    <option value="Bahrain">Bahrain</option>
										                    <option value="Bangladesh">Bangladesh</option>
										                    <option value="Barbados">Barbados</option>
										                    <option value="Belarus">Belarus</option>
										                    <option value="Belgium">Belgium</option>
										                    <option value="Belize">Belize</option>
										                    <option value="Benin">Benin</option>
										                    <option value="Bermuda">Bermuda</option>
										                    <option value="Bhutan">Bhutan</option>
										                    <option value="Bolivia">Bolivia</option>
										                    <option value="Bonaire">Bonaire</option>
										                    <option value="Bosnia-&-Herzegovina">Bosnia & Herzegovina</option>
										                    <option value="Botswana">Botswana</option>
										                    <option value="Brazil">Brazil</option>
										                    <option value="British-Indian-Ocean-Ter">British Indian Ocean Ter</option>
										                    <option value="Brunei">Brunei</option>
										                    <option value="Bulgaria">Bulgaria</option>
										                    <option value="Burkina-Faso">Burkina Faso</option>
										                    <option value="Burundi">Burundi</option>
										                    <option value="Cambodia">Cambodia</option>
										                    <option value="Cameroon">Cameroon</option>
										                    <option value="Canada">Canada</option>
										                    <option value="Canary-Islands">Canary Islands</option>
										                    <option value="Cape-Verde">Cape-Verde</option>
										                    <option value="Cayman-Islands">Cayman Islands</option>
										                    <option value="Central-African-Republic">Central African Republic</option>
										                    <option value="Chad">Chad</option>
										                    <option value="Channel-Islands">Channel Islands</option>
										                    <option value="Chile">Chile</option>
										                    <option value="China">China</option>
										                    <option value="Christmas-Island">Christmas-Island</option>
										                    <option value="Cocos-Island">Cocos Island</option>
										                    <option value="Colombia">Colombia</option>
										                    <option value="Comoros">Comoros</option>
										                    <option value="Congo">Congo</option>
										                    <option value="Cook-Islands">Cook Islands</option>
										                    <option value="Costa-Rica">Costa-Rica</option>
										                    <option value="Cote-DIvoire">Cote-DIvoire</option>
										                    <option value="Croatia">Croatia</option>
										                    <option value="Cuba">Cuba</option>
										                    <option value="Curaco">Curacao</option>
										                    <option value="Cyprus">Cyprus</option>
										                    <option value="Czech-Republic">Czech Republic</option>
										                    <option value="Denmark">Denmark</option>
										                    <option value="Djibouti">Djibouti</option>
										                    <option value="Dominica">Dominica</option>
										                    <option value="Dominican-Republic">Dominican Republic</option>
										                    <option value="East-Timor">East-Timor</option>
										                    <option value="Ecuador">Ecuador</option>
										                    <option value="Egypt">Egypt</option>
										                    <option value="El-Salvador">El-Salvador</option>
										                    <option value="Equatorial-Guinea">Equatorial Guinea</option>
										                    <option value="Eritrea">Eritrea</option>
										                    <option value="Estonia">Estonia</option>
										                    <option value="Ethiopia">Ethiopia</option>
										                    <option value="Falkland-Islands">Falkland Islands</option>
										                    <option value="Faroe-Islands">Faroe-Islands</option>
										                    <option value="Fiji">Fiji</option>
										                    <option value="Finland">Finland</option>
										                    <option value="France">France</option>
										                    <option value="French-Guiana">French Guiana</option>
										                    <option value="French-Polynesia">French Polynesia</option>
										                    <option value="French-Southern-Ter">French Southern Ter</option>
										                    <option value="Gabon">Gabon</option>
										                    <option value="Gambia">Gambia</option>
										                    <option value="Georgia">Georgia</option>
										                    <option value="Germany">Germany</option>
										                    <option value="Ghana">Ghana</option>
										                    <option value="Gibraltar">Gibraltar</option>
										                    <option value="Great-Britain">Great Britain</option>
										                    <option value="Greece">Greece</option>
										                    <option value="Greenland">Greenland</option>
										                    <option value="Grenada">Grenada</option>
										                    <option value="Guadeloupe">Guadeloupe</option>
										                    <option value="Guam">Guam</option>
										                    <option value="Guatemala">Guatemala</option>
										                    <option value="Guinea">Guinea</option>
										                    <option value="Guyana">Guyana</option>
										                    <option value="Haiti">Haiti</option>
										                    <option value="Hawaii">Hawaii</option>
										                    <option value="Honduras">Honduras</option>
										                    <option value="Hong-Kong">Hong Kong</option>
										                    <option value="Hungary">Hungary</option>
										                    <option value="Iceland">Iceland</option>
										                    <option value="Indonesia">Indonesia</option>
										                    <option value="India">India</option>
										                    <option value="Iran">Iran</option>
										                    <option value="Iraq">Iraq</option>
										                    <option value="Ireland">Ireland</option>
										                    <option value="Isle-of-Man">Isle of Man</option>
										                    <option value="Israel">Israel</option>
										                    <option value="Italy">Italy</option>
										                    <option value="Jamaica">Jamaica</option>
										                    <option value="Japan">Japan</option>
										                    <option value="Jordan">Jordan</option>
										                    <option value="Kazakhstan">Kazakhstan</option>
										                    <option value="Kenya">Kenya</option>
										                    <option value="Kiribati">Kiribati</option>
										                    <option value="Korea-North">Korea North</option>
										                    <option value="Korea-Sout">Korea South</option>
										                    <option value="Kuwait">Kuwait</option>
										                    <option value="Kyrgyzstan">Kyrgyzstan</option>
										                    <option value="Laos">Laos</option>
										                    <option value="Latvia">Latvia</option>
										                    <option value="Lebanon">Lebanon</option>
										                    <option value="Lesotho">Lesotho</option>
										                    <option value="Liberia">Liberia</option>
										                    <option value="Libya">Libya</option>
										                    <option value="Liechtenstein">Liechtenstein</option>
										                    <option value="Lithuania">Lithuania</option>
										                    <option value="Luxembourg">Luxembourg</option>
										                    <option value="Macau">Macau</option>
										                    <option value="Macedonia">Macedonia</option>
										                    <option value="Madagascar">Madagascar</option>
										                    <option value="Malaysia">Malaysia</option>
										                    <option value="Malawi">Malawi</option>
										                    <option value="Maldives">Maldives</option>
										                    <option value="Mali">Mali</option>
										                    <option value="Malta">Malta</option>
										                    <option value="Marshall-Islands">Marshall Islands</option>
										                    <option value="Martinique">Martinique</option>
										                    <option value="Mauritania">Mauritania</option>
										                    <option value="Mauritius">Mauritius</option>
										                    <option value="Mayotte">Mayotte</option>
										                    <option value="Mexico">Mexico</option>
										                    <option value="Midway-Islands">Midway Islands</option>
										                    <option value="Moldova">Moldova</option>
										                    <option value="Monaco">Monaco</option>
										                    <option value="Mongolia">Mongolia</option>
										                    <option value="Montserrat">Montserrat</option>
										                    <option value="Morocco">Morocco</option>
										                    <option value="Mozambique">Mozambique</option>
										                    <option value="Myanmar">Myanmar</option>
										                    <option value="Nambia">Nambia</option>
										                    <option value="Nauru">Nauru</option>
										                    <option value="Nepal">Nepal</option>
										                    <option value="Netherland-Antilles">Netherland Antilles</option>
										                    <option value="Netherlands">Netherlands(Holland,Europe)</option>
										                    <option value="Nevis">Nevis</option>
										                    <option value="New-Caledonia">New Caledonia</option>
										                    <option value="New-Zealand">New Zealand</option>
										                    <option value="Nicaragua">Nicaragua</option>
										                    <option value="Niger">Niger</option>
										                    <option value="Nigeria">Nigeria</option>
										                    <option value="Niue">Niue</option>
										                    <option value="Norfolk-Island">Norfolk Island</option>
										                    <option value="Norway">Norway</option>
										                    <option value="Oman">Oman</option>
										                    <option value="Pakistan">Pakistan</option>
										                    <option value="Palau-Island">Palau Island</option>
										                    <option value="Palestine">Palestine</option>
										                    <option value="Panama">Panama</option>
										                    <option value="Papua-New-Guinea">Papua New Guinea</option>
										                    <option value="Paraguay">Paraguay</option>
										                    <option value="Peru">Peru</option>
										                    <option value="Philippines">Philippines</option>
										                    <option value="Pitcairn-Island">Pitcairn Island</option>
										                    <option value="Poland">Poland</option>
										                    <option value="Portugal">Portugal</option>
										                    <option value="Puerto-Rico">Puerto Rico</option>
										                    <option value="Qatar">Qatar</option>
										                    <option value="Republic-of-Montenegro">Republic of Montenegro</option>
										                    <option value="Republic-of-Serbia">Republic of Serbia</option>
										                    <option value="Reunion">Reunion</option>
										                    <option value="Romania">Romania</option>
										                    <option value="Russia">Russia</option>
										                    <option value="Rwanda">Rwanda</option>
										                    <option value="St-Barthelemy">St Barthelemy</option>
										                    <option value="St-Eustatius">St Eustatius</option>
										                    <option value="St-Helena">St Helena</option>
										                    <option value="St-Kitts-Nevis">St Kitts Nevis</option>
										                    <option value="St-Lucia">St Lucia</option>
										                    <option value="St-Maarten">St Maarten</option>
										                    <option value="St-Pierre-&-Miquelon">St Pierre & Miquelon</option>
										                    <option value="St-Vincent-&-Grenadines">St Vincent & Grenadines</option>
										                    <option value="Saipan">Saipan</option>
										                    <option value="Samoa">Samoa</option>
										                    <option value="Samoa-American">Samoa American</option>
										                    <option value="San-Marino">San Marino</option>
										                    <option value="Sao-Tome-&-Principe">Sao Tome & Principe</option>
										                    <option value="Saudi-Arabia">Saudi Arabia</option>
										                    <option value="Senegal">Senegal</option>
										                    <option value="Seychelles">Seychelles</option>
										                    <option value="Sierra-Leone">Sierra Leone</option>
										                    <option value="Singapore">Singapore</option>
										                    <option value="Slovakia">Slovakia</option>
										                    <option value="Slovenia">Slovenia</option>
										                    <option value="Solomon-Islands">Solomon Islands</option>
										                    <option value="Somalia">Somalia</option>
										                    <option value="South-Africa">South Africa</option>
										                    <option value="Spain">Spain</option>
										                    <option value="Sri-Lanka">Sri Lanka</option>
										                    <option value="Sudan">Sudan</option>
										                    <option value="Suriname">Suriname</option>
										                    <option value="Swaziland">Swaziland</option>
										                    <option value="Sweden">Sweden</option>
										                    <option value="Switzerland">Switzerland</option>
										                    <option value="Syria">Syria</option>
										                    <option value="Tahiti">Tahiti</option>
										                    <option value="Taiwan">Taiwan</option>
										                    <option value="Tajikistan">Tajikistan</option>
										                    <option value="Tanzania">Tanzania</option>
										                    <option value="Thailand">Thailand</option>
										                    <option value="Togo">Togo</option>
										                    <option value="Tokelau">Tokelau</option>
										                    <option value="Tonga">Tonga</option>
										                    <option value="Trinidad-&-Tobago">Trinidad & Tobago</option>
										                    <option value="Tunisia">Tunisia</option>
										                    <option value="Turkey">Turkey</option>
										                    <option value="Turkmenistan">Turkmenistan</option>
										                    <option value="Turks-&-Caicos-Is">Turks & Caicos Is</option>
										                    <option value="Tuvalu">Tuvalu</option>
										                    <option value="Uganda">Uganda</option>
										                    <option value="United-Kingdom">United Kingdom</option>
										                    <option value="Ukraine">Ukraine</option>
										                    <option value="United-Arab-Emirates">United Arab Emirates</option>
										                    <option value="United-States-of-America">United States of America</option>
										                    <option value="Uraguay">Uruguay</option>
										                    <option value="Uzbekistan">Uzbekistan</option>
										                    <option value="Vanuatu">Vanuatu</option>
										                    <option value="Vatican-City-State">Vatican City State</option>
										                    <option value="Venezuela">Venezuela</option>
										                    <option value="Vietnam">Vietnam</option>
										                    <option value="Virgin-Islands-(Brit)">Virgin Islands (Brit)</option>
										                    <option value="Virgin-Islands-(USA)">Virgin Islands (USA)</option>
										                    <option value="Wake-Island">Wake-Island</option>
										                    <option value="Wallis-&-Futana-Is">Wallis & Futana Is</option>
										                    <option value="Yemen">Yemen</option>
										                    <option value="Zaire">Zaire</option>
										                    <option value="Zambia">Zambia</option>
										                    <option value="Zimbabwe">Zimbabwe</option>
										                  </select>

															    </div>
															    <button wire:click="updateCountry()" type="button" class="-ml-px  bg-custom-pink relative inline-flex items-center space-x-2 px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-white  shadow-sm border border-transparent">
															      <!-- Heroicon name: solid/sort-ascending -->
															     
															      <span>Save</span>
															    </button>
															  </div>
			                      </div>
			                    </div>

			                    <div>
			                      <label for="about" class="block text-sm font-medium text-gray-700">
			                        About
			                      </label>
			                      <div class="mt-1">
			                        <!-- <textarea rows="3" class="shadow-sm focus:ring-sky-500 focus:border-sky-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea> -->

															<div class="flex items-start space-x-4">
															  <div class="min-w-0 flex-1">
															    <div class="relative">
															      <div class="border border-gray-300 rounded-lg shadow-sm overflow-hidden focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">
															        <label for="comment" class="sr-only">Add your comment</label>
															        <textarea  wire:model="userAbout"  rows="3" name="comment" id="comment" class="block w-full py-3 border-0 resize-none focus:ring-0 sm:text-sm" placeholder="About"></textarea>

															        <!-- Spacer element to match the height of the toolbar -->
															        <div class="py-2" aria-hidden="true">
															          <!-- Matches height of button in toolbar (1px border + 36px content height) -->
															          <div class="py-px">
															            <div class="h-9"></div>
															          </div>
															        </div>
															      </div>

															      <div class="absolute bottom-0 inset-x-0 pl-3 pr-2 py-2 flex justify-between">
															        <div class="flex items-center space-x-5">
															       
															          
															        </div>
															        <div class="flex-shrink-0">
															          <button wire:click="updateAbout()"  type="submit" class=" bg-custom-pink inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white ">
															            Save
															          </button>
															        </div>
															      </div>
															    </div>
															  </div>
															</div>
			                      </div>
			                      
			                    </div>
			                  </div>

			                  <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
			                    <p class="text-sm font-medium text-gray-700" aria-hidden="true">
			                      Photo
			                    </p>
			                    
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
						                   
						                      
						                      <label for="desktop-user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
						                        <button>Change</button>
						                        <span class="sr-only"> user photo</span>
						                        <input type="file" id="desktop-user-photo" name="user-photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md" wire:model="profilePhoto">
						                      </label>
						                    </div>
                                 <div class="mt-5">
                                  <div x-show="isUploading"  class="relative pt-1">
                                    <div  class="overflow-hidden h-2 text-xs flex rounded bg-purple-200 progress">
                                      <div x-bind:style="`width:${progress}%`"
                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-custom-pink"
                                      ></div>
                                    </div>
                                  </div>
                                  <center>
                                  	<button wire:click="savePhoto()" x-show="success" class="py-2 px-4 text-center  text-white bg-custom-pink font-bold text-sm">Save Changes</button>
                                  </center>
                                 

                                   <p x-show="error" class="text-center font-bold text-red-800 text-sm">*Error to upload the file</p> 
                                </div>

                                </div>
			            

			                  </div>
			                </div>
			        

				    </section>
				    <h2 class="mt-5 font-bold text-gray-900 text-lg">Social Media Links</h2>
				    <section class="mt-5 bg-white p-5 shadow sm:rounded-md sm:overflow-hidden">
				    	<div class="grid grid-cols-10 gap-4">
				    		
				    	
			        	<div class="col-span-5 flex flex-col lg:flex-row  ">
	                  <div class="flex-grow space-y-6 ">
	                    <div>
	                      <label for="username" class="block text-sm font-medium text-gray-700">
	                        Facebook Link
	                      </label>
	                      <div class="mt-1 rounded-md shadow-sm flex">
	                        <input type="text" class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300" wire:model="userFacebook" wire:keydown.enter="updateSocialLink('Facebook')">
	                      </div>
	                    </div>
	                  </div>	
			          </div>
			        	
			        	<div class="col-span-5 flex flex-col lg:flex-row ">
	                  <div class="flex-grow space-y-6 ">
	                    <div>
	                      <label for="username" class="block text-sm font-medium text-gray-700">
	                        Twitter Link
	                      </label>
	                      <div class="mt-1 rounded-md shadow-sm flex">
	                        <input type="text" class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300" wire:model="userTwitter" wire:keydown.enter="updateSocialLink('Twitter')">
	                      </div>
	                    </div>
	                  </div>	
			          </div>

			          <div class="col-span-5 flex flex-col lg:flex-row ">
	                  <div class="flex-grow space-y-6 ">
	                    <div>
	                      <label for="username" class="block text-sm font-medium text-gray-700">
	                        Instagram Link
	                      </label>
	                      <div class="mt-1 rounded-md shadow-sm flex">
	                        <input type="text" class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300" wire:model="userInstagram" wire:keydown.enter="updateSocialLink('Instagram')">
	                      </div>
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