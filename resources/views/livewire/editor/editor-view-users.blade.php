 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Users Dashboard') }}
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
        @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
          @include('layouts.editor.page-404')
        @else
        @if(Auth::user()->get_plan->check_features('s3')->count() != 0 )

        <!-- cover & profile -->
        @if($userInfo->get_coverphoto->count() == 0)
        <div class="mt-4 p-5  bg-cover"  style="background-image:url('{{ asset('images/audio-bg.jpg') }}')">
        @else
         <?php $img_path = $userInfo->get_coverphoto->first()->gallery_path; ?>
         <?php $s3_coverlink = config('app.s3_public_link')."/users/cover_img/".$img_path; ?>
        <div class="mt-4 p-5  bg-cover"  style="background-image:url('{{ $s3_coverlink }}')">
        @endif 
          <div class="grid gap-4 grid-cols-10">
            <div class="col-span-2 bg-white p-2 ">
                <div class="mt-2 text-sm text-gray-700 space-y-4">
                   <div class="text-white bg-cover h-36">
                        @if($userInfo->get_profilephoto->count() == 0)
                          <img class="h-full mx-auto my-0 " src="{{ asset('images/default_user.jpg') }}" alt="">
                        @else
                          <?php $img_path = $userInfo->get_profilephoto->first()->gallery_path; ?>
                          <?php $s3_profilelink = config('app.s3_public_link')."/users/profile_img/".$img_path; ?>
                          <?php $userviewprofile = $userInfo->get_profilephoto->first()->gallery_path; ?>
                          <img class="h-full mx-auto my-0 " src="{{$s3_profilelink}}" alt="">
                        @endif   
                   </div>
                </div>
                <div>
                  <div class="flex space-x-3">
                    <div class="min-w-0 flex-1">
                      <p class="text-md font-bold text-gray-900 mt-2">
                        <a href="#" class="hover:underline">{{ $userInfo->name }}</a>
                      </p>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-span-8 relative">
              @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
              @else
              @if(Auth::user()->get_plan->check_features('s3')->count() != 0 )
                <!-- follow&fried button -->
                  @if(Auth::user()->id != $userInfo->id )

                    <div class="mt-3 text-right sm:mt-5 absolute bottom-0 right-0">
                           @if($checkFriend)
                              @if($checkFriend == "Add Friend")
                                <button wire:click="addFriend({{$userInfo->id}})" class=" inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Add Friend
                                 </button> 

                              @elseif($checkFriend == "Send Request")
                              <button  class=" inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Send Request
                              </button> 

                              @elseif($checkFriend == "Confirm Request")

                               <button wire:click="confirmFriend({{$userInfo->id}})" class=" inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Confirm Request
                              </button> 

                               @elseif($checkFriend == "Friends")

                               <button class=" inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Friend
                               </button> 

                              @endif

                              
                            @endif
                        
                        
                          <button class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">
                         @if($checkFollowing)
                                {{ $checkFollowing }}
                         @endif
                          </button>
                   </div>

                  @endif
                   <!-- follow&fried button -->
                  @endif
                  @endif

                  @if(Auth::user()->id == $userInfo->id )
                  <!-- This example requires Tailwind CSS v2.0+ -->
                    <div x-cloak x-cloak  x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false" class="relative inline-block text-left float-right">
                      <div>
                        <button @click="open = !open" type="button" class=" rounded-full flex items-center text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
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
                      class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">

                          <div x-data="{modal: false}" class="py-1" role="none">
                              <a  @click="modal = !modal" class="cursor-pointer text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0 hover:bg-gray-100 hover:text-gray-900">Update Profile Photo</a>

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
                                       
                                        <div class="mt-3  sm:mt-5">
                                          <!-- friends -->
                                          <div class="mt-5">
                                             <div x-data="{ isUploading: false, progress: 0, success: false, error:false }" 
                                               x-on:livewire-upload-start="isUploading = true"
                                               x-on:livewire-upload-finish="isUploading = false,success = true" 
                                               x-on:livewire-upload-error="isUploading = false,error= true"
                                               x-on:livewire-upload-progress="progress = $event.detail.progress">

                                                  <label for="email" class="block text-sm font-medium text-gray-700">Upload Profile Photo</label>
                                                  <div class="mt-1">
                                                    <input type="file"  class="" wire:model="user_profilephoto">
                                                  </div>

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
                                         
                                          <!-- friends-->

                                        </div>
                                      </div>
                                      <div class="mt-5 sm:mt-6">
                                        <button wire:click="saveProfilePhoto()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white ">
                                         Update Profile Photo
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                              <!--modal-->

                          </div>

                          <div x-data="{modal: false}" class="py-1" role="none">
                            <a  @click="modal = !modal" class="cursor-pointer text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1 hover:bg-gray-100 hover:text-gray-900">Update Cover Photo</a>

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
                                       
                                        <div class="mt-3  sm:mt-5">
                                          <!-- friends -->
                                          <div class="mt-5">
                                             <div x-data="{ isUploading: false, progress: 0, success: false, error:false }" 
                                               x-on:livewire-upload-start="isUploading = true"
                                               x-on:livewire-upload-finish="isUploading = false,success = true" 
                                               x-on:livewire-upload-error="isUploading = false,error= true"
                                               x-on:livewire-upload-progress="progress = $event.detail.progress">

                                                  <label for="email" class="block text-sm font-medium text-gray-700">Upload Cover Photo</label>
                                                  <div class="mt-1">
                                                    <input type="file"  class="" wire:model="user_coverphoto">
                                                  </div>

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
                                         
                                          <!-- friends-->

                                        </div>
                                      </div>
                                      <div class="mt-5 sm:mt-6">
                                        <button wire:click="saveCoverPhoto()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white ">
                                         Update Cover Photo
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                              <!--modal-->


                          </div>

                        </div>
                      </div>
                    </div>
                    @endif
              </div>
              </div>


        </div>
         <!-- cover & profile -->



        <div x-data="{
			      openTab: 1,
			      activeClasses: 'border-custom-pink text-custom-pink',
			      inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
			    }" 
			    class="">
  			   <div class="border-b border-gray-200">
    			  	<ul class="-mb-px flex" >
    			      <li @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
    			        <a  >Post</a>
    			      </li>
    			      <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
    			        <a  >Friends</a>
    			      </li>
                 <li @click="openTab = 3"  :class="openTab === 3 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
                  <a >Following</a>
                </li>
                <li @click="openTab = 4"  :class="openTab === 4 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
                  <a >Playlist</a>
                </li>
                <li @click="openTab = 5"  :class="openTab === 5 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
                  <a >Channel</a>
                </li>
    			    </ul>
  			   </div>
          <div class="grid gap-4 grid-cols-10">
            <!-- content tabs -->
            <div class="col-span-7">
              
                <!-- start of w-full -->
                <div class="w-full pt-4">
                  <div x-show="openTab === 1">
                     <!-- tab 1 -->
                    @include('livewire.editor.view-user.tabs.post')
                     <!-- tab 1 -->
                  </div>

                  <div x-show="openTab === 2">
                    <!-- tab 2 -->
                     @include('livewire.editor.view-user.tabs.friends')
                    <!-- tab 2 -->
                  </div>

                  <div x-show="openTab === 3">
                    <!-- tab 3 -->
                    @include('livewire.editor.view-user.tabs.following')
                     <!-- tab 3 -->
                  </div>

                  <div x-show="openTab === 4">
                    <!-- tab 4 -->
                    @include('livewire.editor.view-user.tabs.playlist')
                      
                       <!-- tab 4 -->
                  </div>
                
                </div>
                <!-- end of w-full -->
            </div>
            <!-- content tabs -->

            <!-- sidebar info -->
            <div class="col-span-3">
              <!-- sidebar -->
              @include('livewire.editor.view-user.sidebar')
           
            <!-- sidebar -->  
            </div>
            <!-- sidebar info -->
          </div>
           

        </div>

         @else
         
         @include('layouts.editor.page-404')


         @endif
         @endif
      </main>
      <!-- aside -->
    
      <!-- aside -->
    </div>
  </div>
</div>





















        </div>
</div>






