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
             <h1 class="font-bold text-gray-800 text-xl">Podcaster</h1> 
          </div>

          <div class="grid gap-4 grid-cols-6">
              
            @foreach($podcaster->get() as $pod)

     


            <div class="col-span-2 bg-white p-2 ">
              <article aria-labelledby="question-title-81614">

                <div class="mt-2 text-sm text-gray-700 space-y-4">
                  
                   <div class="text-white bg-cover h-36">
                   
                       <img class="h-full mx-auto my-0 rounded-full" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                             
                   </div>
                    
                </div>

                <div>
                  <div class="flex space-x-3">
                    <div class="min-w-0 flex-1">
                      <p class="text-md font-bold text-gray-900 mt-2">
                        <a href="#" class="hover:underline">{{ $pod->name }}</a>
                      </p>
                      <p class="text-xs text-gray-500">
                        <a class="hover:underline">
                          Followers <span class="float-right">{{ $pod->get_followers->count() }}</span>
                        </a>
                      </p>
                    </div>

                   
                  </div>

                    <div class="mt-3">
                      <center>
                        <button type="button" class="inline-flex items-center px-3 py-0.5 rounded-full bg-rose-50 text-sm font-medium text-rose-700 hover:bg-rose-100">
                          <!-- Heroicon name: solid/plus -->
                          <span>
                            Follow
                          </span>
                        </button>
                        </center>
                      </div>


                </div>

              </article>
            </div>




             @endforeach
          </div>





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
