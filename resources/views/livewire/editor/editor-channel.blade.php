 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Channel') }}
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
      <main class="xl:col-span-10 lg:col-span-9">

        <div class="w-full ">
             <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
        </div>

        <div class="mt-4">
         <div class=" w-full xl:p-0 lg:p-0 md:p-0 sm:p-0 xs:p-0">
            @if(Auth::user()->get_channels()->count() == 0)
             <div x-data="{modal: false}" >

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="text-center">
              <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
              </svg>
              <h3 class="mt-2 text-sm font-medium text-gray-900">No Channels</h3>
              <p class="mt-1 text-sm text-gray-500">
                Get started by creating a new channel.
              </p>
              <div class="mt-6">
                <button @click="modal = !modal" type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-custom-pink">
                  <!-- Heroicon name: solid/plus -->
                  <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                  </svg>
                  Create Channel
                </button>
              </div>
            </div>

           
               <!--  <a   class=" inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white sm:col-start-2 sm:text-sm cursor-pointer">Create Channels</a>
                 -->
                <!--modal-->
                  <!-- This example requires Tailwind CSS v2.0+ -->
                    <div x-cloak x-show="modal"  class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                      <div 
                       x-transition:enter="transition ease-out duration-100" 
                       x-transition:enter-start="transform opacity-0 scale-95" 
                       x-transition:enter-end="transform opacity-100 scale-100" 
                       x-transition:leave="transition ease-in duration-75" 
                       x-transition:leave-start="transform opacity-100 scale-100" 
                       x-transition:leave-end="transform opacity-0 scale-95"
                      class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0" >
                      
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"  @click="modal = false, share = false"></div>

                        <!-- This element is to trick the browser into centering the modal contents. -->
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                        <div 
                           x-transition:enter="transition ease-out duration-300" 
                           x-transition:enter-start="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                           x-transition:enter-end="transform opacity-100 translate-y-0 sm:scale-100" 
                           x-transition:leave="transition ease-in duration-200" 
                           x-transition:leave-start="transform opacity-100 translate-y-0 sm:scale-100" 
                           x-transition:leave-end="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                          <div>
                           
                            <div class="mt-3 sm:mt-5">
                             
                              <div class="mt-5">
                                 <div x-data="{ isUploading: false, progress: 0, success: false, error:false }" 
                                   x-on:livewire-upload-start="isUploading = true"
                                   x-on:livewire-upload-finish="isUploading = false,success = true" 
                                   x-on:livewire-upload-error="isUploading = false,error= true"
                                   x-on:livewire-upload-progress="progress = $event.detail.progress">

                                        <div class="hidden relative rounded-full overflow-hidden lg:block">
                                        <center>
                                           <div class="mb-5">
                                                 @if ($channel_photo)
                                                    <img style="width: 200px;height: 200px;" class="rounded-full" src="{{ $channel_photo->temporaryUrl() }}">

                                                @else
                                                     <img style="width: 200px;height: 200px;"  class="rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="">
                                                @endif
                                           </div>
                                             
                                          <label for="desktop-user-photo" class="px-2 py-3 mt-5  inset-0 relative items-center justify-center text-sm font-bold text-custom-pink cursor-pointer hover:underline">
                                            <span>Upload Photo</span>
                                            <span class="sr-only"> user photo</span>
                                            <input type="file" id="desktop-user-photo" name="user-photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md" wire:model="channel_photo">
                                          </label>

                                          </center>
                                        </div>
                                        <center>
                                         @error('channel_photo') <span class="text-center text-xs text-red-600">Required Image</span> @enderror
                                        </center>
                                      <div class="mt-5">
                                        <div x-show="isUploading"  class="relative pt-1">
                                          <div class="text-center text-gray-700">
                                            Please wait while uploading the file .. <input x-bind:value="`${progress}%`" disabled style="width: 60px;">
                                          </div>
                                          <div  class="overflow-hidden h-2 text-xs flex rounded bg-purple-200 progress">
                                            <div x-bind:style="`width:${progress}%`"
                                              class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-custom-pink"
                                            ></div>
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
                                      <input type="text"  class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="Enter your Channel Name" wire:model="channel_name">
                                       @error('channel_name') <span class="text-xs text-red-600">Empty fields</span> @enderror
                                    </div>
                              </div>
                            </div>


                          </div>

                          <div class="mt-5 sm:mt-6 flex justify-end space-x-3">
                            <button @click="modal = !modal" type="button" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white ">
                            Cancel
                            </button>
                            <button wire:click="createChannel()" type="button" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white ">
                             Create Channel
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                  <!--modal-->
     
            </div>
            @else

            @if(Auth::user()->get_gallery('channel_cover','active')->count() != 0)
              <?php $img_path_cover = $channel_list->get_channel_cover->gallery_path ?>
              <?php $s3_cover_link = config('app.s3_public_link')."/users/channel_cover/".$img_path_cover; ?>
                <div class="w-full h-48 bg-cover bg-center" style="background-image: url({{ $s3_cover_link }});">
                    &nbsp;
                </div>
            @else
               <div class="w-full bg-custom-pink h-48 bg-cover bg-center">
                    &nbsp;
                </div>

            @endif

            <div class="w-full">
               

                <div class="grid grid-cols-1 gap-4 ">
                  <div class="relative w-full flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 ">
                    <div class="flex-shrink-0">


                      @if(Auth::user()->get_gallery('channel_photo','active')->count() == 0)
                        <img class="mt-5 ml-5 w-24 h-24  rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="">
                      @else
                        <?php $img_path = $channel_list->get_channel_photo->gallery_path ?>
                        <?php $s3_link = config('app.s3_public_link')."/users/channe_img/".$img_path; ?>
                        <img class="mt-5 ml-5 w-24 h-24  rounded-full" src="{{ $s3_link }}" alt=""> 
                      @endif

                    </div>
                    <div class="flex-1 min-w-0">
                      <a >
                       <!--  <span class="absolute inset-0" aria-hidden="true"></span> -->
                        <p class="text-xl font-bold text-gray-900 mt-5">
                          {{$channel_list->channel_name}}
                        </p>
                        <p class="text-md text-gray-500 truncate">
                          {{ $channel_list->get_subs()->count() }}  subcribers
                        </p>
                      </a>
                    </div>
                  </div>

                  <!-- More people... -->
                </div>


            </div>

            <section class="mt-5 w-full">


            <div 
                x-data="{
                  openTab: 1,
                  activeClasses: 'border-custom-pink text-custom-pink',
                  inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
                }" 
                class=""
              >

            <div class="border-b border-gray-200">
                <ul class="-mb-px flex" >
                  <li @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
                    <a>Home</a>
                  </li>
                   <li @click="openTab = 5" :class="openTab === 5 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                    <a>Podcast</a>
                  </li>
                   <li @click="openTab = 6" :class="openTab === 6 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                    <a>Playlist</a>
                  </li>
                  <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                    <a>Channels</a>
                  </li>
                   <li @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                    <a>About</a>
                  </li>
                   <li @click="openTab = 4" :class="openTab === 4 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                    <a>Settings</a>
                  </li>


                </ul>
              </div>



              <div class="w-full pt-4">
                  

                <div x-show="openTab === 1">
                    <h3 class="text-gray-900 text-xl font-bold">Popular</h3>

                    <h3 class="text-gray-900 text-xl font-bold">Uploaded</h3>

                    <h3 class="text-gray-900 text-xl font-bold">Channels</h3>
                </div>

                <div x-show="openTab === 2">
                  <div  x-data="{modal: false}" class="flex justify-between space-x-3 mb-5">
                     <h3 class="text-gray-900 text-xl font-bold">Channel List</h3>
                     <button @click="modal = !modal"  class="inline-flex items-center cursor-pointer hover:underline hover-text-custom-pink font-bold text-md text-custom-pink text-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                         </svg>Create Channel
                      </button>

                      <!-- sub channel create -->

                        <div x-cloak x-show="modal"  class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                      <div 
                       x-transition:enter="transition ease-out duration-100" 
                       x-transition:enter-start="transform opacity-0 scale-95" 
                       x-transition:enter-end="transform opacity-100 scale-100" 
                       x-transition:leave="transition ease-in duration-75" 
                       x-transition:leave-start="transform opacity-100 scale-100" 
                       x-transition:leave-end="transform opacity-0 scale-95"
                      class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0" >
                      
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"  @click="modal = false, share = false"></div>

                        <!-- This element is to trick the browser into centering the modal contents. -->
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                        <div 
                           x-transition:enter="transition ease-out duration-300" 
                           x-transition:enter-start="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                           x-transition:enter-end="transform opacity-100 translate-y-0 sm:scale-100" 
                           x-transition:leave="transition ease-in duration-200" 
                           x-transition:leave-start="transform opacity-100 translate-y-0 sm:scale-100" 
                           x-transition:leave-end="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                          <div>
                           
                            <div class="mt-3 sm:mt-5">
                             
                              <div class="mt-5">
                                 <div x-data="{ isUploading: false, progress: 0, success: false, error:false }" 
                                   x-on:livewire-upload-start="isUploading = true"
                                   x-on:livewire-upload-finish="isUploading = false,success = true" 
                                   x-on:livewire-upload-error="isUploading = false,error= true"
                                   x-on:livewire-upload-progress="progress = $event.detail.progress">

                                        <div class="hidden relative rounded-full overflow-hidden lg:block">
                                        <center>
                                           <div class="mb-5">
                                                 @if ($channel_photo)
                                                    <img style="width: 200px;height: 200px;" class="rounded-full" src="{{ $channel_photo->temporaryUrl() }}">

                                                @else
                                                     <img style="width: 200px;height: 200px;"  class="rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="">
                                                @endif
                                           </div>
                                             
                                          <label for="desktop-user-photo" class="px-2 py-3 mt-5  inset-0 relative items-center justify-center text-sm font-bold text-custom-pink cursor-pointer hover:underline">
                                            <span>Upload Photo</span>
                                            <span class="sr-only"> user photo</span>
                                            <input type="file" id="desktop-user-photo" name="user-photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md" wire:model="channel_photo">
                                          </label>

                                          </center>
                                        </div>
                                        <center>
                                         @error('channel_photo') <span class="text-center text-xs text-red-600">Required Image</span> @enderror
                                        </center>
                                      <div class="mt-5">
                                        <div x-show="isUploading"  class="relative pt-1">
                                          <div class="text-center text-gray-700">
                                            Please wait while uploading the file .. <input x-bind:value="`${progress}%`" disabled style="width: 60px;">
                                          </div>
                                          <div  class="overflow-hidden h-2 text-xs flex rounded bg-purple-200 progress">
                                            <div x-bind:style="`width:${progress}%`"
                                              class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-custom-pink"
                                            ></div>
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
                                      <input type="text"  class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="Enter your Channel Name" wire:model="channel_name">
                                       @error('channel_name') <span class="text-xs text-red-600">Empty fields</span> @enderror
                                    </div>
                              </div>
                            </div>


                          </div>

                          <div class="mt-5 sm:mt-6 flex justify-end space-x-3">
                            <button @click="modal = !modal" type="button" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white ">
                            Cancel
                            </button>
                            <button wire:click="createSubChannel()" type="button" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white ">
                             Create Channel
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>



                      <!-- sub channel create -->




                  </div>
                  
                  <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mb-5">
                      
                      @if($sub_channel_list)
                      @foreach($sub_channel_list as $sub_channel)
                      <li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
                        <div class="flex-1 flex flex-col p-8">

                          <?php $img_path = $sub_channel->get_channel_photo->gallery_path ?>
                          <?php $s3_link = config('app.s3_public_link')."/users/channe_img/".$img_path; ?>
                          <img class="w-32 h-32 flex-shrink-0 mx-auto rounded-full" src="{{ $s3_link }}" alt=""> 

                          <h3 class="mt-6 text-gray-900 text-sm font-medium">{{$sub_channel->channel_name}}</h3>
                          <dl class="mt-1 flex-grow flex flex-col justify-between">
                            <dt class="sr-only">Title</dt>
                            <dd class="text-gray-500 text-sm">{{ $sub_channel->get_subs()->count() }} subcribers</dd>
                            <dt class="sr-only">Role</dt>
                           
                          </dl>
                        </div>
                        <div>
                          <div class="-mt-px flex divide-x divide-gray-200">
                            <div class="w-0 flex-1 flex">
                              @if(!empty($sub_channel->channel_uniquelink))
                              <a target="_blank" href="{{ route('editorChannelView',['link' => $sub_channel->channel_uniquelink ]) }}" class="cursor-pointer relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                </svg>
                                 <span class="ml-3 text-gray-400 font-regular">Manage</span>
                              </a>
                              @else
                                 <a target="_blank" class="cursor-pointer relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                
                                 <span class="ml-3 text-red-600  font-regular">Update links in the settings</span>
                              </a>
                              @endif

                             
                             
                            </div>
                          </div>
                        </div>
                      </li>
                      @endforeach
                      @endif
                    
                      <!-- More people... -->
                  </ul>

                </div>

                <div x-show="openTab === 3">
                  <div x-data="{modal: false}" class="flex justify-between space-x-3 mb-5">
                        <h3 class="font-bold text-xl text-gray-900">About Us</h3>

                        <button @click="modal = !modal"  class="cursor-pointer hover:underline hover-text-custom-pink font-bold text-md text-custom-pink">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        </button>

                        <!-- modal -->
                        <div x-cloak x-show="modal"  class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                          <div 
                           x-transition:enter="transition ease-out duration-100" 
                           x-transition:enter-start="transform opacity-0 scale-95" 
                           x-transition:enter-end="transform opacity-100 scale-100" 
                           x-transition:leave="transition ease-in duration-75" 
                           x-transition:leave-start="transform opacity-100 scale-100" 
                           x-transition:leave-end="transform opacity-0 scale-95"
                          class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0" >
                          
                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"  @click="modal = false, share = false"></div>

                            <!-- This element is to trick the browser into centering the modal contents. -->
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                            <div 
                               x-transition:enter="transition ease-out duration-300" 
                               x-transition:enter-start="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                               x-transition:enter-end="transform opacity-100 translate-y-0 sm:scale-100" 
                               x-transition:leave="transition ease-in duration-200" 
                               x-transition:leave-start="transform opacity-100 translate-y-0 sm:scale-100" 
                               x-transition:leave-end="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg lg:max-w-3xl sm:w-full sm:p-6">
                              <div>
                               
                              <div class="">
                                  
                              <div class="flex items-start space-x-4">

                                <div class="min-w-0 flex-1">
                                  <div class="relative">
                                    <p class="text-md font-bold text-gray-500 mb-3">Tell viewers about your channel.</p>
                                    <div class="border border-gray-300 rounded-lg shadow-sm overflow-hidden focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">

                                      <label for="comment" class="sr-only">Add your comment</label>
                                      <textarea wire:model="channel_about" rows="3"  class="block w-full py-3 border-0 resize-none focus:ring-0 sm:text-sm" placeholder=""></textarea>

                                      <!-- Spacer element to match the height of the toolbar -->
                                      <div class="py-2" aria-hidden="true">
                                        <!-- Matches height of button in toolbar (1px border + 36px content height) -->
                                        <div class="py-px">
                                          <div class="h-9"></div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="absolute bottom-0 inset-x-0 pl-3 pr-2 py-2 flex justify-between">
                                      <div class="flex items-center space-x-5">
                                     
                                        
                                      </div>
                                      <div class="flex-shrink-0">
                                        <button wire:click="updateAbout({{$channel_list->id}})" class="bg-custom-pink text-white py-2 px-3 rounded-md">Save</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>



                                </div>


                              </div>

                            </div>
                          </div>
                        </div>


                        <!-- modal -->

                  </div>
                    <p class="text-gray-700">{{$channel_about}}</p>
                </div>

                <div x-show="openTab === 4">
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

                                        <input type="text" name="company-website" id="company-website" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-lg focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300" wire:model="channel_uniquelink" placeholder="Enter Text here">

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
                                    <button wire:click="createChannelLink({{$channel_list->id}})" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white">Update
                                    </button>
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
                                  <p class="text-gray-500 text-sm mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><br>
                                  
                                 <div class="">
                                     <div x-data="{ isUploading: false, progress: 0, success: false, error:false }" 
                                       x-on:livewire-upload-start="isUploading = true"
                                       x-on:livewire-upload-finish="isUploading = false,success = true" 
                                       x-on:livewire-upload-error="isUploading = false,error= true"
                                       x-on:livewire-upload-progress="progress = $event.detail.progress">

                                         <label for="desktop-user-photo" class="mt-5 inset-0 relative items-center justify-center text-sm font-bold text-custom-pink cursor-pointer hover:underline">
                                              <span>UPLOAD</span>
                                              <span class="sr-only"> user photo</span>
                                              <input type="file"class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md" wire:model="channel_photo">
                                          </label>

                                          <center>
                                           @error('channel_photo') <span class="text-center text-xs text-red-600">Required Image</span> @enderror
                                          </center>

                                          <div class="">
                                            <div x-show="isUploading"  class="relative pt-1">
                                              <!-- <div class="text-center text-gray-700">
                                                Please wait while uploading the file .. <input x-bind:value="`${progress}%`" disabled style="width: 60px;">
                                              </div> -->
                                              <div  class="overflow-hidden h-2 text-xs flex rounded bg-purple-200 progress">
                                                <div x-bind:style="`width:${progress}%`"
                                                  class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-custom-pink"
                                                ></div>
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
                                           <img class="w-48 h-48  rounded-full" src="{{ $channel_photo->temporaryUrl() }}" alt="">
                                          </center>
                                      </div>
                                     
                                   @else
                                      <div class="w-full h-48">
                                        <center>
                                          <img class="w-48 h-48  rounded-full" src="{{ $s3_cover_link }}" alt="">
                                         </center>
                                      </div>
                                  @endif
                              @else
                                  @if($channel_photo)
                                       <div class="w-full h-48">
                                        <img class="w-48 h-48  rounded-full" src="{{ $channel_photo->temporaryUrl() }}" alt="">
                                      </div>
                                   @else
                                       <div class="w-full bg-custom-pink h-48" >
                                          <img class="w-48 h-48  rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="">
                                      </div>
                                  @endif
                              @endif

                            </div>
                        </div>

                        <!--end cover-->

                        <!--start cover-->
                        <div class="col-span-10">
                            <div class="mt-4 p-5 flex bg-white rounded-md shadow-sm">
                              <div class="p-2">
                                  <h3 class="text-gray-900 font-bold text-md">Cover Photo</h3>
                                  <p class="text-gray-500 text-sm mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><br>
                                  
                                 <div class="">
                                     <div x-data="{ isUploading: false, progress: 0, success: false, error:false }" 
                                       x-on:livewire-upload-start="isUploading = true"
                                       x-on:livewire-upload-finish="isUploading = false,success = true" 
                                       x-on:livewire-upload-error="isUploading = false,error= true"
                                       x-on:livewire-upload-progress="progress = $event.detail.progress">

                                         <label for="desktop-user-photo" class="mt-5 inset-0 relative items-center justify-center text-sm font-bold text-custom-pink cursor-pointer hover:underline">
                                              <span>UPLOAD</span>
                                              <span class="sr-only"> user photo</span>
                                              <input type="file"class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md" wire:model="channel_cover">
                                          </label>

                                          <center>
                                           @error('channel_cover') <span class="text-center text-xs text-red-600">Required Image</span> @enderror
                                          </center>

                                          <div class="">
                                            <div x-show="isUploading"  class="relative pt-1">
                                              <!-- <div class="text-center text-gray-700">
                                                Please wait while uploading the file .. <input x-bind:value="`${progress}%`" disabled style="width: 60px;">
                                              </div> -->
                                              <div  class="overflow-hidden h-2 text-xs flex rounded bg-purple-200 progress">
                                                <div x-bind:style="`width:${progress}%`"
                                                  class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-custom-pink"
                                                ></div>
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
                                  @endif
                              @else
                                  @if($channel_cover)
                                       <div class="w-full bg-custom-pink h-48 bg-cover bg-center" style="background-image: url({{ $channel_cover->temporaryUrl() }});">
                                        &nbsp;
                                      </div>
                                   @else
                                       <div class="w-full bg-custom-pink h-48" >
                                         &nbsp;
                                      </div>
                                  @endif
                              @endif

                            </div>
                        </div>

                        <!--end cover-->

                      <section class="mt-5 col-span-10">
                          <div class="shadow-sm sm:rounded-md sm:overflow-hidden">
                            <div class="bg-white py-6 px-4 sm:p-6">
                              <h3 class="text-gray-900 font-bold text-md">Add Users</h3>
                              <p class="text-gray-500 text-sm mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><br> 
                              <input wire:model.debounce.300ms="search" wire:keydown.enter="get_search()" type="text" placeholder="Search" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md">
                              
                               @if($result)
                                @if($result->count() != 0 )
                                <div class="grid grid-cols-6 gap-4 sm:grid-cols-2 w-full mt-5">
                                     
                                          @foreach($result as $items)
                                            @if(Auth::user()->id != $items->id)
                                              <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <div class="flex-shrink-0">
                                                        @if($items->get_profilephoto->count() == 0)
                                                        <img class="h-10 w-10 rounded-full " src="{{ asset('images/default_user.jpg') }}" alt="">
                                                        @else
                                                            <?php $img_path = $items->get_profilephoto->first()->gallery_path; ?>
                                                            <?php $s3_profilelink = config('app.s3_public_link')."/users/profile_img/".$img_path; ?>
                                                            <?php $userviewprofile = $items->get_profilephoto->first()->gallery_path; ?>
                                                            <img class="h-10 w-10 rounded-full " src="{{$s3_profilelink}}" alt="">
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
                                                        <button  type="button" class="float-right inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-custom-pink">
                                                            Send Invitation
                                                       </button>
                                                    </div>
                                              </div>
                                              @endif
                                          @endforeach
                                 </div>

                                  @else
                                      <div class=" text-center">
                                          <h3 class="text-gray-900 font-bold text-md">User not found</h3>
                                          <p class="text-gray-500 text-sm mt-2">Try sending a invitation using the email address.</p>

                                          <div>
                                              <div class="mt-1">
                                                <input type="email" class="item-center w-1/4  pr-10  sm:text-sm rounded-md" placeholder="Enter your email" aria-invalid="true" aria-describedby="email-error">
                                                
                                         
                                              </div>
                                              <button  type="button" class="mt-2 items-center px-2.5 py-1.5 border border-transparent text-sm font-medium rounded shadow-sm text-white bg-custom-pink">
                                                      Send Invitation
                                                </button>
                                          </div> 
                                           
                                     </div>
                                     
                                 @endif
                                @endif



                               
   
                              
                            </div>
                          </div>
                      </section>

                    </div>
                </div>

                 <div x-show="openTab === 5">

                    <h3 class="text-gray-900 text-xl font-bold">Episodes</h3>
                    <!-- channel episodes -->
                    <div class="grid grid-cols-12 mt-5 gap-5">
                      @foreach($channel_episodes as $episode_items)
                        <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-6 xs:col-span-6 bg-white p-2 ">
                                  <article aria-labelledby="question-title-81614">
                                   <div>
                                      <div class="flex space-x-3">
                                        <div class="min-w-0 flex-1">
                                          <p class="text-md font-bold text-gray-900">
                                            <a href="#" class="hover:underline">{{ $episode_items->get_audio->audio_name }}
                                              @if($episode_items->get_audio->audio_publish != "Publish")
                                              <svg class="h-5 w-5 text-custom-pink float-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg></a>
                                              @endif
                                          </p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mt-2 text-sm text-gray-700 space-y-4">
                                        @if($episode_items->get_audio->get_thumbnail->count() == 0)
                                           <?php $s3_ep_thumbnail = "images/default_podcast.jpg"; ?>
                                        @else
                                          <?php $ep_img_path = $episode_items->get_audio->get_thumbnail->first()->gallery_path; ?>
                                          <?php $s3_ep_thumbnail = config('app.s3_public_link')."/users/podcast_img/".$ep_img_path; ?>
                                        @endif
                                        <div class="text-white bg-cover h-36" style="background-image: url(<?php echo $s3_ep_thumbnail; ?>);"></div>
                                        
                                    </div>

                                    <div>
                                      <div class="flex space-x-3">
                                        <div class="min-w-0 flex-1">                      
                                          <p class="text-xs text-gray-500 mt-2">
                                            <a class="hover:underline">
                                             
                                              <?php $date = date_create($episode_items->get_audio->created_at); ?>
                                              <time datetime="2020-12-09T11:43:00">{{ date_format($date,"M, Y") }}</time>  <span class="float-left">SE:{{ $episode_items->get_audio->audio_season }} | EP:{{ $episode_items->get_audio->audio_episode }}</span>
                                            </a>
                                          </p>
                                        <!--   <div class="text-xs font-bold text-gray-900 mt-5" x-data="{ open: false }"> -->
                                          <div class="text-xs font-bold text-gray-900 mt-5">
                                            
                                            <a href="{{ route('editorPodcastUpdate',['id' => $episode_items->get_audio->id]) }}"  class="hover:underline">Update</a>
                                            <a href="{{ route('editorPodcastDetails',['id' => $episode_items->get_audio->id]) }}" class="hover:underline float-right" >Details</a>

                                          </div>
                                        </div>
                                       
                                      </div>
                                    </div>

                                  </article>
                                </div>
                      @endforeach
                    </div>
                    <!-- channel episodes -->


                    @if($episodes->count() != 0)
                     <div class="grid grid-cols-12 mt-5 gap-5">
                      <!-- @foreach($episodes->get() as $episode)

                      <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-6 xs:col-span-6 bg-white p-2 ">
                                 
                                   <div>
                                      <div class="flex space-x-3">
                                        <div class="min-w-0 flex-1">
                                          <p class="text-md font-bold text-gray-900">
                                            <a href="#" class="hover:underline">{{ $episode->audio_name }}
                                              @if($episode->audio_publish != "Publish")
                                              <svg class="h-5 w-5 text-custom-pink float-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg></a>
                                              @endif
                                          </p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mt-2 text-sm text-gray-700 space-y-4">
                                        @if($episode->get_thumbnail->count() == 0)
                                           <?php $s3_ep_thumbnail = "images/default_podcast.jpg"; ?>
                                        @else
                                          <?php $ep_img_path = $episode->get_thumbnail->first()->gallery_path; ?>
                                          <?php $s3_ep_thumbnail = config('app.s3_public_link')."/users/podcast_img/".$ep_img_path; ?>
                                        @endif
                                        <div class="text-white bg-cover h-36" style="background-image: url(<?php echo $s3_ep_thumbnail; ?>);"></div>
                                        
                                    </div>

                                    <div>
                                      <div class="flex space-x-3">
                                        <div class="min-w-0 flex-1">                      
                                          <p class="text-xs text-gray-500 mt-2">
                                            <a class="hover:underline">
                                             
                                              <?php $date = date_create($episode->created_at); ?>
                                              <time datetime="2020-12-09T11:43:00">{{ date_format($date,"M, Y") }}</time>  <span class="float-left">SE:{{ $episode->audio_season }} | EP:{{ $episode->audio_episode }}</span>
                                            </a>
                                          </p>
                                       
                                          <div class="text-xs font-bold text-gray-900 mt-5">
                                            
                                            <a href="{{ route('editorPodcastUpdate',['id' => $episode->id]) }}"  class="hover:underline">Update</a>
                                            <a href="{{ route('editorPodcastDetails',['id' => $episode->id]) }}" class="hover:underline float-right" >Details</a>

                                          </div>
                                        </div>
                                       
                                      </div>
                                    </div>
                        </div>

                      @endforeach -->
                    </div>
                    @else
                    <center>
                      <h3 class="text-gray-900 text-xl font-bold">No Episodes Found</h3>
                    </center>
                    
                    @endif

                </div>


                 <div x-show="openTab === 6">
                    @if(Auth::user()->get_audio->count() != 0)
                    <div class="grid grid-cols-12 mt-5 gap-5">
                      @foreach($categoryList->get() as $category)
                          @if($category->getAudioById(Auth::user()->id)->count() != 0 )
                         <div class="col-span-12 bg-white p-2">
                             <h2 id="{{ $category->category_name }}-{{ $category->id }}" >{{ $category->category_name }}</h2>
                         </div>

                              @foreach($category->getAudioById(Auth::user()->id)->get() as $audioData)

                                <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-6 xs:col-span-6 bg-white p-2 ">
                                  <article aria-labelledby="question-title-81614">
                                   <div>
                                      <div class="flex space-x-3">
                                        <div class="min-w-0 flex-1">
                                          <p class="text-md font-bold text-gray-900">
                                            <a href="#" class="hover:underline">{{ $audioData->audio_name }}
                                              @if($audioData->audio_publish != "Publish")
                                              <svg class="h-5 w-5 text-custom-pink float-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg></a>
                                              @endif
                                          </p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mt-2 text-sm text-gray-700 space-y-4">
                                        @if($audioData->get_thumbnail->count() == 0)
                                           <?php $s3_thumbnail = "images/default_podcast.jpg"; ?>
                                        @else
                                          <?php $img_path = $audioData->get_thumbnail->first()->gallery_path; ?>
                                          <?php $s3_thumbnail = config('app.s3_public_link')."/users/podcast_img/".$img_path; ?>
                                        @endif
                                        <div class="text-white bg-cover h-36" style="background-image: url(<?php echo $s3_thumbnail; ?>);"></div>
                                        
                                    </div>

                                    <div>
                                      <div class="flex space-x-3">
                                        <div class="min-w-0 flex-1">                      
                                          <p class="text-xs text-gray-500 mt-2">
                                            <a class="hover:underline">
                                             
                                              <?php $date = date_create($audioData->created_at); ?>
                                              <time datetime="2020-12-09T11:43:00">{{ date_format($date,"M, Y") }}</time>  <span class="float-left">SE:{{ $audioData->audio_season }} | EP:{{ $audioData->audio_episode }}</span>
                                            </a>
                                          </p>
                                        <!--   <div class="text-xs font-bold text-gray-900 mt-5" x-data="{ open: false }"> -->
                                          <div class="text-xs font-bold text-gray-900 mt-5">
                                            
                                            <a href="{{ route('editorPodcastUpdate',['id' => $audioData->id]) }}"  class="hover:underline">Update</a>
                                            <a href="{{ route('editorPodcastDetails',['id' => $audioData->id]) }}" class="hover:underline float-right" >Details</a>

                                          </div>
                                        </div>
                                       
                                      </div>
                                    </div>

                                  </article>
                                </div>

                              @endforeach





                         @endif




                       @endforeach
                    </div>
                    @endif
                </div>


              </div>
            </div>








         </section>



            @endif
              
         </div> 
          
         


          <!-- This example requires Tailwind CSS v2.0+ -->
           



          
            <!-- More questions... -->
          
        </div>
      </main>
      <!-- aside -->
    
      <!-- aside -->
    </div>
  </div>
</div>





















        </div>
</div>