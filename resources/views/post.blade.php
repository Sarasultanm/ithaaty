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
          <ul class="space-y-4"> 
            <li class="bg-white px-4 py-6 shadow sm:p-6 sm:rounded-lg">
              <article aria-labelledby="question-title-81614">
                <div>
                  <div class="flex space-x-3">
                    <div class="flex-shrink-0">
                      <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </div>
                    <div class="min-w-0 flex-1">
                      <p class="text-sm font-medium text-gray-900">
                        <a href="/editor/users/{{ $audio->audio_editor }}" class="hover:underline">{{ $audio->get_user->name }}</a>
                      </p>
                      <p class="text-sm text-gray-500">
                        <a href="#" class="hover:underline">
                          <time datetime="2020-12-09T11:43:00">{{ $audio->created_at }}</time>
                        </a>
                      </p>
                    </div>
                    <div class="flex-shrink-0 self-center flex">

                     <div  x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false" class="relative inline-block text-left">
                          <div>
                            <button type="button" class="-m-2 p-2 rounded-full flex items-center text-gray-400 hover:text-gray-600" id="options-menu-0-button" aria-expanded="false" aria-haspopup="true" @click="open = !open">
                              <span class="sr-only">Open options</span>
                              <!-- Heroicon name: solid/dots-vertical -->
                              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                              </svg>
                            </button>
                          </div>
                          <div 
                           x-show="open" 
                           x-transition:enter="transition ease-out duration-100" 
                           x-transition:enter-start="transform opacity-0 scale-95" 
                           x-transition:enter-end="transform opacity-100 scale-100" 
                           x-transition:leave="transition ease-in duration-75" 
                           x-transition:leave-start="transform opacity-100 scale-100" 
                           x-transition:leave-end="transform opacity-0 scale-95" 
                          class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-0-button" tabindex="-1">
                            <div class="py-1" role="none">
                              <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                             
                               <a class="bg-gray-100 text-gray-900 flex px-4 py-2 text-sm cursor-pointer " role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                                 <svg class="mr-3 h-5 w-5 text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <span>Favorites</span>
                              </a>
                           
                                <!-- Heroicon name: solid/star -->
                               
                              <a href="#" class="text-gray-700 flex px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                <!-- Heroicon name: solid/code -->
                                <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                  <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                                <span>Embed</span>
                              </a>
                              <a href="#" class="text-gray-700 flex px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="options-menu-0-item-2">
                                <!-- Heroicon name: solid/flag -->
                                <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                  <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd" />
                                </svg>
                                <span>Report content</span>
                              </a>
                            </div>
                          </div>
                        </div>           
      

                    </div>
                  </div>
                </div>
                 
                <div class="mt-2 text-sm text-gray-700 space-y-4">
                  
                   <div class="text-white p-10 audio-bg-blur" style="background-image: url({{ asset('images/audio-bg.jpg') }});">
          <h2 class="font-bold text-xl m-0">{{ $audio->audio_name }}</h2>
                    <p class="mb-5">
                      {{ $audio->audio_summary }}
                    </p>  
                    <div class="audio-embed-container">
                       <?php echo $audio->audio_path; ?>
                     </div>

            <p class="text-white text-xs uppercase mt-5">{{ $audio->created_at }}  | <span>01:37:50 <span>|</span></span> {{ $audio->audio_season }}:{{ $audio->audio_episode }}</p>            
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
                        <span class="font-medium text-gray-900">{{ $audio->get_like->count()  }}</span>
                        <span class="sr-only">likes</span>
                      </button>
                    </span>
                    <span class="inline-flex items-center text-sm">
                      <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                        <!-- Heroicon name: solid/chat-alt -->
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium text-gray-900">{{ $audio->get_comments->count() }}</span>
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
           

           @if($audio->get_comments->count() != 0 )
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
              @foreach($audio->get_comments as $comments)
                  <div class="flex space-x-3">
                    
                      <div class="flex-shrink-0">
                        <img class="h-5 w-5 rounded-full" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                      </div>
                      <div class="min-w-0 flex-1">
                       <div class=" bg-gray-100 p-2 rounded-md mb-3"> 
                        <p class="text-xs font-medium text-gray-900">
                          <a href="/editor/users//{{ $audio->audio_editor }}" class="font-bold hover:underline">{{ $comments->get_user->name }}</a>
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
