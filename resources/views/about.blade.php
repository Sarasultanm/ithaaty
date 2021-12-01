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
         @livewireStyles
    </head>
    <body  style="background: #5f7c84;">
        <div class="font-sans text-gray-900 antialiased">
             <div class="grid grid-cols-2 gap-4" style="background: #5f7c84;height: 800px;">
                <div class="col-span-1 text-white">
                    <img src="{{ asset('images/logo.png')}}" style="width:300px;margin: 40px 30px 40px 30px;">
                    <div class="px-24 pb-10">
                        <h2 class="uppercase text-5xl mb-3">About Us</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer viverra, magna eu aliquet tempor, libero nunc vehicula lectus, id sodales odio quam eget lectus. Vivamus luctus vestibulum nibh at cursus. Nulla facilisi. Pellentesque mollis nisi ante, nec varius urna auctor et.</p>



                    </div>
                   
                </div>
                <div class="col-span-1 bg-no-repeat" style="background-image: url({{ asset('images/right-img.png')}});background-size: 100%;">

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
                                 
                                 <a href="/login" class="border-t-2 border-white text-white hover-bg-custom-pink flex px-4 py-2 text-sm cursor-pointer " role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" /></svg>
                                  <span>Login</span>
                                </a>
                               
                                  <!-- Heroicon name: solid/star -->
                                 
                                <a href="/register" class="hover-bg-custom-pink text-white flex px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                  <!-- Heroicon name: solid/code -->
              
                                  <svg xmlns="http://www.w3.org/2000/svg" class="text-white mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                                  <span>Sign Up</span>
                                </a>
            
                              </div>
                            </div>
                          </div>







                        
                    </div>


                </div>

             </div>   


             <div class="grid grid-cols-1 mt-20 absolute w-full" style="margin-top: -270px;">
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
                                         <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active">
                                            <a href="/post/{{ $likec->like_audioid }}">
                                                <img src="{{ asset('images/slider-img/'.$slide_pic.'.jpg') }}" class="img-fluid mx-auto d-block" alt="img1">
                                            </a>
                                         </div>
                                        @else
                                         <?php $slide_pic = "slide".$num; ?>
                                             <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                                            <a href="/post/{{ $likec->like_audioid }}">
                                                <img src="{{ asset('images/slider-img/'.$slide_pic.'.jpg') }}" class="img-fluid mx-auto d-block" alt="img1">
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

              <div class="grid grid-cols-3 gap-4 px-10 pt-5 pb-6 bottom-0 absolute w-full bg-white">
                 <div class="col-span-1">
                     <ul class="uppercase">
                        <li class="inline"><a href="#" class="text-gray-800 text-sm uppercase font-bold pr-3">Home</a></li>
                         <li class="inline"><a href="/aboutus" class="text-gray-800 text-sm uppercase font-bold pr-3">About Us</a></li>
                         <li class="inline"><a href="/podcaster" class="text-gray-800 text-sm uppercase font-bold pr-3">Podcaster</a></li>
                         <li class="inline"><a href="/advertise" class="text-gray-800 text-sm uppercase font-bold pr-3">Advertise With Us</a></li>
                         
                     </ul>
                 </div>
                 <div class="col-span-1">
                    <center>
                      <!--   <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-custom-pink hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                          <svg class="-ml-0.5 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                          SEARCH
                        </button> -->
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
                 <div class="col-span-1">
                    <ul class="uppercase float-right">
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
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>

</html>
