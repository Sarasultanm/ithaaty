
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
          <!-- <div class="mb-5 w-full ">
          	 <h1 class="font-bold text-gray-800 text-xl">Overview</h1> 
          </div> -->

          <div class="w-full ">
          	 <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>
          
        <form wire:submit.prevent="save"> 

	        <div>
                  <h2 class="text-lg leading-6 font-medium text-gray-900"> Creat Post</h2>
                  <p class="mt-1 text-sm text-gray-500">
                    This information will be displayed publicly so be careful what you share.
                  </p>
             </div>

	        <div class="border-t-2 border-green-500 ">	
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


		            <div class="border-t-2 border-green-500 mt-16"></div>   
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
	                <div class="mt-5">
			          <label for="about" class="block text-sm font-medium text-gray-700">
			            Hashtags 
			          </label>
			          <div class="mt-1">
			            <textarea rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="hashtags" ></textarea>
			          </div>
    				</div>



	   





			        
              <div class="mt-3  sm:mt-5 mb-20">
              	    <div class="w-full">
              	    	<div class="w-1/2 float-left">&nbsp;
              	    		
              	    		<ul>
              	    			<li></li>
              	    			<li></li>
              	    			<li></li>
              	    			<li></li>
              	    			<li></li>
              	    		</ul>
              	    		 
              	    	</div>
              	  		<div class="w-1/2 float-left text-right">
              	  			<button type="submit" class="w-1/2 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md">
				          Save
				        	</button>
              	  		</div>
              		
				        

				      </div>    
	    			<!--  <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
				      
				       <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm"  @click="open = false">
				          Close
				        </button>
				      </div> -->

			   </div>




			 
          	</form> 











         

        </div>
      </main>
      
    </div>
  </div>
</div>





















        </div>
</div><div>
    {{-- The best athlete wants his opponent at his best. --}}
</div>
