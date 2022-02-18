<h3 class="text-gray-900 text-xl font-bold">Episodes</h3>
<!-- channel episodes -->
<div class="grid grid-cols-4 mt-5 gap-5">
    @forelse($channel_episodes as $episode_items)
    <div class="xl:col-span-1 lg:col-span-6 md:col-span-6 sm:col-span-6 xs:col-span-6 bg-white p-2 rounded-lg shadow-md">     
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
    @empty
    <div class="col-span-12">
        <center>
            <h3 class="text-gray-900 text-xl font-bold">No Episodes Found</h3>
        </center>
    </div>
    @endforelse
</div>
<!-- channel episodes -->
