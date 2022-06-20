<div class="grid grid-cols-12 gap-5 mt-5">
    @if($podcastSearchResult)
    @foreach ($podcastSearchResult as $podcastResults)
        <div class="col-span-6 relative flex justify-between p-2 mb-5 space-x-3 rounded-md shadow-md">
            @if ($podcastResults->get_channel_photo->count() != 0) 
                @php 
                    $podcastSearchThumbnail_Path = $podcastResults->get_channel_photo->gallery_path; 
                    $podcastSearchThumbnail = config('app.s3_public_link')."/users/podcast_img/".$podcastSearchThumbnail_Path; 
                @endphp 
            @else 
                @php 
                    $podcastSearchThumbnail = asset('images/default_podcast.jpg');
                @endphp 
            @endif
            <div class="bg-center bg-cover rounded-lg w-28 h-28" 
                style="background-image:url({{ $podcastSearchThumbnail }})">
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-xl font-bold text-gray-900"> {{ $podcastResults->podcast_title }}</p>
                <p class="mt-0 text-sm text-gray-500 truncate">{{$podcastResults->get_channel->channel_name}}</p>
                <p class="flex mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                    </svg>
                    <span class="truncate text-gray-500 text-sm">{{ $podcastResults->get_episodes->count() }}</span>
                </p>
            </div>
            @if (empty($podcastResults->podcast_uniquelink))
                 @php $podcastResult_link = '#'; @endphp      
            @else
                @php $podcastResult_link = $podcastResults->podcast_uniquelink; @endphp 
            @endif
            <a href="{{ route('editorNewPodcastView',['link' =>$podcastResult_link ]) }}" class="absolute inset-0 cursor-pointer" aria-hidden="true"></a>
    
        </div>
    @endforeach
    @endif
</div>
