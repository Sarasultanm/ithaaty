


 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Create') }}
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
          	 <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>


          <div class="mb-5 w-full ">
          	<div class="">
          		 <h1 class="flex-1  font-bold text-gray-800 text-xl">Ads Video Details</h1> 
          	  	  <p class="mt-1 text-sm text-gray-500">
                    This information will be displayed publicly so be careful what you share.
                  </p>
          	</div>
          	
          </div>

          <!-- tab list -->
          	<div x-data="{
			      openTab: 1,
			      activeClasses: 'border-indigo-500 text-indigo-600',
			      inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
			    }" 
			    class="">


			    <div class="border-b border-gray-200">
				  	<ul class="-mb-px flex" >
				      <li @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
				        <a>Details</a>
				      </li>
				      <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
				        <a>Videos List</a>
				      </li>
		             <li @click="openTab = 3"  :class="openTab === 3 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
		              <a>Add Videos Ads</a>
		            </li>
				    </ul>
				</div>


				<div class="w-full pt-4">
					<div x-show="openTab === 1">
			            <div class="mb-2">
			                      <div class="relative  py-5 px-3 flex items-center space-x-3 ">
			                        <div class="flex-shrink-0">
			                          <img class="h-20 w-auto" src="{{ asset('ads/company/'.$ads_info->ads_logo) }}" alt="">
			                        </div>
			                        <div class="flex-1 min-w-0">
			                            <p class="text-3xl font-bold text-gray-900 mb-2">
			                              {{ $ads_info->ads_name }}
			                            </p>
			                            <p class="text-sm text-gray-500 truncate">
			                              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-left mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
			                              </svg>
			                               {{ $ads_info->ads_website }}
			                            </p>
			                             <p class="text-sm text-gray-500 truncate">
			                              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4  float-left  mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
			                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
			                              </svg>
			                              {{ $ads_info->ads_location }}
			                            </p>
			                         
			                        </div>
			                        <div class="flex">
			                        	@if($ads_info->ads_status == "Confirm")
			                        	 <button class="pointer inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2  text-base font-medium text-black border-gray-300 hover:bg-green-700 hover:text-white sm:col-start-2 sm:text-md">
			                             Active
			                            </button>
			                        	@else
			                        	 <button wire:click="confirmComp({{$ads_id}})" class="pointer inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2  text-base font-medium text-black border-gray-300 hover:bg-green-700 hover:text-white sm:col-start-2 sm:text-md">
			                             Confirm 
			                            </button>


			                        	@endif
			                          
			                        </div>
			                      </div>
			            </div>

			            <div class="border-t-2 pb-10 border-green-500 ">
			            	 <div class="mt-5 w-full flex">
				                <div class="flex-1">
				                   <h1 class="font-bold text-gray-800 text-xl">Submit</h1> 
				                     <div class="mt-2">
					                    <div class="text-sm font-medium text-gray-900">
					                   	{{ $ads_info->get_user->name }} 
					                    </div>
					                    <div class="text-sm text-gray-500">
					                    {{ $ads_info->get_user->email }} 
					                    </div>
					                    <div class="text-sm text-gray-500">
					                      <strong>   </strong>
					                    </div>
					                  </div>
				                </div>

				                <div class="text-right">
				                   <h1 class="flex-1 font-bold text-gray-800 text-xl ">Supporting Documents</h1> 
				                     <p class="mt-1 text-sm text-gray-500">
				                        Please click the link below to see the documents
				                      </p>
				                       <a href="{{ $ads_info->ads_filelink }}" class="mt-5 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2  text-base font-medium text-white border-gray-300 bg-green-500 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md">
			                             Check Documents
			                            </a>
				                     
				                </div>
				                
				              </div>
			            </div>

				    </div>		

				    <div  x-show="openTab === 2">
				    	@if($ads_info->ads_status == "Confirm")
				    	<!-- table list -->

			        		<div class="flex flex-col">
								  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
								    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
								      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
								        <table class="min-w-full divide-y divide-gray-200">
								          <thead class="bg-gray-50">
								            <tr>
								              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								               Activity
								              </th>
								             <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								               Skip Duration
								              </th>
								              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								             	Display Time
								              </th>
								              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								                Status
								              </th>
								              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								                File Link
								              </th>
								              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								                Action
								              </th>
								            <!--   <th scope="col" class="relative px-6 py-3">
								                <span class="sr-only">Edit</span>
								              </th> -->
								            </tr>
								          </thead>
								          <tbody class="bg-white divide-y divide-gray-200">
								          @foreach($ads_list as $ads)
								            <tr>
								              <td class="px-6 py-4 whitespace-nowrap">
								                <div class="flex items-center">
								                  <div class="flex-shrink-0 h-10 w-10">
								                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
								                  </div>
								                  <div class="ml-4">
								                    <div class="text-sm font-medium text-gray-900">
								                    {{ $ads->adslist_name }}
								                    </div>
								                    <div class="text-sm text-gray-500">
								                      {{ $ads->adslist_videolink }}
								                    </div>
								                    <div class="text-sm text-gray-500">
								                      <strong>   </strong>
								                    </div>
								                  </div>
								                </div>
								              </td>
								              <td class="px-6 py-4 whitespace-nowrap">
								               <!--  <div class="text-sm text-gray-900">Category</div> -->
								                <div class="text-sm text-gray-500">{{ $ads->adslist_adstype }}</div>
								              </td>
								              <td class="px-6 py-4 whitespace-nowrap">
								               <!--  <div class="text-sm text-gray-900">Category</div> -->
								                <div class="text-sm text-gray-500">{{ $ads->adslist_displaytime }}</div>
								              </td>
								              <td class="px-6 py-4 whitespace-nowrap">
								              	 <div class="text-sm font-bold text-gray-500">{{ $ads->adslist_status }}</div>
								              </td>
								               <td class="px-6 py-4 whitespace-nowrap">
								              	  <a href="{{ $ads->adslist_videolink }}" target="_blank" class="inline-flex justify-center shadow-sm text-base font-medium text-indigo-500 hover:text-indigo-800 hover:underline  sm:col-start-2 sm:text-sm">Open link
			               						 </a> 
								              </td>
								              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
								              	  @if($ads->adslist_status == "Confirm")
								           		 <a href="{{ route('adminAdsSetup',['id' => $ads->id]) }}" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-2 py-2 border-gray-200 text-base font-medium text-black hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Setup
			               						 </a> 

			               						 @else

			               						 <button wire:click="confirmVideo({{$ads->id}},{{$ads->adslist_id}})" class="pointer inline-flex justify-center rounded-md border border-transparent shadow-sm px-2 py-2 border-gray-200 text-base font-medium text-black hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Approve
			               						 </button> 

								               	@endif
								              </td>
								             <!--  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
								                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
								              </td> -->
								            </tr>
								            @endforeach
								            <!-- More people... -->
								          </tbody>
								        </table>
								      </div>
								    </div>
								  </div>
							</div>

						<!-- table list-->
						@else

							 <div class="mt-5 w-full ">
				                <div class="text-center">
				                   <h1 class="flex-1 font-bold text-gray-800 text-xl">Company status is still Pending </h1> 
				                     <p class="mt-1 text-sm text-gray-500">
				                        Please check he document for verification
				                      </p>
				                </div>
				                
				              </div>


						@endif
				    </div>


				    <div  x-show="openTab === 3">
				<!-- table list -->

					@if($ads_info->ads_status == "Confirm")

		        	<div class="border-b-2 pb-10 border-green-500 ">	
			        	<div class="mt-5">
		                    <label for="email" class="block text-sm font-medium text-gray-700">Title</label>
		                    <div class="mt-1">
		                      <input type="text" name="name" id="name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md " wire:model="adslist_name">

		                    </div>
				        </div>

				      
				        <div class="mt-5">
		                    <label for="email" class="block text-sm font-medium text-gray-700">Video Link</label>
		                    <div class="mt-1">
		                      <input type="text" name="website" id="website" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="adslist_videolink">

		                    </div>
				        </div>

				       

				        <div class="mt-5">
			                <div class="flex">
							  <div class="flex-1 mr-2">
							  	<label for="email" class="block text-sm font-medium text-gray-700">Skip Duration</label>
			                    <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"   wire:model="adslist_adstype">
			                        <option>Select</option>
			                        <option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
			             		 </select> 

							  </div>
							 <!--  <div class="flex-1 ml-2">
							  	<label for="email" class="block text-sm font-medium text-gray-700">Duration Time</label>
			                    <div class="mt-1">
			                      <input type="text" name="website" id="website" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="adslist_durationtype">

			                    </div>


							  </div> -->
							   <div class="flex-1 ml-2">
							  	<label for="email" class="block text-sm font-medium text-gray-700">Display Time</label>
			                    <div class="mt-1">
			                      <!-- <input type="text" name="website" id="website" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="adslist_displaytime"> -->
			                       <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"   wire:model="adslist_displaytime">
			                        <option>Select</option>
			                        <option value="10%">10%(Preroll)</option>
									<option value="10%">20%</option>
									<option value="10%">30%</option>
									<option value="10%">40%</option>
									<option value="10%">50%(Midroll)</option>
									<option value="10%">60%</option>
									<option value="10%">70%</option>
									<option value="10%">80%</option>
									<option value="10%">90%</option>
									<option value="10%">100%(Postroll)</option>

			             		 </select> 
			                    </div>


							  </div>
							 
							</div>
						</div>
				    </div>
					<div class="mt-3 text-right sm:mt-5 mb-5">
						              			
				        <button wire:click="addAdsList({{$ads_id}})" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md">
				         Save Video 
				        </button>
					</div>

					@else

							 <div class="mt-5 w-full ">
				                <div class="text-center">
				                   <h1 class="flex-1 font-bold text-gray-800 text-xl">Company status is still Pending </h1> 
				                     <p class="mt-1 text-sm text-gray-500">
				                        Please check he document for verification
				                      </p>
				                </div>
				                
				              </div>


						@endif
		        	<!-- table list-->

				    </div>


				</div>

			</div>    


          <!-- tab list -->











        	 
        

        </div>
      </main>
      <!-- aside -->
     
      <!-- aside -->
    </div>
  </div>
</div>



















  <!--  <div class="text-xs bottom-0 hidden" wire:poll.750ms> Current time: {{ now() }} </div> -->

        </div>
</div>






