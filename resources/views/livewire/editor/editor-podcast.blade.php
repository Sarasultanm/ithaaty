<?php 
  use App\Http\Livewire\Editor\EditorPodcast;

 ?>

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
     


      <main class="xl:col-span-10 lg:col-span-9">

      @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
          @include('layouts.editor.page-404')
      @else

      @if(Auth::user()->get_plan->check_features('p3')->count() != 0 || Auth::user()->get_plan->check_features('p2')->count() != 0 )
        <div class="w-full ">
             <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
        </div>

        <div class=" w-full flex xl:p-0 lg:p-0 md:p-0 sm:p-0 xs:p-0">
            <div class="flex-1">
               <h1 class="font-bold text-gray-800 text-xl">My Podcast </h1> 
               @if(empty(Auth::user()->alias))
               <small class="">Click <a href="{{ route('editorSettings') }}" class="text-custom-pink pointer">settings</a> and update your name</small>
               @else
               <small class="text-custom-pink">@ {{Auth::user()->alias}} </small>
               @endif
            </div>
            <div>

                @if(Auth::user()->get_audio->count() != 0)
                <a href="{{ route('editorSettings') }}" class=" inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white sm:col-start-2 sm:text-sm">Import RSS</a>
                <a href="{{ route('editorPodcastCreate') }}" class=" inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white sm:col-start-2 sm:text-sm">Add Podcast</a>
                @endif
            </div>
               
              
         </div> 
        <!--  updated -->
        <div class="grid grid-cols-12 mt-5 gap-5">
         @if(Auth::user()->get_audio->count() != 0)
        <!-- col-8 -->
        <div class="xl:col-span-8 sm:col-span-12">

           <div class="grid gap-4 grid-cols-12">

            @foreach($categoryList->get() as $category)

              @if( EditorPodcast::getPostByCat($category->id)->count() != 0 )  

                 <div class="col-span-12 bg-white p-2 ">
                  <h2 id="{{ $category->category_name }}-{{ $category->id }}" >{{ $category->category_name }}</h2>
                 </div>
                   <?php $getAudioData = EditorPodcast::getPostByCat($category->id)->get()  ?> 
                   
                    @foreach($getAudioData as $audioData)

                      <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-6 xs:col-span-6 bg-white p-2 ">
                        <article aria-labelledby="question-title-81614">
                         <div>
                            <div class="flex space-x-3">
                              <div class="min-w-0 flex-1">
                                <p class="text-md font-bold text-gray-900">
                                  <a href="#" class="hover:underline">{{ $audioData->audio_name }}
                                    @if($audioData->audio_publish != "Publish")
                                    <svg class="h-5 w-5 text-custom-pink float-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg></a>
                                    @endif
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="mt-2 text-sm text-gray-700 space-y-4">
                              @if($audioData->get_thumbnail->count() == 0)
                                 <?php $s3_thumbnail = "images/default_podcast.jpg"; ?>
                              @else
                                <?php $img_path = $audioData->get_thumbnail->first()->gallery_path; ?>
                                <?php $s3_thumbnail = config('app.s3_public_link')."/users/podcast_img/".$img_path; ?>
                              @endif
                              <div class="text-white bg-cover h-36" style="background-image: url(<?php echo $s3_thumbnail; ?>);"></div>
                              
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



              </div>
       
      </div>
      <!-- col-8 -->

      <!-- col-4 -->
      <div class="col-span-4 xl:block lg:block md:block sm:hidden">
          <aside >
                <div class=" bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">
                  <div class="pb-5 space-y-6">
                        <h3 class="font-medium text-gray-900">Favorites</h3>
                        <ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
                            @foreach($favorite->get() as $fav)
                            <li class="py-3 flex justify-between items-center">
                              <div class="flex items-center">
                                <?php  $defaul_img = 'slide'.rand(1,10).'.jpg'; ?>
                                <img src="{{ asset('images/slider-img/'.$defaul_img) }}" alt="" class="w-8 h-8 ">
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
                                 <?php  $defaul_img = 'slide'.rand(1,10).'.jpg'; ?>
                                <img src="{{ asset('images/slider-img/'.$defaul_img) }}" alt="" class="w-8 h-8 ">
                                <div class="ml-4 ">
                                   <p class="text-sm font-medium text-gray-900">{{ $category->category_name }}</p>
                                   <!-- <p class="text-sm text-gray-500">Guest: user@gmail.com</p> -->
                                </div>
                              </div>
                              <p class="ml-6 bg-white rounded-md text-xs font-medium ext-gray-500"></p>
                            </a>
                            </li>
                           @endforeach
                        </ul>
                    </div>
                </div>
            </aside> 
        </div>  
        <!-- col-4 -->
        @else
        @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")

         

        @else
        <div class="col-span-12">

              <!-- upload by rss -->

              @if(Auth::user()->get_plan->check_features('p3')->count() != 0 )

                  <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 sm:p-6">
                      <div>
                        <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">RSS Link</h2>
                        <p class="mt-1 text-sm text-gray-500">Your RSS feed allows your podcast to appear in other podcast apps, in some cases automatically.</p>
                      </div>

                      <div class="mt-6 grid grid-cols-4 gap-6">
                        <div class="col-span-4 sm:col-span-2">
                          <input wire:model="rss_link" type="text" name="first_name" id="first_name" autocomplete="cc-given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        </div>

                        <div class="col-span-4 sm:col-span-2 text-right">
                          <button wire:click="loadRss()" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white">
                        Load RSS
                      </button>
                        </div>

                      </div>
                    </div>
                   
                  </div>

                 <section >

                  <?php $rss_quatity = $rss_data['item_quantity'] ?? 0; ?>
             
                 <?php for ($i = 0; $i < $rss_quatity; $i++){ ?>
                      <div class="shadow sm:rounded-md sm:overflow-hidden mt-5">
                        <div class="bg-white py-6 px-4 sm:p-6">
                          <div class="grid grid-cols-4 gap-6">
                            <div class="col-span-1 ">
                              <img class="w-full h-auto " loading="lazy" src="{{ $rss_data['image_url'] ?? ''  }}" alt="">
                            </div>
                            <div class="col-span-3 text-left relative">
                                <h2 class="text-lg leading-6 font-bold text-gray-900">{{ $rss_data["items"][$i]['title'] ?? ''  }}</h2>
                                <p class="mt-1 text-sm text-gray-500">Author : {{ $rss_data["author"] ?? ''  }}</p>
                                <p class="mt-5 text-md text-gray-500">{{ $rss_data["items"][$i]['description'] ?? ''  }}</p>
                                <div class="mt-5 mb-5">
                     
                    </div>

                      
                            </div>


                          </div>
                        </div>
                       
                      </div>
                       <?php } ?>
                </section>
                @endif
            <!-- upload by rss -->
              
             <!-- upload by embed -->
              @if(Auth::user()->get_plan->check_features('p2')->count() != 0 )

                  <div class="relative my-10">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                      <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center">
                      <span class="px-2 bg-white text-sm text-gray-500">
                        OR
                      </span>
                    </div>
                  </div>


                  <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 sm:p-6">
                      <div class="grid grid-cols-4 gap-6">
                        <div class="col-span-4 sm:col-span-2">
                         <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Upload Podcast by Emded</h2>
                        <p class="mt-1 text-sm text-gray-500">Quisque sit amet ipsum maximus, vulputate elit non, mattis libero. Ut sed justo ligula.</p>
                        </div>

                        <div class="col-span-4 sm:col-span-2 text-right mt-5">
                          <a  href="{{ route('editorPodcastCreate') }}" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white ">
                             Create Podcast
                            </a>
                        </div>

                      </div>
                    </div>
                   
                  </div>
                  @endif
              <!-- upload by embed -->     

              <!-- upload by file -->

              @if(Auth::user()->get_plan->check_features('u1')->count() == 0 )

                  <div class="relative my-10">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                      <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center">
                      <span class="px-2 bg-white text-sm text-gray-500">
                        OR
                      </span>
                    </div>
                  </div>

                  <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 sm:p-6">
                      <div class="grid grid-cols-4 gap-6">
                        <div class="col-span-4 sm:col-span-2">
                         <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Upload Podcast by File</h2>
                        <p class="mt-1 text-sm text-gray-500">Quisque sit amet ipsum maximus, vulputate elit non, mattis libero. Ut sed justo ligula.</p>
                        </div>

                        <div class="col-span-4 sm:col-span-2 text-right mt-5">
                          <a  href="{{ route('editorPodcastCreate') }}" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white ">
                             Create Podcast
                            </a>
                        </div>

                      </div>
                    </div>
                   
                  </div>
                  @endif
                 <!-- upload by file -->
        </div>

        @endif
        

        @endif

        </div>  


        <!-- updated -->
        @else
          @include('layouts.editor.page-404')

         @endif
        @endif
      </main>

        
     
      <!-- aside -->
    
      <!-- aside -->
    </div>
  </div>
</div>





















        </div>
</div>






