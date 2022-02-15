<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {!! SEOMeta::generate() !!}
        <link rel="shortcut icon" href="images/favicon.png">    
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600">
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"> -->
         <link rel="stylesheet" href="{{ asset('css/bootstrap.min-v4.2.1.css') }}">
       <!--  <link rel="stylesheet" href="assets/css/animate.css"> -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom-css.css') }}">
        <link rel="stylesheet" href="{{ asset('css/media-queries.css') }}">
        <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">   

          <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta2/css/all.css"  />


        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
         <style>
            [x-cloak] { 
              display: none !important;
            }
        </style>
         @livewireStyles
    </head>
    <body  style="background: #5f7c84;">
        <div class="font-sans text-gray-900 antialiased">
             <div class="grid lg:grid-cols-2 md:grid-cols-2  sm:grid-cols-1 gap-4 front-page-container" style="background: #5f7c84;height: 100vh">



                <div class="col-span-1 xl:hidden lg:hidden md:hidden sm:block" style="background: #5f7c84;">

                      <div class=" bg-no-repeat">
                            <div x-data="{ open: false }" class="w-full bg-transparent relatives float-left">
                                <div class="flex p-2">
                                    <div class="w-1/2">
                                        <a href="/"><img src="{{ asset('images/logo.png')}}" class="w-28"></a>   
                                    </div>
                                    <div  class="w-1/2">
                                         <a   @click="open = !open"  class=" bg-transparent text-white font-bold float-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-lg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                                        </a>

                                    </div>
                                </div>
                                <div 
                                x-cloak x-show="open" 
                                 x-transition:enter="transition ease-out duration-100" 
                                 x-transition:enter-start="transform opacity-0 scale-95" 
                                 x-transition:enter-end="transform opacity-100 scale-100" 
                                 x-transition:leave="transition ease-in duration-75" 
                                 x-transition:leave-start="transform opacity-100 scale-100" 
                                 x-transition:leave-end="transform opacity-0 scale-95" 
                                 class="w-full  flex  border-white border-b-2">
                                    @if(Auth::check())
                                            <a href="/{{ Auth::user()->roles }}/dashboard" class="border-t-2 border-white text-white hover-bg-custom-pink flex px-4 py-3 text-sm cursor-pointer w-1/2" role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                                              <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" /></svg>
                                              <span>Dashboard</span>
                                            </a>
                                     @else

                                     <a href="/login" class=" hover-bg-custom-pink text-white flex px-4 py-3 text-sm cursor-pointer w-1/2" role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" /></svg>
                                      <span>Login</span>
                                    </a>
                                    
                                    <a href="/register" class="bg-custom-pink text-white flex px-4 py-3 text-sm w-1/2" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                      <!-- Heroicon name: solid/code -->
                  
                                      <svg xmlns="http://www.w3.org/2000/svg" class="text-white mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                                      <span>Sign Up</span>
                                    </a>


                                     @endif
                                </div>


                         </div>
                       </div>
                
                    </div>



                <div class="text-white col-span-1">
                    <center>
                    <a href="/"><img src="{{ asset('images/logo.png')}}" class="xl:w-72 lg:w-48 md:w-40 sm:w-36 w-30 front-page-logo xl:block lg:block md:block sm:hidden"></a>
                    </center>
                    <!-- <div class="xl:px-24 xl:pb-10 lg:px-10 lg:pb-5 md:px-10 md:pb-5 sm:px-5 sm:pb-2">
                        <h2 class="uppercase mb-3 xl:text-5xl lg:text-5xl md:text-4xl  ">About Us</h2>
                        <p class="xl:text-xl lg:text-lg md:text-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer viverra, magna eu aliquet tempor, libero nunc vehicula lectus, id sodales odio quam eget lectus. Vivamus luctus vestibulum nibh at cursus. Nulla facilisi. Pellentesque mollis nisi ante, nec varius urna auctor et.</p>
                    </div> -->
                </div>

                <div class="col-span-1 xl:block lg:block md:block sm:hidden" style="background: #f98b88;">

                      <div class=" bg-no-repeat" style="background-image: url({{ asset('images/right-img.png')}});background-size: cover;height: 78%;background-position: center center;">
                            <div x-data="{ open: false }" class="w-full bg-transparent relatives float-left">
                       
                                <button  @click="open = !open" class=" bg-transparent text-white font-bold float-right relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-lg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                                </button>


                                <div 
                                 x-show="open" 
                                 x-transition:enter="transition ease-out duration-100" 
                                 x-transition:enter-start="transform opacity-0 scale-95" 
                                 x-transition:enter-end="transform opacity-100 scale-100" 
                                 x-transition:leave="transition ease-in duration-75" 
                                 x-transition:leave-start="transform opacity-100 scale-100" 
                                 x-transition:leave-end="transform opacity-0 scale-95" 
                                class="mr-20 mt-3  w-56  absolute float-right origin-top-right right-0 shadow-lg  ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-0-button" tabindex="-1">
                                  <div class="p-1" role="none" style="background: #5f7c84;">
                                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                    <center>
                                          <img src="{{ asset('images/logo.png')}}" class="w-1/2 py-2">
                                    </center>
                                     @if(Auth::check())
                                            <a href="/{{ Auth::user()->roles }}/dashboard" class="border-t-2 border-white text-white hover-bg-custom-pink flex px-4 py-2 text-sm cursor-pointer " role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                                              <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" /></svg>
                                              <span>Dashboard</span>
                                            </a>
                                     @else

                                     <a href="/login" class="border-t-2 border-white text-white hover-bg-custom-pink flex px-4 py-2 text-sm cursor-pointer " role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" /></svg>
                                      <span>Login</span>
                                    </a>
                                    
                                    <a href="/register" class="hover-bg-custom-pink text-white flex px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                      <!-- Heroicon name: solid/code -->
                  
                                      <svg xmlns="http://www.w3.org/2000/svg" class="text-white mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                                      <span>Sign Up</span>
                                    </a>


                                     @endif

                                  </div>
                                </div>
                         </div>
                       </div>
                
                    </div>


                </div>

             </div>   


             <div class="grid grid-cols-1 mt-20 xl:absolute lg:absolute md:absolute sm:relative w-full front-page-slider" >
                 <div class="col-span-1">
              <!--        <div  class="flex bg-transparent">
                          <div class="flex-1 mx-2 text-white text-center h-60" style="background: #2e5157;">
                            Slide 1
                          </div>
                          <div class="flex-1 mx-2 text-white text-center" style="background: #2e5157;">
                            Slide 2
                          </div>
                          <div class="flex-1 mx-2 text-white text-center" style="background: #2e5157;">
                            Slide 3
                          </div>
                          <div class="flex-1 mx-2 text-white text-center" style="background: #2e5157;">
                            Slide 4
                          </div>
                          <div class="flex-1 mx-2 text-white text-center" style="background: #2e5157;">
                            Slide 5
                          </div>
                          <div class="flex-1 mx-2 text-white text-center" style="background: #2e5157;">
                            Slide 6
                          </div>
                     </div> -->
                     <!-- Top content -->
                    <div class="top-content">
                        <div class="container-fluid">
                          <div id="carousel-example" class="carousel slide" data-ride="carousel">
                             <!-- <div id="carousel-example"> -->
                                <div class="carousel-inner row w-100 mx-auto" role="listbox">

                                    @foreach($likes->get() as $likec)
                                      
                                       @if($num == 1)
                                          <?php $slide_pic = "slide".$num; ?>
                                         <div class="carousel-item col-12 col-sm-5 col-md-4 col-lg-3 active">
                                            <a href="/post/{{ $likec->like_audioid }}">
                                                <img src="{{ asset('images/slider-img/'.$slide_pic.'.jpg') }}" class="img-fluid mx-auto d-block xl:p-5 lg:p-0 md:p-0" alt="img1">
                                            </a>
                                         </div>
                                        @else
                                         <?php $slide_pic = "slide".$num; ?>
                                             <div class="carousel-item col-12 col-sm-5 col-md-4 col-lg-3">
                                            <a href="/post/{{ $likec->like_audioid }}">
                                                <img src="{{ asset('images/slider-img/'.$slide_pic.'.jpg') }}" class="img-fluid mx-auto d-block xl:p-5 lg:p-0 md:p-0" alt="img1">
                                            </a>
                                         </div>

                                        @endif 
                                       
                                        <?php $num++; ?>
                                        

                                    @endforeach

                             
                                </div>
                                <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Top content -->
                 </div>
             </div>

              <div class="grid xl:grid-cols-3  lg:grid-cols-7 md:grid-cols-7 gap-4 px-10 pt-4 pb-6 sm:p-3 bottom-0  w-full bg-white xl:absolute lg:absolute md:absolute sm:relative">
                 <div class="xl:col-span-1 lg:col-span-3 md:col-span-3  sm:col-span-7">
                     <ul class="uppercase sm:m-0 sm:text-center md:text-left">
                        <li class="inline"><a href="#" class="text-gray-800 xl:text-sm lg:text-xs md:text-xs sm:text-xs uppercase font-bold pr-3">Home</a></li>
                         <li class="inline"><a href="/aboutus" class="text-gray-800 xl:text-sm lg:text-xs md:text-xs sm:text-xs uppercase font-bold pr-3">About Us</a></li>
                         <li class="inline"><a href="/podcaster" class="text-gray-800 xl:text-sm lg:text-xs sm:text-xs md:text-xs uppercase font-bold pr-3">Podcaster</a></li>
                         <li class="inline"><a href="/advertise" class="text-gray-800 xl:text-sm lg:text-xs md:text-xs sm:text-xs uppercase font-bold pr-3">Advertise With Us</a></li>
                         
                     </ul>
                 </div>
                 <div class="xl:col-span-1 lg:col-span-2 md:col-span-2  sm:col-span-7">
                    <center>
                        <div class="w-full">
                              <label for="search" class="sr-only">Searcah</label>
                              <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                                  <!-- Heroicon name: solid/search -->
                                  <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                  </svg>
                                </div>
                                <input id="search" name="search" class="block w-full bg-white border border-gray-300 rounded-md py-2 pl-10 pr-3 text-sm placeholder-gray-500 focus:outline-none focus:text-gray-900 focus:placeholder-gray-400 focus:ring-1 focus:ring-rose-500 focus:border-rose-500 sm:text-sm" placeholder="Search" type="search">
                              </div>
                            </div>
                     </center>
                 </div>
                 <div class="xl:col-span-1 lg:col-span-2 md:col-span-2  sm:col-span-7">
                    <ul class="uppercase sm:m-0  sm:text-center  xl:float-right lg:float-right md:float-right">
                         <li class="inline"><a href="#" class="text-gray-800 text-lg uppercase font-bold pr-3"><i class="fab fa-facebook"></i></a></li>
                         <li class="inline"><a href="#" class="text-gray-800 text-lg uppercase font-bold pr-3"><i class="fab fa-instagram"></i></a></li>
                          <li class="inline"><a href="#" class="text-gray-800 text-lg uppercase font-bold pr-3"><i class="fab fa-twitter"></i></a></li>
                     </ul>
                 </div>
             </div>




        </div>
         @livewireScripts


            <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
            <script src="{{ asset('js/jquery-migrate-3.0.0.min.js') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" ></script>
            <script src="{{ asset('js/jquery.backstretch.min.js') }}"></script>
            <script src="{{ asset('js/wow.min.js') }}"></script>


        <!-- <script src="{{ asset('js/scripts.js') }}"></script> -->
    </body>

</html>
