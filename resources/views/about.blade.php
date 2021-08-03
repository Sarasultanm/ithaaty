<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Ithaaty</title>
        <link rel="shortcut icon" href="images/favicon.png">    
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
       <!--  <link rel="stylesheet" href="assets/css/animate.css"> -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/media-queries.css') }}">
        <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">   



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
                            class="mr-20 mt-3  w-56  absolute float-right origin-top-right right-0 shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-0-button" tabindex="-1">
                              <div class="py-1" role="none">
                                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                               
                                 <a href="/login" class="bg-gray-100 text-gray-900 flex px-4 py-2 text-sm cursor-pointer " role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" /></svg>
                                  <span>Login</span>
                                </a>
                               
                                  <!-- Heroicon name: solid/star -->
                                 
                                <a href="/register" class="text-gray-700 flex px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                  <!-- Heroicon name: solid/code -->
              
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                                  <span>Sign Up</span>
                                </a>
            
                              </div>
                            </div>
                          </div>







                        
                    </div>


                </div>

             </div>   


             <div class="grid grid-cols-1 mt-20 absolute w-full" style="margin-top: -200px;">
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

                                   
                                   <!--  <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                                        <img src="{{ asset('images/slider-img/slide2.jpg') }}" class="img-fluid mx-auto d-block" alt="img2">
                                    </div>
                                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                                        <img src="{{ asset('images/slider-img/slide3.jpg') }}" class="img-fluid mx-auto d-block" alt="img3">
                                    </div>
                                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                                        <img src="{{ asset('images/slider-img/slide4.jpg') }}" class="img-fluid mx-auto d-block" alt="img4">
                                    </div>
                                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                                        <img src="{{ asset('images/slider-img/slide5.jpg') }}" class="img-fluid mx-auto d-block" alt="img5">
                                    </div>
                                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                                        <img src="{{ asset('images/slider-img/slide6.jpg') }}" class="img-fluid mx-auto d-block" alt="img6">
                                    </div>
                                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                                        <img src="{{ asset('images/slider-img/slide7.jpg') }}" class="img-fluid mx-auto d-block" alt="img7">
                                    </div>
                                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                                        <img src="{{ asset('images/slider-img/slide8.jpg') }}" class="img-fluid mx-auto d-block" alt="img8">
                                    </div> -->
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

              <div class="grid grid-cols-3 gap-4 p-10 bottom-0 absolute w-full bg-white">
                 <div class="col-span-1">
                     <ul class="uppercase">
                         <li class="inline"><a href="#" class="text-gray-800 text-sm uppercase font-bold pr-3">Facebook</a></li>
                         <li class="inline"><a href="#" class="text-gray-800 text-sm uppercase font-bold pr-3">Instagram</a></li>
                     </ul>
                 </div>
                 <div class="col-span-1">
                    <center>
                      <ul class="uppercase">
                         <li class="inline"><a href="/podcaster" class="text-gray-800 text-sm uppercase font-bold pr-3">Podcaster</a></li>
                         <li class="inline"><a href="#" class="text-gray-800 text-sm uppercase font-bold pr-3">Home</a></li>
                          <li class="inline"><a href="#" class="text-gray-800 text-sm uppercase font-bold pr-3">About Us</a></li>
                     </ul>
                     </center>
                 </div>
                 <div class="col-span-1">
                    <ul class="uppercase">
                         <li class="inline"><a href="#" class="float-right text-gray-800 text-sm uppercase font-bold pr-3">Search</a> </li>
                        
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
