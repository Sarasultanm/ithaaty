
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
      <main class="lg:col-span-10 xl:col-span-10">

        <div class="mt-4">
          <!-- <div class="mb-5 w-full ">
          	 <h1 class="font-bold text-gray-800 text-xl">Overview</h1> 
          </div> -->

          <div class="w-full ">
          	 <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>

          @if($checkAudio == 'true')
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
		             <li @click="openTab = 3"  :class="openTab === 3 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
		              <a>References</a>
		            </li>
				      <li @click="openTab = 4"  :class="openTab === 4 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
				        <a>Sponsor</a>
				      </li>
				       <li @click="openTab = 5"  :class="openTab === 5 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
				        <a>Affiliate</a>
				      </li>

				      <li @click="openTab = 6"  :class="openTab === 6 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
				        <a>Q&A</a>
				      </li>
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


					</div>



					<div x-show="openTab === 4">
						

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

					</div>

					<div x-show="openTab === 5">

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

					</div>	

					<div x-show="openTab === 6">

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
      
    </div>
  </div>
</div>





















        </div>
</div><div>
    {{-- The best athlete wants his opponent at his best. --}}
</div>
