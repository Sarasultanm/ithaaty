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
       <!--  <script src="{{ asset('js/audio.js') }}" ></script> -->
        <script src="{{ asset('js/app.js') }}" defer></script>

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

         @livewireStyles
      
     <!--  <script src="https://vjs.zencdn.net/7.14.3/video.min.js"></script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-ads/6.9.0/videojs.ads.min.js" ></script>  -->

    <!-- <link rel="stylesheet" href="{{ asset('css/video-js-v7.14.3.css') }}"> -->
   

   <!--  <link rel="stylesheet" href="{{ asset('css/videojs-contrib-ads-v6.9.0.css') }}"> 
     <script src="{{ asset('js/videojs.ads.min-v6.9.0.js') }}"></script> -->

      <!--  <link rel="stylesheet" href="{{ asset('css/videojs.ads.css') }}">
-->
     

   
     <!--  <link rel="stylesheet" href="{{ asset('css/video-js.min.css') }}"> -->
      <!--  <script src="{{ asset('js/video.min-v7.14.3.js') }}"></script> -->
      <!--   <script src="{{ asset('js/video.js') }}"></script> -->

       <!--  <link rel="stylesheet" href="{{ asset('css/videojs.ads.css') }}">
        <script src="{{ asset('js/videojs.ads.js') }}"></script> -->

        <!-- <script src="{{ asset('js/videojs-markers.js') }}" ></script> -->
        <!--  <link rel="stylesheet" href="{{ asset('css/vjs-theme-forest-index.css') }}"> -->
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow hidden">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @livewireScripts
       
    </body>
</html>
