 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trending') }}
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

        <div class="mt-4">
          <div class="mb-5 w-full ">
          	 <h1 class="font-bold text-gray-800 text-xl">Trending for you</h1> 
          </div>

           <div class="w-full ">
          	 <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>
         	
         <div class="mt-4">
          <div class="mb-5 w-full ">
          </div>  
              <table class="min-w-full divide-y divide-gray-200">
                <tbody class=" divide-y divide-gray-200">
                  @foreach($topPodcast as $tops)  
                    <tr class="border-b-2">
                    <!--   <td class="w-16">
                      <img src="{{ asset('images/slider-img/slide1.jpg') }}" class="w-full"> 
                      </td> -->
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                      	 <small>Trending</small><br>
                         <strong>{{ $tops->audio_name }}</strong>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                         Likes {{ $tops->get_like->count()  }}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                         <div class="flex-shrink-0 self-center flex">

	                   <div  x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false" class="relative inline-block text-left">
	                        <div>
	                          <button type="button" class="-m-2 p-2 rounded-full flex items-center text-gray-400 hover:text-gray-600" id="options-menu-0-button" aria-expanded="false" aria-haspopup="true" @click="open = !open">
	                            <span class="sr-only">Open options</span>
	                            <!-- Heroicon name: solid/dots-vertical -->
	                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
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
	                        class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-0-button" tabindex="-1">
	                          <div class="py-1" role="none">
	                            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
	                      		
	                            <a wire:click="" class="cursor-pointer text-gray-700 flex px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="options-menu-0-item-0">
	                            	<svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
	                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
	                              </svg>
	                              <span>Add to favorites</span>
	                            </a>
	                        
	                            


	                            <a href="#" class="text-gray-700 flex px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
	                              <!-- Heroicon name: solid/code -->
	                              <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
	                                <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
	                              </svg>
	                              <span>Embed</span>
	                            </a>
	                            <a href="#" class="text-gray-700 flex px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="options-menu-0-item-2">
	                              <!-- Heroicon name: solid/flag -->
	                              <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
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