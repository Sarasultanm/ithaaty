<?php 
  use App\Http\Livewire\Editor\EditorPodcast;

 ?>

 <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Editor Dashboard') }}
        </h2>
  </x-slot>

 <div class="">
        <div class="">
            


@if(Auth::user()->get_csm('csm_pagebg','active')->count() != 0 )
   <div class="min-h-screen" style="background:{{Auth::user()->get_csm('csm_pagebg','active')->first()->csm_value }};">
@else
   <div class="min-h-screen bg-gray-100">
@endif
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
             <x-auth-session-status-custom class="mt-4 mb-4" :status="session('status')" />
        </div>

        <div class="flex w-full xl:p-0 lg:p-0 md:p-0 sm:p-0 xs:p-0">
            <div class="flex-1">
              <h1 class="text-xl font-bold text-gray-800">My Podcast </h1> 
                @forelse (Auth::user()->channels()->get() as $user_channel )
                  @if(!empty($user_channel->channel_uniquelink))
                    <a href="{{ route('editorChannelView',['link' => $user_channel->channel_uniquelink ]) }}" target="_blank"><small class="text-custom-pink">@ {{ $user_channel->channel_name }} </small></a>
                  @else
                  <a href="#" target="_blank"><small class="text-custom-pink">@ {{ $user_channel->channel_name }} </small></a>
                  @endif
                @empty
                @if(empty(Auth::user()->alias))
                <small class="">Click <a href="{{ route('editorSettings') }}" class="text-custom-pink pointer">settings</a> and update your name</small>
                @else
                <small class="text-custom-pink">@ {{Auth::user()->alias}} </small>
                @endif
              @endforelse







              
              
            </div>
            <div>

                @if(Auth::user()->get_audio->count() != 0)
                <a href="{{ route('editorSettings') }}" class="inline-flex justify-center px-4 py-2 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-custom-pink sm:col-start-2 sm:text-sm">Import RSS</a>
                <a href="{{ route('editorPodcastCreate') }}" class="inline-flex justify-center px-4 py-2 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-custom-pink sm:col-start-2 sm:text-sm">Add Episodes</a>
                @endif
            </div>
               
              
         </div> 
        <!--  updated -->
        <div class="grid grid-cols-12 gap-5 mt-5">
         @if(Auth::user()->get_audio->count() != 0)
        <!-- col-8 -->
        <div class="xl:col-span-8 sm:col-span-12">

         
           <section  class="grid grid-cols-6 gap-4 mb-5"> 

            @forelse (Auth::user()->get_podcasts()->get() as $podcast )

            <div class="col-span-6 p-2 bg-white ">
              <h2>{{ $podcast->podcast_title }}</h2>
            </div>

            @forelse($podcast->get_episodes()->get() as $episode)
            <div class="p-2 bg-white rounded-lg shadow-md xl:col-span-2 lg:col-span-2 md:col-span-3 sm:col-span-3 xs:col-span-6">
                <div>
                    <div class="flex space-x-3">
                        <div class="flex justify-between flex-1 min-w-0">
                            <p class="font-bold text-gray-900 truncate text-md">
                                <a href="#" class="hover:underline">
                                    <span class="">{{ $episode->get_audio->audio_name }}</span>
                                </a>
                            </p>
                            <span>
                                @if($episode->get_audio->audio_publish != "Publish")
                                <svg class="float-right w-5 h-5 text-custom-pink" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mt-2 space-y-4 text-sm text-gray-700">
                    @if($episode->get_audio->get_thumbnail->count() == 0)
                        @php
                            $s3_ep_thumbnail = asset('images/default_podcast.jpg');
                        @endphp
                   
                    @else
                        @php
                            $ep_img_path = $episode->get_audio->get_thumbnail->first()->gallery_path;
                            $s3_ep_thumbnail = config('app.s3_public_link') . "/users/podcast_img/" . $ep_img_path;
                        @endphp
                    @endif
                    <div class="text-white bg-cover h-36" style="background-image: url({{ $s3_ep_thumbnail  }}?>);"></div>
                </div>
        
                <div>
                    <div class="flex space-x-3">
                        <div class="flex-1 min-w-0">
                            <p class="mt-2 text-xs text-gray-500">
                                <a class="hover:underline">
                                    <?php $date = date_create($episode
            ->get_audio
            ->created_at); ?> <time datetime="2020-12-09T11:43:00">{{ date_format($date,"M, Y") }}</time>
                                    <span class="float-left">SE:{{ $episode->get_audio->audio_season }} | EP:{{ $episode->get_audio->audio_episode }}</span>
                                </a>
                            </p>
                            <!--   <div class="mt-5 text-xs font-bold text-gray-900" x-data="{ open: false }"> -->
                            <div class="mt-5 text-xs font-bold text-gray-900">
                                <a href="{{ route('editorPodcastUpdate',['id' => $episode->get_audio->id]) }}" class="hover:underline">Update</a>
                                <a href="{{ route('editorPodcastDetails',['id' => $episode->get_audio->id]) }}" class="float-right hover:underline">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-12">
                <center>
                    <h3 class="text-xl font-bold text-gray-900">No Episodes Found</h3>
                </center>
            </div>
            @endforelse

            @empty
                No Podcast
            @endforelse



            </section>
          

            <section  class="grid grid-cols-6 gap-4 mb-5"> 
              <div class="col-span-6 p-2 bg-white ">
                <h2>Uncategories</h2>
              </div>
              @forelse (Auth::user()->get_audio()->get() as $audio_episodes )
                @if($audio_episodes->check_in_podcasts == false)
                <div class="p-2 bg-white rounded-lg shadow-md xl:col-span-2 lg:col-span-2 md:col-span-3 sm:col-span-3 xs:col-span-6">
                  <div>
                      <div class="flex space-x-3">
                          <div class="flex justify-between flex-1 min-w-0">
                              <p class="font-bold text-gray-900 truncate text-md">
                                  <a href="#" class="hover:underline">
                                      <span class="">{{ $audio_episodes->audio_name }}</span>
                                  </a>
                              </p>
                              <span>
                                  @if($audio_episodes->audio_publish != "Publish")
                                  <svg class="float-right w-5 h-5 text-custom-pink" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                      <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                  </svg>
                                  @endif
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="mt-2 space-y-4 text-sm text-gray-700">
                      @if($audio_episodes->get_thumbnail->count() == 0)
                          @php
                              $audio_s3_ep_thumbnail = asset('images/default_podcast.jpg');
                          @endphp
                     
                      @else
                          @php
                              $audio_ep_img_path = $audio_episodes->get_thumbnail->first()->gallery_path;
                              $audio_s3_ep_thumbnail = config('app.s3_public_link') . "/users/podcast_img/" . $audio_ep_img_path;
                          @endphp
                      @endif
                      <div class="text-white bg-cover h-36" style="background-image: url({{ $audio_s3_ep_thumbnail  }}?>);"></div>
                  </div>
          
                  <div>
                      <div class="flex space-x-3">
                          <div class="flex-1 min-w-0">
                              <p class="mt-2 text-xs text-gray-500">
                                  <a class="hover:underline">
                                      @php
                                        $date = date_create($audio_episodes->created_at); 
                                      @endphp
                                    <time datetime="2020-12-09T11:43:00">{{ date_format($date,"M, Y") }}</time>
                                      <span class="float-left">SE:{{ $audio_episodes->audio_season }} | EP:{{ $audio_episodes->audio_episode }}</span>
                                  </a>
                              </p>
                              <!--   <div class="mt-5 text-xs font-bold text-gray-900" x-data="{ open: false }"> -->
                              <div class="mt-5 text-xs font-bold text-gray-900">
                                  <a href="{{ route('editorPodcastUpdate',['id' => $audio_episodes->id]) }}" class="hover:underline">Update</a>
                                  <a href="{{ route('editorPodcastDetails',['id' => $audio_episodes->id]) }}" class="float-right hover:underline">Details</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
                @endif
              @empty
                 No Episodes
              @endforelse
              

            </section>

      </div>
      <!-- col-8 -->

      <!-- col-4 -->
      <div class="col-span-4 xl:block lg:block md:block sm:hidden">
        @include('livewire.editor.podcasts.sidebar')
        
      </div>  
        <!-- col-4 -->
        @else

        @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")

         

        @else

        <div class="col-span-12">

              <!-- upload by rss -->

              @if(Auth::user()->get_plan->check_features('p3')->count() != 0 )

                  <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-6 bg-white sm:p-6">
                      <div>
                        <h2 id="payment_details_heading" class="text-lg font-medium leading-6 text-gray-900">RSS Link</h2>
                        <p class="mt-1 text-sm text-gray-500">Your RSS feed allows your podcast to appear in other podcast apps, in some cases automatically.</p>
                      </div>

                      <div class="grid grid-cols-4 gap-6 mt-6">
                        <div class="col-span-4 sm:col-span-2">
                          <input wire:model="rss_link" type="text" name="first_name" id="first_name" autocomplete="cc-given-name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        </div>

                        <div class="col-span-4 text-right sm:col-span-2">
                          <button wire:click="loadRss()" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-custom-pink">
                        Load RSS
                      </button>
                        </div>

                      </div>
                    </div>
                   
                  </div>

                 <section >

                  <?php $rss_quatity = $rss_data['item_quantity'] ?? 0; ?>
             
                 <?php for ($i = 0; $i < $rss_quatity; $i++){ ?>
                      <div class="mt-5 shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-6 bg-white sm:p-6">
                          <div class="grid grid-cols-4 gap-6">
                            <div class="col-span-1 ">
                              <img class="w-full h-auto " loading="lazy" src="{{ $rss_data['image_url'] ?? ''  }}" alt="">
                            </div>
                            <div class="relative col-span-3 text-left">
                                <h2 class="text-lg font-bold leading-6 text-gray-900">{{ $rss_data["items"][$i]['title'] ?? ''  }}</h2>
                                <p class="mt-1 text-sm text-gray-500">Author : {{ $rss_data["author"] ?? ''  }}</p>
                                <p class="mt-5 text-gray-500 text-md">{{ $rss_data["items"][$i]['description'] ?? ''  }}</p>
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
                      <span class="px-2 text-sm text-gray-500 bg-white">
                        OR
                      </span>
                    </div>
                  </div>


                  <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-6 bg-white sm:p-6">
                      <div class="grid grid-cols-4 gap-6">
                        <div class="col-span-4 sm:col-span-2">
                         <h2 id="payment_details_heading" class="text-lg font-medium leading-6 text-gray-900">Upload Podcast by Emded</h2>
                        <p class="mt-1 text-sm text-gray-500">Quisque sit amet ipsum maximus, vulputate elit non, mattis libero. Ut sed justo ligula.</p>
                        </div>

                        <div class="col-span-4 mt-5 text-right sm:col-span-2">
                          <a  href="{{ route('editorPodcastCreate') }}" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-custom-pink ">
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
                      <span class="px-2 text-sm text-gray-500 bg-white">
                        OR
                      </span>
                    </div>
                  </div>

                  <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-6 bg-white sm:p-6">
                      <div class="grid grid-cols-4 gap-6">
                        <div class="col-span-4 sm:col-span-2">
                         <h2 id="payment_details_heading" class="text-lg font-medium leading-6 text-gray-900">Upload Podcast by File</h2>
                        <p class="mt-1 text-sm text-gray-500">Quisque sit amet ipsum maximus, vulputate elit non, mattis libero. Ut sed justo ligula.</p>
                        </div>

                        <div class="col-span-4 mt-5 text-right sm:col-span-2">
                          <a  href="{{ route('editorPodcastCreate') }}" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-custom-pink ">
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






