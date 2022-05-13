@if($socialAds->count() != 0)
<li class="relative px-4 py-6 bg-white shadow sm:p-6 sm:rounded-lg">
                                          
        <div class="flex min-w-0">
          <div class="flex-1">
            <p class="text-lg font-bold text-gray-900 break-words h-7">
              <a href="{{ $socialAds->first()->adslist_weblink }}" target="_blank" class="hover:underline">
                {{ $socialAds->first()->adslist_name }}
              </a>
            </p>
            <p class="text-xs text-gray-700 font-regular">
                <a href="{{ $socialAds->first()->adslist_weblink }}" target="_blank" class="hover:underline">
                  {{ $socialAds->first()->adslist_webname }}
                </a>
              </p>
            <p class="text-xs text-gray-500 font-regular">{{ $socialAds->first()->adslist_desc }}</p>
          </div>
          <div class="flex-shrink-0">

            <!-- This example requires Tailwind CSS v2.0+ -->
              <div  x-cloak  x-data="{ open: false }"  class="relative inline-block text-left">
                <div>
                  <button @click="open = !open" type="button" class="flex items-center text-gray-400 rounded-full hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
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
                class="absolute right-0 z-30 w-56 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                  <div class="py-1" role="none">
                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                    {{-- <a wire:click="hideAds({{ $socialAds->first()->id }})" class="flex items-center px-4 py-2 text-sm text-gray-700 cursor-pointer group" role="menuitem" tabindex="-1" id="menu-item-0"> --}}
                      {{-- <a wire:click ="hideAds({{ $socialAds->first()->id }})" class="flex items-center px-4 py-2 text-sm text-gray-700 cursor-pointer group" role="menuitem" tabindex="-1" id="menu-item-0"> --}}
                        <a wire:click ="hideAds({{ $socialAds->first()->id }})" class="flex items-center px-4 py-2 text-sm text-gray-700 cursor-pointer group" role="menuitem" tabindex="-1" id="menu-item-0">
                      
                      <!-- Heroicon name: solid/pencil-alt -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" />
                        <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                      </svg>
                      
                      Hide ads
                    </a>
                    <a wire:click="reportAds({{ $socialAds->first()->id }})" class="flex items-center px-4 py-2 text-sm text-gray-700 cursor-pointer group" role="menuitem" tabindex="-1" id="menu-item-1">
                      <!-- Heroicon name: solid/duplicate -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                      </svg>
                      Report Ads
                    </a>
                  </div>
                  

                </div>
              </div>

     

          </div>
            
        </div>
        
     
        <div class="relative mt-2">
          @php
            $ads_social_link = config('app.s3_public_link')."/ads/social_ads/".$socialAds->first()->get_gallery->gallery_path ; 
          @endphp
        
            @if($socialAds->first()->adslist_videotype == 'image')
                <img class="w-full rounded-md h-80" src="{{ $ads_social_link }}" alt="" />
                <a  wire:click="viewSocialAds({{ $socialAds->first()->id }})" class="absolute inset-0 cursor-pointer" aria-hidden="true"  ></a>

                {{-- <a target="_blank" href="{{ $socialAds->first()->adslist_weblink }}" class="absolute inset-0 cursor-pointer" aria-hidden="true"></a>
        --}}
            @elseif($socialAds->first()->adslist_videotype == 'video')
                <video id="my-video" class="w-full rounded-md h-80">
                    <source src="{{ $ads_social_link }}" type="video/mp4">
                    <source src="{{ $ads_social_link }}" type="video/ogg">
                    Your browser does not support the video tag.
                </video>

                {{-- <button  wire:click="viewSocialAds({{ $socialAds->first()->id }})"   class="absolute inset-0 bg-gray-700 cursor-pointer" aria-hidden="true"  ></button>
                 --}}
                {{-- <div  x-data="{ open: false }">
                  <div  @click="open = !open" x-cloak >
                  
                    <a  x-show="!open" wire:click="viewSocialAds({{ $socialAds->first()->id }})"   class="absolute inset-0 cursor-pointer" aria-hidden="true"  ></a>
                    <a  x-show="open"  onclick="pauseAudio()" class="absolute inset-0 cursor-pointer" aria-hidden="true"  ></a>
                  </div>
                </div> --}}
             
                <script>
                  var video = document.getElementById("my-video"); 
                    function playAudio() {  video.play();  } 
                    function pauseAudio() {   video.pause();  } 
              </script>
            @else
                <video class="w-full rounded-md h-80" poster="{{ asset('images/default_user.jpg') }}"  controls>
                    <source src="{{ $ads_social_link }}" type="video/mp4">
                    <source src="{{ $ads_social_link  }}" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
                <a  wire:click="viewSocialAds({{ $socialAds->first()->id }})" class="absolute inset-0 cursor-pointer" aria-hidden="true"  ></a>
            
            @endif
        </div>

        

  
  </li>
  @endif