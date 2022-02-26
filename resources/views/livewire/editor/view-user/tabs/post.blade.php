<section>
    
    <div class="mb-5 w-full ">
        <h1 class="font-bold text-gray-800 text-xl">Top Views</h1> 
      </div>  
    
      <div class="bg-white">
        <div class=" mt-1 p-3">
          @if($audioList->count() != 0)
          @if($topOneView)
          <div class="flex text-gray-900">
              <h2 class="flex-auto font-bold text-md">{{ $topOneView->get_audio->audio_name }}</h2>    
              <p class="flex-auto  text-xs uppercase text-right mt-2">{{ $topOneView->get_audio->audio_season }} : {{ $topOneView->get_audio->audio_episode }}</p>            
          </div> 
          @endif
          @endif
        </div>

        <div class="mt-2 text-sm text-gray-700 space-y-4">
           <div class="text-white p-1 audio-bg-blur">
              @if($audioList->count() != 0)
              @if($topOneView)
              @if($topOneView->get_audio->audio_type == "Upload")
                        <video
                          id="my-video{{ $topOneView->get_audio->id }}"
                          class="video-js vjs-theme-forest z-10"
                          controls
                          preload="auto"
                          width="auto"
                          height="264"
                          poster="https://d3t3ozftmdmh3i.cloudfront.net/production/podcast_uploaded/17789837/17789837-1631013743470-36b9d215bea63.jpg"
                          data-setup="{}"
                        >
                          <source src="{{ asset('audio/'.$topOneView->get_audio->audio_path) }}" type="video/mp4" />
                          <source src="{{ asset('audio/'.$topOneView->get_audio->audio_path) }}" type="audio/mpeg" />
                          <source src="{{ asset('audio/'.$topOneView->get_audio->audio_path) }}" type="video/webm" />
                          <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a
                            web browser that
                            <a href="https://videojs.com/html5-video-support/" target="_blank"
                              >supports HTML5 video</a
                            >
                          </p>
                        </video>

              @elseif($topOneView->get_audio->audio_type == "RSS")
                    
                        <video
                          id="my-video14"
                          class="video-js vjs-theme-forest vjs-fluid"
                          controls
                          preload="auto"
                        
                          poster="https://d3t3ozftmdmh3i.cloudfront.net/production/podcast_uploaded/17789837/17789837-1631013743470-36b9d215bea63.jpg"
                          data-setup="{}"
                        >
                          <source src="{{ $topOneView->get_audio->audio_path }}" type="video/mp4" />
                          <source src="{{ $topOneView->get_audio->audio_path }}" type="video/webm" />
                          <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a
                            web browser that
                            <a href="https://videojs.com/html5-video-support/" target="_blank"
                              >supports HTML5 video</a
                            >
                          </p>
                        </video> 

              @else
                    <div class="audio-embed-container">
                        <?php echo $topOneView->get_audio->audio_path; ?>
                    </div>

              @endif
              @endif

              @endif


           </div> 
        </div>
     
      </div>
      <div class="border-t-2 border-gray-500 mt-5"></div>

</section>