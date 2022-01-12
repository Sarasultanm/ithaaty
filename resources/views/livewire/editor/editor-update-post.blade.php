
 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Podcast Update') }}
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

      @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")

      @else

      @if(Auth::user()->get_plan->check_features('p3')->count() != 0 || Auth::user()->get_plan->check_features('p2')->count() != 0 )

      <main class="xl:col-span-10 lg:col-span-9">

        <div class="mt-4">
          <!-- <div class="mb-5 w-full ">
          	 <h1 class="font-bold text-gray-800 text-xl">Overview</h1> 
          </div> -->

          <div class="w-full ">
          	 <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>

          @if($checkAudio == 'true')

          <!-- This example requires Tailwind CSS v2.0+ -->
          @if($audio->audio_publish != "Publish")
				<div class="rounded-md bg-custom-pink p-4">
				  <div class="flex">
				    <div class="flex-shrink-0">
				      <!-- Heroicon name: solid/information-circle -->
				      <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
				        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
				      </svg>
				    </div>
				    <div class="ml-3 flex-1 md:flex md:justify-between">
				      <p class="text-sm text-white">
				        Your podcast is currently in a draft, please update the information in the tab below. If you want to publish your podcast now hit the publish button.
				      </p>
				      <p class="mt-4 text-sm md:mt-0 md:ml-6">
				        <button wire:click="publishAudio({{$a_id}})" class="whitespace-nowrap font-medium text-white hover-bg-custom-pink hover:text-white  p-2 border-2 border-white rounded-md">Publish </button>
				      </p>
				    </div>
				  </div>
				</div>
				@endif

          <!-- <form wire:submit.prevent="updatepost">  -->

          	<div x-data="{
			      openTab: 1,
			      activeClasses: 'border-custom-pink text-custom-pink',
			      inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
			    }" 
			    class="">

				<div class="border-b border-gray-200">
				  	<ul class="-mb-px flex" >
				      <li @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
				        <a>Info</a>
				      </li>
				      <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
				        <a>Embed</a>
				      </li>
				       @if(Auth::user()->get_plan->check_features('o4')->count() != 0 )
		             <li @click="openTab = 3"  :class="openTab === 3 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
		              <a>References</a>
		            </li>
		           @endif

		           @if(Auth::user()->get_plan->check_features('o3')->count() != 0 )
				      <li @click="openTab = 4"  :class="openTab === 4 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
				        <a>Sponsor</a>
				      </li>
				      @endif

				      @if(Auth::user()->get_plan->check_features('o7')->count() != 0 )
				       <li @click="openTab = 5"  :class="openTab === 5 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
				        <a>Affiliate</a>
				      </li>
				      @endif

				      @if(Auth::user()->get_plan->check_features('o5')->count() != 0 )
				      <li @click="openTab = 6"  :class="openTab === 6 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
				        <a>Q&A</a>
				      </li>
				      @endif
				      @if(Auth::user()->get_plan->check_features('o2')->count() != 0 )
				      <li @click="openTab = 7"  :class="openTab === 7 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
				        <a>Monetize</a>
				      </li>
				      @endif

				       @if(Auth::user()->get_plan->check_features('o8')->count() != 0 )
				        <li @click="openTab = 8"  :class="openTab === 8 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
				        <a>Chapters</a>
				      </li>
				       @endif
				    </ul>
				</div>

				<div class="w-full pt-4">
					<input type="text" class="hidden"  wire:model="a_id">
					<div x-show="openTab === 1">

						<div class="mt-5">
			                  <h2 class="text-lg leading-6 font-medium text-gray-900"> Creat Post</h2>
			                  <p class="mt-1 text-sm text-gray-500">
			                    This information will be displayed publicly so be careful what you share.
			                  </p>
			            </div>

				        <div class="border-t-2 border-custom-pink ">	
				    		<div class="mt-5">
						                    <label for="email" class="block text-sm font-medium text-gray-700">Title</label>
						                    <div class="mt-1">
						                      <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"  wire:model="title">
						                    </div>
								        </div>

						              	 <div class="mt-5">

											<label for="email" class="block text-sm font-medium text-gray-700">Category</label>
											@if($categoryList->count() == 0 )
						      	 			 <span class="text-sm font-medium text-red-600">Add category in the settings</span>
						      	 			@else
						      	 			<select id="country" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="category">
						                        <option>Select</option>
						                        @foreach($categoryList->get() as $cat)
						                        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
						                        @endforeach
						             		 </select> 

						      	 			@endif
							    					
							    		</div>

			             	
			                <div class="mt-5">
				                <div class="flex">
								  <div class="flex-1 mr-2">
								  	<label for="email" class="block text-sm font-medium text-gray-700">Season</label>
								 
				                    <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="season">
				                        <option>Select</option>
				                        @for ($s = 1; $s < 50; $s++)
				                           <option value="{{ $s }}">{{ $s }}</option>
										@endfor
				             		 </select> 

								  </div>
								  <div class="flex-1 ml-2">
								  	<label for="email" class="block text-sm font-medium text-gray-700">Episode</label>
								 
				                      <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="episode">
				                        <option>Select</option>
				                        @for ($e = 1; $e < 50; $e++)
				                           <option value="{{ $e }}">{{ $e }}</option>
										@endfor
				             		 </select> 


								  </div>
								   <div class="flex-1 ml-2">
								  	<label for="email" class="block text-sm font-medium text-gray-700">Status</label>
								 
				                      <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="status">
				                        @if($status == 'private')
				                        <option value="private">Private</option>
				                        <option value="public">Public</option>
				                        @else
				                         <option value="public">Public</option>
				                          <option value="private">Private</option>
				                        @endif
				                      
				                        
								
				             		 </select> 


								  </div>
								 
								</div>
							</div>

							<div class="mt-5">
							          <label for="about" class="block text-sm font-medium text-gray-700">
							            Transcript
							          </label>
							          <div class="mt-1">
							            <textarea id="about" name="about" rows="15" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="summary" ></textarea>
							          </div>
				    		</div>


				    		<div class="mt-5">
				    				<div class="block text-sm font-medium text-gray-700"> Thumbnail </div>
				    				<div class="mt-2 w-1/4">
				    					 <div x-data="{ isUploading: false, progress: 0, success: false, error:false }" 
                                               x-on:livewire-upload-start="isUploading = true"
                                               x-on:livewire-upload-finish="isUploading = false,success = true" 
                                               x-on:livewire-upload-error="isUploading = false,error= true"
                                               x-on:livewire-upload-progress="progress = $event.detail.progress">

			                                <div class="hidden relative rounded-md overflow-hidden lg:block">
			                                 @if($this->audio->get_thumbnail->count() == 0)

				                                  @if($thumbnail)
							                    		  <img class="relative rounded-md w-auto" src="{{ $thumbnail->temporaryUrl() }}" alt="">
							                      @else
							                    		  <img class="relative rounded-md w-auto " src="{{ asset('images/default_podcast.jpg') }}" alt=""> 
							                      @endif

			                                 @else

			                                 	  @if($thumbnail) 
							                    		  <img class="relative rounded-md w-auto" src="{{ $thumbnail->temporaryUrl() }}" alt="">
							                      @else
							                      		  <?php 
							                      		  	$img_path = $this->audio->get_thumbnail->first()->gallery_path; 
							                      		  ?>
							                    		  <img class="relative rounded-md w-auto" src="{{ asset('users/podcast_img/'.$img_path) }}" alt=""> 
							                      @endif

			                                 @endif
						                   
						                      
						                      <label for="desktop-user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
						                        <button>Change</button>
						                        <span class="sr-only"> user photo</span>
						                        <input type="file" id="desktop-user-photo" name="user-photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md" wire:model="thumbnail">
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
                                                	<button wire:click="saveThumbnail({{$this->a_id}})" x-show="success" class="py-2 px-4 text-center  text-white bg-custom-pink font-bold text-sm">Save Changes</button>
                                                </center>
                                              

                                                 <p x-show="error" class="text-center font-bold text-red-800 text-sm">*Error to upload the file</p> 
                                              </div>

                                		</div>


				    				</div>
				    		</div>






						</div>


						<div class="border-t-2 border-custom-pink mt-16"></div>        
			        
			              <div class="mt-3 text-right sm:mt-5 mb-20">
			              			
							        <button wire:click="updateInfo()" class="w-1/4 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md">
							          Update Info
							        </button>
				    			
						   </div>






					</div>

					<div x-show="openTab === 2">
						
					<!-- <div class="border-t-2 border-custom-pink mt-16"></div>   --> 
		            <div class="mt-5">
		                  <h2 class="text-lg leading-6 font-medium text-gray-900"> Embed Code</h2>
		                  <p class="mt-1 text-sm text-gray-500">
		                    This information will be displayed publicly so be careful what you share.
		                  </p>
		            </div>
		            <div class="border-t-2 border-custom-pink "></div>   
	            	<div class="mt-5">
	                       <div class="mt-1">
				            <textarea id="about" name="about" rows="4" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="embedlink" ></textarea>
				          </div>
	                </div>
	                <div class="mt-5">
			          <label for="about" class="block text-sm font-medium text-gray-700">
			            Hashtags 
			          </label>
			          <div class="mt-1">
			            <textarea rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="hashtags" ></textarea>
			          </div>
    				</div>

    				<div class="border-t-2 border-custom-pink mt-16"></div>        
			        
		              <div class="mt-3 text-right sm:mt-5 mb-20">
		              			
						        <button wire:click="updateEmbed()" class="w-1/4 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md">
						          Update Info
						        </button>
			    			
					   </div>


					</div>


					<div x-show="openTab === 3">
					@if(Auth::user()->get_plan->check_features('o4')->count() != 0 )
					<div class="mt-5">
		                  <h2 class="text-lg leading-6 font-medium text-gray-900"> Reference</h2>
		                  <p class="mt-1 text-sm text-gray-500">
		                    Add a reference for you podcast
		                  </p>
		                  <div class="border-t-2 border-custom-pink "></div>   

		                  <div class="flex">
		                  	<div class="mt-5 w-40 mr-5">
			                    <label for="email" class="block text-sm font-medium text-gray-700">Title</label>
			                    <div class="mt-1">
			                      <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"  wire:model="ref_title">
			                    </div>
					        </div>

					        <div class="flex-auto mt-5  mr-5">
			                    <label for="email" class="block text-sm font-medium text-gray-700">Link</label>
			                    <div class="mt-1">
			                      <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"  wire:model="ref_link">
			                    </div>
					        </div>
					        <div class=" w-15 mt-5">
			                    <label for="email" class="block text-sm font-medium text-gray-700">&nbsp;</label>
			                    <div class="mt-1">
			                       <button wire:click="addReference({{ $a_id }})"  class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-1 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md">
						           Add Reference
						        </button>
			                    </div>
					        </div>
		                  </div>
		                   <div class="border-t-2 border-custom-pink mt-16"></div>        
		                  <div class="mt-5">
		                  	<h2 class="text-lg leading-6 font-medium text-gray-900"> Reference List</h2>
		                  	<ul role="list" class="divide-y divide-gray-200">
		                  	 @foreach($audio->get_references as $ref )	
							  <li class="py-4 flex">
							    <div class="ml-3">
							      <p class="text-sm font-medium text-gray-900">{{ $ref->audioref_title }}</p>
							      <p class="text-sm text-gray-500">{{ $ref->audioref_link }}</p>
							    </div>
							  </li>
							  @endforeach
							</ul>
		                  </div>


		            </div> 

		          @endif
					</div>



					<div x-show="openTab === 4">
						 @if(Auth::user()->get_plan->check_features('o3')->count() != 0 )

						<div class="mt-5">
			                  <h2 class="text-lg leading-6 font-medium text-gray-900"> Sponsorship</h2>
			                  <p class="mt-1 text-sm text-gray-500">
			                    Enter your sponsorship details in the fields.
			                  </p>
			            </div>

				        <div class="border-t-2 border-custom-pink ">	
				        	<div class="mt-5">
			                    <label for="email" class="block text-sm font-medium text-gray-700">Company Name</label>
			                    <div class="mt-1">
			                      <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"  wire:model="spon_name">
			                    </div>
					        </div>

					        <div class="mt-5">
			                    <label for="email" class="block text-sm font-medium text-gray-700">Company Website</label>
			                    <div class="mt-1">
			                      <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"  wire:model="spon_website">
			                    </div>
					        </div>


					        <div class="mt-5">
			                    <label for="email" class="block text-sm font-medium text-gray-700">Location</label>
			                    <div class="mt-1">
			                      <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"  wire:model="spon_location">
			                    </div>
					        </div>

					        <div class="mt-5">
			                    <label for="email" class="block text-sm font-medium text-gray-700">Link to Location</label>
			                    <div class="mt-1">
			                      <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"  wire:model="spon_linkloc">
			                    </div>
					        </div>

					        <div class="mt-5">
			                    <label for="email" class="block text-sm font-medium text-gray-700">Upload Image</label>
			                    <div class="mt-1">
			                      <input type="file"  class=""  wire:model="spon_image">
			                    </div>
			                    @error('spon_image') <span class="text-xs text-red-600">Required Fields</span> @enderror
					        </div>
					       
					      <div class="mt-3 text-right sm:mt-5 mb-5">
				              			
								        <button wire:click="addSponsor()" class="w-1/4 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md">
								          Add Sponsor
								        </button>
							</div>

							 <div class="border-t-2 border-custom-pink mt-5"></div>        
							 <ul role="list" class="divide-y divide-gray-200">
		                  	 @foreach($audio->get_sponsor as $sponsor )	
							  <li class="py-4 flex">
							    <div class="ml-3">
							      <p class="text-sm font-medium text-gray-900">{{ $sponsor->audiospon_name }}</p>
							      <p class="text-sm text-gray-500">{{ $sponsor->audiospon_website }}</p>
							    </div>
							  </li>
							  @endforeach
							</ul>

						</div>
						@endif
					</div>

					<div x-show="openTab === 5">
						 @if(Auth::user()->get_plan->check_features('o7')->count() != 0 )
						<div class="mt-5">
		                  <h2 class="text-lg leading-6 font-medium text-gray-900"> Affiliate</h2>
		                  <p class="mt-1 text-sm text-gray-500">
		                    Add a affiliate for you podcast
		                  </p>
		                  <div class="border-t-2 border-custom-pink "></div>   

		                  <div class="flex">
		                  	<div class="mt-5 w-40 mr-5">
			                    <label for="email" class="block text-sm font-medium text-gray-700">Title</label>
			                    <div class="mt-1">
			                      <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"  wire:model="afi_title">
			                    </div>
					        </div>

					        <div class="flex-auto mt-5  mr-5">
			                    <label for="email" class="block text-sm font-medium text-gray-700">Link</label>
			                    <div class="mt-1">
			                      <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"  wire:model="afi_link">
			                    </div>
					        </div>
					        <div class=" w-15 mt-5">
			                    <label for="email" class="block text-sm font-medium text-gray-700">&nbsp;</label>
			                    <div class="mt-1">
			                       <button wire:click="addAffiliate({{ $a_id }})"  class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-1 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md">
						           Add Affiliate
						        </button>
			                    </div>
					        </div>
		                  </div>
		                   <div class="border-t-2 border-custom-pink mt-16"></div>        
		                  <div class="mt-5">
		                  	<h2 class="text-lg leading-6 font-medium text-gray-900"> Affiliate List</h2>
		                  	<ul role="list" class="divide-y divide-gray-200">
		                  	 @foreach($audio->get_affiliate as $afi )	
							  <li class="py-4 flex">
							    <div class="ml-3">
							      <p class="text-sm font-medium text-gray-900">{{ $afi->audioafi_title }}</p>
							      <p class="text-sm text-gray-500">{{ $afi->audioafi_link }}</p>
							    </div>
							  </li>
							  @endforeach
							</ul>
		                  </div>


		            </div> 
		            @endif
					</div>	

					<div x-show="openTab === 6">
						 @if(Auth::user()->get_plan->check_features('o5')->count() != 0 )
						<div class="mt-5">
		                  <h2 class="text-lg leading-6 font-medium text-gray-900"> Question</h2>
		                  <p class="mt-1 text-sm text-gray-500">
		                    Add a question for your podcast
		                  </p>
		                  <div class="border-t-2 border-custom-pink "></div>   

		                  <div class="flex">
	
					        <div class="flex-auto mt-5  mr-5">
			                    <label for="email" class="block text-sm font-medium text-gray-700">Question</label>
			                    <div class="mt-1">
			                      <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"  wire:model="qa_question">
			                    </div>
					        </div>
					        <div class=" w-15 mt-5">
			                    <label for="email" class="block text-sm font-medium text-gray-700">&nbsp;</label>
			                    <div class="mt-1">
			                       <button wire:click="addQuestion({{ $a_id }})"  class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-1 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md">
						           Add Question
						        </button>
			                    </div>
					        </div>
		                  </div>
		                   <div class="border-t-2 border-custom-pink mt-16"></div>        
		                  <div class="mt-5">
		                  	<h2 class="text-lg leading-6 font-medium text-gray-900"> Question List</h2>
		                  	<ul role="list" class="">
		                  	 @foreach($audio->get_question as $qa )	
							  <li class="p-2 flex  w-full border-custom-pink border-2 mt-2">
							    <div class="ml-3">
							      <p class="text-sm font-medium text-gray-900">{{ $qa->qa_question }}</p>
							    </div>
							  </li>
							  @endforeach
							</ul>
		                  </div>


		            </div> 
		            @endif
					</div>	


						<div x-show="openTab === 7">
							@if(Auth::user()->get_plan->check_features('o2')->count() != 0 )
							<div class="border-b-2 pb-10 pt-5 border-green-500 ">
                              
                               <h2 class="text-lg leading-6 font-medium text-gray-900"> Segments</h2>
			                  <p class="mt-1 text-sm text-gray-500">
			                     Please click the link below to see the documents
			                  </p>
			                  <div class="border-t-2 border-custom-pink "></div>



                                <div class="mt-5">
                                   <label for="email" class="block text-sm font-medium text-gray-700">Country</label>
                                   <div class="flex">
                                     <div class="flex-1 pr-5">
                                      <select class="mt-1 mr-5 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="country_slc" wire:keydown.enter="addCountry()">
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
                                     <div>
                                        <button wire:click="addCountry()" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md">
                                         Add Country
                                        </button>
                                     </div>
                                   </div>
                                   <div class="">
                                        <!-- <label  class="block text-sm font-medium text-gray-700">Description</label> -->
                                        <div class="mt-1">
                                          <textarea id="countryList" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md " wire:model="adslist_country"></textarea>
                                        </div>
                                </div>
                                
                                 </div> 

                                 <div class="mt-5">
                                   <label for="email" class="block text-sm font-medium text-gray-700">Age Bracket</label>
                                   <div class="flex">
                                     <div class="flex-1 pr-5">
                                      <select class="mt-1 mr-5 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="agebracket_list" wire:keydown.enter="addBracket()">
                                      <option value="age0">No specific</option>
                                      <option value="age1">18 - 24 years</option>
                                      <option value="age2">25 - 40 years</option>
                                      <option value="age3">41 - 60 years</option>
                                      <option value="age4">61 - 80 years</option>
                                      
                                   </select> 
                                     </div>
                                     <div>
                                        <button wire:click="addBracket()" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md">
                                         Add Bracket
                                        </button>
                                     </div>
                                   </div>
                                   <div class="">
                                        <!-- <label  class="block text-sm font-medium text-gray-700">Description</label> -->
                                        <div class="mt-1">
                                          <textarea id="countryList" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md " wire:model="adslist_agebracket"></textarea>
                                        </div>
                                </div>
                                
                                 </div> 

                             <!--     <div class="mt-5">
                                   <label for="email" class="block text-sm font-medium text-gray-700">Age Bracket</label>
                                   <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
                                   <option>Select</option>
                                      <option value="age0">No specific</option>
                                      <option value="age1">18 - 24 years</option>
                                      <option value="age2">25 - 40 years</option>
                                      <option value="age3">41 - 60 years</option>
                                      <option value="age4">61 - 80 years</option>
                                   </select> 
                                 </div>  -->





                              <div class="mt-5">
                                <h1 class="text-sm font-medium text-gray-700 ">Interest</h1> 
                               <p class="mt-1 text-sm text-gray-500">
                                    Please check the checkbox for the interest.
                               </p>
                                <div class="grid grid-cols-4 gap-4 mt-3">

                                  <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Social Issues, Election or Politics</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>
                                  </div>
                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Housing</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>

                                  </div>

                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Employment</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>
                                  </div>
                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Credits</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>

                                  </div>
                                </div>

                              </div>


                          </div> 
              @endif
					</div>


					<div x-show="openTab === 8">
						 @if(Auth::user()->get_plan->check_features('o8')->count() != 0 )
						<div class="mt-5">
		                  <h2 class="text-lg leading-6 font-medium text-gray-900"> Chapters</h2>
		                  <p class="mt-1 text-sm text-gray-500">
		                    Add a chapters for your podcast
		                  </p>
		                  <div class="border-t-2 border-custom-pink "></div>   

		            
	
					        <div class="mt-5">
			                    <label for="email" class="block text-sm font-medium text-gray-700">VTT Files</label>
			                    <div class="mt-1">
			                    	<textarea rows="20" class="w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="vttfile"></textarea>
			                    </div>
			                      @error('vttfile') <span class="text-xs text-red-600">Required Fields</span> @enderror

			                 
					        </div>
					        <div class="w-15 mt-5">
			                    <label for="email" class="block text-sm font-medium text-gray-700">&nbsp;</label>
			                    <div class="mt-1">
			                       <button wire:click="uploadChapters({{$a_id}})" class="w-auto inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md float-right">
						          Update Chapters
						        </button>
			                    </div>
					        </div>
		                 
		                   
		              


		            </div> 
		            @endif
					</div>	


				</div>











			</div>  
          
          		
          




		  



	   




<!-- 		  <div class="border-t-2 border-custom-pink mt-16"></div>        
			        
              <div class="mt-3 text-right sm:mt-5 mb-20">
              			<input type="text" class="hidden"  wire:model="a_id">
				        <button wire:click="updatepost()" class="w-1/4 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md">
				          Update Podcast
				        </button>
	    			
			   </div> -->




			 
       <!--    	</form>  -->
          	@else

          		  @include('layouts.editor.page-404')    

          	@endif











         

        </div>
      </main>
      @endif

      @endif
    </div>
  </div>
</div>





















        </div>
</div><div>
    {{-- The best athlete wants his opponent at his best. --}}
</div>
