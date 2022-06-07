@if($audio->audio_type == "Upload")

<div  x-data="{ open: false }">
    <div class="bg-white shadow p-1">        
            @if($audio->get_thumbnail->count() == 0)
              <?php $s3_thumbnail = "images/default_podcast.jpg"; ?>
            @else
              <?php $img_path = $audio->get_thumbnail->first()->gallery_path; ?>
              <?php $s3_thumbnail = config('app.s3_public_link')."/users/podcast_img/".$img_path; ?>
            @endif

            <script src="{{ asset('videojs/video.min.js') }}"></script>
            <script src="{{ asset('videojs/nuevo.min.js') }}"></script>

              <video  x-show="!open"  
                id="my-video"
                  class="video-js vjs-default-skin vjs-fluid"
                  controls
                  width="100%"
                  height="450px"
                poster="{{ $s3_thumbnail }}"
                data-setup="{}"
              >
                <?php $s3_link = config('app.s3_public_link')."/audio/"; ?>
                <source src="{{ $s3_link.$audio->audio_path }}" type="video/mp4" />
                <source src="{{ $s3_link.$audio->audio_path }}" type="audio/mpeg" />
                <source src="{{ $s3_link.$audio->audio_path }}" type="video/webm" />
                @if($audio->get_chapters()->count() != 0)
                  <?php  $chapter_link = $audio->get_chapters()->first()->chapter_filename;  ?>
                  <track kind="chapters" src="{{ asset('vtt/'.$chapter_link) }}" srclang="en"> 
                @endif 
                <p class="vjs-no-js">
                  To view this video please enable JavaScript, and consider upgrading to a
                  web browser that
                  <a href="https://videojs.com/html5-video-support/" target="_blank"
                    >supports HTML5 video</a
                  >
                </p>
             </video>

             <audio  x-show="open"  
             id="my-video"
               class="video-js vjs-default-skin vjs-fluid"
               controls
               width="100%"
               height="450px"
             poster="{{ $s3_thumbnail }}"
             data-setup="{}"
           >
             <?php $s3_link = config('app.s3_public_link')."/audio/"; ?>
             <source src="{{ $s3_link.$audio->audio_path }}" type="video/mp4" />
             <source src="{{ $s3_link.$audio->audio_path }}" type="audio/mpeg" />
             <source src="{{ $s3_link.$audio->audio_path }}" type="video/webm" />
             @if($audio->get_chapters()->count() != 0)
               <?php  $chapter_link = $audio->get_chapters()->first()->chapter_filename;  ?>
               <track kind="chapters" src="{{ asset('vtt/'.$chapter_link) }}" srclang="en"> 
             @endif 
             <p class="vjs-no-js">
               To view this video please enable JavaScript, and consider upgrading to a
               web browser that
               <a href="https://videojs.com/html5-video-support/" target="_blank"
                 >supports HTML5 video</a
               >
             </p>
            </audio>

            <script> 
                var player=videojs('my-video'); 
                player.nuevo({
                  qualityMenu: true,
                  buttonRewind: true,
                  buttonForward: true
                });
            </script>

            @if($newNumAds != 0)
              @foreach($newAdsList as $adsl)
                @php 
                        $videlink[] = $adsl->adslist_videolink;
                        $skip[] = $adsl->adslist_adstype;
                        $displaytime[] = $adsl->adslist_displaytime;
                @endphp
              @endforeach

              @include('layouts.editor.ads-script')
              <script src="{{ asset('js/adsScript/'.$newNumAds.'-ads.js' ) }}" ></script> 
            @endif
    </div>

    <div class="mt-5" >
        <div  @click="open = !open" x-cloak >
          <button  x-show="!open"  onclick="reload()"
                  class="text-white bg-custom-pink px-2 py-3 cursor-pointer shadow-md rounded-sm" 
                  aria-hidden="true">Audio</button>
          <button  x-show="open"  onclick="reload()"
                  class="text-white bg-custom-pink px-2 py-3 cursor-pointer shadow-md rounded-sm"  
                  aria-hidden="true">Video</button>
        </div>
    </div>

</div>

          @elseif($audio->audio_type == "RSS") 
  <div class="bg-white shadow p-1">        
        @if($audio->get_thumbnail->count() == 0)
           <?php $s3_thumbnail = "images/default_podcast.jpg"; ?>
        @else
          <?php $img_path = $audio->get_thumbnail->first()->gallery_path; ?>
          <?php $s3_thumbnail = config('app.s3_public_link')."/users/podcast_img/".$img_path; ?>
        @endif
        
                <script src="{{ asset('videojs/video.min.js') }}"></script>
        <script src="{{ asset('videojs/nuevo.min.js') }}"></script>

                  <video
          id="my-video"
          class="video-js vjs-default-skin vjs-fluid"
          controls
          width="100%"
          height="450px"
          poster="{{ $s3_thumbnail }}"
           data-setup="{}"
        >
          <source src="{{ $audio->audio_path }}" res="240" label="240p" type="video/mp4">
          <source src="{{ $audio->audio_path }}" res="360" label="360p" type="video/mp4">
          <source src="{{ $audio->audio_path }}" default res="480" label="480p" type="video/mp4">
          <source src="{{ $audio->audio_path }}" res="720" label="720p" type="video/mp4">
          @if($audio->get_chapters()->count() != 0)
             <?php  $chapter_link = $audio->get_chapters()->first()->chapter_filename;  ?>
            <track kind="chapters" src="{{ asset('vtt/'.$chapter_link) }}" srclang="en"> 
          @endif 
          <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a
            web browser that
            <a href="https://videojs.com/html5-video-support/" target="_blank"
              >supports HTML5 video</a
            >
          </p>
        </video>
        <script> 
            var player=videojs('my-video'); 
            player.nuevo({
              qualityMenu: true,
              buttonRewind: true,
              buttonForward: true
            });
        </script>

        @if($newNumAds != 0)
        @foreach($newAdsList as $adsl)
          
            <?php 
                  $videlink[] = $adsl->adslist_videolink;
                  $skip[] = $adsl->adslist_adstype;
                  $displaytime[] = $adsl->adslist_displaytime;
             ?>

          @endforeach

        @include('layouts.editor.ads-script')
        <script src="{{ asset('js/adsScript/'.$newNumAds.'-ads.js' ) }}" ></script> 

        @endif
  
  </div>
          @else
<div class="bg-white shadow p-1">        
    <div class="audio-embed-container">
       <?php echo $audio->audio_path; ?>
    </div>
</div>
          @endif