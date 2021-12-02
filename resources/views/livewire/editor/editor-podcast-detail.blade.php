    <?php use App\Http\Livewire\Editor\EditorPodcastDetail; ?>
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

        <!--  updated -->
        <div class="grid grid-cols-12 mt-5 gap-5">

          <div class="col-span-8">


            <div class="bg-white">
                <div class="mt-2 text-sm text-gray-700 space-y-4">
                   <div class="text-white p-1 audio-bg-blur">
          


          	@if($audio->audio_type == "Upload")


                       <video
                        id="my-video{{ $audio->id }}"
                        class="video-js vjs-theme-forest z-10"
                        controls
                        preload="auto"
                        width="auto"
                        height="264"
                        poster="https://d3t3ozftmdmh3i.cloudfront.net/production/podcast_uploaded/17789837/17789837-1631013743470-36b9d215bea63.jpg"
                        data-setup="{}"
                      >
                        <source src="{{ asset('audio/'.$audio->audio_path) }}" type="video/mp4" />
                        <source src="{{ asset('audio/'.$audio->audio_path) }}" type="audio/mpeg" />
                        <source src="{{ asset('audio/'.$audio->audio_path) }}" type="video/webm" />
                        <p class="vjs-no-js">
                          To view this video please enable JavaScript, and consider upgrading to a
                          web browser that
                          <a href="https://videojs.com/html5-video-support/" target="_blank"
                            >supports HTML5 video</a
                          >
                        </p>
                      </video>

             @elseif($audio->audio_type == "RSS")
                  <!-- id="my-video{{ $audio->id }}" -->

                      <?php  $defaul_img = 'slide'.rand(1,10).'.jpg'; ?>
                        
                        <script src="{{ asset('videojs/video.min.js') }}"></script>
                        <script src="{{ asset('videojs/nuevo.min.js') }}"></script>

                        <video
                          id="my-video"
                          class="video-js vjs-default-skin vjs-fluid"
                          controls
                          width="100%"
                          height="450px"
                          poster="{{ asset('images/slider-img/'.$defaul_img) }}"
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

          	@else

					 
	                 <div class="audio-embed-container">
	                   	 <?php echo $audio->audio_path; ?>
	                  </div>

          	@endif

                   </div> 
                </div>
            </div>
       	
          <div x-data="{
			      openTab: 1,
			      activeClasses: 'border-custom-pink text-custom-pink',
			      inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
			    }" 
			    class="">

			   <div class="border-b border-gray-200">
			  	<ul class="-mb-px flex" >
			      <li @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
			        <a  >Transcript</a>
			      </li>
			      <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
			        <a  >Stats</a>
			      </li>
             <li @click="openTab = 3"  :class="openTab === 3 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
              <a >Mood Meter</a>
            </li>
			      <li @click="openTab = 4"  :class="openTab === 4 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
			        <a >Other Episodes</a>
			      </li>

			    </ul>
			  </div>

			  <div class="w-full pt-4">
			  	<div x-show="openTab === 1">

			  		<div class="bg-white mt-1 p-3">
		          <div class="flex text-gray-900">
                  <h2 class="flex-auto font-bold text-xl">{{ $audio->audio_name }}</h2>    
                  <p class="flex-auto  text-xs uppercase text-right mt-2">{{ $audio->audio_season }} : {{ $audio->audio_episode }}</p>           	
		          </div> 
              <div class="mt-2 border-t border-gray-200 pt-2">
                <h4 class="text-gray-700 font-bold text-md">Transcript</h4>
                <p class="mb-5">
                    {{ $audio->audio_summary }}
                </p> 
              </div>
		        </div>

			  	</div>

			  	<div x-show="openTab === 2">
			  	
          <div class="shadow-lg rounded-lg overflow-hidden">
					  <div class="py-3 px-5 bg-gray-50">
					      Audience View
                <span class="float-right">{{ $audio->get_view->count() }}</span>
					  </div>
					  <canvas class="p-10 " id="chartBar"></canvas>
					</div>

					<!-- Required chart.js -->
					<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

					<!-- Chart bar -->
					<script>

					  const labelsBarChart = [
					    'Jan',
					    'Feb',
					    'Marc',
					    'Apri',
					    'May',
					    'Jun',
					    'Jul',
					    'Aug',
					    'Sep',
					    'Oct',
					    'Nov',
					    'Dec',
					  ];
					  const dataBarChart = {
					    labels: labelsBarChart,
					    datasets: [{
					      label: 'Audience View Count',
					      backgroundColor: '#f98b88',
					      borderColor: 'hsl(252, 82.9%, 67.8%)',
					      data: [{{$jan_views}},{{$feb_views}},{{$mar_views}},{{$apr_views}},{{$may_views}},{{$jun_views}},{{$jul_views}},{{$aug_views}},{{$sep_views}},{{$oct_views}},{{$nov_views}},{{$dec_views}}],
					    }]
					  };

					  const configBarChart = {
					    type: 'bar',
					    data: dataBarChart,
					    options: {}
					  };


					  var chartBar = new Chart(
					    document.getElementById('chartBar'),
					    configBarChart
					  );
					</script>

          <div class="shadow-lg rounded-lg overflow-hidden mt-10">
            <div class="py-3 px-5 bg-gray-50">
                Word Counter
            </div>
            <div class="p-5 bg-white">
              
          <!--   @if($audio->get_comments->count() != 0)
            <?php foreach($audio->get_comments as $comments){ ?> 
                <?php 
                    $getComs[] = $comments->coms_message;

                  ?>
            <?php } ?>
             <?php 

              $mergeComs = implode(' ', $getComs); 
              $arryComs = explode(' ', $mergeComs);
              $marks = array('is','a','are','hi','Hi');


              for ($i=0; $i < str_word_count($mergeComs) ; $i++) {  ?> 

                <?php if(!in_array($arryComs[$i],$marks)){ ?>

              <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800">


               <?php echo $arryComs[$i]."(".substr_count($mergeComs, $arryComs[$i]).") "; ?>
               </span>

                 <?php } ?>
             <?php  } ?>   

             @endif     -->

             @if($wordCount !=0)

             @foreach($wordCount as $words)
              <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                  {{ $words }}
               </span> 

             @endforeach
              @endif    
             </div>
          </div>


			  	</div>	

          <div x-show="openTab === 3">

            <div class="grid gap-4 grid-cols-12">

            

                <div class="sm:col-span-12 lg:col-span-4  p-2 ">
                    <div class="relative bg-white py-6 px-4 sm:py-4 sm:px-4 shadow rounded-lg overflow-hidden">
                      <dt>
                        <div class="absolute rounded-md p-3" style="background: #f98b88;">
                         
                             <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                            </svg>
                        </div>
                        <p class="ml-16 text-sm font-medium text-gray-500 truncate">Likes</p>
                      </dt>
                      <dd class="ml-16  flex items-baseline">
                        <p class="text-2xl font-semibold text-gray-900">
                         {{ $audio->get_react('like')->count()  }}
                        </p>
                      </dd>
                    </div>
                </div>
                

                <div class="sm:col-span-12 lg:col-span-4  p-2 ">
                    <div class="relative bg-white py-6 px-4 sm:py-4 sm:px-4  shadow rounded-lg overflow-hidden">
                      <dt>
                         <div class="absolute rounded-md p-3" style="background: #f98b88;">
                         
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                        <p class="ml-16 text-sm font-medium text-gray-500 truncate">Star</p>
                      </dt>
                      <dd class="ml-16  flex items-baseline">
                        <p class="text-2xl font-semibold text-gray-900">
                           {{ $audio->get_react('star')->count()  }}
                        </p>
                      </dd>
                    </div>
                </div>

                <div class="sm:col-span-12 lg:col-span-4  p-2 ">
                    <div class="relative bg-white py-6 px-4 sm:py-4 sm:px-4  shadow rounded-lg overflow-hidden">
                      <dt>
                        <div class="absolute rounded-md p-3" style="background: #f98b88;">
                        
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="ml-16 text-sm font-medium text-gray-500 truncate">Happy</p>
                      </dt>
                      <dd class="ml-16  flex items-baseline">
                        <p class="text-2xl font-semibold text-gray-900">
                          {{ $audio->get_react('happy')->count()  }}
                        </p>
                      </dd>
                    </div>
                </div>


                <div class="sm:col-span-12 lg:col-span-4  p-2 ">
                    <div class="relative bg-white py-6 px-4 sm:py-4 sm:px-4  shadow rounded-lg overflow-hidden">
                      <dt>
                         <div class="absolute rounded-md p-3" style="background: #f98b88;">
                          
                            <svg xmlns="http://www.w3.org/2000/svg"  class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-7.536 5.879a1 1 0 001.415 0 3 3 0 014.242 0 1 1 0 001.415-1.415 5 5 0 00-7.072 0 1 1 0 000 1.415z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="ml-16 text-sm font-medium text-gray-500 truncate">Sad</p>
                      </dt>
                      <dd class="ml-16  flex items-baseline">
                        <p class="text-2xl font-semibold text-gray-900">
                           {{ $audio->get_react('sad')->count()  }}
                        </p>
                      </dd>
                    </div>
                </div>

                <div class="sm:col-span-12 lg:col-span-4  p-2 ">
                    <div class="relative bg-white py-6 px-4 sm:py-4 sm:px-4  shadow rounded-lg overflow-hidden">
                      <dt>
                         <div class="absolute rounded-md p-3" style="background: #f98b88;">
                          
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M18 9.5a1.5 1.5 0 11-3 0v-6a1.5 1.5 0 013 0v6zM14 9.667v-5.43a2 2 0 00-1.105-1.79l-.05-.025A4 4 0 0011.055 2H5.64a2 2 0 00-1.962 1.608l-1.2 6A2 2 0 004.44 12H8v4a2 2 0 002 2 1 1 0 001-1v-.667a4 4 0 01.8-2.4l1.4-1.866a4 4 0 00.8-2.4z" />
                          </svg>
                        </div>
                        <p class="ml-16 text-sm font-medium text-gray-500 truncate">Dislike</p>
                      </dt>
                      <dd class="ml-16  flex items-baseline">
                        <p class="text-2xl font-semibold text-gray-900">
                           {{ $audio->get_react('dislike')->count()  }}
                        </p>
                      </dd>
                    </div>
                </div>

            <!-- <div class="sm:col-span-12 lg:col-span-4  p-2 ">
                    <div class="relative bg-white py-6 px-4 sm:py-4 sm:px-4  shadow rounded-lg overflow-hidden">
                      <dt>
                         <div class="absolute rounded-md p-3" style="background: #f98b88;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                              <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                            
                          </svg>
                        </div>
                        <p class="ml-16 text-sm font-medium text-gray-500 truncate">Views</p>
                      </dt>
                      <dd class="ml-16  flex items-baseline">
                        <p class="text-2xl font-semibold text-gray-900">
                           {{ $audio->get_view->count()  }}
                        </p>
                      </dd>
                    </div>
                </div> -->




            

            </div>


          </div>
			  	<div x-show="openTab === 4">

			  		<div class="grid gap-4 grid-cols-12">
               @if( EditorPodcastDetail::getEpisodes($audio->audio_category)->count() > 1 )  

                  <?php $getEpisodesList = EditorPodcastDetail::getEpisodes($audio->audio_category)->get()  ?> 

                  @foreach($getEpisodesList as $episodeList)

                  @if($episodeList->id != $audio->id)

                
                      <div class="col-span-4 bg-white p-2 ">
                        <article aria-labelledby="question-title-81614">
                         <div>
                            <div class="flex space-x-3">
                              <div class="min-w-0 flex-1">
                                <p class="text-md font-bold text-gray-900">
                                  <a href="#" class="hover:underline">{{ $episodeList->audio_name }}</a>
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="mt-2 text-sm text-gray-700 space-y-4">
                             <?php  $defaul_img = 'slide'.rand(1,10).'.jpg'; ?>
                             <div class="text-white bg-cover h-36" style="background-image: url('{{ asset('images/slider-img/'.$defaul_img) }}');">    
                             </div>
                          </div>

                          <div>
                            <div class="flex space-x-3">
                              <div class="min-w-0 flex-1">                      
                                <p class="text-xs text-gray-500 mt-2">
                                  <a class="hover:underline">
                                   
                                    <?php $date = date_create($episodeList->created_at); ?>
                                    <time datetime="2020-12-09T11:43:00">{{ date_format($date,"M, Y") }}</time>  <span class="float-left">SE:{{ $episodeList->audio_season }} | EP:{{ $episodeList->audio_episode }}</span>
                                  </a>
                                </p>
                              <!--   <div class="text-xs font-bold text-gray-900 mt-5" x-data="{ open: false }"> -->
                                <div class="text-xs font-bold text-gray-900 mt-5">
                                  
                                  <a href="{{ route('editorPodcastUpdate',['id' => $episodeList->id]) }}"  class="hover:underline">Update</a>
                                  <a href="{{ route('editorPodcastDetails',['id' => $episodeList->id]) }}" class="hover:underline float-right" >Details</a>

                                </div>
                              </div>
                             
                            </div>
                          </div>

                        </article>
                      </div>


                  @endif

                  @endforeach

               @else

               <div class="col-span-12 bg-white p-2 ">
                <p class="text-md font-regular text-gray-900 w-full">
                 <a href="#" class="hover:underline">No Available Episodes  </a>
                 </p>
               </div>
                
           

               @endif
			  
			  		</div>


			  	</div>		


			  </div>	

			</div>

 <div class="mt-5 bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">
            
            <div class="pb-5">
                  <h3 class="font-medium text-gray-900">Comments <span class="float-right">{{ $audio->get_comments->count() }}</span></h3>
                  <ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
                 @foreach($audio->get_comments as $comments)
                    <li class="py-3 flex justify-between items-center">
                        <div class="flex items-center">
                          <img src="{{ asset('images/slider-img/slide5.jpg') }}" alt="" class="w-8 h-8">
                           <div class="ml-4 ">
                             <p class="text-sm font-medium text-gray-900">{{ $comments->get_user->name }}</p>
                             <p class="text-sm text-gray-500">{{ $comments->coms_message }}</p>
                          </div>
                        </div>
                     
                      </li> 
  					       @endforeach 
                  </ul>
              </div>
           </div> 











          </div>

          <div class="col-span-4">
            
        	<aside >

          <div class=" bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">
            
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


            <div class="mt-5 bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">
            
            <div class="pb-5">
                  <h3 class="font-medium text-gray-900">Categories</h3>
                  <ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
                 
                    <li class="py-3 flex justify-between items-center">
                        <div class="flex items-center">
                          <img src="{{ asset('images/slider-img/slide5.jpg') }}" alt="" class="w-8 h-8">
                           <div class="ml-4 ">
                             <p class="text-sm font-medium text-gray-900">Category Title</p>
                          </div>
                        </div>
                       <p class="ml-6 bg-white rounded-md text-xs font-medium ext-gray-500">2</p>
                      </li> 
  
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






