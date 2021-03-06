 <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Trending') }}
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
          
           <div class="w-full ">
          	 <x-auth-session-status-custom class="mt-4 mb-4" :status="session('status')" />
          </div>
         	
         <div class="mt-4">
           <div class="p-5 mt-4 rounded-md bg-custom-gray">
              <div class="grid grid-cols-12 gap-4">
                  <div class="col-span-3">
                      <div class="text-sm text-gray-700">
                         <div class="text-white bg-cover h-36">

                             <img class="h-full mx-auto my-0" src="{{ asset('images/logo.png') }}" alt="">
                         </div>
                      </div>
                  </div>
                 <div class="col-span-7">
                    <p class="mt-2 text-white text-md font-regular">Playlist</p>
                    <p class="mt-2 mb-5 text-6xl font-bold text-white">Popular </p>
                    <p class="mt-2 text-white"><span class="text-xs font-bold ">Text here</span> , <span class="text-xs font-regular ">text podcast</span> </p>
                  </div>
              </div>


            </div>

         <!--      <table class="min-w-full divide-y divide-gray-200">
                <tbody class="divide-y divide-gray-200 ">
                  @foreach($topPodcast as $tops)  
                    <tr class="border-b-2">
                   
                      <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                      	 <small>Trending</small><br>
                         <strong>{{ $tops->audio_name }}</strong>
                      <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                         Likes {{ $tops->get_like->count()  }}
                      </td>
                      <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                         <div class="flex self-center flex-shrink-0">

	                   <div  x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false" class="relative inline-block text-left">
	                        <div>
	                          <button type="button" class="flex items-center p-2 -m-2 text-gray-400 rounded-full hover:text-gray-600" id="options-menu-0-button" aria-expanded="false" aria-haspopup="true" @click="open = !open">
	                            <span class="sr-only">Open options</span>
	 	                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
	                              <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
	                            </svg>
	                          </button>
	                        </div>
	                        <div 
	                         x-show="open" 
	                         x-transition:enter="transition ease-out duration-100" 
	                         x-transition:enter-start="transform opacity-0 scale-95" 
	                         x-transition:enter-end="transform opacity-100 scale-100" 
	                         x-transition:leave="transition ease-in duration-75" 
	                         x-transition:leave-start="transform opacity-100 scale-100" 
	                         x-transition:leave-end="transform opacity-0 scale-95" 
	                        class="absolute right-0 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-0-button" tabindex="-1">
	                          <div class="py-1" role="none">
	                           
	                      		
	                            <a wire:click="" class="flex px-4 py-2 text-sm text-gray-700 cursor-pointer" role="menuitem" tabindex="-1" id="options-menu-0-item-0">
	                            	<svg class="w-5 h-5 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
	                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
	                              </svg>
	                              <span>Add to favorites</span>
	                            </a>
	                        
	                            


	                            <a href="#" class="flex px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
	                
	                              <svg class="w-5 h-5 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
	                                <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
	                              </svg>
	                              <span>Embed</span>
	                            </a>
	                            <a href="#" class="flex px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-0-item-2">
	                             
	                              <svg class="w-5 h-5 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
	                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd" />
	                              </svg>
	                              <span>Report content</span>
	                            </a>
	                          </div>
	                        </div>
	                      </div>           
    	

                    </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table> 
 -->

                  <div class="mt-2 overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="w-2 px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">
                         #
                        </th>
                        <th scope="col" class="w-3/4 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                         Title
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                         
                        </th>
                       <!--  <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                          Post
                        </th> -->
                       <!--  <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                          Date Added
                        </th> -->
                      <!--   <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Edit</span>
                        </th> -->
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      @foreach($topPodcasts as $top)  
                      <tr class="a">
               
                        <td class="px-6 py-4 whitespace-nowrap ">
                             <div class="text-sm font-bold text-gray-500">#</div>
                         </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <!-- <a href="" target="_blank" class="pointer"> -->
                            <a href="{{ route('editorPodcastView',['id' => $tops->id ]) }}" target="_blank" class="pointer">
                            <div class="flex items-center">
                              <div class="flex-shrink-0 w-10 h-10">
                                <?php  $defaul_img = 'slide'.rand(1,10).'.jpg'; ?>
                                <img class="w-10 h-10 " src="{{ asset('images/slider-img/'.$defaul_img) }}" alt="">
                              </div>
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                  
                                    {{-- <small>{{ $tops->get_categories->category_name }}</small><br> --}}
                                     <strong> {{ $top->get_audio->audio_name }}</strong>
                                </div>
                                <div class="text-sm text-gray-500">
                                 <strong>  Likes {{ $top->get_audio->get_like->count()  }}</strong>
                                </div>
                              </div>
                            </div>
                          </a>
                          </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        
                          <div class="text-sm text-gray-500"> &nbsp;</div>
                        </td> 
                        <!-- <td class="px-6 py-4 whitespace-nowrap">
                           <div class="text-sm font-bold text-gray-500">asdasd</div>
                        </td> -->
                         <!--  <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                          12/12/12
                           
                          </td> -->
                       <!--  <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                          <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td> -->
                      </tr>
          
                      @endforeach
                     {{-- @foreach($topPodcast as $tops)  
                      <tr class="a">
               
                        <td class="px-6 py-4 whitespace-nowrap ">
                             <div class="text-sm font-bold text-gray-500">#</div>
                         </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <!-- <a href="" target="_blank" class="pointer"> -->
                            <a href="{{ route('editorPodcastView',['id' => $tops->id ]) }}" target="_blank" class="pointer">
                            <div class="flex items-center">
                              <div class="flex-shrink-0 w-10 h-10">
                                <?php  $defaul_img = 'slide'.rand(1,10).'.jpg'; ?>
                                <img class="w-10 h-10 " src="{{ asset('images/slider-img/'.$defaul_img) }}" alt="">
                              </div>
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">

                                     <strong>{{ $tops->audio_name }}</strong>
                                </div>
                                <div class="text-sm text-gray-500">
                                 <strong>  Likes {{ $tops->get_like->count()  }}</strong>
                                </div>
                              </div>
                            </div>
                          </a>
                          </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        
                          <div class="text-sm text-gray-500"> &nbsp;</div>
                        </td> 
  
                      </tr>
                      @endforeach --}}
                      <!-- More people... -->
                    </tbody>
                  </table>
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