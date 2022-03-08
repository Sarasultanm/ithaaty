

 <?php use App\Http\Livewire\Editor\EditorDashboard; ?>


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
      <main class="lg:col-span-9 xl:col-span-6">
<!--         <div class="px-4 sm:px-0">
          <div class="sm:hidden">
            <label for="question-tabs" class="sr-only">Select a tab</label>
            <select id="question-tabs" class="block w-full text-base font-medium text-gray-900 border-gray-300 rounded-md shadow-sm focus:border-rose-500 focus:ring-rose-500">
              <option selected>Recent</option>

              <option>Most Liked</option>

              <option>Most Answers</option>
            </select>
          </div>
          <div class="hidden sm:block">
            <nav class="relative z-0 flex divide-x divide-gray-200 rounded-lg shadow" aria-label="Tabs">
             
              <a href="#" aria-current="page" class="relative flex-1 min-w-0 px-6 py-4 overflow-hidden text-sm font-medium text-center text-gray-900 bg-white rounded-l-lg group hover:bg-gray-50 focus:z-10">
                <span>Recent</span>
                <span aria-hidden="true" class="bg-rose-500 absolute inset-x-0 bottom-0 h-0.5"></span>
              </a>

              <a href="#" class="relative flex-1 min-w-0 px-6 py-4 overflow-hidden text-sm font-medium text-center text-gray-500 bg-white hover:text-gray-700 group hover:bg-gray-50 focus:z-10">
                <span>Most Liked</span>
                <span aria-hidden="true" class="bg-transparent absolute inset-x-0 bottom-0 h-0.5"></span>
              </a>

              <a href="#" class="relative flex-1 min-w-0 px-6 py-4 overflow-hidden text-sm font-medium text-center text-gray-500 bg-white rounded-r-lg hover:text-gray-700 group hover:bg-gray-50 focus:z-10">
                <span>Most Answers</span>
                <span aria-hidden="true" class="bg-transparent absolute inset-x-0 bottom-0 h-0.5"></span>
              </a>
            </nav>
          </div>
        </div> -->
        <div class="">
          <h1 class="sr-only">Recent questions</h1> 
          <div class="w-full ">
             <x-auth-session-status-custom class="mt-4 mb-4" :status="session('status')" />
          </div>
          <div class="flex "  x-data="{ open: false }" >
            
          
          <!-- <button @click="open = true" class="w-full px-4 py-2 mb-5 text-sm font-medium text-center text-white border border-transparent rounded-md shadow-sm bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
              New Post
            </button>  -->
         @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
         @else
            @if(Auth::user()->get_plan->check_features('p3')->count() != 0 || Auth::user()->get_plan->check_features('p2')->count() != 0 )
              @if(Auth::user()->get_audio->count() != 0 )
             <a href="{{ route('editorPodcastCreate') }}" class="w-full px-4 py-2 mb-5 text-sm font-medium text-center text-white border border-transparent rounded-md shadow-sm " style="background-color: #f98b88;">
                  New Post 
                </a>
              @endif
            @endif    
         @endif             <!-- This example requires Tailwind CSS v2.0+ -->

            <!--  modal add post -->          




            <!-- modal add post -->





          </div>
          

          <ul class="space-y-4">

            <!-- test -->
           {{-- @include('livewire.editor.dashboard.test-post') --}}


           

            <!-- test -->







          @foreach($audioList->get() as $audio)
            
          @if($audio->check_in_podcasts()->count() != 0)

          

           @if( $audio->audio_status == 'public' || $audio->audio_editor == Auth::user()->id || $this->get_if_friends($audio->audio_editor) == "Friends") 
           

            <li class="px-4 py-6 bg-white shadow sm:p-6 sm:rounded-lg">
              <article aria-labelledby="question-title-81614">

              <!-- new updates -->  

               <!-- audio-parts -->
               @include('livewire.editor.dashboard.parts.episodes')

               <!-- audio-parts -->
             
                <!-- podcast-parts -->
                  @include('livewire.editor.dashboard.parts.podcasts')
                <!-- podcast-parts -->

               

              <!-- new updates -->


                <div class="relative hidden mt-2 space-y-4 text-sm text-gray-700">
                    <div class="absolute z-20 w-full h-full bg-gray-900 bg-opacity-50">
                      <div class="flex items-center justify-center h-full"><button wire:click="view({{ $audio->id }},{{$audio->audio_editor}})" style="background: #f66d6a;" class="w-24 h-24 rounded-full focus:outline-none"><svg style="color: #d3e579;" class="w-full h-full" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></button> </div>
                    </div>
                   <div class="p-10 text-white audio-bg-blur" style="background-image: url({{ asset('images/audio-bg.jpg') }});">
                   <h2 class="m-0 text-xl font-bold">{{ $audio->audio_name }}</h2>
               
                    @if($audio->audio_type == "Upload")

                     <div class="flex p-4 rounded-md bg-custom-pink">
                       <div >
                        @if($audio->get_thumbnail->count() == 0)
                           <img src="{{ asset('images/default_podcast.jpg') }}" style="width:150px;">
                        @else
                          <?php $img_path = $audio->get_thumbnail->first()->gallery_path; ?>
                          <?php $s3_thumbnail = config('app.s3_public_link')."/users/podcast_img/".$img_path; ?>
                         
                           <img src="{{ $s3_thumbnail }}" style="width:150px;">
                        @endif
                      </div>
                      <div class="flex-1 pl-5">
                         <p class="text-2xl font-bold text-white">{{ $audio->audio_name }}</p>
                         <p class="text-sm font-medium text-white">{{ substr($audio->audio_summary, 0, 50) }}</p>
                         <p class="mt-5 text-sm font-medium text-white">Season {{ $audio->audio_season }} / Episode {{ $audio->audio_episode }} </p>
                      </div>
                    </div>
                    
                   <!--  <video
                        id="my-video{{ $audio->id }}"
                        class="z-10 video-js vjs-theme-forest"
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
                      </video> -->

                    @elseif($audio->audio_type == "RSS")

                    <div class="flex p-4 rounded-md bg-custom-pink">
                      <div >
                        @if($audio->get_thumbnail->count() == 0)
                           <img src="{{ asset('images/default_podcast.jpg') }}" style="width:150px;">
                        @else
                          <?php $img_path = $audio->get_thumbnail->first()->gallery_path; ?>
                          <?php $s3_thumbnail = config('app.s3_public_link')."/users/podcast_img/".$img_path; ?>
                           <img src="{{ $s3_thumbnail }}" style="width:150px;">
                        @endif
                      </div>
                      <div class="flex-1 pl-5">
                         <p class="text-2xl font-bold text-white">{{ $audio->audio_name }}</p>
                         <p class="text-sm font-medium text-white">{{ substr($audio->audio_summary, 0, 50) }}</p>
                         <p class="mt-5 text-sm font-medium text-white">Season {{ $audio->audio_season }} / Episode {{ $audio->audio_episode }} </p>
                      </div>
                    </div>
                        <!-- <video
                        id="my-video{{ $audio->id }}"
                        class="z-10 video-js vjs-default-skin"
                        controls
                        preload="auto"
                        width="auto"
                        height="264"
                        poster=""
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
                      </video> -->

                    @else

                     <!-- <div class="audio-embed-container">
                       <?php echo $audio->audio_path; ?>
                     </div> -->
                     <div class="flex p-4 rounded-md bg-custom-pink">
                      <div >
                         @if($audio->get_thumbnail->count() == 0)
                           <img src="{{ asset('images/default_podcast.jpg') }}" style="width:150px;">
                        @else
                          <?php $img_path = $audio->get_thumbnail->first()->gallery_path; ?>
                          <?php $s3_thumbnail = config('app.s3_public_link')."/users/podcast_img/".$img_path; ?>
                           <img src="{{ $s3_thumbnail }}" style="width:150px;">
                        @endif
                      </div>
                      <div class="flex-1 pl-5">
                         <p class="text-2xl font-bold text-white">{{ $audio->audio_name }}</p>
                         <p class="text-sm font-medium text-white">{{ substr($audio->audio_summary, 0, 50) }}...</p>
                         <p class="mt-5 text-sm font-medium text-white">Season {{ $audio->audio_season }} / Episode {{ $audio->audio_episode }} </p>
                      </div>
                    </div>

                    @endif 

                      <p class="mt-5 text-xs text-white uppercase">{{ $audio->created_at }}  | <span>01:37:50 <span>|</span></span> {{ $audio->audio_season }}:{{ $audio->audio_episode }}</p>            
                   </div>
                    
                </div>
                
                <!-- like/ -->
                <div x-data="{
                  openTab: 1,
                  activeClasses: 'border-indigo-500 text-indigo-600',
                  inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
                }" >

                <div class="flex justify-between mt-6 space-x-8">
                  <div class="flex space-x-6">

                    <span class="inline-flex items-center text-sm" @click="openTab = 4"  :class="openTab === 4 ? activeClasses : inactiveClasses" >
                     @if( EditorDashboard::checkLike($audio->id) == 0 ) 
                      <button  class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                     @else
                       <button class="inline-flex space-x-2 text-green-600 hover:text-green-700" >
                     @endif   
                   
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                        </svg>
                        <span class="font-medium text-gray-900">{{ $audio->get_like->count()  }}</span>
                        <span class="sr-only">likes</span>
                      </button>
                    </span>

               <!--      <span class="inline-flex items-center text-sm">
                     @if( EditorDashboard::checkLike($audio->id) == 0 ) 
                      <button wire:click="like({{ $audio->id }},{{$audio->audio_editor}})" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                     @else
                       <button class="inline-flex space-x-2 text-green-600 hover:text-green-700" >
                     @endif   
                       
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                        </svg>
                        <span class="font-medium text-gray-900">{{ $audio->get_like->count()  }}</span>
                        <span class="sr-only">likes</span>
                      </button>
                    </span> -->

                    <span class="inline-flex items-center text-sm" @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses" >
                      <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                        <!-- Heroicon name: solid/chat-alt -->
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium text-gray-900">{{ $audio->get_comments->count() }}</span>
                        <span class="sr-only">replies</span>
                      </button>
                    </span>

                    <span class="inline-flex items-center text-sm">
                      <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                        <!-- Heroicon name: solid/eye -->
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
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
                    @if(Auth::user()->get_plan->check_features('s2')->count() != 0 )
                    <!-- notes -->
                    <span class="inline-flex items-center mr-3 text-sm" @click="openTab = 2"  :class="openTab === 2 ? activeClasses : inactiveClasses"   >
                      <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                       <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                      </svg>
                        <span class="font-medium text-gray-900">Notes</span>
                      </button>
                    </span>
                     <!-- notes -->
                     @endif
                    @endif

                     @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
                     @else
                     @if(Auth::user()->get_plan->check_features('o4')->count() != 0 )
                     <!-- referrence -->
                     <span class="inline-flex items-center text-sm" @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses" >
                      <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                     <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                      </svg>
                        <span class="font-medium text-gray-900">Referrence</span>
                      </button>
                    </span>
                    <!-- referrence -->
                    @endif
                    @endif
                  </div>

                </div>

                <div x-show="openTab === 1">
                  @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
                  @else
                  @if(Auth::user()->get_plan->check_features('s2')->count() != 0 )
                    <!-- comments -->
                    <div class="mt-5">
                      <div class="mt-1">
                        <input type="text" name="email" id="email" placeholder="Comments" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="comments" wire:keydown.enter="saveComment({{ $audio->id }},{{$audio->audio_editor}})"  >
                      </div>
                    </div>
                     @endif
                  @endif

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
                           <!--  <img class="w-5 h-5 rounded-full" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt=""> -->
                            @if($comments->get_user->get_profilephoto->count() == 0)
                               <img class="w-5 h-5 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="">
                            @else
                              <?php $commentsprofile_path = $comments->get_user->get_profilephoto->first()->gallery_path; ?>
                              <img class="w-5 h-5 rounded-full" src="{{ asset('users/profile_img/'.$commentsprofile_path) }}" alt="">
                            @endif
                          </div>
                          <div class="flex-1 min-w-0">
                           <div class="p-2 mb-3 bg-gray-100 rounded-md "> 
                            <p class="text-xs font-medium text-gray-900">
                              <a href="/editor/users//{{ $audio->audio_editor }}" class="font-bold hover:underline">{{ $comments->get_user->name }}</a>
                            </p>
                            <p class="text-sm text-gray-500">
                             {{ $comments->coms_message }}<br><br>
                              <span class="text-xs text-right text-gray-500"><i>Posted at: {{ $comments->created_at }}</i></span>
                              
                            </p>
                            </div>

                            
                          </div>
                        
                      </div>
                      @endforeach
                </div>


                </div>

                @endif

               
                <!-- comments -->

          </div>


          <div x-show="openTab === 2">
            @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
            @else
            @if(Auth::user()->get_plan->check_features('s2')->count() != 0 )
            <!-- notes-view -->
                    <div class="flex mt-5">
                       <input type="text" name="email" id="email" placeholder="Time" class="flex-1 block w-20 mr-3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="notes_time" >
                      <input type="text" name="email" id="email" placeholder="Notes" class="block w-full mr-3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="notes_message"  >
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
                            <img class="w-5 h-5 rounded-full" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                          </div>
                          <div class="flex-1 min-w-0">
                           <div class="p-2 mb-3 bg-gray-100 rounded-md "> 
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
              <!-- notes-view -->
              @endif
              @endif
          </div>

          <div x-show="openTab === 3">
            <!-- referrence-view -->
             @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
             @else
             @if(Auth::user()->get_plan->check_features('o4')->count() != 0 )
             <div class="mt-5">
                    <p class="font-bold text-gray-900 text-md">Affiliate : </p>
                    <div class="mt-1">
                      @foreach($audio->get_affiliate as $afi)
                        @if(strpos($afi->audioafi_link, "https://")!==false)
                          <p class="text-sm"><a target="_blank" href="{{ $afi->audioafi_link }}">{{ $afi->audioafi_title }}</a></p>
                        @else
                          <p class="text-sm"><a target="_blank" href="{{ 'https://'.$afi->audioafi_link }}">{{ $afi->audioafi_title }}</a></p>
                        @endif
                     @endforeach
                    </div>
                    <p class="font-bold text-gray-900 text-md">References : </p>
                    <div class="mt-3">
                      @foreach($audio->get_references as $refs)
                         @if(strpos($refs->audioref_link, "https://")!==false)
                            <p class="text-sm"><a target="_blank" href="{{ $refs->audioref_link }}">{{ $refs->audioref_title }}</a></p>
                         @else
                           <p class="text-sm"><a target="_blank" href="{{ 'https://'.$refs->audioref_link }}">{{ $refs->audioref_title }}</a></p>
                         @endif
                     @endforeach
                    </div>

                     
              </div>
              @endif
              @endif
            <!-- referrence-view -->
          </div>
          
          <div x-show="openTab === 4">
             <div class="mt-5">
                    <div class="mt-1">
                       <span class="inline-flex items-center mr-3 text-sm">
                            <button wire:click="like({{ $audio->id }},{{$audio->audio_editor}},'like')" class="inline-flex space-x-2 text-green-600 hover:text-green-500">
                           <!-- <button class="inline-flex space-x-2 text-green-600 hover:text-green-700" > -->
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                            </svg>
                            <span class="font-medium text-gray-900">{{ $audio->get_react('like')->count()  }}</span>
                            <span class="sr-only">likes</span>
                          </button>
                        </span>  

                        <span class="inline-flex items-center mr-3 text-sm">
                           <button wire:click="like({{ $audio->id }},{{$audio->audio_editor}},'star')" class="inline-flex space-x-2 text-green-600 hover:text-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span class="font-medium text-gray-900">{{ $audio->get_react('star')->count()  }}</span>
                            <span class="sr-only">star</span>
                          </button>
                        </span>

                        <span class="inline-flex items-center mr-3 text-sm">
                           <button wire:click="like({{ $audio->id }},{{$audio->audio_editor}},'happy')" class="inline-flex space-x-2 text-green-600 hover:text-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium text-gray-900">{{ $audio->get_react('happy')->count()  }}</span>
                            <span class="sr-only">happy</span>
                          </button>
                        </span>

                        <span class="inline-flex items-center mr-3 text-sm">
                           <button wire:click="like({{ $audio->id }},{{$audio->audio_editor}},'sad')" class="inline-flex space-x-2 text-green-600 hover:text-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-7.536 5.879a1 1 0 001.415 0 3 3 0 014.242 0 1 1 0 001.415-1.415 5 5 0 00-7.072 0 1 1 0 000 1.415z" clip-rule="evenodd" />
                            </svg>
                            <span class="font-medium text-gray-900">{{ $audio->get_react('sad')->count()  }}</span>
                            <span class="sr-only">sad</span>
                          </button>
                        </span>

                        <span class="inline-flex items-center mr-3 text-sm">
                           <button wire:click="like({{ $audio->id }},{{$audio->audio_editor}},'dislike')" class="inline-flex space-x-2 text-green-600 hover:text-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M18 9.5a1.5 1.5 0 11-3 0v-6a1.5 1.5 0 013 0v6zM14 9.667v-5.43a2 2 0 00-1.105-1.79l-.05-.025A4 4 0 0011.055 2H5.64a2 2 0 00-1.962 1.608l-1.2 6A2 2 0 004.44 12H8v4a2 2 0 002 2 1 1 0 001-1v-.667a4 4 0 01.8-2.4l1.4-1.866a4 4 0 00.8-2.4z" />
                          </svg>
                            <span class="font-medium text-gray-900">{{ $audio->get_react('dislike')->count()  }}</span>
                            <span class="sr-only">dislike</span>
                          </button>
                        </span>



                    </div>
              </div>

          </div>
                
           
           </div>

            <!-- like/ -->


           
                 <!-- like/ -->
              </article>
            </li>


         

            @endif 

            @endif 
            
            @endforeach


            <!-- More questions... -->
          </ul>
        </div>
      </main>
       @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")

       @else
        
         @include('layouts.editor.aside')
       @endif
      <!-- aside -->
    
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



















  <!--  <div class="bottom-0 hidden text-xs" wire:poll.750ms> Current time: {{ now() }} </div> -->

        </div>
</div>




