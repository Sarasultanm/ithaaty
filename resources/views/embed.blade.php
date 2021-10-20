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

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ asset('js/audio.js') }}" ></script>
        <script src="{{ asset('js/app.js') }}" defer></script>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/amplitudejs@5.3.2/dist/amplitude.js"></script>

        <link href="https://vjs.zencdn.net/7.14.3/video-js.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-ads/6.9.0/videojs-contrib-ads.css" /> 
        <link rel="stylesheet" href="{{ asset('css/videojs.markers.min.css') }}">
        
        <link href="https://unpkg.com/@videojs/themes@1/dist/forest/index.css" rel="stylesheet">
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
        </style>

         @livewireStyles
      
       <script src="https://vjs.zencdn.net/7.14.3/video.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-ads/6.9.0/videojs.ads.min.js" ></script>
        <script src="{{ asset('js/videojs-markers.js') }}" ></script> 
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
 

  <div class="">

    <!-- <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8"> -->
       <div class="w-full">

      <main class="">
        <div class="">
          <ul class=""> 
            <li class="">
              <article aria-labelledby="question-title-81614">

                 
                <div class="">
                  
                   <div class="text-white">
                  <!--  <h2 class="font-bold text-xl m-0">{{ $audio->audio_name }}</h2> -->
               
                   
           <div class="bg-white shadow p-1">        
                @if($audio->audio_type == "Upload")
                

                @elseif($audio->audio_type == "RSS") 
              
                <video
                          id="my-video"
                          class="video-js vjs-theme-forest vjs-fluid"

                          controls
                          preload="auto"
                          
                          poster="https://d3t3ozftmdmh3i.cloudfront.net/production/podcast_uploaded/17789837/17789837-1631013743470-36b9d215bea63.jpg"
                          data-setup="{}"
                          autoplay preload="auto"
                        >
                      <!--<source src="{{ $audio->audio_path }}" type="video/mp4" />
                          <source src="{{ $audio->audio_path }}" type="video/webm" /> -->
                          <source src="{{ asset('ads/big_buck_bunny.mp4') }}" type="video/mp4" />
                          <source src="{{ asset('ads/big_buck_bunny.mp4') }}" type="video/webm" />
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
                             <?php echo $audio->audio_path; ?>
                 </div>

                @endif

            </div>   

                   </div>
                    
                </div>

                            <div class="text-black  px-2 pt-2 bg-white">
               <h2 class="font-bold text-xl m-0">{{ $audio->audio_name }}</h2>
              
                       
            <p> 


                @if($audio->audio_status =='private' )
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 float-left" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg><span class="ml-2 capitalize mt-1 text-gray-500">Private</span>
                          @else
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 float-left text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg><span class="ml-2 capitalize text-gray-500">Public</span>        
                @endif
                 

               </p>
               <p class="text-black text-xs uppercase mt-5">{{ $audio->created_at }}  | <span>01:37:50 <span>|</span></span> {{ $audio->audio_season }}:{{ $audio->audio_episode }}</p>             
              </div>






              </article>
            </li>


          


            <!-- More questions... -->
          </ul>
        </div>
      </main>
      <!-- aside -->

      <!-- aside -->
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
