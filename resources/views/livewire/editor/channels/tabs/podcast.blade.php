<div x-data="{modal: false}" class="flex justify-between space-x-3 mb-5">
    <h3 class="text-gray-900 text-xl font-bold">Podcasts</h3>
    <button @click="modal = !modal" class="inline-flex items-center cursor-pointer hover:underline hover-text-custom-pink font-bold text-md text-custom-pink text-md">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Create Podcast
    </button>

    <!-- create-modal-podcast -->

    <div x-cloak x-show="modal" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
        >
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" @click="modal = false, share = false"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="transform opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="transform opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6"
            >
                <div>
                    <div class="mt-3 sm:mt-5">
                        <div class="mt-5">
                            <div
                                x-data="{ isUploading: false, progress: 0, success: false, error:false }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false,success = true"
                                x-on:livewire-upload-error="isUploading = false,error= true"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                                <div class="hidden relative rounded-full overflow-hidden lg:block">
                                    <center>
                                        <div class="mb-5">
                                            @if ($podcast_photo)
                                            <img style="width: 200px; height: 200px;" class="rounded-full" src="{{ $podcast_photo->temporaryUrl() }}" />
                                            @else
                                            <img style="width: 200px; height: 200px;" class="rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="" />
                                            @endif
                                        </div>

                                        <label for="desktop-user-photo" class="px-2 py-3 mt-5 inset-0 relative items-center justify-center text-sm font-bold text-custom-pink cursor-pointer hover:underline">
                                            <span>Upload Photo</span>
                                            <span class="sr-only"> user photo</span>
                                            <input type="file" id="desktop-user-photo" name="user-photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md" wire:model="podcast_photo" />
                                        </label>
                                    </center>
                                </div>
                                <center>@error('podcast_photo') <span class="text-center text-xs text-red-600">{{$message}}</span> @enderror</center>
                                <div class="mt-5">
                                    <div x-show="isUploading" class="relative pt-1">
                                        <div class="text-center text-gray-700">Please wait while uploading the file .. <input x-bind:value="`${progress}%`" disabled style="width: 60px;" /></div>
                                        <div class="overflow-hidden h-2 text-xs flex rounded bg-purple-200 progress">
                                            <div x-bind:style="`width:${progress}%`" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-custom-pink"></div>
                                        </div>
                                    </div>
                                    <p x-show="success" class="text-center text-custom-pink font-bold text-gray-800 text-sm">File Upload Complete</p>
                                    <p x-show="error" class="text-center font-bold text-red-800 text-sm">*Error to upload the file</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="name" class="block text-xs font-medium text-gray-900">Podcast Name</label>
                                <input type="text" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="Enter your Channel Name" wire:model="podcast_name" />
                                @error('podcast_name') <span class="text-xs text-red-600">{{$message}}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5 sm:mt-6 flex justify-between space-x-3">
                    <a @click="modal = !modal" type="button" class="text-custom-pink hover:underline mt-3">
                        Cancel
                    </a>
                    <button wire:click="createPodcast({{$channel_list->id}})" type="button" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white">
                        Create Channel
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- create-modal-podcast -->
</div>

<ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mb-5">
    @forelse($channel_list->get_podcast()->get() as $podcast_items)

    <li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow">
        <a target="_blank" href="{{ route('editorNewPodcastView',['link' => $podcast_items->podcast_uniquelink ]) }}">
            <div class="flex-auto w-32 h-52 p-2 w-auto relative">
                <?php $img_path = $podcast_items->get_channel_photo->gallery_path ?>
                <?php $s3_link = config('app.s3_public_link')."/users/podcast_img/".$img_path; ?>
                <img class="h-full w-full rounded-lg" src="{{ $s3_link }}" alt="" />
            </div>
            <div class="flex-1 flex flex-col text-left p-2">
                <h3 class="font-bold text-gray-900 text-lg text-sm truncate">{{$podcast_items->podcast_title}}</h3>
                <p class="text-gray-500 text-sm">{{$podcast_items->get_channel->channel_name}}</p>
                <p class="flex mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                    </svg>
                    <span class="truncate text-gray-500 text-sm">{{ $podcast_items->get_episodes->count()   }}</span>
                </p>
            </div>
        </a>
    </li>

    @empty
    <p>No Podcast</p>

    @endforelse

</ul>
