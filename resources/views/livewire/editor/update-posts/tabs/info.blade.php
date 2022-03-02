<div class="mt-5">
    <h2 class="text-lg font-medium leading-6 text-gray-900">Creat Post</h2>
    <p class="mt-1 text-sm text-gray-500">
        This information will be displayed publicly so be careful what you share.
    </p>
</div>
<div class="border-t-2 border-custom-pink">
    <div class="mt-5">
        <label for="email" class="block text-sm font-medium text-gray-700">Title</label>
        <div class="mt-1">
            <input type="text" name="email" id="email" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="title" />
        </div>
    </div>

    <div class="mt-5">
        <label for="email" class="block text-sm font-medium text-gray-700">Category</label>
        @if($categoryList->count() == 0 )
        <span class="text-sm font-medium text-red-600">Add category in the settings</span>
        @else
        <select
            id="country"
            name="country"
            autocomplete="country"
            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            wire:model="category"
        >
            <option>Select</option>
            @foreach($categoryList->get() as $cat)
            <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
            @endforeach
        </select>

        @endif
    </div>

    <div class="mt-5">
        <div class="flex">
            <div class="flex-1 mr-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Season</label>

                <select class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="season">
                    <option>Select</option>
                    @for ($s = 1; $s < 50; $s++)
                    <option value="{{ $s }}">{{ $s }}</option>
                    @endfor
                </select>
            </div>
            <div class="flex-1 ml-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Episode</label>

                <select class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="episode">
                    <option>Select</option>
                    @for ($e = 1; $e < 50; $e++)
                    <option value="{{ $e }}">{{ $e }}</option>
                    @endfor
                </select>
            </div>
            <div class="flex-1 ml-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Status</label>

                <select class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="status">
                    @if($status == 'private')
                    <option value="private">Private</option>
                    <option value="public">Public</option>
                    @else
                    <option value="public">Public</option>
                    <option value="private">Private</option>
                    @endif
                </select>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <label for="about" class="block text-sm font-medium text-gray-700">
            Transcript
        </label>
        <div class="mt-1">
            <textarea id="about" name="about" rows="15" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="summary"></textarea>
        </div>
    </div>

    <div class="mt-5">
        <div class="block text-sm font-medium text-gray-700">Thumbnail</div>
        <div class="w-1/4 mt-2">
            <div
                x-data="{ isUploading: false, progress: 0, success: false, error:false }"
                x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false,success = true"
                x-on:livewire-upload-error="isUploading = false,error= true"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
            >
                <div class="relative hidden overflow-hidden rounded-md lg:block">
                    @if($this->audio->get_thumbnail->count() == 0) @if($thumbnail)
                    <img class="relative w-auto rounded-md" src="{{ $thumbnail->temporaryUrl() }}" alt="" />
                    @else
                    <img class="relative w-auto rounded-md" src="{{ asset('images/default_podcast.jpg') }}" alt="" />
                    @endif @else @if($thumbnail)
                    <img class="relative w-auto rounded-md" src="{{ $thumbnail->temporaryUrl() }}" alt="" />
                    @else
                    <?php 
                    $img_path = $this->audio->get_thumbnail->first()->gallery_path; ?>
                    <img class="relative w-auto rounded-md" src="{{ asset('users/podcast_img/'.$img_path) }}" alt="" />
                    @endif @endif

                    <label for="desktop-user-photo" class="absolute inset-0 flex items-center justify-center w-full h-full text-sm font-medium text-white bg-black bg-opacity-75 opacity-0 hover:opacity-100 focus-within:opacity-100">
                        <button>Change</button>
                        <span class="sr-only"> user photo</span>
                        <input type="file" id="desktop-user-photo" name="user-photo" class="absolute inset-0 w-full h-full border-gray-300 rounded-md opacity-0 cursor-pointer" wire:model="thumbnail" />
                    </label>
                </div>

                <div class="mt-5">
                    <div x-show="isUploading" class="relative pt-1">
                        <div class="flex h-2 overflow-hidden text-xs bg-purple-200 rounded progress">
                            <div x-bind:style="`width:${progress}%`" class="flex flex-col justify-center text-center text-white shadow-none whitespace-nowrap bg-custom-pink"></div>
                        </div>
                    </div>
                    <center>
                        <button wire:click="saveThumbnail({{$this->a_id}})" x-show="success" class="px-4 py-2 text-sm font-bold text-center text-white bg-custom-pink">Save Changes</button>
                    </center>

                    <p x-show="error" class="text-sm font-bold text-center text-red-800">*Error to upload the file</p>
                </div>
            </div>
        </div>
    </div>
</div>

@if(Auth::user()->get_plan->check_features('o10')->count() != 0 )

    

    <div class="mt-5">
        <h2 class="text-lg font-medium leading-6 text-gray-900">Podcast</h2>
        <p class="mt-1 text-sm text-gray-500">
            Display this episode to your channels
        </p>
    </div>

    <div class="border-t-2 border-custom-pink"></div>

    <div class="mt-5">
        <ul role="list" class="grid grid-cols-1 gap-6 mb-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        
        @forelse (Auth::user()->get_podcasts()->get() as $podcast_items )
        <li class="flex flex-col col-span-1 text-center bg-white rounded-lg shadow">
            <a target="_blank" href="{{ route('editorNewPodcastView',['link' => $podcast_items->podcast_uniquelink ]) }}">
                <div class="relative flex-auto w-auto p-2 h-52">
                    <?php $img_path = $podcast_items->get_channel_photo->gallery_path ?>
                    <?php $s3_link = config('app.s3_public_link')."/users/podcast_img/".$img_path; ?>
                    <img class="w-full h-full rounded-lg" src="{{ $s3_link }}" alt="" />
                </div>
            </a>
                {{-- <div class="flex flex-col flex-1 p-2 text-left"> --}}
                <div class="p-2 text-left">    
                    <h3 class="text-lg font-bold text-gray-900">{{$podcast_items->podcast_title}}</h3>
                    <p class="text-sm text-gray-500">
                        {{$podcast_items->get_channel->channel_name}}
                       
                    </p>
                    <p class="mt-2">
                        <div class="flex justify-between">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                                </svg>
                                <span class="text-sm text-gray-500 truncate">{{ $podcast_items->get_episodes->count()   }}</span>
                             </div>
                            
                            @if( $audio->check_in_podcasts()->count() == 0 ) 

                                <button wire:click="addEpisode({{ $podcast_items->id }})"  class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-custom-pink" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-sm text-gray-500 truncate">Add</span>
                                </button>

                            @else

                                @if ($podcast_items->check_episodes($this->a_id)->count() != 0 )
                                    <button  class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-custom-pink" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-sm text-gray-500 truncate">Added</span>
                                    </button>
                                @endif

                            
                            @endif
                          
                        </div>
                       
                    </p>
                    
                </div>
            
        </li>
        @empty
            No podcast
        @endforelse
        </ul>


       

    </div>



    

@endif

<div class="mt-16 border-t-2 border-custom-pink"></div>

<div class="mt-3 mb-20 text-right sm:mt-5">
    <button
        wire:click="updateInfo()"
        class="inline-flex justify-center w-1/4 px-4 py-2 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-custom-pink hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md"
    >
        Update Info
    </button>
</div>
