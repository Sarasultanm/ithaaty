  <?php use App\Http\Livewire\Editor\EditorPodcastView; ?>
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
      <main class="lg:col-span-9 xl:col-span-6">

        <div class="mt-4">
          <!-- <div class="mb-5 w-full ">
          	 <h1 class="font-bold text-gray-800 text-xl">Overview</h1> 
          </div> -->

           <div class="w-full ">
          	 <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>
          

          <!-- audio -->
              <article class="bg-white px-4 py-6 shadow sm:p-6 sm:rounded-lg" aria-labelledby="question-title-81614">
                <div>
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
                    <div class="flex-shrink-0 self-center flex">

	                   <div  x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false" class="relative inline-block text-left">
	                        <div>
	                          <button type="button" class="-m-2 p-2 rounded-full flex items-center text-gray-400 hover:text-gray-600" id="options-menu-0-button" aria-expanded="false" aria-haspopup="true" @click="open = !open">
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
	                        class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-0-button" tabindex="-1">
	                          <div class="py-1" role="none">
	                            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
	                            @if( EditorPodcastView::checkFav($audio->id) == 0 )	
	                            <a wire:click="favorite({{ $audio->id }})" class="cursor-pointer text-gray-700 flex px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="options-menu-0-item-0">
	                            	<svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
	                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
	                              </svg>
	                              <span>Add to favorites</span>
	                            </a>
	                            @else
	                             <a class="bg-gray-100 text-gray-900 flex px-4 py-2 text-sm cursor-pointer " role="menuitem" tabindex="-1" id="options-menu-0-item-0">
	                             	 <svg class="mr-3 h-5 w-5 text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
	                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
	                              </svg>
	                              <span>Favorites</span>
	                            </a>
	                            @endif	
	                              <!-- Heroicon name: solid/star -->
	                             
	                            <a href="#" class="text-gray-700 flex px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
	                              <!-- Heroicon name: solid/code -->
	                              <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
	                                <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
	                              </svg>
	                              <span>Embed</span>
	                            </a>
	                            <a href="#" class="text-gray-700 flex px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="options-menu-0-item-2">
	                              <!-- Heroicon name: solid/flag -->
	                              <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
	                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd" />
	                              </svg>
	                              <span>Report content</span>
	                            </a>
	                          </div>
	                        </div>
	                      </div>           
    	

                    </div>
                  </div>
                </div>
                 
                <div class="mt-2 text-sm text-gray-700 space-y-4 relative">
                   <div class="text-white p-10 audio-bg-blur" style="background-image: url({{ asset('images/audio-bg.jpg') }});">
					<h2 class="font-bold text-xl m-0">{{ $audio->audio_name }}</h2>
	              <!--    <div>
					  <button class="">Hello</button>
					 </div> -->
	                 	<div class="audio-embed-container">
	                   	 <?php echo $audio->audio_path; ?>
	                   </div>

						<p class="text-white text-xs uppercase mt-5">{{ $audio->created_at }}  | <span>01:37:50 <span>|</span></span> {{ $audio->audio_season }}:{{ $audio->audio_episode }}</p>           	
                   </div>
                    
                </div>
                <!-- like/ -->
                <div 
			    x-data="{
			      openTab: 1,
			      activeClasses: 'border-indigo-500 text-indigo-600',
			      inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
			    }" 
			  	>

                <div class="mt-6 flex justify-between space-x-8">
                  <div class="flex space-x-6">
                    <span class="inline-flex items-center text-sm">
                     @if( EditorPodcastView::checkLike($audio->id) == 0 )	
                      <button wire:click="like({{ $audio->id }},{{$audio->audio_editor}})" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                     @else
                      <button class="inline-flex space-x-2 text-indigo-400 hover:text-gray-500">
                     @endif 	
                        <!-- Heroicon name: solid/thumb-up -->
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
                    <span class="inline-flex items-center text-sm mr-3" @click="openTab = 2"  :class="openTab === 2 ? activeClasses : inactiveClasses"   >
                      <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                       <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
						</svg>
                        <span class="font-medium text-gray-900">Notes</span>
                      </button>
                    </span>

              <!--        <span class="inline-flex items-center text-sm" @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses" >
                      <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                     <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
						</svg>
                        <span class="font-medium text-gray-900">Transcript</span>
                      </button>
                    </span> -->
                    
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
		                 <p>{{ $audio->audio_summary }}</p>
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