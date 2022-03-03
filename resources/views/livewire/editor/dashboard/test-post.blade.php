
<li class="bg-white border-2 px-4 py-6 sm:p-6 mb-5">
    <div>
      <div class="flex space-x-3">

        <div class="flex-shrink-0">
             <img class="h-28 w-28 rounded-md" src="{{ asset('images/default_user.jpg') }}" alt="">
        </div>

        <div class="min-w-0 flex-1">
          <p class="font-bold text-3xl text-gray-900 h-16 break-words">
               <a href="#" class="hover:underline">Dough Gaming  Podcast</a>
          </p>
          <p class="font-bold text-gray-700 text-md">
                <a href="#" class="hover:underline">Channel Name</a>
          </p>
          <p class="font-regular text-gray-500 text-md">0 Subcribers</p>
        </div>

        <div class="flex-shrink-0 self-center flex mb-auto">
         <div x-cloak  x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false" class="relative inline-block text-left">
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
              class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-30" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-0-button" tabindex="-1">

                <div class="py-1" role="none">
                  <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                  
                        <a class="bg-gray-100 text-gray-900 flex px-4 py-2 text-sm cursor-pointer hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                            <svg class="mr-3 h-5 w-5 text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span>Favorites</span>
                        </a>
                        
                            <!-- Heroicon name: solid/star -->
                        <a  @click="modal = !modal" class=" text-gray-900 flex px-4 py-2 text-sm cursor-pointer hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                <span>Report</span>
                        </a>

                        <div  x-data="{ open: false }" @click.away="open = false">

                            <a  @click="open = !open" class="cursor-pointer text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"></path>
                                </svg>
                                <span>Share</span>
                            </a>

                        <div x-show="open" >
                                <a class="cursor-pointer pl-10 text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                                <span>Embed</span>
                                </a>

                            
                                <a class="cursor-pointer pl-10 text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                </svg>
                                <span>Copy Link</span>
                                </a>
                            
                                <a  class="cursor-pointer pl-10 text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                <i class="fab fa-facebook-square mr-3 h-5 w-5 text-gray-400" style="font-size: 20px;"></i>
                                <span>
                                Facebook
                                </span>
                                </a>

                                <a  class="cursor-pointer pl-10 text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                <i class="fab fa-twitter-square mr-3 h-5 w-5 text-gray-400" style="font-size: 20px;"></i>
                                <span>
                                Twitter
                                </span>
                                </a>
                            </div>

                        </div>
                   
                        <a  class="cursor-pointer text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg><span>Private</span>
                        </a>
                    
                </div>
              </div>
            </div>           
           

        </div>
      </div>
    </div>

    <div class="flex justify-between mt-5 p-2 shadow-md space-x-3 relative rounded-md">                    
        <div class="bg-center bg-cover h-20 h-25 rounded-lg w-20" 
            style="background-image:url(http://s3.ap-southeast-1.amazonaws.com/ithaaty-local-new-file/users/podcast_img/GLtRfsFvXBChYuM9ubonDGonDCibIlDBjUDmYRFl.jpg)">
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-lg font-bold text-gray-900"> ParrotCho</p>
            <p class="mt-2 text-sm text-gray-500 truncate">Velit placeat sit ducimus non sed Velit placeat sit ducimus non sed Velit placeat sit ducimus non sed</p>
            <p class="mt-2 text-xs text-gray-500 truncate">
                Season 1 : Episode 1
            </p>
        </div>
        <div class="inline-flex flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">
            <p class="text-sm text-gray-500">
                <a href="#" class="hover:underline flex">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                    class="h-5 w-5 float-left" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{-- <span class="ml-2 capitalize">Public</span>  --}}
                </a>
            </p> 
        </div>
        <a href="#" class="absolute inset-0 cursor-pointer" aria-hidden="true"></a>
    </div>


                    <!-- like/ -->
    <div x-data="{
        openTab: 1,
        activeClasses: 'border-indigo-500 text-indigo-600',
        inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
        }" >
      
        <div class="mt-6 flex justify-between space-x-8">
                        <div class="flex space-x-6">
      
                          <span class="inline-flex items-center text-sm" @click="openTab = 4"  :class="openTab === 4 ? activeClasses : inactiveClasses" >
                          
                             <button class="inline-flex space-x-2 text-green-600 hover:text-green-700" >

                              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                              </svg>
                              <span class="font-medium text-gray-900">0</span>
                              <span class="sr-only">likes</span>
                            </button>
                          </span>
      

      
                          <span class="inline-flex items-center text-sm" @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses" >
                            <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                              <!-- Heroicon name: solid/chat-alt -->
                              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                              </svg>
                              <span class="font-medium text-gray-900">0</span>
                              <span class="sr-only">replies</span>
                            </button>
                          </span>
      
                          <span class="inline-flex items-center text-sm">
                            <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                              <!-- Heroicon name: solid/eye -->
                              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                              </svg>
                              <span class="font-medium text-gray-900">0</span>
                              <span class="sr-only">views</span>
                            </button>
                          </span>
                        </div>
      
                        <div class="flex text-sm">
                        
                          <!-- notes -->
                          <span class="inline-flex items-center text-sm mr-3" @click="openTab = 2"  :class="openTab === 2 ? activeClasses : inactiveClasses"   >
                            <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                             <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                              <span class="font-medium text-gray-900">Notes</span>
                            </button>
                          </span>
                           <!-- notes -->
                          
                           <!-- referrence -->
                           <span class="inline-flex items-center text-sm" @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses" >
                            <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                           <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                              <span class="font-medium text-gray-900">Referrence</span>
                            </button>
                          </span>
                         
                        </div>
      
                      </div>
      
                    <div x-show="openTab === 1">
                        <div class="mt-5">
                            <div class="mt-1">
                              <input type="text" name="email" id="email" placeholder="Comments" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"   >
                            </div>
                          </div>
                        <!-- comments -->

                     
                        <!-- comments -->
      
                    </div>
      
      
                <div x-show="openTab === 2">

                </div>
      
                <div x-show="openTab === 3">
                 
                </div>
                <div x-show="openTab === 4">
                  
      
                </div>
                      
                 
                 </div>
      
                  <!-- like/ -->



  </li>