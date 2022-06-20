
<div class="grid grid-cols-12 gap-5 mt-5">

    @if($channelSearchResult)
    @foreach ($channelSearchResult as $channelResults)
        <div class="col-span-6 relative flex justify-between p-2 mb-5 space-x-3 rounded-md shadow-md">
            @if ($channelResults->get_channel_photo->count() != 0) 
                @php 
                    $channelSearchThumbnail_Path =$channelResults->get_channel_photo->gallery_path; 
                    $channelSearchThumbnail = config('app.s3_public_link')."/users/channe_img/".$channelSearchThumbnail_Path; 
                @endphp 
            @else 
                @php 
                    $channelSearchThumbnail = asset('images/default_podcast.jpg');
                @endphp 
            @endif
            <div class="bg-center bg-cover rounded-lg w-28 h-28" 
                style="background-image:url({{ $channelSearchThumbnail }})">
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-xl font-bold text-gray-900"> {{ $channelResults->channel_name }}</p>
                <p class="mt-0 text-sm text-gray-500 truncate">Subcribers {{ $channelResults->get_subs->count()  }}</p>
                <p class="mt-2 text-xs text-gray-500 truncate">
                    {{ Str::limit( $channelResults->channel_description, 30) }}
                </p>
                <p class="flex mt-2">
                    <svg class="text-gray-500 h-5 w-5 mr-2"  href="http://127.0.0.1:8000/editor/podcast">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
                        </svg><span class="text-gray-500  text-sm">{{ $channelResults->get_podcast->count() }} </span>
                    </svg>
                </p>
                {{-- <p class="flex mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path>
                    </svg>
                    <span class=" text-gray-500 text-sm">9</span>
                </p> --}}
            </div>
            <div class="inline-flex flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">
                <p class="text-sm text-gray-500">
                    @if($channelResults->channel_typestatus != "private")
                        <svg xmlns="http://www.w3.org/2000/svg" class="float-left w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="float-left w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    @endif
                </p>
            </div>
            @if (empty($channelResults->channel_uniquelink))
                 @php $channelResult_link = '#'; @endphp      
            @else
                @php $channelResult_link = $channelResults->channel_uniquelink; @endphp 
            @endif
            <a href="{{ route('editorChannelView',['link' =>$channelResult_link ]) }}" class="absolute inset-0 cursor-pointer" aria-hidden="true"></a>
    
        </div>
    @endforeach

    @endif
</div>
