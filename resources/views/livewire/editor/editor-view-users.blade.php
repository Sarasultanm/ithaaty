 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Users Dashboard') }}
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
        <div class="mt-4 mt-4 p-5  bg-cover"  style="background-image:url('{{ asset('images/audio-bg.jpg') }}')">
          <div class="grid gap-4 grid-cols-10">
            <div class="col-span-2 bg-white p-2 ">
              <article aria-labelledby="question-title-81614">
                <div class="mt-2 text-sm text-gray-700 space-y-4">
                   <div class="text-white bg-cover h-36">
                       <img class="h-full mx-auto my-0 rounded-full" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                   </div>
                </div>
                <div>
                  <div class="flex space-x-3">
                    <div class="min-w-0 flex-1">
                      <p class="text-md font-bold text-gray-900 mt-2">
                        <a href="#" class="hover:underline">{{ $userInfo->name }}</a>
                      </p>
                      <!-- <p class="text-xs text-gray-500">
                        <a class="hover:underline">
                          Followers <span class="float-right">0,000,000</span>
                        </a>
                      </p> -->
                    </div>
                   
                  </div>
                </div>

              </article>
            </div>
            <div class="col-span-8 relative">
                  @if(Auth::user()->id != $userInfo->id )

                    <div class="mt-3 text-right sm:mt-5 absolute bottom-0 right-0">
                           @if($checkFriend)
                              @if($checkFriend == "Add Friend")
                                <button wire:click="addFriend({{$userInfo->id}})" class=" inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Add Friend
                                 </button> 

                              @elseif($checkFriend == "Send Request")
                              <button  class=" inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Send Request
                              </button> 

                              @elseif($checkFriend == "Confirm Request")

                               <button wire:click="confirmFriend({{$userInfo->id}})" class=" inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Confirm Request
                              </button> 

                               @elseif($checkFriend == "Friends")

                               <button class=" inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Friend
                               </button> 

                              @endif

                              
                            @endif
                        
                        
                          <button class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">
                         @if($checkFollowing)
                                {{ $checkFollowing }}
                         @endif
                          </button>
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
			        <a  >Post</a>
			      </li>
			      <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
			        <a  >Friends</a>
			      </li>
             <li @click="openTab = 3"  :class="openTab === 3 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
              <a >Following</a>
            </li>
            <li @click="openTab = 4"  :class="openTab === 4 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
              <a >Playlist</a>
            </li>
			      <!-- <li @click="openTab = 4"  :class="openTab === 4 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
			        <a >Other Episodes</a>
			      </li> -->

			    </ul>
			  </div>


          <div class="w-full pt-4">
            <div x-show="openTab === 1">
              
            <div class="grid gap-4 grid-cols-10">

                <div class="col-span-7">

                  <div class="mb-5 w-full ">
                    <h1 class="font-bold text-gray-800 text-xl">Top Views</h1> 
                  </div>  
              
                <div class="bg-white">

                <div class=" mt-1 p-3">
                  @if($audioList->count() != 0)
                  <div class="flex text-gray-900">
                   
                      <h2 class="flex-auto font-bold text-md">{{ $topOneView->get_audio->audio_name }}</h2>    
                      <p class="flex-auto  text-xs uppercase text-right mt-2">{{ $topOneView->get_audio->audio_season }} : {{ $topOneView->get_audio->audio_episode }}</p>           	
                  </div> 
                  @endif
                </div>

                <div class="mt-2 text-sm text-gray-700 space-y-4">
                   <div class="text-white p-1 audio-bg-blur">
                      @if($audioList->count() != 0)
                      @if($topOneView->get_audio->audio_type == "Upload")
                                <video
                                  id="my-video{{ $topOneView->get_audio->id }}"
                                  class="video-js vjs-theme-forest z-10"
                                  controls
                                  preload="auto"
                                  width="auto"
                                  height="264"
                                  poster="https://d3t3ozftmdmh3i.cloudfront.net/production/podcast_uploaded/17789837/17789837-1631013743470-36b9d215bea63.jpg"
                                  data-setup="{}"
                                >
                                  <source src="{{ asset('audio/'.$topOneView->get_audio->audio_path) }}" type="video/mp4" />
                                  <source src="{{ asset('audio/'.$topOneView->get_audio->audio_path) }}" type="audio/mpeg" />
                                  <source src="{{ asset('audio/'.$topOneView->get_audio->audio_path) }}" type="video/webm" />
                                  <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a
                                    web browser that
                                    <a href="https://videojs.com/html5-video-support/" target="_blank"
                                      >supports HTML5 video</a
                                    >
                                  </p>
                                </video>

                      @elseif($topOneView->get_audio->audio_type == "RSS")
                            
                                <video
                                  id="my-video14"
                                  class="video-js vjs-theme-forest vjs-fluid"
                                  controls
                                  preload="auto"
                                
                                  poster="https://d3t3ozftmdmh3i.cloudfront.net/production/podcast_uploaded/17789837/17789837-1631013743470-36b9d215bea63.jpg"
                                  data-setup="{}"
                                >
                                  <source src="{{ $topOneView->get_audio->audio_path }}" type="video/mp4" />
                                  <source src="{{ $topOneView->get_audio->audio_path }}" type="video/webm" />
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
                                <?php echo $topOneView->get_audio->audio_path; ?>
                            </div>

                      @endif

                      @endif


                   </div> 
                </div>
               
            </div>
            <div class="border-t-2 border-gray-500 mt-5"></div>

            </div>

            <div class="col-span-3">
                
                
               

              <div class=" bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">
            
                  <div class="pb-5 space-y-6">
                        <h3 class="font-medium text-gray-900">Favorites</h3>
                        <ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
                            @foreach($userFav as $fav)
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
                        <h3 class="font-medium text-gray-900">Recent Likes</h3>
                        <ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
                            @foreach($recentLikes as $likes)
                            <li class="py-3 flex justify-between items-center">
                              <div class="flex items-center">
                                <img src="{{ asset('images/slider-img/slide1.jpg') }}" alt="" class="w-8 h-8 ">
                                <div class="ml-4 ">
                                  <p class="text-sm font-medium text-gray-900">{{ $likes->get_audio->audio_name }}</p>
                                  <p class="text-sm text-gray-500">{{ $likes->get_owner->email }}</p>
                                </div>
                              </div>
                              <p class="ml-6 bg-white rounded-md text-xs font-medium ext-gray-500"></p>
                            </li>
                          @endforeach
                        </ul>
                    </div>
                </div>

                
                </div>

            </div>

            </div>

            <div x-show="openTab === 2">
            
              <div class="mb-5 w-full ">
                  <h1 class="font-bold text-gray-800 text-xl">Friends</h1> 
              </div>

               <div class="grid gap-4 grid-cols-10">
               @foreach($friendList as $friends)

                <div class="col-span-2 bg-white p-2 ">
                  <article aria-labelledby="question-title-81614">

                    <div class="mt-2 text-sm text-gray-700 space-y-4">
                      
                       <div class="text-white bg-cover h-36">
                       
                           <img class="h-full mx-auto my-0 rounded-full" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                 
                       </div>
                        
                    </div>

                    <div>
                      <div class="flex space-x-3">
                        <div class="min-w-0 flex-1">
                          <p class="text-md font-bold text-gray-900 mt-2">
                            <a href="#" class="hover:underline">
                              @if($friends->friend_userid == $userInfo->id )
                                 {{ $friends->get_request_user->name}}
                              @else   
                                 {{ $friends->get_add_friend->name}}
                              @endif
                          </p>
                          <p class="text-xs text-gray-500">
                            <a class="hover:underline">
                              Followers <span class="float-right">0,000,000</span>
                            </a>
                          </p>
                        </div>
                       
                      </div>
                    </div>

                  </article>
                </div>
             @endforeach
           </div>



            </div>

            <div x-show="openTab === 3">

            
        <div class="mt-4">
          <div class="mb-5 w-full ">
             <h1 class="font-bold text-gray-800 text-xl">Following</h1> 
          </div> 

              <div class="grid gap-4 grid-cols-10">
              
            @foreach($userFollow as $follow)

     


            <div class="col-span-2 bg-white p-2 ">
              <article aria-labelledby="question-title-81614">

                <div class="mt-2 text-sm text-gray-700 space-y-4">
                  
                   <div class="text-white bg-cover h-36">
                   
                       <img class="h-full mx-auto my-0 rounded-full" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                             
                   </div>
                    
                </div>

                <div>
                  <div class="flex space-x-3">
                    <div class="min-w-0 flex-1">
                      <p class="text-md font-bold text-gray-900 mt-2">
                        <a href="#" class="hover:underline">{{ $follow->get_user->name }}</a>
                      </p>
                      <p class="text-xs text-gray-500">
                        <a class="hover:underline">
                          Followers <span class="float-right">0,000,000</span>
                        </a>
                      </p>
                    </div>
                   
                  </div>
                </div>

              </article>
            </div>




             @endforeach
              </div>


        </div>
            </div>

            <div x-show="openTab === 4">
               <div class="grid gap-4 grid-cols-10">

                  <div class="col-span-7">
                    <div class=" w-full ">
                         <h1 class="font-bold text-gray-800 text-xl">My Playlist</h1> 
                    </div> 
                    <div x-data="{
                      openTab: 10,
                      activeClasses: 'border-custom-pink text-custom-pink',
                      inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
                    }" 
                    class="">


                    <div class="border-b border-gray-200 mb-5">
                    <ul class="-mb-px flex" >
                      <li @click="openTab = 10"  :class="openTab === 10 ? activeClasses : inactiveClasses"   class="w-1/2 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
                        <a  >Public</a>
                      </li>
                      <li @click="openTab = 20" :class="openTab === 20 ? activeClasses : inactiveClasses"  class="w-1/2 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                        <a  >Private</a>
                      </li>
                    </ul>
                  </div>

                   <div x-show="openTab === 10">
                     <div class="grid gap-4 grid-cols-9">
                        @foreach($userInfo->get_playlist as $playlist)
                          @if($playlist->playlist_status == "Public")
                          
                              <div class="col-span-3 bg-white p-2 ">
                                 <a href="{{ route('editorPlaylist',['id' => $playlist->id ]) }}" class="pointer">
                                  <div class="mt-2 text-sm text-gray-700 space-y-4">
                                     <div class="text-white bg-cover h-36">
                                         <img class="h-full mx-auto my-0" src="https://d3t3ozftmdmh3i.cloudfront.net/production/podcast_uploaded/17789837/17789837-1631013743470-36b9d215bea63.jpg" alt="">        
                                     </div>  
                                  </div>
                                  <div>
                                    <div class="flex space-x-3">
                                      <div class="min-w-0 flex-1">
                                        <p class="text-md font-bold text-gray-900 mt-2">
                                         {{ $playlist->playlist_title }}
                                        </p>
                                        <p class="text-xs text-gray-500">
                                          <a class="hover:underline">
                                           {{ $playlist->playlist_status }} <span class="float-right">{{  $playlist->get_playlistItems->count() }}</span>
                                          </a>
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                  </a>
                              </div>
                            
                          @endif
                        @endforeach
                     </div>
                    </div>

                    <div x-show="openTab === 20">
                       <div class="grid gap-4 grid-cols-9">
                        @if(Auth::user()->id == $userInfo->id )
                        @foreach($userInfo->get_playlist as $playlist)
                          @if($playlist->playlist_status == "Private")
                          <div class="col-span-3 bg-white p-2 ">
                            <a href="{{ route('editorPlaylist',['id' => $playlist->id ]) }}" class="pointer">
                              <div class="mt-2 text-sm text-gray-700 space-y-4">
                                 <div class="text-white bg-cover h-36">
                                     <img class="h-full mx-auto my-0" src="https://d3t3ozftmdmh3i.cloudfront.net/production/podcast_uploaded/17789837/17789837-1631013743470-36b9d215bea63.jpg" alt="">        
                                 </div>  
                              </div>
                              <div>
                                <div class="flex space-x-3">
                                  <div class="min-w-0 flex-1">
                                    <p class="text-md font-bold text-gray-900 mt-2">
                                     {{ $playlist->playlist_title }}
                                    </p>
                                    <p class="text-xs text-gray-500">
                                      <a class="hover:underline">
                                       {{ $playlist->playlist_status }} <span class="float-right">1</span>
                                      </a>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </a>
                          </div>
                          @endif
                        @endforeach
                        @endif
                     </div>


                    </div>




                  </div>






                  </div>


                  <div class="col-span-3">
                     @if(Auth::user()->id == $userInfo->id )
                        <div class=" bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">
                          <div class="pb-5">
                              <h3 class="font-bold text-gray-900">Create a Playlist</h3>
                              <div class="mt-1">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Title</label>
                                    <div class="mt-1">
                                      <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"  wire:model="playlist_title">

                                    </div>
                              </div>
                              <div class="mt-1">
                                <label for="email" class="block text-sm font-medium text-gray-700">Status</label>
                                          <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="playlist_status">
                                            <option>Select</option>
                                            <option value="Public">Public</option>
                                            <option value="Private">Private</option>
                                     </select> 


                              </div>
                               <button wire:click="createPlaylist()" class="bg-custom-pink w-full block text-center px-2 py-2 border border-gray-300 shadow-sm text-sm font-bold text-white mt-2">Save</button>
                          </div>
                        </div>
                      @endif
                  </div>

               </div>
            

            </div>
          
          
          </div>









        </div>






       



        <!-- <div class="mt-4">
          <div class="mb-5 w-full ">
          	 <h1 class="font-bold text-gray-800 text-xl">Popular Category</h1> 
          </div>	
         
          	<div class="grid gap-4 grid-cols-10">
          		
          	@foreach($userCat as $cat)
            <div class="col-span-2 bg-white p-2 ">
              <article aria-labelledby="question-title-81614">

                <div class="mt-2 text-sm text-gray-700 space-y-4">
               	
                   <div class="text-white bg-cover h-36" style="background-image: url('{{ asset('images/slider-img/slide1.jpg') }}');">
	                          	
                   </div>

                </div>

                <div>
                  <div class="flex space-x-3">
                    <div class="min-w-0 flex-1">
                      <p class="text-md font-bold text-gray-900 mt-2">
                        <a href="#" class="hover:underline">{{ $cat->category_name }}</a>
                      </p>
                      <p class="text-xs text-gray-500">
                        <a class="hover:underline">
                        	<?php $date = date_create($cat->created_at); ?>
                          <time datetime="2020-12-09T11:43:00">{{ date_format($date,"M, Y") }}</time>  <span class="float-right">SE:{{ $cat->season() }} | EP:{{ $cat->episode() }}</span>
                        </a>
                      </p>
                    </div>
                   
                  </div>
                </div>

              </article>
            </div>

             @endforeach
             	</div>

          
        </div> -->




      </main>
      <!-- aside -->
    
      <!-- aside -->
    </div>
  </div>
</div>





















        </div>
</div>






