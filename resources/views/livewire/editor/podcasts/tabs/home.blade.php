<div x-data="{modal: false}" class="flex justify-between mb-5 space-x-3">
    <h3 class="text-xl font-bold text-gray-900">Episodes</h3>

    @if($podcast->podcast_ownerid == Auth::user()->id)
    <a target="_blank" href="{{ route('editorEpisodeCreate',['link' => $podcast_uniquelink ]) }}" class="inline-flex items-center font-bold cursor-pointer hover:underline hover-text-custom-pink text-md text-custom-pink">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Create Episode
    </a>
    @endif
</div>

<ul role="list" class="divide-y divide-gray-200">
    @forelse($podcast->get_episodes()->get() as $episode)
    <li class="relative px-4 py-5 mb-5 bg-white rounded-lg shadow-md">
        <a target="_blank" href="{{ route('editorPodcastView',['id' => $episode->get_audio->id]) }}">
            <div class="flex justify-between space-x-3">
                @if ($episode->get_audio->get_thumbnail->count() != 0) 
                    @php 
                        $episode_img_path = $episode->get_audio->get_thumbnail->first()->gallery_path; 
                        $episode_s3_thumbnail = config('app.s3_public_link')."/users/podcast_img/".$episode_img_path; 
                    @endphp 
                @else 
                    @php 
                        $episode_s3_thumbnail = asset('images/default_podcast.jpg');
                    @endphp 
                @endif
                
                <div class="w-32 h-32 bg-center bg-cover rounded-lg" style="background-image:url({{ $episode_s3_thumbnail }})">
                    {{-- <img class="w-full h-full rounded-lg" src="{{ $podcast_s3_link }}" alt="image" /> --}}
                    <img class="w-12 h-12 mt-20 rounded-lg" src="{{ $podcast_s3_link }}" alt="image" />
                </div>

                <div class="flex-1 min-w-0">
                    <p class="text-lg font-bold text-gray-900">
                        {{ $episode->get_audio->audio_name }}
                    </p>
                    <p class="text-sm text-gray-500 truncate">Velit placeat sit ducimus non sed</p>

                    <div class="mt-1">
                        <p class="text-sm text-gray-600 truncate line-clamp-2">
                            {{ $episode->get_audio->audio_summary }}
                        </p>
                    </div>
                </div>
                <div class="inline-flex flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">
                    @if($episode->get_audio->audio_publish != "Publish")
                    <svg class="w-5 h-5 mr-2 text-custom-pink" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm font-bold truncate text-custom-pink">Draft</span>
                    @endif
                </div>
                {{-- <time datetime="2021-01-27T16:35" class="flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">1d ago</time> --}}
            </div>
        </a>
    </li>
    @empty @endforelse
    <!-- More messages... -->
</ul>
