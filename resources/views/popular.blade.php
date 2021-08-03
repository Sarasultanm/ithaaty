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
      <main class="lg:col-span-9 xl:col-span-6">
        <div class="mt-4">
           <div class="mb-5 w-full ">
             <h1 class="font-bold text-gray-800 text-xl">Popular For You</h1> 
          </div>
          <ul class="space-y-4"> 
            @foreach($mostlike as $audio)


            <li class="bg-white px-4 py-6 shadow sm:p-6 sm:rounded-lg">
              <article aria-labelledby="question-title-81614">
                <div>
                  <div class="flex space-x-3">
                    <div class="flex-shrink-0">
                      <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </div>
                    <div class="min-w-0 flex-1">
                      <p class="text-sm font-medium text-gray-900">
                        <a href="/editor/users/{{ $audio->get_audio->audio_editor }}" class="hover:underline">{{ $audio->get_audio->get_user->name }}</a>
                      </p>
                      <p class="text-sm text-gray-500">
                        <a href="#" class="hover:underline">
                          <time datetime="2020-12-09T11:43:00">{{ $audio->get_audio->created_at }}</time>
                        </a>
                      </p>
                    </div>
               
                  </div>
                </div>
                 
                <div class="mt-2 text-sm text-gray-700 space-y-4">
                  
                   <div class="text-white py-5 px-10 audio-bg-blur" style="background-image: url({{ asset('images/audio-bg.jpg') }});">
          <h2 class="font-bold text-xl m-0">{{ $audio->get_audio->audio_name }}</h2>
                    <p class="mb-5">
                      {{ $audio->get_audio->audio_summary }}
                    </p>  
                    <div class="audio-embed-container">
                       <?php echo $audio->get_audio->audio_path; ?>
                     </div>

            <p class="text-white text-xs uppercase mt-5">{{ $audio->get_audio->created_at }}  | <span>01:37:50 <span>|</span></span> {{ $audio->get_audio->audio_season }}:{{ $audio->get_audio->audio_episode }}</p>            
                   </div>
                    
                </div>
                <!-- like/ -->
                <div class="mt-6 flex justify-between space-x-8">
                  <div class="flex space-x-6">
                    <span class="inline-flex items-center text-sm">
                 
                      <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                  
                        <!-- Heroicon name: solid/thumb-up -->
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                        </svg>
                        <span class="font-medium text-gray-900">{{ $audio->get_audio->get_like->count()  }}</span>
                        <span class="sr-only">likes</span>
                      </button>
                    </span>
                    <span class="inline-flex items-center text-sm">
                      <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                        <!-- Heroicon name: solid/chat-alt -->
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium text-gray-900">{{ $audio->get_audio->get_comments->count() }}</span>
                        <span class="sr-only">replies</span>
                      </button>
                    </span>
                    <span class="inline-flex items-center text-sm">
                      <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                        <!-- Heroicon name: solid/eye -->
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                          <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium text-gray-900">0</span>
                        <span class="sr-only">views</span>
                      </button>
                    </span>
                  </div>
                  <div class="flex text-sm">
                    <span class="inline-flex items-center text-sm">
                      <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                        <!-- Heroicon name: solid/share -->
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                        </svg>
                        <span class="font-medium text-gray-900">Share</span>
                      </button>
                    </span>
                  </div>
                </div>
                <div class="mt-5">
               
            </div>
           

           @if($audio->get_audio->get_comments->count() != 0 )
            <div x-data="{ open: false }">
              
            <div class="mt-5">
              <div class="flex space-x-3">
                      <div>
                        <p class="text-xs font-medium text-gray-900">
                          <a class="cursor-pointer hover:underline" @click="open = true">View Comments</a>
                        </p>
                      </div>
                    
                  </div>
 
            </div>
            <div class="mt-5" x-show="open" @click.away="open = false">
              @foreach($audio->get_audio->get_comments as $comments)
                  <div class="flex space-x-3">
                    
                      <div class="flex-shrink-0">
                        <img class="h-5 w-5 rounded-full" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                      </div>
                      <div class="min-w-0 flex-1">
                       <div class=" bg-gray-100 p-2 rounded-md mb-3"> 
                        <p class="text-xs font-medium text-gray-900">
                          <a href="/editor/users//{{ $audio->get_audio->audio_editor }}" class="font-bold hover:underline">{{ $comments->get_user->name }}</a>
                        </p>
                        <p class="text-sm text-gray-500">
                          <a href="#" class="hover:underline">
                            <time datetime="2020-12-09T11:43:00">{{ $comments->coms_message }}</time>
                          </a>
                        </p>
                        </div>
                       
                      </div>
                    
                  </div>
                  @endforeach
            </div>


            </div>

            @endif


           
                 <!-- like/ -->
              </article>
            </li>

              @endforeach


            <!-- More questions... -->
          </ul>
        </div>
      </main>
      <!-- aside -->
      @include('layouts.guest.aside')
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
