<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Channel') }}
    </h2>
</x-slot>

<div class="">
    <div class="">
        @if(Auth::user()->get_csm('csm_pagebg','active')->count() != 0 )
        <div class="min-h-screen" style="background:{{Auth::user()->get_csm('csm_pagebg','active')->first()->csm_value }};">
            @else
            <div class="min-h-screen bg-gray-100">
                @endif
                <!-- HEADER -->
                @include('layouts.editor.header')
                <!-- HEADER -->
                <div class="py-10">
                    <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
                        <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
                            <!-- sidebar -->
                            @include('layouts.editor.sidebar')
                            <!-- sidebar -->
                        </div>
                        <main class="xl:col-span-10 lg:col-span-9">
                            <div class="w-full">
                                <x-auth-session-status-custom class="mt-4 mb-4" :status="session('status')" />
                            </div>

                            <div class="mt-4">
                                <div class="w-full xl:p-0 lg:p-0 md:p-0 sm:p-0 xs:p-0">
                                    <div class="w-full">
                                        <div class="grid grid-cols-1 gap-4">
                                            <div class="relative flex items-center w-full space-x-3 hover:border-gray-400 ">
                                                <div class="flex-shrink-0 w-44 h-44 ">
                                                    <?php $podcast_imgpath = $podcast->get_channel_photo->gallery_path ?>
                                                    <?php $podcast_s3_link = config('app.s3_public_link')."/users/podcast_img/".$podcast_imgpath; ?>
                                                    <img class="w-full h-full rounded-lg" src="{{ $podcast_s3_link }}" alt="image" />
                                                    
                                                </div>
                                                <div class="flex-1 min-w-0">
                                        
                                                        <!--  <span class="absolute inset-0" aria-hidden="true"></span> -->
                                                        <p class="mt-5 text-5xl font-bold text-gray-900">
                                                            {{$podcast->podcast_title}}
                                                        </p>
                                                         <p class="mt-5 text-xl font-bold text-gray-900">
                                                            {{$podcast->get_channel->channel_name}}
                                                        </p>
                                                        <p class="inline-grid text-gray-500 text-md">
                                                           @if($podcast->podcast_description == null)
                                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at risus facilisis, dapibus ex nec, porta massa. Duis quis massa vitae nisl gravida laoreet. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                                                           @else
                                                            {{$podcast->podcast_description}}
                                                           @endif
                                                           <div class="mt-4">
                                                                @foreach ($podcast->get_categories()->get() as $category)
                                                                    @if($category->pc_typestatus == 'active')
                                                                        <span class="inline-flex items-center px-3 py-0.5 rounded-full 
                                                                        text-sm font-medium bg-custom-pink text-white">
                                                                            {{ $category->get_category->category_name }}
                                                                        </span>
                                                                    @endif
                                                          
                                                                @endforeach
                                                              
                                                            </div>
                                                        
                                                        </p>
                                                  
                                                </div>
                                            </div>

                                            <!-- More people... -->
                                        </div>
                                    </div>
                                    

                                    <section class="w-full mt-5">
                                        <div class="flex justify-end mb-5 space-x-3">
                                            <a target="_blank" href="{{ route('editorNewPodcastView',['link' => $podcast_uniquelink ]) }}" class="inline-flex items-center font-bold cursor-pointer hover:underline hover-text-custom-pink text-md text-custom-pink">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                                                  </svg>
                                                View All Episodes
                                            </a>
                                        </div>
                                        
                                        <ul role="list" class="divide-y divide-gray-200">
                                          
                                            <li class="relative px-4 py-5 mb-5 bg-white rounded-lg shadow-md">
                                                
                                                    <div class="flex justify-between space-x-3">
                                                        @if ($episode->get_thumbnail->count() != 0) 
                                                            @php 
                                                                $episode_img_path = $episode->get_thumbnail->first()->gallery_path; 
                                                                $episode_s3_thumbnail = config('app.s3_public_link')."/users/podcast_img/".$episode_img_path; 
                                                            @endphp 
                                                        @else 
                                                            @php 
                                                                $episode_s3_thumbnail = asset('images/default_podcast.jpg');
                                                            @endphp 
                                                        @endif
                                                        
                                                        <div class="w-32 h-32 bg-center bg-cover rounded-lg" style="background-image:url({{ $episode_s3_thumbnail }})">
                                                            {{-- <img class="w-full h-full rounded-lg" src="{{ $podcast_s3_link }}" alt="image" /> --}}
                                                            <img class="w-12 h-12 mt-20 rounded-lg" src="{{ $podcast_s3_link }}" alt="image" />
                                                        </div>
                                        
                                                        <div class="flex-1 min-w-0">
                                                            <p class="text-lg font-bold text-gray-900">
                                                                {{ $episode->audio_name }}
                                                            </p>
                                                            <p class="text-sm text-gray-500 truncate">Velit placeat sit ducimus non sed</p>
                                        
                                                            <div class="mt-1">
                                                                <p class="text-sm text-gray-600 truncate line-clamp-2">
                                                                    {{ $episode->audio_summary }}
                                                                </p>
                                                            </div>
                                                            <div>
                                                               
                                                                <div  x-data="{ open: false }" class="mt-4 ">
                                                                    <div  @click="open = !open" x-cloak>
                                                                    
                                                                        <button   x-show="!open" onclick="playAudio()"
                                                                    class="vjs-big-play-button bg-custom-pink cursor-pointer font-bold hover-bg-custom-pink inline-flex items-center p-2 rounded-md shadow-md text-md text-white">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                        </svg>
                                                                    Play
                                                                        </button>
                                                                        <button x-show="open" onclick="pauseAudio()"
                                                                    
                                                                    class="vjs-big-play-button bg-custom-pink cursor-pointer font-bold hover-bg-custom-pink inline-flex items-center p-2 rounded-md shadow-md text-md text-white">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                        </svg>
                                                                    Pause
                                                                        </button>




                                                                    </div>

                                                                </div>

                                                                </div>
                                                             
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="inline-flex flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">
                                                            @if($episode->audio_publish != "Publish")
                                                            <svg class="w-5 h-5 mr-2 text-custom-pink" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                                            </svg>
                                                            <span class="text-sm font-bold truncate text-custom-pink">Draft</span>
                                                            @endif
                                                        </div>
                                                   
                                                        {{-- <time datetime="2021-01-27T16:35" class="flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">1d ago</time> --}}
                                                    </div>

                                               
                                            </li>
                                            <div>
                                                <div class="bg-white shadow p-1 hidden">        
                                                    @if($episode->audio_type == "Upload")
                                                  @if($episode->get_thumbnail->count() == 0)
                                                     <?php $s3_thumbnail = "images/default_podcast.jpg"; ?>
                                                  @else
                                                    <?php $img_path = $episode->get_thumbnail->first()->gallery_path; ?>
                                                    <?php $s3_thumbnail = config('app.s3_public_link')."/users/podcast_img/".$img_path; ?>
                                                  @endif
                                                 <script src="{{ asset('videojs/video.min.js') }}"></script>
                                                  <script src="{{ asset('videojs/nuevo.min.js') }}"></script>

                                                 <video
                                                  id="my-video"
                                                    class="video-js vjs-default-skin vjs-fluid"
                                                    controls
                                                    width="100%"
                                                    height="450px"
                                                
                                                  data-setup="{}"
                                                >
                                                 <?php $s3_link = config('app.s3_public_link')."/audio/"; ?>
                                                  <source src="{{ $s3_link.$episode->audio_path }}" type="video/mp4" />
                                                  <source src="{{ $s3_link.$episode->audio_path }}" type="audio/mpeg" />
                                                  <source src="{{ $s3_link.$episode->audio_path }}" type="video/webm" />
                                                  @if($episode->get_chapters()->count() != 0)
                                                     <?php  $chapter_link = $episode->get_chapters()->first()->chapter_filename;  ?>
                                                    <track kind="chapters" src="{{ asset('vtt/'.$chapter_link) }}" srclang="en"> 
                                                  @endif 
                                                  <p class="vjs-no-js">
                                                    To view this video please enable JavaScript, and consider upgrading to a
                                                    web browser that
                                                    <a href="https://videojs.com/html5-video-support/" target="_blank"
                                                      >supports HTML5 video</a
                                                    >
                                                  </p>
                                                </video>
                                                <script>
                                                    var x = document.getElementById("my-video"); 
                                                    
                                                    function playAudio() { 
                                                      x.play(); 
                                                    } 
                                                    
                                                    function pauseAudio() { 
                                                      x.pause(); 
                                                    } 
                                                </script>
                                                {{-- <script> 
                                                      var player=videojs('my-video'); 
                                                      player.nuevo({
                                                        qualityMenu: true,
                                                        buttonRewind: true,
                                                        buttonForward: true
                                                      });
                                                  </script> --}}
                          

                                                    @elseif($episode->audio_type == "RSS") 
                          
                                                  @if($episode->get_thumbnail->count() == 0)
                                                     <?php $s3_thumbnail = "images/default_podcast.jpg"; ?>
                                                  @else
                                                    <?php $img_path = $episode->get_thumbnail->first()->gallery_path; ?>
                                                    <?php $s3_thumbnail = config('app.s3_public_link')."/users/podcast_img/".$img_path; ?>
                                                  @endif
                                                  
                                                          <script src="{{ asset('videojs/video.min.js') }}"></script>
                                                  <script src="{{ asset('videojs/nuevo.min.js') }}"></script>
                          
                                                            <video
                                                    id="my-video"
                                                    class="video-js vjs-default-skin vjs-fluid"
                                                    controls
                                                    width="100%"
                                                    height="450px"
                                                    poster="{{ $s3_thumbnail }}"
                                                     data-setup="{}"
                                                  >
                                                    <source src="{{ $episode->audio_path }}" res="240" label="240p" type="video/mp4">
                                                    <source src="{{ $episode->audio_path }}" res="360" label="360p" type="video/mp4">
                                                    <source src="{{ $episode->audio_path }}" default res="480" label="480p" type="video/mp4">
                                                    <source src="{{ $episode->audio_path }}" res="720" label="720p" type="video/mp4">
                                                    @if($episode->get_chapters()->count() != 0)
                                                       <?php  $chapter_link = $episode->get_chapters()->first()->chapter_filename;  ?>
                                                      <track kind="chapters" src="{{ asset('vtt/'.$chapter_link) }}" srclang="en"> 
                                                    @endif 
                                                    <p class="vjs-no-js">
                                                      To view this video please enable JavaScript, and consider upgrading to a
                                                      web browser that
                                                      <a href="https://videojs.com/html5-video-support/" target="_blank"
                                                        >supports HTML5 video</a
                                                      >
                                                    </p>
                                                  </video>
                                                  {{-- <script> 
                                                      var player=videojs('my-video'); 
                                                      player.nuevo({
                                                        qualityMenu: true,
                                                        buttonRewind: true,
                                                        buttonForward: true
                                                      });
                                                  </script> --}}
                          
                          
                          
                                                    @else
                          
                                                    <div class="audio-embed-container">
                                                            <?php echo $episode->audio_path; ?>
                                                            <script>
                                                                var x = document.getElementById("my-video"); 
                                                                
                                                                function playAudio() { 
                                                                  x.play(); 
                                                                } 
                                                                
                                                                function pauseAudio() { 
                                                                  x.pause(); 
                                                                } 
                                                            </script>
                                                     </div>
                          
                                                    @endif
                          
                                      </div> 

                                            </div>
                                           
                                            <!-- More messages... -->
                                        </ul>
                                        
                                    </section>
                                </div>

                                <!-- This example requires Tailwind CSS v2.0+ -->

                                <!-- More questions... -->
                            </div>
                        </main>
                        <!-- aside -->

                        <!-- aside -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
