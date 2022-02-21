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

                          <div class="mt-5 sm:mt-6 flex justify-between space-x-3">
                            {{-- <button @click="modal = !modal" type="button" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white ">
                            Cancel
                            </button>
                            <button wire:click="createChannel()" type="button" class="inline-flex justify-center  rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white ">
                             Create Channel
                            </button> --}}

                            <a @click="modal = !modal" type="button" class="text-custom-pink hover:underline mt-3">
                              Cancel
                          </a>
                          <button wire:click="createChannel()" type="button" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white">
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
                  <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                    <a>Channels</a>
                  </li>
                   <li @click="openTab = 5" :class="openTab === 5 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                    <a>Podcasts</a>
                  </li>
                  <li @click="openTab = 7" :class="openTab === 7 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                    <a>Episodes</a>
                  </li>
                   <li @click="openTab = 6" :class="openTab === 6 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                    <a>Playlist</a>
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
                   @include('livewire.editor.channels.tabs.popular')
                </div>
                <div x-show="openTab === 2">
                    @include('livewire.editor.channels.tabs.channel')
                </div>
                <div x-show="openTab === 3">
                    @include('livewire.editor.channels.tabs.about')
                </div>
                <div x-show="openTab === 4">
                     @include('livewire.editor.channels.tabs.settings')
                </div>
                <div x-show="openTab === 5">
                    @include('livewire.editor.channels.tabs.podcast')
                </div>
                <div x-show="openTab === 6">
                    @include('livewire.editor.channels.tabs.playlist') 
                </div>
                <div x-show="openTab === 7">
                     @include('livewire.editor.channels.tabs.episode') 
                  
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