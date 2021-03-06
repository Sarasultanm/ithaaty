<div x-data="{modal: false}" class="flex justify-between mb-5 space-x-3">
    <h3 class="text-xl font-bold text-gray-900">Episodes</h3>
    <a target="_blank" href="{{ route('editorEpisodeCreate',['link' => $podcast_uniquelink ]) }}" class="inline-flex items-center font-bold cursor-pointer hover:underline hover-text-custom-pink text-md text-custom-pink">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Create Episode
    </a>
</div>

<div class="grid grid-cols-4 gap-5 mt-5">
    @forelse($podcast->get_episodes()->get() as $episode)
    <div class="p-2 bg-white rounded-lg shadow-md xl:col-span-1 lg:col-span-6 md:col-span-6 sm:col-span-6 xs:col-span-6">
        <div>
            <div class="flex space-x-3">
                <div class="flex justify-between flex-1 min-w-0">
                    <p class="font-bold text-gray-900 truncate text-md">
                        <a href="#" class="hover:underline">
                            <span class="">{{ $episode->get_audio->audio_name }}</span>
                        </a>
                    </p>
                    <span>
                        @if($episode->get_audio->audio_publish != "Publish")
                        <svg class="float-right w-5 h-5 text-custom-pink" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                        @endif
                    </span>
                </div>
            </div>
        </div>
        <div class="mt-2 space-y-4 text-sm text-gray-700">
            @if($episode->get_audio->get_thumbnail->count() == 0)
                @php
                    $s3_ep_thumbnail = asset('images/default_podcast.jpg');
                @endphp
           
            @else
                @php
                    $ep_img_path = $episode->get_audio->get_thumbnail->first()->gallery_path;
                    $s3_ep_thumbnail = config('app.s3_public_link') . "/users/podcast_img/" . $ep_img_path;
                @endphp
            @endif
            <div class="text-white bg-cover h-36" style="background-image: url({{ $s3_ep_thumbnail  }}?>);"></div>
        </div>

        <div>
            <div class="flex space-x-3">
                <div class="flex-1 min-w-0">
                    <p class="mt-2 text-xs text-gray-500">
                        <a class="hover:underline">
                            <?php $date = date_create($episode
    ->get_audio
    ->created_at); ?> <time datetime="2020-12-09T11:43:00">{{ date_format($date,"M, Y") }}</time>
                            <span class="float-left">SE:{{ $episode->get_audio->audio_season }} | EP:{{ $episode->get_audio->audio_episode }}</span>
                        </a>
                    </p>
                    <!--   <div class="mt-5 text-xs font-bold text-gray-900" x-data="{ open: false }"> -->
                    <div class="mt-5 text-xs font-bold text-gray-900">
                        <a href="{{ route('editorPodcastUpdate',['id' => $episode->get_audio->id]) }}" class="hover:underline">Update</a>
                        <a href="{{ route('editorPodcastDetails',['id' => $episode->get_audio->id]) }}" class="float-right hover:underline">Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-12">
        <center>
            <h3 class="text-xl font-bold text-gray-900">No Episodes Found</h3>
        </center>
    </div>
    @endforelse
</div>
