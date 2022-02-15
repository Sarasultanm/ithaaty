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
         @livewireStyles
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
      <main class="lg:col-span-9 xl:col-span-10">
        <div class="mt-4">
           <div class="mb-5 w-full ">
             <h1 class="font-bold text-gray-800 text-xl">Podcast</h1> 
          </div>

          <div class="grid grid-cols-12 mt-5 gap-5">
              @foreach($podcast_lists->get() as $podcast_items)
                  <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-6 xs:col-span-6 bg-white p-2 ">

                    <div>
                      <div class="flex space-x-3">
                        <div class="min-w-0 flex-1">
                          <p class="text-md font-bold text-gray-900">
                            <a class="hover:underline">{{ $podcast_items->audio_name }}
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="mt-2 text-sm text-gray-700 space-y-4">
                      <a target="_blank" href="/post/{{$podcast_items->id}}"> 
                        @if($podcast_items->get_thumbnail->count() == 0)
                           <?php $s3_ep_thumbnail = "images/default_podcast.jpg"; ?>
                        @else
                          <?php $ep_img_path = $podcast_items->get_thumbnail->first()->gallery_path; ?>
                          <?php $s3_ep_thumbnail = config('app.s3_public_link')."/users/podcast_img/".$ep_img_path; ?>
                        @endif
                        <div class="text-white bg-cover h-36" style="background-image: url(<?php echo $s3_ep_thumbnail; ?>);"></div>
                      </a>
                    </div>
                    
                     <div>
                      <div class="flex space-x-3">
                        <div class="min-w-0 flex-1">                      
                          <p class="text-xs text-gray-500 mt-2">
                            <a class="hover:underline">
                              Owner: <strong>{{ $podcast_items->get_user->name }}</strong>
                              
                            </a>
                          </p>
                      
                        </div>
                       
                      </div>
                    </div>


                  </div>

              @endforeach           
          </div>





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
