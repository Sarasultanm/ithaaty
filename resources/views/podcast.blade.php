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
           <div class="w-full mb-5 ">
             <h1 class="text-xl font-bold text-gray-800">Podcast</h1> 
          </div>

          <div class="mt-5 ">
                  
            <ul role="list" class="grid grid-cols-1 gap-6 mb-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
              @forelse($podcast_lists as $podcast_items)
          
              <li class="flex flex-col col-span-1 text-center bg-white rounded-lg shadow">
                  <a target="_blank" href="{{ route('editorNewPodcastView',['link' => $podcast_items->podcast_uniquelink ]) }}">
                      <div class="relative flex-auto w-auto p-2 h-52">
                          <?php $img_path = $podcast_items->get_channel_photo->gallery_path ?>
                          <?php $s3_link = config('app.s3_public_link')."/users/podcast_img/".$img_path; ?>
                          <img class="w-full h-full rounded-lg" src="{{ $s3_link }}" alt="" />
                      </div>
                      <div class="flex flex-col flex-1 p-2 text-left">
                          <h3 class="text-lg font-bold text-gray-900 truncate ">{{$podcast_items->podcast_title}}</h3>
                          <p class="text-sm text-gray-500">{{$podcast_items->get_channel->channel_name}}</p>
                          <p class="flex mt-2">
                              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                              </svg>
                              <span class="text-sm text-gray-500 truncate">{{ $podcast_items->get_episodes->count()   }}</span>
                          </p>
                      </div>
                  </a>
              </li>
          
              @empty
              <p>No Podcast</p>
          
              @endforelse
          
          </ul>






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
