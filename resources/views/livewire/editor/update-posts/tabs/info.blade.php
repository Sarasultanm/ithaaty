<div class="mt-5">
    <h2 class="text-lg leading-6 font-medium text-gray-900">Creat Post</h2>
    <p class="mt-1 text-sm text-gray-500">
        This information will be displayed publicly so be careful what you share.
    </p>
</div>
<div class="border-t-2 border-custom-pink">
    <div class="mt-5">
        <label for="email" class="block text-sm font-medium text-gray-700">Title</label>
        <div class="mt-1">
            <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="title" />
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
            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
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

                <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="season">
                    <option>Select</option>
                    @for ($s = 1; $s < 50; $s++)
                    <option value="{{ $s }}">{{ $s }}</option>
                    @endfor
                </select>
            </div>
            <div class="flex-1 ml-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Episode</label>

                <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="episode">
                    <option>Select</option>
                    @for ($e = 1; $e < 50; $e++)
                    <option value="{{ $e }}">{{ $e }}</option>
                    @endfor
                </select>
            </div>
            <div class="flex-1 ml-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Status</label>

                <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="status">
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
            <textarea id="about" name="about" rows="15" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="summary"></textarea>
        </div>
    </div>

    <div class="mt-5">
        <div class="block text-sm font-medium text-gray-700">Thumbnail</div>
        <div class="mt-2 w-1/4">
            <div
                x-data="{ isUploading: false, progress: 0, success: false, error:false }"
                x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false,success = true"
                x-on:livewire-upload-error="isUploading = false,error= true"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
            >
                <div class="hidden relative rounded-md overflow-hidden lg:block">
                    @if($this->audio->get_thumbnail->count() == 0) @if($thumbnail)
                    <img class="relative rounded-md w-auto" src="{{ $thumbnail->temporaryUrl() }}" alt="" />
                    @else
                    <img class="relative rounded-md w-auto" src="{{ asset('images/default_podcast.jpg') }}" alt="" />
                    @endif @else @if($thumbnail)
                    <img class="relative rounded-md w-auto" src="{{ $thumbnail->temporaryUrl() }}" alt="" />
                    @else
                    <?php 
                    $img_path = $this->audio->get_thumbnail->first()->gallery_path; ?>
                    <img class="relative rounded-md w-auto" src="{{ asset('users/podcast_img/'.$img_path) }}" alt="" />
                    @endif @endif

                    <label for="desktop-user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                        <button>Change</button>
                        <span class="sr-only"> user photo</span>
                        <input type="file" id="desktop-user-photo" name="user-photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md" wire:model="thumbnail" />
                    </label>
                </div>

                <div class="mt-5">
                    <div x-show="isUploading" class="relative pt-1">
                        <div class="overflow-hidden h-2 text-xs flex rounded bg-purple-200 progress">
                            <div x-bind:style="`width:${progress}%`" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-custom-pink"></div>
                        </div>
                    </div>
                    <center>
                        <button wire:click="saveThumbnail({{$this->a_id}})" x-show="success" class="py-2 px-4 text-center text-white bg-custom-pink font-bold text-sm">Save Changes</button>
                    </center>

                    <p x-show="error" class="text-center font-bold text-red-800 text-sm">*Error to upload the file</p>
                </div>
            </div>
        </div>
    </div>
</div>

@if(Auth::user()->get_plan->check_features('o10')->count() != 0 )

    

    <div class="mt-5">
        <h2 class="text-lg leading-6 font-medium text-gray-900">Podcast</h2>
        <p class="mt-1 text-sm text-gray-500">
            Display this episode to your channels
        </p>
    </div>

    <div class="border-t-2 border-custom-pink"></div>

    <div class="mt-5">
        <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mb-5">
        
        @forelse (Auth::user()->get_podcasts()->get() as $podcast_items )
        <li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow">
            <a target="_blank" href="{{ route('editorNewPodcastView',['link' => $podcast_items->podcast_uniquelink ]) }}">
                <div class="flex-auto w-32 h-52 p-2 w-auto relative">
                    <?php $img_path = $podcast_items->get_channel_photo->gallery_path ?>
                    <?php $s3_link = config('app.s3_public_link')."/users/podcast_img/".$img_path; ?>
                    <img class="h-full w-full rounded-lg" src="{{ $s3_link }}" alt="" />
                </div>
            </a>
                {{-- <div class="flex-1 flex flex-col text-left p-2"> --}}
                <div class="text-left p-2">    
                    <h3 class="font-bold text-gray-900 text-lg text-sm">{{$podcast_items->podcast_title}}</h3>
                    <p class="text-gray-500 text-sm">
                        {{$podcast_items->get_channel->channel_name}}
                       
                    </p>
                    <p class="mt-2">
                        <div class="flex justify-between">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                                </svg>
                                <span class="truncate text-gray-500 text-sm">{{ $podcast_items->get_episodes->count()   }}</span>
                             </div>
                            
                            @if( $audio->check_in_podcasts()->count() == 0 ) 

                                <button wire:click="addEpisode({{ $podcast_items->id }})"  class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-custom-pink mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="truncate text-gray-500 text-sm">Add</span>
                                </button>

                            @else

                                @if ($podcast_items->check_episodes($this->a_id)->count() != 0 )
                                    <button  class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-custom-pink mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="truncate text-gray-500 text-sm">Added</span>
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

<div class="border-t-2 border-custom-pink mt-16"></div>

<div class="mt-3 text-right sm:mt-5 mb-20">
    <button
        wire:click="updateInfo()"
        class="w-1/4 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md"
    >
        Update Info
    </button>
</div>
