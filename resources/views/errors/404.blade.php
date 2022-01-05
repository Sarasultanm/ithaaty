<?php use App\Http\Controllers\MainController; ?>
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
         @livewireStyles
      

    </head>
    
    
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
           
           
            <main>
               <div class="flex-shrink-0 flex justify-center">
				    <a href="/" class="inline-flex">
				      <span class="sr-only">Workflow</span>
				      <img class="h-36 w-auto" src="{{ asset('images/logo.png') }}" alt="">

				    </a>
				  </div>
				  <div class="py-16">
				    <div class="text-center">
				      <p class="text-sm font-semibold text-black uppercase tracking-wide">404 error</p>
				      <h1 class="mt-2 text-4xl font-extrabold text-custom-pink tracking-tight sm:text-5xl">Page not found.</h1>
				      <p class="mt-2 text-base text-gray-500">Sorry, we couldn’t find the page you’re looking for.</p>
				      <div class="mt-6">
				      	@if(Auth::check())
				      		<a href="/{{ Auth::user()->roles }}/dashboard" class="text-base font-medium text-black hover:text-indigo-500">Go back Dashboard<span aria-hidden="true"> →</span></a>
				      	@else
				      		<a href="/" class="text-base font-medium text-black hover:text-indigo-500">Go back home<span aria-hidden="true"> →</span></a>
				      	@endif
				       
				      </div>
				    </div>
				  </div>
            </main>
           
        </div>
        @livewireScripts
       
    </body>
  
</html>

