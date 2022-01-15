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
      <main class="xl:col-span-10 lg:col-span-9">
        
        <!-- playlist -->
        <div class="mt-4 mt-4 p-5 bg-custom-pink rounded-md">
          <div class="grid gap-4 grid-cols-10">
              <div class="col-span-2 bg-white p-1">
                  <div class="text-sm text-gray-700">
                     <div class="text-white bg-cover h-36">
                         <?php  $defaul_img = 'slide'.rand(1,10).'.jpg'; ?>
                         <img class="h-full mx-auto my-0" src="{{ asset('images/slider-img/'.$defaul_img) }}" alt="">
                     </div>
                  </div>
              </div>
             <div class="col-span-8">
                <p class="text-md font-regular text-white mt-2">{{ $playlist->playlist_status }} Playlist </p>
                <p class="text-6xl font-bold text-white mt-2 mb-5">{{ $playlist->playlist_title }} </p>
                <p class="text-white mt-2"><span class="text-xs font-bold ">{{ $playlist->get_user->name }}</span> , <span class="text-xs font-regular ">{{ $playlist->get_playlistItems->count() }} podcast</span> </p>

              </div>
              
          </div>


        </div>




       <div class="w-full pt-4">

            <div class="grid gap-4 grid-cols-10">
               <div class="col-span-10">
                <div class="flex flex-col">

                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase w-2">
                         #
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-3/4">
                         Title
                        </th>
                        <!-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                         
                        </th> -->
                       <!--  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Post
                        </th> -->
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Date Added
                        </th>
                      <!--   <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Edit</span>
                        </th> -->
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      @foreach($playlist->get_playlistItems as $playlistItems)
                      <tr class="a">
               
                        <td class="px-6 py-4 whitespace-nowrap ">
                             <div class="text-sm font-bold text-gray-500">#</div>
                         </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('editorPodcastView',['id' => $playlistItems->get_audio->id ]) }}" target="_blank" class="pointer">
                            <div class="flex items-center">
                              <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 " src="https://d3t3ozftmdmh3i.cloudfront.net/production/podcast_uploaded/17789837/17789837-1631013743470-36b9d215bea63.jpg" alt="">
                              </div>
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                  {{ $playlistItems->get_audio->audio_name }}
                                </div>
                                <div class="text-sm text-gray-500">
                                 <strong>{{ $playlistItems->get_user->name }}</strong>
                                </div>
                              </div>
                            </div>
                          </a>
                          </td>
                        <!-- <td class="px-6 py-4 whitespace-nowrap">
                        
                          <div class="text-sm text-gray-500"></div>
                        </td> -->
                        <!-- <td class="px-6 py-4 whitespace-nowrap">
                           <div class="text-sm font-bold text-gray-500">asdasd</div>
                        </td> -->
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          12/12/12
                           
                          </td>
                       <!--  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td> -->
                      </tr>
                      @endforeach
                      <!-- More people... -->
                    </tbody>
                  </table>
                </div>
                
              </div>
            </div>

                  </div>    


              </div>
              @foreach($playlist->get_playlistItems as $playlistItems)
               
                  

              

              @endforeach
  
            </div>


          </div>
          <!-- playlist -->
          
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
