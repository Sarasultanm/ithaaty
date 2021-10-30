


 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Ads Setup') }}
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
          	<div class="flex">
          		<div class="flex-1  ">
          			 <h1 class="font-bold text-gray-800 text-xl">Ads Video Setup</h1> 
          	  	  <p class="mt-1 text-sm text-gray-500">
                    This information will be displayed publicly so be careful what you share.

                   
                 </p>
          		</div>
          		<div>
                 <a href="{{route('adminAdsCreate')}}" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2  text-base font-medium text-black border-gray-500 hover:border-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Back to Details
                </a> 
                </div>
          	</div>
          	
          </div>

          <!-- tab list -->
          	
          	<!-- table list -->

		        	<div class="border-b-2 pb-10 border-green-500 ">
		        		<div class="mt-5">
		                    <label for="email" class="block text-sm font-medium text-gray-700">Podcast Video List</label>
		                     <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="setup_audioid">
			                        <option>Select</option>
			                        @foreach($audioList as $alist)
			                           <option value="{{$alist->id}}">{{ $alist->audio_name }} ( Season {{ $alist->audio_season }} : Episode {{ $alist->audio_episode }} ) </option>

			                        @endforeach   
			             	</select> 

				        </div>


				        <!-- <div class="mt-5">
		                    <label for="email" class="block text-sm font-medium text-gray-700">Ads Dispaly Type</label>
		                     <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="setup_rolltype">
			                        <option>Select</option>
			                        <option value="1">Preroll</option>
			                        <option value="50%">Midroll</option>
			                        <option value="100%">Postroll</option>
  
			             	</select> 

				        </div> -->


				    </div>

					<div class="mt-3 text-right sm:mt-5 mb-5">
						              			
				        <button wire:click="insertAds({{$ads_id}})" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md">
				         Save
				        </button>
					</div>

		        	<!-- table list-->


          <!-- tab list -->



          <div class="mt-5">


          	<!-- table list -->

			        		<div class="flex flex-col">
								  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
								    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
								      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
								        <table class="min-w-full divide-y divide-gray-200">
								          <thead class="bg-gray-50">
								            <tr>
								              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								               Podcast
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
								                Action
								              </th>
								            <!--   <th scope="col" class="relative px-6 py-3">
								                <span class="sr-only">Edit</span>
								              </th> -->
								            </tr>
								          </thead>
								          <tbody class="bg-white divide-y divide-gray-200">

								 
								          @if($setupList->count() != 0)	
								          @foreach($setupList as $adsList)
								            <tr>
								              <td class="px-6 py-4 whitespace-nowrap">
								                <div class="flex items-center">
								                  <div class="flex-shrink-0 h-10 w-10">
								                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
								                  </div>
								                  <div class="ml-4">
								                    <div class="text-sm font-medium text-gray-900">
								                     {{ $adsList->get_audio->audio_name }}
								                    </div>
								                    <div class="text-sm text-gray-500">
								                     {{ $adsList->get_audio->get_user->name }}
								                    </div>
								                    <div class="text-sm text-gray-500">
								                      <strong>   {{ $adsList->get_audio->get_user->email }} </strong>
								                    </div>
								                  </div>
								                </div>
								              </td>
								              <td class="px-6 py-4 whitespace-nowrap">
								                <div class="text-sm text-gray-500">{{$adsList->get_adslist->adslist_adstype}}</div>
								              </td>
								               <td class="px-6 py-4 whitespace-nowrap">
								                <div class="text-sm text-gray-500">{{$adsList->get_adslist->adslist_displaytime}}</div>
								              </td>
								              <td class="px-6 py-4 whitespace-nowrap">
								              	 <div class="text-sm font-bold text-gray-500">Active</div>
								              </td>
								              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
								           		<!--  <a href="" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-2 py-2 border-gray-200 text-base font-medium text-black hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Setup
			               						 </a>  -->
								               
								              </td>
								             <!--  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
								                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
								              </td> -->
								            </tr>
								            @endforeach
								             @endif
								            <!-- More people... -->
								          </tbody>
								        </table>
								      </div>
								    </div>
								  </div>
							</div>

						<!-- table list-->
          	
          </div>







        	 
        

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






