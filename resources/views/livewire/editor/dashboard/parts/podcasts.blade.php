<?php use App\Http\Livewire\Editor\EditorDashboard; ?>
<div>
    <div class="flex space-x-3">
        <div class="flex-shrink-0">
              @php
                  $podcast_img = $audio->check_in_podcasts->get_podcast->get_channel_photo->gallery_path;
                  $podcast_img_s3_link = config('app.s3_public_link')."/users/podcast_img/".$podcast_img;
              @endphp
                 <img class="h-28 w-28 rounded-md" src="{{ $podcast_img_s3_link }}" alt="">
        </div>

      <div class="min-w-0 flex-1">
        <p class="font-bold text-3xl text-gray-900 h-16 break-words">
            <a href="{{ route('editorNewPodcastView',['link' => $audio->check_in_podcasts->get_podcast->podcast_uniquelink ]) }}"  
                target="_blank" 
                class="hover:underline">  
                {{ $audio->check_in_podcasts->get_podcast->podcast_title }}
            </a>
        </p>
        <p class="font-bold text-gray-700 text-md">
            <a href="{{ route('editorChannelView',['link' => $audio->check_in_podcasts->get_podcast->get_channel->channel_uniquelink ]) }}"
                 target="_blank" 
                 class="hover:underline">
                 {{ $audio->check_in_podcasts->get_podcast->get_channel->channel_name }}
            </a>
        </p>
        <p class="font-regular text-gray-500 text-md">0 Subcribers</p>
      </div>
      {{-- <div class="flex-shrink-0">
        @if($audio->get_user->get_profilephoto->count() == 0)
           <img class="h-10 w-10 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="">
        @else
          <?php $profile_path = $audio->get_user->get_profilephoto->first()->gallery_path; ?>
          <img class="h-10 w-10 rounded-full" src="{{ asset('users/profile_img/'.$profile_path) }}" alt="">
        @endif
        
      </div>

      <div class="min-w-0 flex-1">
        <p class="text-sm font-medium text-gray-900">
           @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
           <a>{{ $audio->get_user->name }}</a>
           @else
             @if(Auth::user()->get_plan->check_features('s3')->count() != 0 )
             <a href="/editor/users/{{ $audio->audio_editor }}" class="hover:underline">{{ $audio->get_user->name }}</a>
             @else
              <a>{{ $audio->get_user->name }}</a>
             @endif
           @endif
        </p>
        <p class="text-sm text-gray-500">
          <a href="#" class="hover:underline flex">
           @if($audio->audio_status =='private' )
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg><span class="ml-2 capitalize mt-1">Private</span>
            @else
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 float-left" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg><span class="ml-2 capitalize">Public</span>
              
            @endif
          </a>
        </p>
      </div> --}}

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
                @if( EditorDashboard::checkFav($audio->id) == 0 ) 
                    @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
                    @else
                       @if(Auth::user()->get_plan->check_features('s5')->count() != 0 )
                      <a wire:click="favorite({{ $audio->id }})" class="cursor-pointer text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                        <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span>Add to favorites</span>
                      </a>
                      @endif
                 @endif
                @else
                 <a class="bg-gray-100 text-gray-900 flex px-4 py-2 text-sm cursor-pointer hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                   <svg class="mr-3 h-5 w-5 text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <span>Favorites</span>
                </a>
                @endif  
                  <!-- Heroicon name: solid/star -->
               <div x-data="{modal: false}" >
                   <a   @click="modal = !modal" class=" text-gray-900 flex px-4 py-2 text-sm cursor-pointer hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                      </svg>
                      <span>Report</span>
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
              
                              <div >
                                <!-- friends -->

                                <div class="mt-5">
                                  <label for="location" class="block text-sm font-medium text-gray-700">Report Type</label>
                                  <select wire:model="report_type"  class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option>Select</option>
                                    <option value="r1">Report One</option>
                                    <option value="r2">Report Two</option>
                                    <option value="r3">Report Three</option>
                                  </select>
                                  @error('report_type') <span class="text-xs text-red-600">Empty fields</span> @enderror
                                  
                                </div>

                                <div class="mt-5">
                                  <label for="about" class="block text-sm font-medium text-gray-700">
                                    Comments
                                  </label>
                                  <div class="mt-1">
                                    <textarea  wire:model="report_message" rows="5" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                  </div>
                                  @error('report_message') <span class="text-xs text-red-600">Empty fields</span> @enderror
                                </div>


                                <!-- friends-->

                              </div>
                            
                            <div class="mt-5 sm:mt-6">
                              <button  wire:click="reportAudio({{ $audio->id }})" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white ">
                                Submit Report
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                     <!-- modal -->
               </div>

               <div  x-data="{ open: false }" @click.away="open = false">
                <a  @click="open = !open" class="cursor-pointer text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
             
                  <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"></path>
                  </svg>
                  <span>Share</span>
                </a>

                 <div x-show="open" >
                  <textarea   style="display:none;"  id="myEmbed{{$audio->id}}"><iframe width="500px" height="385px" src="{{ URL::to('/embed/'.$audio->id) }}" title="Ithatty" frameborder="0"  allowfullscreen></iframe>
                  </textarea>
                  <a onclick="copyEmded('myEmbed{{$audio->id}}')"  class="cursor-pointer pl-10 text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                    <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                  <span>Embed</span>
                  </a>

                   <input style="display:none;" type="text" value="{{ URL::to('/post/'.$audio->id) }}" id="myInput{{$audio->id}}">
                  <a onclick="copyLink('myInput{{$audio->id}}')" class="cursor-pointer pl-10 text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                    </svg>
                    <span>Copy Link</span>
                  </a>
                 
                  <a wire:click="shareButton('facebook',{{ $audio->id }})" class="cursor-pointer pl-10 text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                   
                    <i class="fab fa-facebook-square mr-3 h-5 w-5 text-gray-400" style="font-size: 20px;"></i>
                    <span>
                     Facebook
                    </span>
                  </a>

                   <a wire:click="shareButton('twitter',{{ $audio->id }})" class="cursor-pointer pl-10 text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                   
                    <i class="fab fa-twitter-square mr-3 h-5 w-5 text-gray-400" style="font-size: 20px;"></i>
                    <span>
                     Twitter
                    </span>
                  </a>

                 
                 
                  
                </div>

              </div>
                 
              @if($audio->audio_editor == Auth::user()->id)  
                @if( $audio->audio_status == 'private')
                 <a wire:click="publicAudio({{ $audio->id }})" class="cursor-pointer text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-2">
                
                  <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <span>Public</span>
                </a>
                @else
                <a wire:click="privateAudio({{ $audio->id }})" class="cursor-pointer text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-2">
                   <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                  </svg><span>Private</span>
                </a>
                  


                @endif

                @endif
              </div>
            </div>
          </div>           
         

      </div>
      
    </div>


  </div>