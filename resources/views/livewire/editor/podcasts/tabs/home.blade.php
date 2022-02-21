<ul role="list" class="divide-y divide-gray-200">
    @forelse($podcast->get_episodes()->get() as $episode)
    <li class="relative bg-white py-5 px-4 rounded-lg shadow-md mb-5">
        <a target="_blank" href="{{ route('editorPodcastDetails',['id' => $episode->get_audio->id]) }}">
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
                
                <div class="bg-center bg-cover h-32 rounded-lg w-32" style="background-image:url({{ $episode_s3_thumbnail }})">
                    {{-- <img class="h-full w-full rounded-lg" src="{{ $podcast_s3_link }}" alt="image" /> --}}
                    <img class="h-12 mt-20 rounded-lg w-12" src="{{ $podcast_s3_link }}" alt="image" />
                </div>

                <div class="min-w-0 flex-1">
                    <p class="text-lg font-bold text-gray-900">
                        {{ $episode->get_audio->audio_name }}
                    </p>
                    <p class="text-sm text-gray-500 truncate">Velit placeat sit ducimus non sed</p>

                    <div class="mt-1">
                        <p class="line-clamp-2 text-sm text-gray-600 truncate">
                            {{ $episode->get_audio->audio_summary }}
                        </p>
                    </div>
                </div>
                <div class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500 inline-flex">
                    @if($episode->get_audio->audio_publish != "Publish")
                    <svg class="h-5 w-5 text-custom-pink mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    <span class="truncate text-custom-pink text-sm font-bold">Draft</span>
                    @endif
                </div>
                {{-- <time datetime="2021-01-27T16:35" class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">1d ago</time> --}}
            </div>
        </a>
    </li>
    @empty @endforelse
    <!-- More messages... -->
</ul>
