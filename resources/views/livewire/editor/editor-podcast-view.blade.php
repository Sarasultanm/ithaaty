  <?php 
    use App\Http\Livewire\Editor\EditorPodcastView; 
    use App\Http\Livewire\Editor\EditorDashboard;
    use Illuminate\Support\Str;

  ?>
 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Podcast View') }}
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
      <main class="lg:col-span-9 xl:col-span-7">

      <div class="mt-4">
        <div class="w-full ">
            	 <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
        </div>
        <!-- audio -->
        <article>

        <div class="text-sm text-gray-700 space-y-4 relative">
          <!-- title and options -->
          <div class="text-white">

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
                        @if($audio->get_chapters()->count() != 0)
                           <?php  $chapter_link = $audio->get_chapters()->first()->chapter_filename;  ?>
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
                          @if($audio->get_chapters()->count() != 0)
                             <?php  $chapter_link = $audio->get_chapters()->first()->chapter_filename;  ?>
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
                      @if($sponsor->audiospon_imgpath != 'empty')
                      <img class="h-12 w-12" src="{{ asset('sponsor/'.$sponsor->audiospon_imgpath) }}" alt="">
                      @else
                      <img class="h-12 w-12" src="{{ asset('images/default_user.jpg') }}" alt="">
                      @endif
                    </div>
                    <div class="flex-1 min-w-0">
                   
                        <!-- <span class="absolute inset-0" aria-hidden="true"></span> -->
                        <p class="text-md font-bold text-gray-900">
                          {{ $sponsor->audiospon_name }}
                        </p>
                        <p class="text-sm text-gray-500 truncate font-bold">
                         
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 float-left mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                          </svg>
                           @if(strpos($sponsor->audiospon_website, "https://")!==false)
                              <a target="_blank" href="{{ $sponsor->audiospon_website }}" class="hover:underline pointer">
                              {{ $sponsor->audiospon_website }}
                              </a>
                           @else
                             <a target="_blank" href="{{ 'https://'.$sponsor->audiospon_website }}" class="hover:underline pointer">
                              {{ $sponsor->audiospon_website }}
                              </a>
                           @endif
                          

                        </p>
                         <p class="text-sm text-gray-500 truncate">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5  float-left  mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                          </svg>
                          {{ $sponsor->audiospon_location }}
                        </p>
                     
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
              <div class="flex">
                <div class="flex-auto">
                  <h2 class="font-bold text-xl m-0">{{ $audio->audio_name }}</h2>     
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
                <div>
                  <!-- This example requires Tailwind CSS v2.0+ -->
                  <div x-cloak  x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false" class="relative inline-block text-left">
                    <div>
                      <button type="button" class="bg-gray-100 rounded-full flex items-center text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true" @click="open = !open">
                        <span class="sr-only">Open options</span>
                        <!-- Heroicon name: solid/dots-vertical -->
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                        </svg>
                      </button>
                    </div>
                    <div
                     x-show="open" 
                     x-transition:enter="transition ease-out duration-100" 
                     x-transition:enter-start="transform opacity-0 scale-95" 
                     x-transition:enter-end="transform opacity-100 scale-100" 
                     x-transition:leave="transition ease-in duration-75" 
                     x-transition:leave-start="transform opacity-100 scale-100" 
                     x-transition:leave-end="transform opacity-0 scale-95" 
                     class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                      <div class="py-1" role="none">
                              <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                              @if( EditorDashboard::checkFav($audio->id) == 0 ) 
                                  @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
                                  @else
                                     @if(Auth::user()->get_plan->check_features('s5')->count() != 0 )
                                    <a wire:click="favorite({{ $audio->id }})" class="cursor-pointer text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                                      <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                      </svg>
                                      <span>Add to favorites</span>
                                    </a>
                                    @endif
                               @endif
                              @else
                               <a class="bg-gray-100 text-gray-900 flex px-4 py-2 text-sm cursor-pointer hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                                 <svg class="mr-3 h-5 w-5 text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <span>Favorites</span>
                              </a>
                              @endif  
                                <!-- Heroicon name: solid/star -->
                              <div x-data="{modal: false}" >
                                 <a   @click="modal = !modal" class=" text-gray-900 flex px-4 py-2 text-sm cursor-pointer hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Report</span>
                                  </a>

                                    <!-- modal -->
                                    <!-- This example requires Tailwind CSS v2.0+ -->
                                    <div x-cloak x-show="modal"  class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                      <div 
                                       x-transition:enter="transition ease-out duration-100" 
                                       x-transition:enter-start="transform opacity-0 scale-95" 
                                       x-transition:enter-end="transform opacity-100 scale-100" 
                                       x-transition:leave="transition ease-in duration-75" 
                                       x-transition:leave-start="transform opacity-100 scale-100" 
                                       x-transition:leave-end="transform opacity-0 scale-95"
                                       class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0" >
                                      
                                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"  @click="modal = false, share = false"></div>

                                        <!-- This element is to trick the browser into centering the modal contents. -->
                                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                                        <div 
                                         x-transition:enter="transition ease-out duration-300" 
                                         x-transition:enter-start="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                                         x-transition:enter-end="transform opacity-100 translate-y-0 sm:scale-100" 
                                         x-transition:leave="transition ease-in duration-200" 
                                         x-transition:leave-start="transform opacity-100 translate-y-0 sm:scale-100" 
                                         x-transition:leave-end="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                            
                                            <div >
                                              <!-- friends -->

                                              <div class="mt-5">
                                                <label for="location" class="block text-sm font-medium text-gray-700">Report Type</label>
                                                <select wire:model="report_type"  class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                  <option>Select</option>
                                                  <option value="r1">Nudity</option>
                                                  <option value="r2">Violence</option>
                                                  <option value="r3">Harrastment</option>
                                                  <option value="r4">Suicide / Self-Injury</option>
                                                  <option value="r5">False Information</option>
                                                  <option value="r6">Spam</option>
                                                  <option value="r7">Unauthorized Sales</option>
                                                  <option value="r8">Hate Speech</option>
                                                  <option value="r9">Terrorism</option>
                                                  <option value="r10">Something Else</option>
                                                </select>
                                                @error('report_type') <span class="text-xs text-red-600">Empty fields</span> @enderror
                                                
                                              </div>

                                              <div class="mt-5">
                                                <label for="about" class="block text-sm font-medium text-gray-700">
                                                  Comments
                                                </label>
                                                <div class="mt-1">
                                                  <textarea  wire:model="report_message" rows="5" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                                </div>
                                                @error('report_message') <span class="text-xs text-red-600">Empty fields</span> @enderror
                                              </div>


                                              <!-- friends-->

                                            </div>
                                          
                                          <div class="mt-5 sm:mt-6">
                                            <button  wire:click="reportAudio({{ $audio->id }})" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white ">
                                              Submit Report
                                            </button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                   <!-- modal -->
                            </div>

                             <div  x-data="{ open: false }" @click.away="open = false">
                                <a @click="open = !open" class="cursor-pointer text-gray-700 flex px-4 py-2 
                                  text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                  <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"></path>
                                  </svg>
                                  <span>Share</span>
                                </a>
                               <div x-show="open" >
                                    <textarea style="display:none;"  id="myEmbed{{$audio->id}}"><iframe width="500px" height="385px" src="{{ URL::to('/embed/'.$audio->id) }}" title="Ithatty" frameborder="0"  allowfullscreen></iframe>
                                    </textarea>
                                    <a onclick="copyEmded('myEmbed{{$audio->id}}')"  class="cursor-pointer pl-10 text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                      <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                      <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 
                                      1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 
                                      1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 
                                      11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg><span>Embed</span>
                                    </a>
                                    <input style="display:none;" type="text" value="{{ URL::to('/post/'.$audio->id) }}" 
                                    id="myInput{{$audio->id}}">
                                    <a onclick="copyLink('myInput{{$audio->id}}')" class="cursor-pointer pl-10 text-gray-700 flex px-4 
                                      py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-gray-400" fill="none" 
                                      viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 
                                        00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 
                                        0 00-5.656-5.656l-1.1 1.1" />
                                      </svg><span>Copy Link</span>
                                    </a>
                                    <a wire:click="shareButton('facebook',{{ $audio->id }})" class="cursor-pointer pl-10 text-gray-700 
                                      flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                      <i class="fab fa-facebook-square mr-3 h-5 w-5 text-gray-400" style="font-size: 20px;"></i>
                                      <span>Facebook</span>
                                    </a>
                                    <a wire:click="shareButton('twitter',{{ $audio->id }})" class="cursor-pointer pl-10 text-gray-700 
                                      flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                      <i class="fab fa-twitter-square mr-3 h-5 w-5 text-gray-400" style="font-size: 20px;"></i>
                                      <span>Twitter</span>
                                    </a>
                                </div>

                            </div>
                               
                            @if($audio->audio_editor == Auth::user()->id)  
                              @if( $audio->audio_status == 'private')
                               <a wire:click="publicAudio({{ $audio->id }})" class="cursor-pointer text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Public</span>
                              </a>
                              @else
                                <a wire:click="privateAudio({{ $audio->id }})" class="cursor-pointer text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="options-menu-0-item-2">
                                   <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                  </svg><span>Private</span>
                                </a>
                              @endif

                              @endif
                            </div>
                    </div>
                  </div>

                </div>
              </div>
               

              </div>
              
          </div>  	
          <!-- title and options -->
						       
        </div>
        <!-- button icons tabs -->
        <div class="bg-white  px-2 pt-2 pb-2" 
  			    x-data="{
  			      openTab: 1,
  			      activeClasses: 'font-bold text-green-600',
  			      inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
  			    }">
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
                @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
                @else
                @if(Auth::user()->get_plan->check_features('s4')->count() != 0 )
                 <span class="inline-flex items-center text-sm mr-3" @click="openTab = 6" :class="openTab === 6 ? activeClasses : inactiveClasses">
                  <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :class="openTab === 6 ? activeClasses : inactiveClasses" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-gray-900" :class="openTab === 6 ? activeClasses : inactiveClasses" >Add To Playlist</span>
                  </button>
                </span>
                @endif
                @endif

                @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
                @else
                @if(Auth::user()->get_plan->check_features('s2')->count() != 0 )
                <span class="inline-flex items-center text-sm mr-3" @click="openTab = 2"   >
                  <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                   <svg class="h-5 w-5" :class="openTab === 2 ? activeClasses : inactiveClasses" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        						</svg>
                    <span class="text-gray-900"  :class="openTab === 2 ? activeClasses : inactiveClasses" >Notes</span>
                  </button>
                </span>
                @endif
                @endif

                @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
                @else
                  @if(Auth::user()->get_plan->check_features('o4')->count() != 0 )
                    <span class="inline-flex items-center text-sm mr-3" @click="openTab = 3" >
                      <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                     <svg class="h-5 w-5" :class="openTab === 3 ? activeClasses : inactiveClasses"  xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
          						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
          						</svg>
                        <span class="text-gray-900" :class="openTab === 3 ? activeClasses : inactiveClasses" >References</span>
                      </button>
                    </span> 
                  @endif
                @endif


                @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
                @else
                  @if(Auth::user()->get_plan->check_features('o5')->count() != 0 )
                    <span class="inline-flex items-center text-sm" @click="openTab = 5" >
                      <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                         <svg class="h-5 w-5" :class="openTab === 5 ? activeClasses : inactiveClasses"  xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                         </svg><span class="text-gray-900" :class="openTab === 5 ? activeClasses : inactiveClasses" >Q&A</span>
                      </button>
                    </span> 
                  @endif
                @endif

              </div>
            </div>

           <!-- Comments -->    
           <div x-show="openTab === 1">
                @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
                @else
                  @if(Auth::user()->get_plan->check_features('s2')->count() != 0 )
                  <!-- comments -->
                  	<div class="mt-5">
  		                <div class="mt-1">
  		                  <input type="text" name="email" id="email" placeholder="Comments" 
                        class="shadow-sm block w-full sm:text-sm border-gray-300 rounded-md" wire:model="comments" 
                        wire:keydown.enter="saveComment({{ $audio->id }},{{$audio->audio_editor}})"  >
  		                </div>
  			           </div>
                  @endif
                @endif

				       @if($audio->get_comments->count() != 0 )
  				        <div x-data="{ open: false }">
    				       	<div class="mt-5">
    	        	       <div class="flex space-x-3">
                          <p class="text-xs font-medium text-gray-900">
                            <a class="cursor-pointer hover:underline" @click="open = true">View Comments</a>
                          </p>
                  	   </div>
    				        </div>
    				        <div class="mt-5" x-show="open" @click.away="open = false">
    				        	 @foreach($audio->get_comments as $comments)
    			                <div class="flex space-x-3">
  			                    <div class="flex-shrink-0">
  			                      <img class="h-5 w-5 rounded-full" 
                              src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
  			                    </div>
  			                    <div class="min-w-0 flex-1">
    			                     <div class=" bg-gray-100 p-2 rounded-md mb-3">	
      			                      <p class="text-xs font-medium text-gray-900">
      			                        <a href="/editor/users//{{ $audio->audio_editor }}" 
                                    class="font-bold hover:underline">{{ $comments->get_user->name }}</a>
      			                      </p>
      			                      <p class="text-sm text-gray-500">
      			                        <a href="#" class="hover:underline">
      			                          {{ $comments->coms_message }}
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
           <!-- Comments -->

           <!-- Notes -->    
			     <div x-show="openTab === 2">
            @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
            @else
            @if(Auth::user()->get_plan->check_features('s2')->count() != 0 )
            <!-- notes -->
                <div class="mt-5 flex">
                    <input type="text" name="email" id="email" placeholder="Time" 
                    class="flex-1 mr-3 w-20  shadow-sm 
                    block sm:text-sm border-gray-300 rounded-md" wire:model="notes_time" >

                    <input type="text" name="email" id="email" placeholder="Notes" 
                    class="shadow-sm mr-3  block w-full 
                    sm:text-sm border-gray-300 rounded-md" wire:model="notes_message"  >

                    <button wire:click="saveNotes({{ $audio->id }},{{$audio->audio_editor}})" type="button" 
                    class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs 
                    font-medium rounded text-gray-700 bg-white hover:bg-gray-50" >Save</button>
                </div>
		                @if($audio->get_notes->count() != 0 )

				        <div x-data="{ open: false }">
  				       	<div class="mt-5">
    				        	<div class="flex space-x-3">
                        <p class="text-xs font-medium text-gray-900">
                          <a class="cursor-pointer hover:underline" @click="open = true">View Notes</a>
                        </p>
    		              </div>
  				        </div>

  				        <div class="mt-5" x-show="open" @click.away="open = false">
    				        	@foreach($audio->get_notes as $notes)
    				        	   @if($notes->notes_userid == Auth::user()->id )
      			                <div class="flex space-x-3">
      			                    <div class="flex-shrink-0">
      			                      <img class="h-5 w-5 rounded-full" 
                                  src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
      			                    </div>
      			                    <div class="min-w-0 flex-1">
        			                     <div class=" bg-gray-100 p-2 rounded-md mb-3">	
          			                      <p class="text-xs font-medium text-gray-900">
          			                        <a href="/editor/users//{{ $audio->audio_editor }}" 
                                          class="font-bold hover:underline">{{ $notes->get_user->name }}</a>
          			                      </p>
          			                      <p class="text-sm text-gray-500">{{ $notes->notes_time }}  {{ $notes->notes_message }}</p>
        			                     </div>
      			                    </div>
      		                	</div>
    		                	@endif
    		               @endforeach
  				        </div>
				        </div>
				        @endif
                <!-- notes -->
                @endif
                @endif
			     </div>
           <!-- Notes -->

           <!-- Reference -->    
			     <div x-show="openTab === 3">
              @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
              @else
                @if(Auth::user()->get_plan->check_features('o4')->count() != 0 )
    				      <div class="mt-5">
    		                <div class="mt-1">
    		                @foreach($audio->get_references as $reference)	
                          @if(strpos($reference->audioref_link, "https://")!==false)
    		                    <a target="_blank" href="{{ $reference->audioref_link }}">
                              {{ $reference->audioref_title }}
                            </a>
                          @else
                           <a target="_blank" href="{{ 'https://'.$reference->audioref_link }}">
                              {{ $reference->audioref_title }}
                            </a>
                          @endif
                         <br>
    		                @endforeach 
    		                </div>
    			        </div>
                @endif
              @endif
			     </div>
           <!-- Reference -->    

           <!-- Reaction Tabs -->    
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
           <!-- Reaction Tabs -->

           <!-- Q and A -->
           <div x-show="openTab === 5">
                @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
                @else
                @if(Auth::user()->get_plan->check_features('o5')->count() != 0 )
                 <div class="mt-5">
                    <div class="mt-1">
                      @foreach($audio->get_question as $question)  
                       <div  x-data="{ open: false }">
                          <div class="bg-gray-100 p-2 rounded-md mb-3 text-sm pointer" @click="open = true">
                             {{ $question->qa_question   }}<br><br>
                             <span class="text-right text-xs text-gray-500"><i>Time: {{ $question->qa_time }}</i></span>
                          </div>
                          <div x-show="open" @click.away="open = false">
                              @foreach($question->get_answer as $answerlist)
                                <div class="bg-gray-100 p-2 rounded-md mb-3 text-xs ml-5">
                                  <p class="font-bold">{{ $answerlist->get_user->name }}</p>
                                  <p>{{ $answerlist->qn_answer }}</p>
                                </div>
                              @endforeach
                             <div class="my-2 flex">
                                <div class="w-full mr-3">
                                    <input type="text" name="email" id="email" placeholder="Write your answer here" 
                                    class="shadow-sm mr-3 focus:ring-indigo-500 focus:border-indigo-500 block  
                                    sm:text-sm border-gray-300 rounded-md w-full" wire:model="qa_answer">
                                    @error('qa_answer') 
                                    <span class="text-xs text-red-600">Required Fields</span> @enderror
                                </div>
                                <div class="w-auto">
                                   <button wire:click="saveAnswer({{$question->id}},{{$audio->id}})" type="button" class="px-2.5 py-2.5 border border-gray-300 
                                   shadow-sm text-xs font-medium rounded text-white bg-custom-pink w-20">Save</button>
                                </div>
                             </div>
                          </div>
                       </div>
                      @endforeach 
                    </div>
                  </div>
                  @endif
                  @endif
             </div>
           <!-- Q and A -->

           <!-- add playlist-->
            <div x-show="openTab === 6">
                @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
                @else
                  @if(Auth::user()->get_plan->check_features('s4')->count() != 0 )
                     <div class="mt-5">
                        <div class="grid gap-4 grid-cols-9">
                          @foreach(Auth::User()->get_playlist as $playlist)  
                            <div class="col-span-3 bg-white p-1 border-2 border-gray-500 rounded-sm">
                              <div class="mt-2 text-sm text-gray-700 space-y-4">
                                 <div class="text-white bg-cover h-36">
                                     <img class="h-full mx-auto my-0" 
                                     src="https://d3t3ozftmdmh3i.cloudfront.net/production/podcast_uploaded/17789837/17789837-1631013743470-36b9d215bea63.jpg" alt="">        
                                 </div>  
                              </div>
                              <center> 
                                <p class="text-md font-bold text-gray-900 mt-2">{{ $playlist->playlist_title }}</p> 
                               @if($playlist->checkPlaylist($audio->id)->count() == 0)
                                 <button wire:click="addToPlaylist({{ $playlist->id }},{{ $audio->id }},{{ $audio->audio_editor }})" 
                                  type="button" class=" px-2.5 py-1.5 border border-gray-300 text-center w-full shadow-sm text-xs 
                                  font-medium rounded text-white bg-custom-pink">Add to Playlist</button>
                               @else
                                 <button type="button" class="px-2.5 py-1.5 border border-gray-300 text-center w-full shadow-sm 
                                 text-xs font-medium rounded text-white bg-custom-pink">Added</button>
                               @endif
                               </center>
                            </div>
                          @endforeach 
                        </div>
                      </div>
                    @endif
                  @endif
            </div>
           <!-- add playlist-->


		       
		    </div>
		    <!-- button icons tabs -->

         <!-- transcript & hashtag in tabs -->

          <div class="text-white mt-5 xl:hidden md:block">
             <div class="top-4 space-y-4">  
                <section class="overflow-x-auto" style="height:auto">
                  <div class="bg-white  shadow">
                    <div class="p-6">
                      <h2 id="who-to-follow-heading" class="text-base font-medium text-gray-900">
                       Transcript
                      </h2>
                      <div class="mt-6 flow-root text-sm">
                        <p class="truncated text-black">{{ $audio->audio_summary }}</p>
                      </div>
                    </div>
                  </div>
                </section>
               
              </div>
            <div class=" mt-5 mb-5 bg-white p-5  border-gray-200 overflow-y-auto lg:block">
                <div class="pb-5">
                      <h3 class="font-medium text-gray-900">Hashtag Feeds</h3>
                      <p class="text-rose-600 text-sm mx-0 font-bold">{{$audio->audio_hashtags}} {{ $getHashtags }}</p>
                      <?php 
                       $str = $audio->audio_hashtags;
                        $items_hastags = preg_match_all('/#\w+/iu', $str, $itens);
                          for ($i=0; $i < $items_hastags ; $i++) { 
                                  echo $itens[0][$i];
                          }
                        ?>
                      <ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
      
                       <li class="py-3 flex justify-between items-center">
                            <div class="flex items-center">
                              <img src="{{ asset('images/slider-img/slide5.jpg') }}" alt="" class="w-8 h-8">
                               <div class="ml-4 ">
                                 <p class="text-sm font-medium text-gray-900">Facebook </p>
                                 <?php $fb_string = $audio->audio_hashtags;    
                                  $fb_text=preg_replace('/#(\\w+)/','<a target="_blank" class="text-rose-500 font-bold" href=https://www.facebook.com/hashtag/$1>$0</a>',$fb_string); ?>
                                 <p class="text-sm text-gray-500"><?php echo $fb_text; ?></p>
                              </div>
                            </div>
                           <!-- <p class="ml-6 bg-white rounded-md text-xs font-medium ext-gray-500">View</p> -->
                        </li>

                        <li class="py-3 flex justify-between items-center">
                            <div class="flex items-center">
                              <img src="{{ asset('images/slider-img/slide5.jpg') }}" alt="" class="w-8 h-8">
                               <div class="ml-4 ">
                                 <p class="text-sm font-medium text-gray-900">Instagram </p>
                                 <p class="text-sm text-gray-500">{{$audio->audio_hashtags}}</p>
                              </div>
                            </div>
                           <!-- <p class="ml-6 bg-white rounded-md text-xs font-medium ext-gray-500">View</p> -->
                        </li>

                        <li class="py-3 flex justify-between items-center">
                            <div class="flex items-center">
                              <img src="{{ asset('images/slider-img/slide5.jpg') }}" alt="" class="w-8 h-8">
                               <div class="ml-4 ">
                                 <p class="text-sm font-medium text-gray-900">Twitter </p>
                                  <?php $twit_string = $audio->audio_hashtags;    
                                  $twit_text=preg_replace('/#(\\w+)/','<a target="_blank" class="text-rose-500 font-bold" href=https://twitter.com/search?q=$1&src=typed_query>$0</a>',$twit_string); ?>
                                 <p class="text-sm text-gray-500"><?php echo $twit_text; ?></p>
                              </div>
                            </div>
                           <!-- <p class="ml-6 bg-white rounded-md text-xs font-medium ext-gray-500">View</p> -->
                        </li>
      
                      </ul>
                  </div>
            </div>


          </div>

        <!-- transcript & hashtag in tabs -->

		       
        
        </article>
        <!-- audio -->

        </div>
      </main>
       <!-- aside -->
      @include('layouts.editor.aside-podcast-view')
      <!-- aside -->
    </div>
  </div>
   <script>
      function copyLink(id) {
        /* Get the text field */
        var copyText = document.getElementById(id);
        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */
        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);
        /* Alert the copied text */
        // alert("Copied the text: " + copyText.value);
        alert("Link was copy");
      }
      function copyEmded(id) {
        /* Get the text field */
        var copyText = document.getElementById(id);
        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */
        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);
        /* Alert the copied text */
        // alert("Copied the text: " + copyText.value);
        alert("Embed was copy");
      }
      </script>
</div>





















        </div>
</div>