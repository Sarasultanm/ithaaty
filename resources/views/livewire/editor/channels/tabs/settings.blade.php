<div class="grid grid-cols-10 gap-4">
    <section class="mt-5 col-span-10">
        <div class="shadow-sm sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div class="grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-3">
                        <h3 class="text-gray-900 font-bold text-md">Channel URL</h3>
                        <p class="mt-1 text-sm text-gray-500">Create your unique channel link.</p>

                        <div class="mt-1 relative flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                https://ithaaty.com/channel/
                            </span>

                            <input
                                type="text"
                                name="company-website"
                                id="company-website"
                                class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-lg focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300"
                                wire:model="channel_uniquelink"
                                placeholder="Enter Text here"
                            />

                            <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                                <button class="inline-flex items-center border border-gray-200 rounded px-2 text-sm font-sans font-medium text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-4 sm:col-span-1 text-right mt-5">
                        <button wire:click="createChannelLink({{$channel_list->id}})" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--start cover-->
    <div class="col-span-10">
        <div class="mt-4 p-5 flex bg-white rounded-md shadow-sm">
            <div class="p-2">
                <h3 class="text-gray-900 font-bold text-md">Logo Photo</h3>
                <p class="text-gray-500 text-sm mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <br />

                <div class="">
                    <div
                        x-data="{ isUploading: false, progress: 0, success: false, error:false }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false,success = true"
                        x-on:livewire-upload-error="isUploading = false,error= true"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                        <label for="desktop-user-photo" class="mt-5 inset-0 relative items-center justify-center text-sm font-bold text-custom-pink cursor-pointer hover:underline">
                            <span>UPLOAD</span>
                            <span class="sr-only"> user photo</span>
                            <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md" wire:model="channel_photo" />
                        </label>

                        <center>@error('channel_photo') <span class="text-center text-xs text-red-600">Required Image</span> @enderror</center>

                        <div class="">
                            <div x-show="isUploading" class="relative pt-1">
                                <!-- <div class="text-center text-gray-700">
                                                Please wait while uploading the file .. <input x-bind:value="`${progress}%`" disabled style="width: 60px;">
                                              </div> -->
                                <div class="overflow-hidden h-2 text-xs flex rounded bg-purple-200 progress">
                                    <div x-bind:style="`width:${progress}%`" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-custom-pink"></div>
                                </div>
                            </div>
                            <button x-show="success" wire:click="saveLogo({{$channel_list->id}})" class="hover:underline mt-5 text-custom-pink text-sm font-bold">SAVE CHANGES</button>
                        </div>
                    </div>
                </div>
            </div>

            @if(Auth::user()->get_gallery('channel_photo','active')->count() != 0)
            <?php $img_path_cover = $channel_list->get_channel_photo->gallery_path ?>
            <?php $s3_cover_link = config('app.s3_public_link')."/users/channe_img/".$img_path_cover; ?>
            @if($channel_photo)
            <div class="w-full h-48">
                <center>
                    <img class="w-48 h-48 rounded-full" src="{{ $channel_photo->temporaryUrl() }}" alt="" />
                </center>
            </div>

            @else
            <div class="w-full h-48">
                <center>
                    <img class="w-48 h-48 rounded-full" src="{{ $s3_cover_link }}" alt="" />
                </center>
            </div>
            @endif @else @if($channel_photo)
            <div class="w-full h-48">
                <img class="w-48 h-48 rounded-full" src="{{ $channel_photo->temporaryUrl() }}" alt="" />
            </div>
            @else
            <div class="w-full bg-custom-pink h-48">
                <img class="w-48 h-48 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="" />
            </div>
            @endif @endif
        </div>
    </div>

    <!--end cover-->

    <!--start cover-->
    <div class="col-span-10">
        <div class="mt-4 p-5 flex bg-white rounded-md shadow-sm">
            <div class="p-2">
                <h3 class="text-gray-900 font-bold text-md">Cover Photo</h3>
                <p class="text-gray-500 text-sm mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <br />

                <div class="">
                    <div
                        x-data="{ isUploading: false, progress: 0, success: false, error:false }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false,success = true"
                        x-on:livewire-upload-error="isUploading = false,error= true"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                        <label for="desktop-user-photo" class="mt-5 inset-0 relative items-center justify-center text-sm font-bold text-custom-pink cursor-pointer hover:underline">
                            <span>UPLOAD</span>
                            <span class="sr-only"> user photo</span>
                            <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md" wire:model="channel_cover" />
                        </label>

                        <center>@error('channel_cover') <span class="text-center text-xs text-red-600">Required Image</span> @enderror</center>

                        <div class="">
                            <div x-show="isUploading" class="relative pt-1">
                                <!-- <div class="text-center text-gray-700">
                                                Please wait while uploading the file .. <input x-bind:value="`${progress}%`" disabled style="width: 60px;">
                                              </div> -->
                                <div class="overflow-hidden h-2 text-xs flex rounded bg-purple-200 progress">
                                    <div x-bind:style="`width:${progress}%`" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-custom-pink"></div>
                                </div>
                            </div>
                            <button x-show="success" wire:click="saveCover({{$channel_list->id}})" class="hover:underline mt-5 text-custom-pink text-sm font-bold">SAVE CHANGES</button>
                        </div>
                    </div>
                </div>
            </div>

            @if(Auth::user()->get_gallery('channel_cover','active')->count() != 0)
            <?php $img_path_cover = $channel_list->get_channel_cover->gallery_path ?>
            <?php $s3_cover_link = config('app.s3_public_link')."/users/channel_cover/".$img_path_cover; ?>
            @if($channel_cover)
            <div class="w-full bg-custom-pink h-48" style="background-image: url({{ $channel_cover->temporaryUrl() }});">
                &nbsp;
            </div>

            @else
            <div class="w-full bg-custom-pink h-48" style="background-image: url({{ $s3_cover_link }});">
                &nbsp;
            </div>
            @endif @else @if($channel_cover)
            <div class="w-full bg-custom-pink h-48 bg-cover bg-center" style="background-image: url({{ $channel_cover->temporaryUrl() }});">
                &nbsp;
            </div>
            @else
            <div class="w-full bg-custom-pink h-48">
                &nbsp;
            </div>
            @endif @endif
        </div>
    </div>

    <!--end cover-->

    <section class="mt-5 col-span-10">
        <div class="shadow-sm sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <h3 class="text-gray-900 font-bold text-md">Add Users</h3>
                <p class="text-gray-500 text-sm mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <br />
                <input wire:model.debounce.300ms="search" wire:keydown.enter="get_search()" type="text" placeholder="Search" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" />

                @if($result) @if($result->count() != 0 )
                <div class="grid grid-cols-6 gap-4 sm:grid-cols-2 w-full mt-5">
                    @foreach($result as $items) @if(Auth::user()->id != $items->id)
                    <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                        <div class="flex-shrink-0">
                            @if($items->get_profilephoto->count() == 0)
                            <img class="h-10 w-10 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="" />
                            @else
                            <?php $img_path = $items->get_profilephoto->first()->gallery_path; ?>
                            <?php $s3_profilelink = config('app.s3_public_link')."/users/profile_img/".$img_path; ?>
                            <?php $userviewprofile = $items->get_profilephoto->first()->gallery_path; ?>
                            <img class="h-10 w-10 rounded-full" src="{{$s3_profilelink}}" alt="" />
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <a class="focus:outline-none">
                                <p class="text-sm font-medium text-gray-900">
                                    {{ $items->name }}
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    {{ $items->email }}
                                </p>
                            </a>
                        </div>
                        <div class="flex-auto min-w-0">
                            <button type="button" class="float-right inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-custom-pink">
                                Send Invitation
                            </button>
                        </div>
                    </div>
                    @endif @endforeach
                </div>

                @else
                <div class="text-center">
                    <h3 class="text-gray-900 font-bold text-md">User not found</h3>
                    <p class="text-gray-500 text-sm mt-2">Try sending a invitation using the email address.</p>

                    <div>
                        <div class="mt-1">
                            <input type="email" class="item-center w-1/4 pr-10 sm:text-sm rounded-md" placeholder="Enter your email" wire:model="emailInvitation" />
                        </div>
                        <button wire:click="sendInvitation({{$channel_list->id}})" type="button" class="mt-2 items-center px-2.5 py-1.5 border border-transparent text-sm font-medium rounded shadow-sm text-white bg-custom-pink">
                            Send Invitation
                        </button>
                    </div>
                    <div>@error('emailInvitation') <span class="text-center text-xs text-red-600">{{$message}}</span> @enderror</div>
                </div>

                @endif @endif
            </div>
        </div>
    </section>
</div>
