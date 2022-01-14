 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Users Dashboard') }}
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

      <main class="xl:col-span-10 lg:col-span-9">
      	
      	<!-- playlist -->
        <div class="mt-4 mt-4 p-5 bg-custom-pink rounded-md">
	        <div class="grid gap-4 grid-cols-10">
	            <div class="col-span-2 bg-white p-1">
	                <div class="text-sm text-gray-700">
	                   <div class="text-white bg-cover h-36">
	                   	   <?php  $defaul_img = 'slide'.rand(1,10).'.jpg'; ?>
	                       <img class="h-full mx-auto my-0" src="{{ asset('images/slider-img/'.$defaul_img) }}" alt="">
	                   </div>
	                </div>
	            </div>
	           <div class="col-span-8">
	            	<p class="text-md font-regular text-white mt-2">{{ $playlist->playlist_status }} Playlist </p>
	            	<p class="text-6xl font-bold text-white mt-2 mb-5">{{ $playlist->playlist_title }} </p>
	            	<p class="text-white mt-2"><span class="text-xs font-bold ">{{ $playlist->get_user->name }}</span> , <span class="text-xs font-regular ">{{ $playlist->get_playlistItems->count() }} podcast</span> </p>
	            	<div x-data="{ share: false }" @click.away="share = false">
	            		<button @click="share = !share"  class="bg-white text-custom-pink font-regular text-sm py-1 px-3 rounded">Share</button>
	            		 <div 
                           x-show="share" 
                           x-transition:enter="transition ease-out duration-100" 
                           x-transition:enter-start="transform opacity-0 scale-95" 
                           x-transition:enter-end="transform opacity-100 scale-100" 
                           x-transition:leave="transition ease-in duration-75" 
                           x-transition:leave-start="transform opacity-100 scale-100" 
                           x-transition:leave-end="transform opacity-0 scale-95" 
                          class="origin-top-right absolute mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-30" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-0-button" tabindex="-1">

                          <div x-data="{modal: false}" class="py-1" role="none">

                          	 <a @click="modal = !modal"  class="cursor-pointer text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                								<svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
                                 <span>Friends</span>
                             </a>

                             <!-- modal -->


                             <!-- This example requires Tailwind CSS v2.0+ -->
															<div x-cloak x-show="modal"  class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
															  <div 
															   x-transition:enter="transition ease-out duration-100" 
			                           x-transition:enter-start="transform opacity-0 scale-95" 
			                           x-transition:enter-end="transform opacity-100 scale-100" 
			                           x-transition:leave="transition ease-in duration-75" 
			                           x-transition:leave-start="transform opacity-100 scale-100" 
			                           x-transition:leave-end="transform opacity-0 scale-95"
															  class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0" >
															  
															    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"  @click="modal = false, share = false"></div>

															    <!-- This element is to trick the browser into centering the modal contents. -->
															    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

															    <div 
															     x-transition:enter="transition ease-out duration-300" 
				                           x-transition:enter-start="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
				                           x-transition:enter-end="transform opacity-100 translate-y-0 sm:scale-100" 
				                           x-transition:leave="transition ease-in duration-200" 
				                           x-transition:leave-start="transform opacity-100 translate-y-0 sm:scale-100" 
				                           x-transition:leave-end="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
															    class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
															      <div>
															       <!--  <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
															          <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
															            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
															          </svg>
															        </div> -->
															        <div class="mt-3  sm:mt-5">
															        	<!-- friends -->

															        	<div>
																				  <label for="location" class="block text-sm font-medium text-gray-700">Friend List</label>
																				  <select wire:model="friends" id="location" name="location" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
																				  			 <option>Select</option>
																				  	@foreach($friendList as $friends)
																					  	@if($friends->friend_status == "active" && $friends->friend_type == "Friends")
																							  	@if(Auth::user()->id == $friends->friend_userid )
																							  	@if($friends->get_request_user->check_shared_playlist($playlist->id)->count() == 0)
																							  	 <option value="{{$friends->get_request_user->id}}">{{ $friends->get_request_user->name }}
																							  	 
																							  	 </option>
																							  	 @endif
																	                @else
																	                @if($friends->get_add_friend->check_shared_playlist($playlist->id)->count() == 0)
																	                 <option value="{{$friends->get_add_friend->id}}">{{ $friends->get_add_friend->name }}

																	                 
																	                 </option>
																	                 @endif
																	                @endif  
																					    @endif
																						@endforeach

																				    
																				  </select>

																				   @error('friends') <span class="text-xs text-red-600">Empty fields</span> @enderror
																				</div>

															        	<!-- friends-->

															        </div>
															      </div>
															      <div class="mt-5 sm:mt-6">
															        <button  wire:click="sharedPlaylist({{$playlist->id}})" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white ">
															          Share Playlist 
															        </button>
															      </div>
															    </div>
															  </div>
															</div>










                             <!-- modal -->

                             <a  class="cursor-pointer text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                  <i class="fab fa-facebook-square mr-3 h-5 w-5 text-gray-400" style="font-size: 20px;"></i>
                                  <span>Facebook</span>
                             </a>
                             <a class="cursor-pointer text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                  <i class="fab fa-twitter-square mr-3 h-5 w-5 text-gray-400" style="font-size: 20px;"></i>
                                  <span>Twitter</span>
                             </a>
                         </div>

                  </div>

	            	</div>
	            </div>
	            
	        </div>


        </div>




       <div class="w-full pt-4">

            <div class="grid gap-4 grid-cols-10">
            	 <div class="col-span-10">
            	 	<div class="flex flex-col">

            	 		<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
					    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
					      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
					        <table class="min-w-full divide-y divide-gray-200">
					          <thead class="bg-gray-50">
					            <tr>
					              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase w-2">
					               #
					              </th>
					              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-3/4">
					               Title
					              </th>
					              <!-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					               
					              </th> -->
					             <!--  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					                Post
					              </th> -->
					              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					                Date Added
					              </th>
					            <!--   <th scope="col" class="relative px-6 py-3">
					                <span class="sr-only">Edit</span>
					              </th> -->
					            </tr>
					          </thead>
					          <tbody class="bg-white divide-y divide-gray-200">
					          	@foreach($playlist->get_playlistItems as $playlistItems)
					            <tr class="a">
					     
					            	<td class="px-6 py-4 whitespace-nowrap ">
					              		 <div class="text-sm font-bold text-gray-500">#</div>
					             	 </td>
						              <td class="px-6 py-4 whitespace-nowrap">
						              	<a href="{{ route('editorPodcastView',['id' => $playlistItems->get_audio->id ]) }}" target="_blank" class="pointer">
						                <div class="flex items-center">
						                  <div class="flex-shrink-0 h-10 w-10">
						                    <img class="h-10 w-10 " src="https://d3t3ozftmdmh3i.cloudfront.net/production/podcast_uploaded/17789837/17789837-1631013743470-36b9d215bea63.jpg" alt="">
						                  </div>
						                  <div class="ml-4">
						                    <div class="text-sm font-medium text-gray-900">
						                      {{ $playlistItems->get_audio->audio_name }}
						                    </div>
						                    <div class="text-sm text-gray-500">
						                     <strong>{{ $playlistItems->get_user->name }}</strong>
						                    </div>
						                  </div>
						                </div>
						            	</a>
						              </td>
					              <!-- <td class="px-6 py-4 whitespace-nowrap">
					              
					                <div class="text-sm text-gray-500"></div>
					              </td> -->
					              <!-- <td class="px-6 py-4 whitespace-nowrap">
					              	 <div class="text-sm font-bold text-gray-500">asdasd</div>
					              </td> -->
						              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
						             	12/12/12
						               
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


            	</div>
            	@foreach($playlist->get_playlistItems as $playlistItems)
               
                	

            	

            	@endforeach
  
            </div>


          </div>
          <!-- playlist -->
          
      </main>
      <!-- aside -->
    
      <!-- aside -->
    </div>
  </div>
</div>





















        </div>
</div>






