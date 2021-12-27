
 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Podcast Create') }}
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
      <main class="lg:col-span-10 xl:col-span-10">

        <div class="mt-4">
          
          <div class="w-full ">
          	 <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>
          
        @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")

         

        @else

        <div x-data="{
		      openTab: 1,
		      activeClasses: 'border-custom-pink text-custom-pink',
		      inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
		    }" 
		    class="">

		    <div class="border-b border-gray-200">
			  	<ul class="-mb-px flex" >
			  		 @if(Auth::user()->get_plan->check_features('p3')->count() != 0 )
			      <li @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
			        <a  >Embed Code</a>
			      </li>
			      @endif

			      @if(Auth::user()->get_plan->check_features('u1')->count() == 0 )
			      <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
			        <a  >Media Files (mp3,mp4..)</a>
			      </li>
			      @endif
			    </ul>

		    </div>



		    <div class="w-full pt-4">
		    		<div x-show="openTab === 1">
		    			 @if(Auth::user()->get_plan->check_features('p3')->count() != 0 )
		    			<form wire:submit.prevent="save"> 

	        		<div>
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
		                    @error('title') <span class="text-xs text-red-600">Empty fields</span> @enderror
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
		    				@error('category') <span class="text-xs text-red-600">Empty fields</span> @enderror

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
			             @error('season') <span class="text-xs text-red-600">Empty fields</span> @enderror
							  </div>
					  <div class="flex-1 ml-2">
					  	<label for="email" class="block text-sm font-medium text-gray-700">Episode</label>
	                      <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="episode">
	                        <option>Select</option>
	                        @for ($e = 1; $e < 50; $e++)
	                           <option value="{{ $e }}">{{ $e }}</option>
							@endfor
	             		 </select> 
	             		 @error('episode') <span class="text-xs text-red-600">Empty fields</span> @enderror

					  </div>
					   <div class="flex-1 ml-2">
					  	<label for="email" class="block text-sm font-medium text-gray-700">Status</label>
	                      <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="status">
	                        <option>Select</option>
	                           <option value="public">Public</option>
	                            <option value="private">Private</option>
	             		 </select> 
	             		 @error('status') <span class="text-xs text-red-600">Empty fields</span> @enderror

					  </div>
					 
					</div>
				</div>

				<div class="mt-5" x-data="{ on: false }" >
						<div class="flex">
							<div class="flex-1">
								 <label for="about" class="text-sm font-medium text-gray-700 mr-2" :class="{ 'hidden': on, 'block': !(on) }">
						            Transcript
						         </label>
							</div>
							<div>
								 <label for="about" class="block text-xs font-medium text-gray-700 float-left mr-2 mt-1">
						            Toggle to hide textbox:
						         </label>
								 <button type="button" class="relative inline-flex flex-shrink-0 h-6 w-11 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200  bg-gray-500  " role="switch" aria-checked="false" :aria-checked="on.toString()" @click="on = !on" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'bg-custom-pink': on, 'bg-gray-500': !(on) }">
								    <span class="sr-only">Use setting</span>
								    <span aria-hidden="true" class="inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 translate-x-0" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'translate-x-5': on, 'translate-x-0': !(on) }" style="margin-top:2px;"></span>
								</button>
								
							</div>
						</div>
				          <div class="mt-1" :class="{ 'hidden': on, 'block': !(on) }">
				            <textarea id="about" name="about" rows="15" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="summary" ></textarea>
				          </div>
				          
	    		</div>

	    			

			</div>


		            <div class="border-t-2 border-custom-pink mt-16"></div>   
		            <div class="mt-5">
		                  <h2 class="text-lg leading-6 font-medium text-gray-900"> Embed Code</h2>
		                  <p class="mt-1 text-sm text-gray-500">
		                    This information will be displayed publicly so be careful what you share.
		                  </p>
		            </div>   
	            	<div class="mt-5">
	                       <div class="mt-1">
				            <textarea id="about" name="about" rows="4" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="embedlink" ></textarea>
				          </div>
	                </div>

	              <!--   <div class="mt-5">
			          <label for="about" class="block text-sm font-medium text-gray-700">
			            Hashtags 
			          </label>
			          <div class="mt-1">
			            <textarea rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="hashtags" ></textarea>
			          </div>
    				</div> -->

    				<div class="mt-5" x-data="{ on: false }" >
						<div class="flex">
							<div class="flex-1">
								 <label for="about" class="text-sm font-medium text-gray-700 mr-2" :class="{ 'hidden': on, 'block': !(on) }">
						            Hashtags
						         </label>
							</div>
							<div>
								 <label for="about" class="block text-xs font-medium text-gray-700 float-left mr-2 mt-1">
						            Toggle to hide textbox:
						         </label>
								 <button type="button" class="relative inline-flex flex-shrink-0 h-6 w-11 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200  bg-gray-500  " role="switch" aria-checked="false" :aria-checked="on.toString()" @click="on = !on" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'bg-custom-pink': on, 'bg-gray-500': !(on) }">
								    <span class="sr-only">Use setting</span>
								    <span aria-hidden="true" class="inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 translate-x-0" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'translate-x-5': on, 'translate-x-0': !(on) }" style="margin-top:2px;"></span>
								</button>
								
							</div>
						</div>
				          <div class="mt-1" :class="{ 'hidden': on, 'block': !(on) }">
				            <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="hashtags" ></textarea>
				          </div>
				          
	    		   </div>

              <div class="mt-3  sm:mt-5 mb-20">
              	    <div class="w-full">
              	    	<div class="w-1/2 float-left">&nbsp;</div>
              	  		<div class="w-1/2 float-left text-right">
              	  			<button type="submit" class="w-1/2 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white sm:col-start-2 sm:text-md">Save</button>
              	  		</div>
				      			</div>    
			   			</div>




			 
          	</form> 
          	@endif
		    		</div>

		    		<div x-show="openTab === 2">

		    			 @if(Auth::user()->get_plan->check_features('u1')->count() == 0 )
		    			<form wire:submit.prevent="saveMedia"> 

	        		<div>
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
		                    @error('title') <span class="text-xs text-red-600">Empty fields</span> @enderror
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
		    				@error('category') <span class="text-xs text-red-600">Empty fields</span> @enderror

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
			             @error('season') <span class="text-xs text-red-600">Empty fields</span> @enderror
							  </div>
					  <div class="flex-1 ml-2">
					  	<label for="email" class="block text-sm font-medium text-gray-700">Episode</label>
	                      <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="episode">
	                        <option>Select</option>
	                        @for ($e = 1; $e < 50; $e++)
	                           <option value="{{ $e }}">{{ $e }}</option>
							@endfor
	             		 </select> 
	             		 @error('episode') <span class="text-xs text-red-600">Empty fields</span> @enderror

					  </div>
					   <div class="flex-1 ml-2">
					  	<label for="email" class="block text-sm font-medium text-gray-700">Status</label>
	                      <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="status">
	                        <option>Select</option>
	                           <option value="public">Public</option>
	                            <option value="private">Private</option>
	             		 </select> 
	             		 @error('status') <span class="text-xs text-red-600">Empty fields</span> @enderror

					  </div>
					 
					</div>
				</div>

				<div class="mt-5" x-data="{ on: false }" >
						<div class="flex">
							<div class="flex-1">
								 <label for="about" class="text-sm font-medium text-gray-700 mr-2" :class="{ 'hidden': on, 'block': !(on) }">
						            Transcript
						         </label>
							</div>
							<div>
								 <label for="about" class="block text-xs font-medium text-gray-700 float-left mr-2 mt-1">
						            Toggle to hide textbox:
						         </label>
								 <button type="button" class="relative inline-flex flex-shrink-0 h-6 w-11 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200  bg-gray-500  " role="switch" aria-checked="false" :aria-checked="on.toString()" @click="on = !on" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'bg-custom-pink': on, 'bg-gray-500': !(on) }">
								    <span class="sr-only">Use setting</span>
								    <span aria-hidden="true" class="inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 translate-x-0" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'translate-x-5': on, 'translate-x-0': !(on) }" style="margin-top:2px;"></span>
								</button>
								
							</div>
						</div>
				          <div class="mt-1" :class="{ 'hidden': on, 'block': !(on) }">
				            <textarea id="about" name="about" rows="15" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="summary" ></textarea>
				          </div>
				          
	    		</div>

	    			

			</div>


		            <div class="border-t-2 border-custom-pink mt-16"></div>   
		            <div class="mt-5">
		                  <h2 class="text-lg leading-6 font-medium text-gray-900"> Upload Media File</h2>
		                  <p class="mt-1 text-sm text-gray-500">
		                    This information will be displayed publicly so be careful what you share.
		                  </p>
		            </div>   
	            	<!-- <div class="mt-5">
	                       <div class="mt-1">
				            <textarea id="about" name="about" rows="4" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="embedlink" ></textarea>
				          </div>
	              </div> -->
	              <div class="mt-5">
               <div x-data="{ isUploading: false, progress: 0, success: false, error:false }" 
                 x-on:livewire-upload-start="isUploading = true"
                 x-on:livewire-upload-finish="isUploading = false,success = true" 
                 x-on:livewire-upload-error="isUploading = false,error= true"
                 x-on:livewire-upload-progress="progress = $event.detail.progress">

                    <label for="email" class="block text-sm font-medium text-gray-700">Upload Media File (.mp3, .mp4 )</label>
                    <div class="mt-1">
                      <input type="file"  class="" wire:model="audio">
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
                      @if($audio)
                         <p class="flex-1 font-regular text-gray-800 text-sm">File Upload Complete</p> 
                      @endif
                    </div>
 -->

                   </div>
                   @error('audio') <span class="text-xs text-red-600">Empty fields</span> @enderror
                   <!--  @error('audio')  <p x-show="error" class="text-center font-bold text-red-800 text-sm">Maximum Upload Size is 1MB</p>  @enderror   -->             
				    </div>



	           

    				<div class="mt-5" x-data="{ on: false }" >
						<div class="flex">
							<div class="flex-1">
								 <label for="about" class="text-sm font-medium text-gray-700 mr-2" :class="{ 'hidden': on, 'block': !(on) }">
						            Hashtags
						         </label>
							</div>
							<div>
								 <label for="about" class="block text-xs font-medium text-gray-700 float-left mr-2 mt-1">
						            Toggle to hide textbox:
						         </label>
								 <button type="button" class="relative inline-flex flex-shrink-0 h-6 w-11 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200  bg-gray-500  " role="switch" aria-checked="false" :aria-checked="on.toString()" @click="on = !on" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'bg-custom-pink': on, 'bg-gray-500': !(on) }">
								    <span class="sr-only">Use setting</span>
								    <span aria-hidden="true" class="inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 translate-x-0" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'translate-x-5': on, 'translate-x-0': !(on) }" style="margin-top:2px;"></span>
								</button>
								
							</div>
						</div>
				          <div class="mt-1" :class="{ 'hidden': on, 'block': !(on) }">
				            <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="hashtags" ></textarea>
				          </div>
				          
	    		   </div>

					   <div class="mt-5 text-center text-custom-pink font-bold text-gray-800 text-sm"" wire:loading wire:target="saveMedia">
				        Please wait while saving your file to server...
				    </div>
              
              <div class="mt-3  sm:mt-5 mb-20">
              	    <div class="w-full">
              	    	<div class="w-1/2 float-left">&nbsp;</div>
              	  		<div class="w-1/2 float-left text-right">
              	  			<button type="submit" wire:loading.attr="disabled" class="w-1/2 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white sm:col-start-2 sm:text-md">Save</button>
              	  		</div>
				      			</div>    
			   			</div>




			 
          	</form> 
          	@endif
		    		</div>

		    </div>

		   </div>

        
		   @endif










         

        </div>
      </main>
      
    </div>
  </div>
</div>





















        </div>
</div><div>
    {{-- The best athlete wants his opponent at his best. --}}
</div>
