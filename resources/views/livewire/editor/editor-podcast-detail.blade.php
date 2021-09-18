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
             
                       <video
                        id="my-video{{ $audio->id }}"
                        class="video-js vjs-theme-forest vjs-fluid"
                        controls
                        preload="auto"
                       
                        poster="https://d3t3ozftmdmh3i.cloudfront.net/production/podcast_uploaded/17789837/17789837-1631013743470-36b9d215bea63.jpg"
                        data-setup="{}"
                      >
                        <source src="{{ $audio->audio_path }}" type="video/mp4" />
                        <source src="{{ $audio->audio_path }}" type="video/webm" />
                        <p class="vjs-no-js">
                          To view this video please enable JavaScript, and consider upgrading to a
                          web browser that
                          <a href="https://videojs.com/html5-video-support/" target="_blank"
                            >supports HTML5 video</a
                          >
                        </p>
                      </video> 

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
			      activeClasses: 'border-indigo-500 text-indigo-600',
			      inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
			    }" 
			    class="">

			   <div class="border-b border-gray-200">
			  	<ul class="-mb-px flex" >
			      <li @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm" >
			        <a  href="#">Transcript</a>
			      </li>
			      <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm">
			        <a  href="#">Stats</a>
			      </li>
             <li @click="openTab = 3"  :class="openTab === 4 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm" >
              <a  href="#">Mood Meter</a>
            </li>
			      <li @click="openTab = 4"  :class="openTab === 3 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm" >
			        <a  href="#">Other Episodes</a>
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
					      Audience
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
					      label: 'My First dataset',
					      backgroundColor: 'hsl(252, 82.9%, 67.8%)',
					      borderColor: 'hsl(252, 82.9%, 67.8%)',
					      data: [1,2,3,4,5,6,7,8,9,10,11,12],
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



			  	</div>	

			  	<div x-show="openTab === 4">

			  		<div class="grid gap-4 grid-cols-12">
			  			 <div class="col-span-4 bg-white p-2 ">
			  			 	<p class="text-md font-bold text-gray-900">
	                       	 <a href="#" class="hover:underline"> Episode One Title </a>
	                     	 </p>
	                     	 <div class="mt-2 text-sm text-gray-700 space-y-4">
			                   <div class="text-white bg-cover h-36" style="background-image: url('{{ asset('images/slider-img/slide1.jpg') }}');">
			          			</div> 
			                 </div> 
			                 <div class="flex space-x-3">
			                 	 <div class="min-w-0 flex-1">        
			                 	 	<p class="text-xs text-gray-500 mt-2">
				                        <a class="hover:underline">
				                          <span class="float-left">SE:1  | EP: 1 </span>
				                        </a>
				                    </p>
				                     <div class="text-xs font-bold text-gray-900 mt-5">
				                     	 <a href="" class="hover:underline float-right" >Details</a>
				                     </div>


			                 	 </div>
			                 </div>

			  			 </div>
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
                       <!-- <p class="ml-6 bg-white rounded-md text-xs font-medium ext-gray-500">2</p> -->
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






