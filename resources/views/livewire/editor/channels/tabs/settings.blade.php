<div class="grid grid-cols-10 gap-4">
    <section class="col-span-10 mt-5">
        <div class="shadow-sm sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-6 bg-white sm:p-6">
                <div class="grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-3">
                        <h3 class="font-bold text-gray-900 text-md">Channel URL</h3>
                        <p class="mt-1 text-sm text-gray-500">Create your unique channel link.</p>

                        <div class="relative flex mt-1 rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50 sm:text-sm">
                                https://ithaaty.com/channel/
                            </span>

                            <input
                                type="text"
                                name="company-website"
                                id="company-website"
                                class="flex-1 block w-full min-w-0 px-3 py-2 border-gray-300 rounded-none rounded-r-lg focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                wire:model="channel_uniquelink"
                                placeholder="Enter Text here"
                            />

                            <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                                <button class="inline-flex items-center px-2 font-sans text-sm font-medium text-gray-400 border border-gray-200 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-4 mt-5 text-right sm:col-span-1">
                        <button wire:click="createChannelLink({{$channel_list->id}})" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-custom-pink">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

   

    <!--start cover-->
    <div class="col-span-10">
        <div class="flex p-5 mt-4 bg-white rounded-md shadow-sm">
            <div class="p-2">
                <h3 class="font-bold text-gray-900 text-md">Logo Photo</h3>
                <p class="mt-2 text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <br />

                <div class="">
                    <div
                        x-data="{ isUploading: false, progress: 0, success: false, error:false }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false,success = true"
                        x-on:livewire-upload-error="isUploading = false,error= true"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                        <label for="desktop-user-photo" class="relative inset-0 items-center justify-center mt-5 text-sm font-bold cursor-pointer text-custom-pink hover:underline">
                            <span>UPLOAD</span>
                            <span class="sr-only"> user photo</span>
                            <input type="file" class="absolute inset-0 w-full h-full border-gray-300 rounded-md opacity-0 cursor-pointer" wire:model="channel_photo" />
                        </label>

                        <center>@error('channel_photo') <span class="text-xs text-center text-red-600">Required Image</span> @enderror</center>

                        <div class="">
                            <div x-show="isUploading" class="relative pt-1">
                                <!-- <div class="text-center text-gray-700">
                                                Please wait while uploading the file .. <input x-bind:value="`${progress}%`" disabled style="width: 60px;">
                                              </div> -->
                                <div class="flex h-2 overflow-hidden text-xs bg-purple-200 rounded progress">
                                    <div x-bind:style="`width:${progress}%`" class="flex flex-col justify-center text-center text-white shadow-none whitespace-nowrap bg-custom-pink"></div>
                                </div>
                            </div>
                            <button x-show="success" wire:click="saveLogo({{$channel_list->id}})" class="mt-5 text-sm font-bold hover:underline text-custom-pink">SAVE CHANGES</button>
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
            <div class="w-full h-48 bg-custom-pink">
                <img class="w-48 h-48 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="" />
            </div>
            @endif @endif
        </div>
    </div>

    <!--end cover-->

    <!--start cover-->
    <div class="col-span-10">
        <div class="flex p-5 mt-4 bg-white rounded-md shadow-sm">
            <div class="p-2">
                <h3 class="font-bold text-gray-900 text-md">Cover Photo</h3>
                <p class="mt-2 text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <br />

                <div class="">
                    <div
                        x-data="{ isUploading: false, progress: 0, success: false, error:false }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false,success = true"
                        x-on:livewire-upload-error="isUploading = false,error= true"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                        <label for="desktop-user-photo" class="relative inset-0 items-center justify-center mt-5 text-sm font-bold cursor-pointer text-custom-pink hover:underline">
                            <span>UPLOAD</span>
                            <span class="sr-only"> user photo</span>
                            <input type="file" class="absolute inset-0 w-full h-full border-gray-300 rounded-md opacity-0 cursor-pointer" wire:model="channel_cover" />
                        </label>

                        <center>@error('channel_cover') <span class="text-xs text-center text-red-600">Required Image</span> @enderror</center>

                        <div class="">
                            <div x-show="isUploading" class="relative pt-1">
                                <!-- <div class="text-center text-gray-700">
                                                Please wait while uploading the file .. <input x-bind:value="`${progress}%`" disabled style="width: 60px;">
                                              </div> -->
                                <div class="flex h-2 overflow-hidden text-xs bg-purple-200 rounded progress">
                                    <div x-bind:style="`width:${progress}%`" class="flex flex-col justify-center text-center text-white shadow-none whitespace-nowrap bg-custom-pink"></div>
                                </div>
                            </div>
                            <button x-show="success" wire:click="saveCover({{$channel_list->id}})" class="mt-5 text-sm font-bold hover:underline text-custom-pink">SAVE CHANGES</button>
                        </div>
                    </div>
                </div>
            </div>

            @if(Auth::user()->get_gallery('channel_cover','active')->count() != 0)
            <?php $img_path_cover = $channel_list->get_channel_cover->gallery_path ?>
            <?php $s3_cover_link = config('app.s3_public_link')."/users/channel_cover/".$img_path_cover; ?>
            @if($channel_cover)
            <div class="w-full h-48 bg-custom-pink" style="background-image: url({{ $channel_cover->temporaryUrl() }});">
                &nbsp;
            </div>

            @else
            <div class="w-full h-48 bg-custom-pink" style="background-image: url({{ $s3_cover_link }});">
                &nbsp;
            </div>
            @endif @else @if($channel_cover)
            <div class="w-full h-48 bg-center bg-cover bg-custom-pink" style="background-image: url({{ $channel_cover->temporaryUrl() }});">
                &nbsp;
            </div>
            @else
            <div class="w-full h-48 bg-custom-pink">
                &nbsp;
            </div>
            @endif @endif
        </div>
    </div>

    <!--start private * public -->
    
    <div class="col-span-10">
        <div class="shadow-sm sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-6 bg-white sm:p-6">
                <div class="grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-3">
                        <h3 class="font-bold text-gray-900 text-md">Channel Visibility 
                            <span class="ml-5 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-custom-pink text-white">
                                <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-white" fill="currentColor" viewBox="0 0 8 8">
                                <circle cx="4" cy="4" r="3" />
                                </svg>
                                @if($channel_list->channel_typestatus == 'active')
                                    Public
                                @else
                                    Private
                                @endif
                            </span>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">Update your channel visibility settings to private and public</p>
                    </div>
                    <div class="col-span-4 mt-5 text-right sm:col-span-1">
                            @if($channel_list->channel_typestatus == 'active')
                                <button wire:click="updateChanneltoPrivate({{$channel_list->id}})" 
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-custom-pink">
                                    Set to Private
                                </button>
                            @else   
                                <button wire:click="updateChanneltoPublic({{$channel_list->id}})" 
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-custom-pink">
                                    Set to Public
                                </button>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--start private * public -->

    <!--end cover-->
    @if($channel_list->channel_typestatus == 'private')
    
    <section class="col-span-10 mt-5 ">

        <div class="relative mb-5">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
              <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
              <span class="px-3 text-lg font-medium text-white bg-custom-pink"> Channel Invitation</span>
            </div>
        </div>

        <section class="mt-5 ">
            <div 
            x-data="{
                openTab: 01,
                activeClasses: 'border-custom-pink text-custom-pink',
                inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
            }" 
            class="">
    
                <div class="border-b border-gray-200">
                    <ul class="flex -mb-px" >
                    <li @click="openTab = 01"  :class="openTab === 1 ? activeClasses : inactiveClasses"   class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer" >
                        <a>Invite</a>
                    </li>
                    <li @click="openTab = 02" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer">
                        <a>User List</a>
                    </li>
                    <li @click="openTab = 03" :class="openTab === 5 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer">
                        <a>Generate Code</a>
                    </li>
                    </ul>
                </div>
    
                
                <div class="w-full pt-4">
                                
                    <div x-show="openTab === 01">
                        
                        @include('livewire.editor.channels.tabs.channel-invitation-tabs.invitation')

                    </div>

                    <div x-show="openTab === 02">
                        
                        @include('livewire.editor.channels.tabs.channel-invitation-tabs.user-list')

                    </div>

                    <div x-show="openTab === 03">
                    

                        @include('livewire.editor.channels.tabs.channel-invitation-tabs.generate-code')


                    </div>
    
                </div>
    
    
    
            </div>
    
    
        </section>
        
       


      
    </section>
    @endif
     
</div>
