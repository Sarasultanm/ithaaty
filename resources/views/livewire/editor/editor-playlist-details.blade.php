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
        <!-- playlist -->
        @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
          @include('layouts.editor.page-404') 
        @else
        @if(Auth::user()->get_plan->check_features('s4')->count() != 0 )
          <div class="w-full pt-4">

          	     <div class="w-full ">
	          	 <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
	          </div>


               <div class="grid gap-4 xl:grid-cols-10 lg:grid-cols-10 md:grid-cols-10">

                  <div class="xl:col-span-7 sm:col-span-12">
                    <div class=" w-full ">
                         <h1 class="font-bold text-gray-800 text-xl">My Playlist</h1> 
                    </div> 
                    <div x-data="{
                      openTab: 10,
                      activeClasses: 'border-custom-pink text-custom-pink',
                      inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
                    }" 
                    class="">


                    <div class="border-b border-gray-200 mb-5">
                    <ul class="-mb-px flex" >
                      <li @click="openTab = 10"  :class="openTab === 10 ? activeClasses : inactiveClasses"   class="w-1/2 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
                        <a  >Public</a>
                      </li>
                      <li @click="openTab = 20" :class="openTab === 20 ? activeClasses : inactiveClasses"  class="w-1/2 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                        <a  >Private</a>
                      </li>
                       <li @click="openTab = 30" :class="openTab === 30 ? activeClasses : inactiveClasses"  class="w-1/2 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                        <a  >Shared Playlist</a>
                      </li>
                    </ul>
                  </div>

                   <div x-show="openTab === 10">
                     <div class="grid gap-4 xl:grid-cols-9 md:grid-cols-6 sm:grid-cols-6">
                        @foreach($playlist->get() as $plist)
                          @if($plist->playlist_status == "Public")
                          
                              <div class="xl:col-span-3 md:col-span-2 sm:col-span-2 bg-white p-2 ">
                                 <a href="{{ route('editorPlaylist',['id' => $plist->id ]) }}" class="pointer">
                                  <div class="mt-2 text-sm text-gray-700 space-y-4">
                                     <div class="text-white bg-cover h-36">
                                        <?php  $defaul_img = 'slide'.rand(1,10).'.jpg'; ?>
                                        <img class="h-full mx-auto my-0" src="{{ asset('images/slider-img/'.$defaul_img) }}" alt="">        
                                     </div>  
                                  </div>
                                  <div>
                                    <div class="flex space-x-3">
                                      <div class="min-w-0 flex-1">
                                        <p class="text-md font-bold text-gray-900 mt-2">
                                         {{ $plist->playlist_title }}
                                        </p>
                                        <p class="text-xs text-gray-500">
                                          <a class="hover:underline">
                                           {{ $plist->playlist_status }} <span class="float-right">{{  $plist->get_playlistItems->count() }}</span>
                                          </a>
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                  </a>
                              </div>
                            
                          @endif
                        @endforeach
                     </div>
                    </div>

                    <div x-show="openTab === 20">
                       <div class="grid gap-4 grid-cols-9">
                  
                        @foreach($playlist->get() as $plist)
                          @if($plist->playlist_status == "Private")
                          <div class="col-span-3 bg-white p-2 ">
                            <a href="{{ route('editorPlaylist',['id' => $plist->id ]) }}" class="pointer">
                              <div class="mt-2 text-sm text-gray-700 space-y-4">
                                 <div class="text-white bg-cover h-36">
                                  <?php  $defaul_img = 'slide'.rand(1,10).'.jpg'; ?>
                                        <img class="h-full mx-auto my-0" src="{{ asset('images/slider-img/'.$defaul_img) }}" alt=""> 
                                    
                                 </div>  
                              </div>
                              <div>
                                <div class="flex space-x-3">
                                  <div class="min-w-0 flex-1">
                                    <p class="text-md font-bold text-gray-900 mt-2">
                                     {{ $plist->playlist_title }}
                                    </p>
                                    <p class="text-xs text-gray-500">
                                      <a class="hover:underline">
                                       {{ $plist->playlist_status }} <span class="float-right">1</span>
                                      </a>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </a>
                          </div>
                          @endif
                        @endforeach
                 
                     </div>
                    </div>

                    <div x-show="openTab === 30">
                       <div class="grid gap-4 grid-cols-9">
                  
                        @foreach($sharedplaylist->get() as $sharedplist)
                          @if($sharedplist->plshared_status == "active")
                          <div class="col-span-3 bg-white p-2 ">
                            <a href="{{ route('editorPlaylist',['id' => $sharedplist->plshared_playlistid ]) }}" class="pointer">
                              <div class="mt-2 text-sm text-gray-700 space-y-4">
                                 <div class="text-white bg-cover h-36">
                                  <?php  $defaul_img = 'slide'.rand(1,10).'.jpg'; ?>
                                        <img class="h-full mx-auto my-0" src="{{ asset('images/slider-img/'.$defaul_img) }}" alt=""> 
                                    
                                 </div>  
                              </div>
                              <div>
                                <div class="flex space-x-3">
                                  <div class="min-w-0 flex-1">
                                    <p class="text-md font-bold text-gray-900 mt-2">
                                     {{ $sharedplist->get_playlist()->first()->playlist_title }}
                                    </p>
                                    <p class="text-xs text-gray-500">
                                      <a class="hover:underline">
                                       {{ $sharedplist->get_playlist()->first()->playlist_status }} <span class="float-right">1</span>
                                      </a>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </a>
                          </div>
                          @endif
                        @endforeach
                 
                     </div>
                    </div>



                  </div>






                  </div>


                  <div class="xl:col-span-3 sm:col-span-12">
                   
                        <div class=" bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">
                          <div class="pb-5">
                              <h3 class="font-bold text-gray-900">Create a Playlist</h3>
                              <div class="mt-1">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Title</label>
                                    <div class="mt-1">
                                      <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"  wire:model="playlist_title">

                                    </div>
                                    @error('playlist_title') <span class="text-xs text-red-600">Empty fields</span> @enderror
                              </div>
                              <div class="mt-1">
                                <label for="email" class="block text-sm font-medium text-gray-700">Status</label>
                                          <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="playlist_status">
                                            <option>Select</option>
                                            <option value="Public">Public</option>
                                            <option value="Private">Private</option>
                                     </select> 
                                      @error('playlist_status') <span class="text-xs text-red-600">Select status</span> @enderror

                              </div>
                               <button wire:click="createPlaylist()" class="bg-custom-pink w-full block text-center px-2 py-2 border border-gray-300 shadow-sm text-sm font-bold text-white mt-2">Save</button>
                          </div>
                        </div>
                     
                  </div>

               </div>

          
          
          </div>
          @else
          @include('layouts.editor.page-404')

          <!-- playlist -->
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






