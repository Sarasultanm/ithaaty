<li class="relative px-4 py-6 bg-white shadow sm:p-6 sm:rounded-lg">
                                            
    @if($socialAds->count() != 0)

    
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
                <a target="_blank" href="{{ $socialAds->first()->adslist_weblink }}" class="absolute inset-0 cursor-pointer" aria-hidden="true"></a>
       
            @elseif($socialAds->first()->adslist_videotype == 'video')
                <video class="w-full rounded-md h-80"" controls>
                    <source src="{{ $ads_social_link }}" type="video/mp4">
                    <source src="{{ $ads_social_link }}" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            @else
                <video class="w-full rounded-md h-80" poster="{{ asset('images/default_user.jpg') }}"  controls>
                    <source src="{{ $ads_social_link }}" type="video/mp4">
                    <source src="{{ $ads_social_link  }}" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            @endif
        </div>

        
    @endif
  
  </li>