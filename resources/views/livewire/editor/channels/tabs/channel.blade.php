<div x-data="{modal: false}" class="flex justify-between space-x-3 mb-5">
    <h3 class="text-gray-900 text-xl font-bold">Channel List</h3>
    @if(Auth::user()->get_plan->check_features('o11')->count() != 0 )
    <button @click="modal = !modal" class="inline-flex items-center cursor-pointer hover:underline hover-text-custom-pink font-bold text-md text-custom-pink text-md">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Create Channel
    </button>
    @endif

    <!-- sub channel create -->

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
                                            @if ($channel_photo)
                                            <img style="width: 200px; height: 200px;" class="rounded-full" src="{{ $channel_photo->temporaryUrl() }}" />

                                            @else
                                            <img style="width: 200px; height: 200px;" class="rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="" />
                                            @endif
                                        </div>

                                        <label for="desktop-user-photo" class="px-2 py-3 mt-5 inset-0 relative items-center justify-center text-sm font-bold text-custom-pink cursor-pointer hover:underline">
                                            <span>Upload Photo</span>
                                            <span class="sr-only"> user photo</span>
                                            <input type="file" id="desktop-user-photo" name="user-photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md" wire:model="channel_photo" />
                                        </label>
                                    </center>
                                </div>
                                <center>@error('channel_photo') <span class="text-center text-xs text-red-600">Required Image</span> @enderror</center>
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
                                <label for="name" class="block text-xs font-medium text-gray-900">Channel Name</label>
                                <input type="text" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="Enter your Channel Name" wire:model="channel_name" />
                                @error('channel_name') <span class="text-xs text-red-600">Empty fields</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5 sm:mt-6 flex justify-between space-x-3">
                   
                    <a @click="modal = !modal" type="button" class="text-custom-pink hover:underline mt-3">
                        Cancel
                    </a>
                    <button wire:click="createSubChannel()" type="button" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white">
                        Create Channel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- sub channel create -->
</div>

<ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mb-5">
    @if($sub_channel_list) @foreach($sub_channel_list as $sub_channel)
    <li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow-md divide-y divide-gray-200">
        <div class="flex-1 flex flex-col p-8">
            <?php $img_path = $sub_channel->get_channel_photo->gallery_path ?>
            <?php $s3_link = config('app.s3_public_link')."/users/channe_img/".$img_path; ?>
            <img class="w-32 h-32 flex-shrink-0 mx-auto rounded-full" src="{{ $s3_link }}" alt="" />

            <h3 class="mt-6 font-bold text-gray-900 text-lg truncate">{{$sub_channel->channel_name}}</h3>
            <dl class="mt-1 flex-grow flex flex-col justify-between">
                <dd class="text-gray-500 text-sm">{{ $sub_channel->get_subs()->count() }} subcribers</dd>
            </dl>
        </div>
        <div>
            <div class="-mt-px flex divide-x divide-gray-200">
                <div class="w-0 flex-1 flex">
                    @if(!empty($sub_channel->channel_uniquelink))
                    <a
                        target="_blank"
                        href="{{ route('editorChannelView',['link' => $sub_channel->channel_uniquelink ]) }}"
                        class="cursor-pointer relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                        <span class="ml-3 text-gray-400 font-regular">Manage</span>
                    </a>
                    @else
                    <a target="_blank" class="cursor-pointer relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                        <span class="ml-3 text-red-600 font-regular">Update links in the settings</span>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </li>
    @endforeach @endif

    <!-- More people... -->
</ul>
