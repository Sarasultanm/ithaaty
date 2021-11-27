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
      <main class="col-span-10">
        <div class="mt-4 mt-4 p-5 bg-custom-pink rounded-md">
	        <div class="grid gap-4 grid-cols-10">
	            <div class="col-span-2 bg-white p-1">
	                <div class="text-sm text-gray-700">
	                   <div class="text-white bg-cover h-36">
	                       <img class="h-full mx-auto my-0" src="https://d3t3ozftmdmh3i.cloudfront.net/production/podcast_uploaded/17789837/17789837-1631013743470-36b9d215bea63.jpg" alt="">
	                   </div>
	                </div>
	               <!--  <div>
	                  <div class="flex space-x-3">
	                    <div class="min-w-0 flex-1">
	                      <p class="text-md font-bold text-gray-900 mt-2">
	                        <a href="#" class="hover:underline">Playlist Name</a>
	                      </p> 
	                    </div>
	                   
	                  </div>
	                </div> -->

	            </div>
	           <div class="col-span-8">
	            	<p class="text-md font-regular text-white mt-2">{{ $playlist->playlist_status }} Playlist</p>
	            	<p class="text-6xl font-bold text-white mt-2 mb-5">{{ $playlist->playlist_title }} </p>
	            	<p class="text-white mt-2"><span class="text-xs font-bold ">{{ $playlist->get_user->name }}</span> , <span class="text-xs font-regular ">{{ $playlist->get_playlistItems->count() }} podcast</span> </p>
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

      </main>
      <!-- aside -->
    
      <!-- aside -->
    </div>
  </div>
</div>





















        </div>
</div>






