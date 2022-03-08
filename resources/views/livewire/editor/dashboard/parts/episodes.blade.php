<div class="relative flex justify-between p-2 mb-5 space-x-3 rounded-md shadow-md">
    
    @if ($audio->get_thumbnail->count() != 0) 
        @php 
            $episode_img_path = $audio->get_thumbnail->first()->gallery_path; 
            $episode_s3_thumbnail = config('app.s3_public_link')."/users/podcast_img/".$episode_img_path; 
        @endphp 
    @else 
        @php 
            $episode_s3_thumbnail = asset('images/default_podcast.jpg');
        @endphp 
    @endif

    <div class="w-28 h-28 bg-center bg-cover rounded-lg" 
        style="background-image:url({{  $episode_s3_thumbnail }})">
    </div>

    
    <div class="flex-1 min-w-0">
        <p class="text-xl font-bold text-gray-900"> {{ $audio->audio_name }}</p>
        <p class="mt-2 text-sm text-gray-500 truncate">{{ $audio->audio_summary }}</p>
        <p class="mt-2 text-xs text-gray-500 truncate">
            Season 1 : Episode 1
        </p>
    </div>
    <div class="inline-flex flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">
        <p class="text-sm text-gray-500">
            <a href="#" class="flex hover:underline">
             @if($audio->audio_status =='private' )
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                {{-- <span class="mt-1 ml-2 capitalize">Private</span> --}}
              @else
                <svg xmlns="http://www.w3.org/2000/svg" class="float-left w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                {{-- <span class="ml-2 capitalize">Public</span> --}}
                
              @endif
            </a>
          </p>
    </div>
    <a href="{{ route('editorEpisodeView',['link' => $audio->check_in_podcasts->get_podcast->podcast_uniquelink,'id'=>$audio->id ]) }}" 
       class="absolute inset-0 cursor-pointer" 
       aria-hidden="true"></a>
</div>