<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Ithaaty</title>

        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">    
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/audio.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom-css.css') }}">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <!--  <script src="{{ asset('js/audio.js') }}" ></script> -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/custom-js.js') }}" ></script> 
        <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/amplitudejs@5.3.2/dist/amplitude.js"></script> -->

     <!-- <link href="https://vjs.zencdn.net/7.14.3/video-js.css" rel="stylesheet" />
       
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-ads/6.9.0/videojs-contrib-ads.css" /> -->
        <!--  <link rel="stylesheet" href="{{ asset('css/video-js-v7.14.3.css') }}"> -->
         <!--  -->
        <!-- <link rel="stylesheet" href="{{ asset('css/videojs.markers.min.css') }}"> -->
        <!-- <link href="https://unpkg.com/@videojs/themes@1/dist/forest/index.css" rel="stylesheet"> -->
       <!--  <link rel="stylesheet" href="{{ asset('css/vjs-theme-forest-index.css') }}"> -->
      <!--   <link rel="stylesheet" href="{{ asset('css/videojs.markers.min.css') }}"> -->

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta2/css/all.css"  />

        <link href="{{ asset('videojs/skins/treso/videojs.min.css') }}" rel="stylesheet" type="text/css" />

        <style type="text/css">
          .vjs-marker{
            height: 10px;
            top: 10px;
            background-color: #d3e579 !important;
          }
          .vjs-break-overlay{
            /*padding: 20px 0px 0px 0px;
            height: 10% !important;*/
          }

            div#social-links {
                margin: 0 auto;
                max-width: 500px;
            }
            div#social-links ul li {
                display: inline-block;
            }          
            div#social-links ul li a {
                padding: 20px;
                border: 1px solid #ccc;
                margin: 1px;
                font-size: 30px;
                color: #222;
                background-color: #ccc;
            }
        </style>
        <style>
            [x-cloak] { 
              display: none !important;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
           

            <!-- Page Heading -->


            <!-- Page Content -->
            <main>
                

 <div class="">
 <div class="">
            


<div class="min-h-screen bg-gray-100">
  <!--
    When the mobile menu is open, add `overflow-hidden` to the `body` element to prevent double scrollbars

    Menu open: "fixed inset-0 z-40 overflow-y-auto", Menu closed: ""
  -->
  @include('layouts.guest.header')

  <div class="py-10">

    <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
      <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
        <!-- sidebar -->
       @include('layouts.guest.sidebar')
        <!-- sidebar -->
      </div>
      <main class="xl:col-span-10 lg:col-span-9">
      
       <div class="grid grid-cols-12 mt-5 gap-5">

        <div class="col-span-8">
            <div class="bg-white">
                <div class="mt-2 text-sm text-gray-700 space-y-4">
                   <div class="text-white p-1 audio-bg-blur">
                   @if($audio->audio_type == "Upload")
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
                       <?php $s3_link = config('app.s3_public_link')."/audio/"; ?>
                        <source src="{{ $s3_link.$audio->audio_path }}" type="video/mp4" />
                        <source src="{{ $s3_link.$audio->audio_path }}" type="audio/mpeg" />
                        <source src="{{ $s3_link.$audio->audio_path }}" type="video/webm" />
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

                       

                      @elseif($audio->audio_type == "RSS")
                 
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
                          <track kind="chapters" src="https://ithaaty.com/vtt/sample.vtt" srclang="en">

                          <!-- <source src="{{ asset('ads/big_buck_bunny.mp4') }}" type="video/mp4" />
                          <source src="{{ asset('ads/big_buck_bunny.mp4') }}" type="video/webm" /> -->
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

                        

                    @else

                   
                           <div class="audio-embed-container">
                               <?php echo $audio->audio_path; ?>
                            </div>

                    @endif

                   </div> 
                </div>
                
            </div>
            <div class="mt-2 bg-white p-5">
                    <div class="flex items-center">
                          <img src="http://127.0.0.1:8000/images/slider-img/slide5.jpg" alt="" class="w-12 h-12">
                           <div class="ml-4 ">
                             <p class="text-sm font-medium text-gray-900">{{$notes->get_user->name}} </p>
                             <p class="text-sm text-gray-500">Notes : {{$notes->notes_message}}</p>
                             <p class="text-sm text-gray-500">Time : {{$notes->notes_time}}</p>
                          </div>
                      </div>
                   
                </div>
        </div>

        <!-- aside -->
        @include('layouts.guest.aside')
        <!-- aside -->
       </div>

      </main>
      
    </div>
  </div>
</div>


        </div>
</div>







            </main>
        </div>
        @livewireScripts
    </body>
</html>
