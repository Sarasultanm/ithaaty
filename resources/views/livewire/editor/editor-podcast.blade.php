   <?php use App\Http\Livewire\Editor\EditorPodcast; ?>

 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editor Dashboard') }}
        </h2>
  </x-slot>

 <div class="">
        <div class="">
            


<div class="min-h-screen bg-gray-100">
  <!--
    When the mobile menu is open, add `overflow-hidden` to the `body` element to prevent double scrollbars

    Menu open: "fixed inset-0 z-40 overflow-y-auto", Menu closed: ""
  -->
   @include('layouts.editor.header')

  <div class="py-10">

    <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
      <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
      	<!-- sidebar -->
        @include('layouts.editor.sidebar')
        <!-- sidebar -->
      </div>
      <main class="col-span-10">
        <div class="w-full ">
             <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
        </div>

        <div class=" w-full ">
                <h1 class="font-bold text-gray-800 text-xl">My Podcast</h1> 
         </div> 
        <!--  updated -->
        <div class="grid grid-cols-12 mt-5 gap-5">

          <div class="col-span-8">

           <div class="grid gap-4 grid-cols-12">

            @foreach($categoryList->get() as $category)

              @if( EditorPodcast::getPostByCat($category->id)->count() != 0 )  

                 <div class="col-span-12 bg-white p-2 ">
                  <h2 id="{{ $category->category_name }}-{{ $category->id }}" >{{ $category->category_name }}</h2>
                 </div>
                   <?php $getAudioData = EditorPodcast::getPostByCat($category->id)->get()  ?> 
                   
                    @foreach($getAudioData as $audioData)

                      <div class="col-span-4 bg-white p-2 ">
                        <article aria-labelledby="question-title-81614">
                         <div>
                            <div class="flex space-x-3">
                              <div class="min-w-0 flex-1">
                                <p class="text-md font-bold text-gray-900">
                                  <a href="#" class="hover:underline">{{ $audioData->audio_name }}</a>
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="mt-2 text-sm text-gray-700 space-y-4">
                             <div class="text-white bg-cover h-36" style="background-image: url('{{ asset('images/slider-img/slide1.jpg') }}');">    
                             </div>
                          </div>

                          <div>
                            <div class="flex space-x-3">
                              <div class="min-w-0 flex-1">                      
                                <p class="text-xs text-gray-500 mt-2">
                                  <a class="hover:underline">
                                   
                                    <?php $date = date_create($audioData->created_at); ?>
                                    <time datetime="2020-12-09T11:43:00">{{ date_format($date,"M, Y") }}</time>  <span class="float-left">SE:{{ $audioData->audio_season }} | EP:{{ $audioData->audio_episode }}</span>
                                  </a>
                                </p>
                              <!--   <div class="text-xs font-bold text-gray-900 mt-5" x-data="{ open: false }"> -->
                                <div class="text-xs font-bold text-gray-900 mt-5">
                                  
                                  <a href="{{ route('editorPodcastUpdate',['id' => $audioData->id]) }}"  class="hover:underline">Update</a>
                                  <a href="{{ route('editorPodcastDetails',['id' => $audioData->id]) }}" class="hover:underline float-right" >Details</a>

                                </div>
                              </div>
                             
                            </div>
                          </div>

                        </article>
                      </div>

                    @endforeach



              @endif

            @endforeach









     <!--        @foreach($audioList->get() as $myaudio)

            <div class="col-span-4 bg-white p-2 mt-10">
              <article aria-labelledby="question-title-81614">
               <div>
                  <div class="flex space-x-3">
                    <div class="min-w-0 flex-1">
                      <p class="text-md font-bold text-gray-900">
                        <a href="#" class="hover:underline">{{ $myaudio->audio_name }}</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="mt-2 text-sm text-gray-700 space-y-4">
                   <div class="text-white bg-cover h-36" style="background-image: url('{{ asset('images/slider-img/slide1.jpg') }}');">    
                   </div>
                </div>

                <div>
                  <div class="flex space-x-3">
                    <div class="min-w-0 flex-1">                      
                      <p class="text-xs text-gray-500 mt-2">
                        <a class="hover:underline">
                          <?php $date = date_create($myaudio->created_at); ?>
                          <time datetime="2020-12-09T11:43:00">{{ date_format($date,"M, Y") }}</time>  <span class="float-left">SE:{{ $myaudio->audio_season }} | EP:{{ $myaudio->audio_episode }}</span>
                        </a>
                      </p>
                   
                      <div class="text-xs font-bold text-gray-900 mt-5">
                       
                        <a href="{{ route('editorPodcastUpdate',['id' => $myaudio->id]) }}"  class="hover:underline">Update</a>
                        <a href="{{ route('editorPodcastDetails',['id' => $myaudio->id]) }}" class="hover:underline float-right" >Details</a>

                      </div>
                    </div>
                   
                  </div>
                </div>

              </article>
            </div>




             @endforeach -->

              </div>
       








          </div>

          <div class="col-span-4">
            
        <aside >

          <div class=" bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">
            
            <div class="pb-5 space-y-6">
                  <h3 class="font-medium text-gray-900">Favorites</h3>
                  <ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
                      @foreach($favorite->get() as $fav)
                      <li class="py-3 flex justify-between items-center">
                        <div class="flex items-center">
                          <img src="{{ asset('images/slider-img/slide1.jpg') }}" alt="" class="w-8 h-8 ">
                          <div class="ml-4 ">
                             <p class="text-sm font-medium text-gray-900">{{ $fav->get_audio->audio_name }}</p>
                             <p class="text-sm text-gray-500">{{ $fav->get_audio->get_user->email }}</p>
                          </div>
                        </div>
                        <p class="ml-6 bg-white rounded-md text-xs font-medium ext-gray-500"></p>
                      </li>
                     @endforeach

                  </ul>
              </div>




          </div>

           <div class="mt-5 bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">
            
            <div class="pb-5 space-y-6">
                  <h3 class="font-medium text-gray-900">Categories</h3>
                  <ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
                      @foreach($categoryList->get() as $category)
                      <li class="py-3 flex justify-between items-center" >
                        <a href="#{{ $category->category_name }}-{{ $category->id }}">
                        <div class="flex items-center">
                          <img src="{{ asset('images/slider-img/slide1.jpg') }}" alt="" class="w-8 h-8 ">
                          <div class="ml-4 ">
                             <p class="text-sm font-medium text-gray-900">{{ $category->category_name }}</p>
                             <!-- <p class="text-sm text-gray-500">Guest: user@gmail.com</p> -->
                          </div>
                        </div>
                        <p class="ml-6 bg-white rounded-md text-xs font-medium ext-gray-500"></p>
                      </a>
                      </li>
                     @endforeach
                     <!--  <li class="py-3 flex justify-between items-center">
                        <div class="flex items-center">
                          <img src="{{ asset('images/slider-img/slide5.jpg') }}" alt="" class="w-8 h-8">
                           <div class="ml-4 ">
                             <p class="text-sm font-medium text-gray-900">Category Title</p>
                          </div>
                        </div>
                       <p class="ml-6 bg-white rounded-md text-xs font-medium ext-gray-500">2</p>
                      </li> -->
  
                  </ul>
              </div>

              


          </div>




          </aside> 









          </div>  



        </div>  


        <!-- updated -->
















































      </main>
      <!-- aside -->
    
      <!-- aside -->
    </div>
  </div>
</div>





















        </div>
</div>






