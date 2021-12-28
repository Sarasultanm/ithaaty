  <?php 
    use App\Http\Livewire\Editor\EditorPodcastView; 
    use Illuminate\Support\Str;

  ?>
 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Podcast View') }}
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
      <main class="lg:col-span-9 xl:col-span-7">

        <div class="mt-4">
           <div class="w-full ">
          	 <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>
          <!-- audio -->
              <article >
            <!--     <div>
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
                  </div>
                </div> -->
                 
                


                <div class="text-sm text-gray-700 space-y-4 relative">
                   <div class="text-white">
					           <!-- <h2 class="font-bold text-xl m-0">{{ $audio->audio_name }}</h2> -->
	              

           <div class="bg-white shadow p-1">        
      					@if($audio->audio_type == "Upload")
                        @if($audio->get_thumbnail->count() == 0)
                           <?php $s3_thumbnail = "images/default_podcast.jpg"; ?>
                        @else
                          <?php $img_path = $audio->get_thumbnail->first()->gallery_path; ?>
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
                       <?php $s3_link = config('app.s3_public_link')."/audio/"; ?>
                        <source src="{{ $s3_link.$audio->audio_path }}" type="video/mp4" />
                        <source src="{{ $s3_link.$audio->audio_path }}" type="audio/mpeg" />
                        <source src="{{ $s3_link.$audio->audio_path }}" type="video/webm" />
                        <p class="vjs-no-js">
                          To view this video please enable JavaScript, and consider upgrading to a
                          web browser that
                          <a href="https://videojs.com/html5-video-support/" target="_blank"
                            >supports HTML5 video</a
                          >
                        </p>
                      </video>
                      <script> 
                            var player=videojs('my-video'); 
                            player.nuevo({
                              qualityMenu: true,
                              buttonRewind: true,
                              buttonForward: true
                            });
                        </script>

                        @if($newNumAds != 0)
                        @foreach($newAdsList as $adsl)
                          
                            <?php 
                                  $videlink[] = $adsl->adslist_videolink;
                                  $skip[] = $adsl->adslist_adstype;
                                  $displaytime[] = $adsl->adslist_displaytime;
                             ?>

                          @endforeach

                        @include('layouts.editor.ads-script')
                        <script src="{{ asset('js/adsScript/'.$newNumAds.'-ads.js' ) }}" ></script> 

                        @endif


      					@elseif($audio->audio_type == "RSS") 

                         @if($audio->get_thumbnail->count() == 0)
                           <?php $s3_thumbnail = "images/default_podcast.jpg"; ?>
                        @else
                          <?php $img_path = $audio->get_thumbnail->first()->gallery_path; ?>
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
                          <source src="{{ $audio->audio_path }}" res="240" label="240p" type="video/mp4">
                          <source src="{{ $audio->audio_path }}" res="360" label="360p" type="video/mp4">
                          <source src="{{ $audio->audio_path }}" default res="480" label="480p" type="video/mp4">
                          <source src="{{ $audio->audio_path }}" res="720" label="720p" type="video/mp4">
                          <track kind="chapters" src="https://ithaaty.com/vtt/sample.vtt" srclang="en">

                          <!-- <source src="{{ asset('ads/big_buck_bunny.mp4') }}" type="video/mp4" />
                          <source src="{{ asset('ads/big_buck_bunny.mp4') }}" type="video/webm" /> -->
                          <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a
                            web browser that
                            <a href="https://videojs.com/html5-video-support/" target="_blank"
                              >supports HTML5 video</a
                            >
                          </p>
                        </video>
                        <script> 
                            var player=videojs('my-video'); 
                            player.nuevo({
                              qualityMenu: true,
                              buttonRewind: true,
                              buttonForward: true
                            });
                        </script>

                        @if($newNumAds != 0)
                        @foreach($newAdsList as $adsl)
                          
                            <?php 
                                  $videlink[] = $adsl->adslist_videolink;
                                  $skip[] = $adsl->adslist_adstype;
                                  $displaytime[] = $adsl->adslist_displaytime;
                             ?>

                          @endforeach

                        @include('layouts.editor.ads-script')
                        <script src="{{ asset('js/adsScript/'.$newNumAds.'-ads.js' ) }}" ></script> 

                        @endif


      					@else

      					<div class="audio-embed-container">
      	                   	 <?php echo $audio->audio_path; ?>
      	        </div>

      					@endif

            </div>  

            <div class="bg-white mt-5">
              <div class="">
                @foreach($audio->get_sponsor as $sponsor)
                <div class="sponsorSlides transition duration-500 ease-in-out" style="display: none;">
                  <div class="relative rounded-md border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 ">
                    <div class="flex-shrink-0">
                      <img class="h-12 w-12" src="{{ asset('sponsor/'.$sponsor->audiospon_imgpath) }}" alt="">
                    </div>
                    <div class="flex-1 min-w-0">
                      <a href="#" class="focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        <p class="text-md font-bold text-gray-900">
                          {{ $sponsor->audiospon_name }}
                        </p>
                        <p class="text-sm text-gray-500 truncate">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 float-left mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                          </svg>
                          {{ $sponsor->audiospon_website }}
                        </p>
                         <p class="text-sm text-gray-500 truncate">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5  float-left  mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                          </svg>
                          {{ $sponsor->audiospon_location }}
                        </p>
                      </a>
                    </div>
                  </div>
                 </div>
                 @endforeach 

                 <script>
                  var myIndex = 0;
                  carousel();

                  function carousel() {
                    var i;
                    var x = document.getElementsByClassName("sponsorSlides");
                    for (i = 0; i < x.length; i++) {
                      x[i].style.display = "none";  
                    }
                    myIndex++;
                    if (myIndex > x.length) {myIndex = 1}    
                    x[myIndex-1].style.display = "block";  
                    setTimeout(carousel, 4000); // Change image every 2 seconds
                  }
                  </script>
               
                </div>
            </div>




	          <div class="text-black  px-2 pt-2 bg-white mt-5">
               <h2 class="font-bold text-xl m-0">{{ $audio->audio_name }}</h2>
               <!-- <?php echo json_encode($notes); ?>; -->
          <!-- <br>Dispaly:     
          <p id="demo"></p> -->
                        <script>

                           var notesArray = <?php echo json_encode($notes); ?>;
                           var getNotes = JSON.parse(notesArray);

                           document.getElementById("demo").innerHTML = getNotes['notes_time'];
                        </script>
                       
            <p> 


                @if($audio->audio_status =='private' )
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 float-left" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg><span class="ml-2 capitalize mt-1 text-gray-500">Private</span>
                          @else
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 float-left text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg><span class="ml-2 capitalize text-gray-500">Public</span>        
                @endif
                 

               </p>
               <p class="text-black text-xs uppercase mt-5">{{ $audio->created_at }}  | <span>01:37:50 <span>|</span></span> {{ $audio->audio_season }}:{{ $audio->audio_episode }}</p>             
              </div>
              
            </div>  	
           
						
                    
                </div>
                <!-- like/ -->
                <div class="bg-white  px-2 pt-2 pb-2" 
			    x-data="{
			      openTab: 1,
			      activeClasses: 'font-bold text-green-600',
			      inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
			    }" 
			  	>

                <div class="mt-6 flex justify-between space-x-8">
                  <div class="flex space-x-6">
                    <span class="inline-flex items-center text-sm" @click="openTab = 4"  :class="openTab === 4 ? activeClasses : inactiveClasses" >
                     @if( EditorPodcastView::checkLike($audio->id) == 0 ) 
                      <button  class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                     @else
                       <button class="inline-flex space-x-2 text-green-600 hover:text-green-700" >
                     @endif   
                   
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                        </svg>
                        <span class="font-medium text-gray-900">{{ $audio->get_like->count()  }}</span>
                        <span class="sr-only">likes</span>
                      </button>
                    </span>
               <!--      <span class="inline-flex items-center text-sm">
                     @if( EditorPodcastView::checkLike($audio->id) == 0 )	
                      <button wire:click="like({{ $audio->id }},{{$audio->audio_editor}})" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                     @else
                      <button class="inline-flex space-x-2 text-indigo-400 hover:text-gray-500">
                     @endif 	
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                        </svg>
                        <span class="font-medium text-gray-900">{{ $audio->get_like->count()  }}</span>
                        <span class="sr-only">likes</span>
                      </button>
                    </span> -->
                    <span class="inline-flex items-center text-sm" @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses" >
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
                        <span class="font-medium text-gray-900">{{ $audio->get_view->count() }}</span>
                        <span class="sr-only">views</span>
                      </button>
                    </span>
                  </div>

                  <div class="flex text-sm">
                     <span class="inline-flex items-center text-sm mr-3" @click="openTab = 6" :class="openTab === 6 ? activeClasses : inactiveClasses">
                      <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                       <!-- <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg> -->
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :class="openTab === 6 ? activeClasses : inactiveClasses" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-gray-900" :class="openTab === 6 ? activeClasses : inactiveClasses" >Add To Playlist</span>
                      </button>
                    </span>

                    <span class="inline-flex items-center text-sm mr-3" @click="openTab = 2"   >
                      <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                       <svg class="h-5 w-5" :class="openTab === 2 ? activeClasses : inactiveClasses" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            						</svg>
                        <span class="text-gray-900"  :class="openTab === 2 ? activeClasses : inactiveClasses" >Notes</span>
                      </button>
                    </span>

                    <span class="inline-flex items-center text-sm mr-3" @click="openTab = 3" >
                      <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                     <svg class="h-5 w-5" :class="openTab === 3 ? activeClasses : inactiveClasses"  xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
          						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
          						</svg>
                        <span class="text-gray-900" :class="openTab === 3 ? activeClasses : inactiveClasses" >References</span>
                      </button>
                    </span> 

                     <span class="inline-flex items-center text-sm" @click="openTab = 5" >
                      <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                     <svg class="h-5 w-5" :class="openTab === 5 ? activeClasses : inactiveClasses"  xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                      </svg>
                        <span class="text-gray-900" :class="openTab === 5 ? activeClasses : inactiveClasses" >Q&A</span>
                      </button>
                    </span> 
                    
                  </div>
                </div>
                <div x-show="openTab === 1">
                	<div class="mt-5">
		                <div class="mt-1">
		                  <input type="text" name="email" id="email" placeholder="Comments" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"  wire:model="comments" wire:keydown.enter="saveComment({{ $audio->id }},{{$audio->audio_editor}})"  >
		                </div>
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

			    </div>


			    <div x-show="openTab === 2">
		                <div class="mt-5 flex">
		                   <input type="text" name="email" id="email" placeholder="Time" class="flex-1 mr-3 w-20  shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" wire:model="notes_time" >
		                  <input type="text" name="email" id="email" placeholder="Notes" class="shadow-sm mr-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="notes_message"  >
		                  <button wire:click="saveNotes({{ $audio->id }},{{$audio->audio_editor}})" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" >
							         Save
						           </button>
		                </div>
		                @if($audio->get_notes->count() != 0 )

				        <div x-data="{ open: false }">
				        	
				       	<div class="mt-5">
				        	<div class="flex space-x-3">
			                    <div>
			                      <p class="text-xs font-medium text-gray-900">
			                        <a class="cursor-pointer hover:underline" @click="open = true">View Notes</a>
			                      </p>
			                    </div>
			                  
		                	</div>
		 
				        </div>
				        <div class="mt-5" x-show="open" @click.away="open = false">
				        	@foreach($audio->get_notes as $notes)
				        	@if($notes->notes_userid == Auth::user()->id )
			                <div class="flex space-x-3">
			                	
			                    <div class="flex-shrink-0">
			                      <img class="h-5 w-5 rounded-full" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
			                    </div>
			                    <div class="min-w-0 flex-1">
			                     <div class=" bg-gray-100 p-2 rounded-md mb-3">	
			                      <p class="text-xs font-medium text-gray-900">
			                        <a href="/editor/users//{{ $audio->audio_editor }}" class="font-bold hover:underline">{{ $notes->get_user->name }}</a>
			                      </p>
			                      <p class="text-sm text-gray-500">
			                       {{ $notes->notes_time }}  {{ $notes->notes_message }}
			                      </p>
			                      </div>

			                      
			                    </div>
			                  
		                	</div>
		                	@endif
		                	@endforeach
				        </div>


				        </div>


				        @endif
			    </div>

			     <div x-show="openTab === 3">
				     <div class="mt-5">
		                <div class="mt-1">
		                @foreach($audio->get_references as $reference)	
		                
		                 <a href="{{ $reference->audioref_link }}">{{ $reference->audioref_title }}</a><br>

		                @endforeach 
		                </div>
			        </div>

			     </div>
                
                       <div x-show="openTab === 4">
             <div class="mt-5">
                    <div class="mt-1">
                       <span class="inline-flex items-center text-sm mr-3">
                            <button wire:click="like({{ $audio->id }},{{$audio->audio_editor}},'like')" class="inline-flex space-x-2 text-green-600 hover:text-green-500">
                           <!-- <button class="inline-flex space-x-2 text-green-600 hover:text-green-700" > -->
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                            </svg>
                            <span class="font-medium text-gray-900">{{ $audio->get_react('like')->count()  }}</span>
                            <span class="sr-only">likes</span>
                          </button>
                        </span>  

                        <span class="inline-flex items-center text-sm mr-3">
                           <button wire:click="like({{ $audio->id }},{{$audio->audio_editor}},'star')" class="inline-flex space-x-2 text-green-600 hover:text-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span class="font-medium text-gray-900">{{ $audio->get_react('star')->count()  }}</span>
                            <span class="sr-only">star</span>
                          </button>
                        </span>

                        <span class="inline-flex items-center text-sm mr-3">
                           <button wire:click="like({{ $audio->id }},{{$audio->audio_editor}},'happy')" class="inline-flex space-x-2 text-green-600 hover:text-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium text-gray-900">{{ $audio->get_react('happy')->count()  }}</span>
                            <span class="sr-only">happy</span>
                          </button>
                        </span>

                        <span class="inline-flex items-center text-sm mr-3">
                           <button wire:click="like({{ $audio->id }},{{$audio->audio_editor}},'sad')" class="inline-flex space-x-2 text-green-600 hover:text-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-7.536 5.879a1 1 0 001.415 0 3 3 0 014.242 0 1 1 0 001.415-1.415 5 5 0 00-7.072 0 1 1 0 000 1.415z" clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium text-gray-900">{{ $audio->get_react('sad')->count()  }}</span>
                            <span class="sr-only">sad</span>
                          </button>
                        </span>

                        <span class="inline-flex items-center text-sm mr-3">
                           <button wire:click="like({{ $audio->id }},{{$audio->audio_editor}},'dislike')" class="inline-flex space-x-2 text-green-600 hover:text-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M18 9.5a1.5 1.5 0 11-3 0v-6a1.5 1.5 0 013 0v6zM14 9.667v-5.43a2 2 0 00-1.105-1.79l-.05-.025A4 4 0 0011.055 2H5.64a2 2 0 00-1.962 1.608l-1.2 6A2 2 0 004.44 12H8v4a2 2 0 002 2 1 1 0 001-1v-.667a4 4 0 01.8-2.4l1.4-1.866a4 4 0 00.8-2.4z" />
                          </svg>
                            <span class="font-medium text-gray-900">{{ $audio->get_react('dislike')->count()  }}</span>
                            <span class="sr-only">dislike</span>
                          </button>
                        </span>



                    </div>
              </div>

          </div>

          <div x-show="openTab === 5">
             <div class="mt-5">
                    <div class="mt-1">
                    @foreach($audio->get_question as $question)  
                     <div  x-data="{ open: false }">

                     <div class="bg-gray-100 p-2 rounded-md mb-3 text-sm pointer" @click="open = true">{{ $question->qa_question   }}</div>
                        <div  x-show="open" @click.away="open = false">
                            @foreach($question->get_answer as $answerlist)
                              <div class="bg-gray-100 p-2 rounded-md mb-3 text-xs ml-5">
                                <p class="font-bold">{{ $answerlist->get_user->name }}</p>
                                <p>{{ $answerlist->qn_answer }}</p>
                              </div>
                             
                            @endforeach
                           <div class="my-2 flex">
                            <input type="text" name="email" id="email" placeholder="Write your answer here" class="shadow-sm mr-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="qa_answer"  >
                            <button wire:click="saveAnswer({{$question->id}},{{ $question->qa_audioid }})" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-white bg-custom-pink focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" >
                             Save
                             </button>
                        </div>
                      </div>

                     </div>
                    @endforeach 
                    </div>
              </div>

           </div>

           <div x-show="openTab === 6">
             <div class="mt-5">
                    <div class="grid gap-4 grid-cols-9">

                    @foreach(Auth::User()->get_playlist as $playlist)  
                      <div class="col-span-3 bg-white p-1 border-2 border-gray-500 rounded-sm">
                        <div class="mt-2 text-sm text-gray-700 space-y-4">
                                     <div class="text-white bg-cover h-36">
                                         <img class="h-full mx-auto my-0" src="https://d3t3ozftmdmh3i.cloudfront.net/production/podcast_uploaded/17789837/17789837-1631013743470-36b9d215bea63.jpg" alt="">        
                                     </div>  
                        </div>
                        <center> 
                        <p class="text-md font-bold text-gray-900 mt-2">{{ $playlist->playlist_title }}</p> 
                        @if($playlist->checkPlaylist($audio->id)->count() == 0)
                        <button wire:click="addToPlaylist({{ $playlist->id }},{{ $audio->id }},{{ $audio->audio_editor }})" type="button" class=" px-2.5 py-1.5 border border-gray-300 text-center w-full shadow-sm text-xs font-medium rounded text-white bg-custom-pink focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" >
                               Add to Playlist
                         </button>
                         @else
                         <button type="button" class=" px-2.5 py-1.5 border border-gray-300 text-center w-full shadow-sm text-xs font-medium rounded text-white bg-custom-pink focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" >
                               Added
                         </button>

                         @endif


                         </center>
                      </div>
                     
                    @endforeach 
                     </div>
                 
              </div>

           </div>


		       
		       </div>

		        <!-- like/ -->


		       
                 <!-- like/ -->
              </article>





          <!-- audio -->

        </div>
      </main>
       <!-- aside -->
      @include('layouts.editor.aside-podcast-view')
      <!-- aside -->
    </div>
  </div>
</div>





















        </div>
</div>