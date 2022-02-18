<h3 class="text-gray-900 text-xl font-bold">Popular Podcast</h3>

<ul role="list" class="mt-3 grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mb-5">
    @forelse($channel_list->get_podcast()->get() as $podcast_items)

    <li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow">
        <a target="_blank" href="{{ route('editorNewPodcastView',['link' => $podcast_items->podcast_uniquelink ]) }}">
            <div class="flex-auto w-32 h-52 p-2 w-auto relative">
                <?php $img_path = $podcast_items->get_channel_photo->gallery_path ?>
                <?php $s3_link = config('app.s3_public_link')."/users/podcast_img/".$img_path; ?>
                <img class="h-full w-full rounded-lg" src="{{ $s3_link }}" alt="" />
            </div>
            <div class="flex-1 flex flex-col text-left p-2">
                <h3 class="font-bold text-gray-900 text-lg text-sm truncate">{{$podcast_items->podcast_title}}</h3>
                <p class="text-gray-500 text-sm">{{$podcast_items->get_channel->channel_name}}</p>
                <p class="flex mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                    </svg>
                    <span class="truncate text-gray-500 text-sm">{{ $podcast_items->get_episodes->count() }}</span>
                </p>
            </div>
        </a>
    </li>

    @empty
    <p>No Podcast</p>

    @endforelse
</ul>

<h3 class="text-gray-900 text-xl font-bold">Popular Episodes</h3>
<!-- channel episodes -->
{{--
<div class="grid grid-cols-4 mt-5 gap-5 mb-5">
    --}}
    <div class="mt-5 grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mb-5">
        @foreach($mostViews as $episode_items)
        <div class="xl:col-span-1 lg:col-span-6 md:col-span-6 sm:col-span-6 xs:col-span-6 bg-white p-2 rounded-lg shadow-sm">
            <div>
                <div class="flex space-x-3">
                    <div class="min-w-0 flex-1 flex justify-between">
                        <p class="text-md font-bold text-gray-900 truncate">
                            <a href="#" class="hover:underline">
                                <span class="">{{ $episode_items->get_audio->audio_name }}</span>
                            </a>
                        </p>
                        <span>
                            @if($episode_items->get_audio->audio_publish != "Publish")
                            <svg class="h-5 w-5 text-custom-pink float-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            <div class="mt-2 text-sm text-gray-700 space-y-4">
                @if($episode_items->get_audio->get_thumbnail->count() == 0)
                    @php
                        $s3_ep_thumbnail = asset('images/default_podcast.jpg');
                    @endphp
                @else
                    @php
                        $ep_img_path = $episode_items->get_audio->get_thumbnail->first()->gallery_path;
                        $s3_ep_thumbnail = config('app.s3_public_link')."/users/podcast_img/".$ep_img_path;
                    @endphp
                @endif
                <div class="text-white bg-cover h-36" style="background-image: url({{ $s3_ep_thumbnail }});"></div>
            </div>

            <div>
                <div class="flex space-x-3">
                    <div class="min-w-0 flex-1">
                        <p class="text-xs text-gray-500 mt-2">
                            <a class="hover:underline">
                                <?php $date = date_create($episode_items->get_audio->created_at); ?> <time datetime="2020-12-09T11:43:00">{{ date_format($date,"M, Y") }}</time>
                                <span class="float-left">SE:{{ $episode_items->get_audio->audio_season }} | EP:{{ $episode_items->get_audio->audio_episode }}</span>
                            </a>
                        </p>
                        <!--   <div class="text-xs font-bold text-gray-900 mt-5" x-data="{ open: false }"> -->
                        <div class="text-xs font-bold text-gray-900 mt-5">
                            <a href="{{ route('editorPodcastUpdate',['id' => $episode_items->get_audio->id]) }}" class="hover:underline">Update</a>
                            <a href="{{ route('editorPodcastDetails',['id' => $episode_items->get_audio->id]) }}" class="hover:underline float-right">Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <h3 class="text-gray-900 text-xl font-bold">Uploaded</h3>

    <h3 class="text-gray-900 text-xl font-bold">Channels</h3>
</div>
