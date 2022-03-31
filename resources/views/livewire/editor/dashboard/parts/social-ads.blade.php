@if($socialAds->count() != 0)
<li class="relative px-4 py-6 bg-white shadow sm:p-6 sm:rounded-lg">
                                            


    
        <div class="flex-1 min-w-0">
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
        
     
        <div class="flex-shrink-0 mt-2">
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

                {{-- <button  wire:click="viewSocialAds({{ $socialAds->first()->id }})"   class="absolute inset-0 cursor-pointer bg-gray-700" aria-hidden="true"  ></button>
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