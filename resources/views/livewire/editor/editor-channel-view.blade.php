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
          
                  <?php $cover_photo = $channel->get_channel_cover->gallery_path ?>
                  <?php $s3_cover_photo = config('app.s3_public_link')."/users/channel_cover/".$cover_photo; ?>
                    <div class="w-full h-48  bg-custom-pink bg-cover bg-center" style="background-image: url({{ $s3_cover_photo }});">
                        &nbsp;
                    </div>
                
            <div class="w-full">
               

                <div class="grid grid-cols-1 gap-4 ">
                  <div class="relative w-full flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 ">
                    <div class="flex-shrink-0">

                        <?php $logo_photo = $channel->get_channel_photo->gallery_path; ?>
                        <?php $s3_logo_photo = config('app.s3_public_link')."/users/channe_img/".$logo_photo; ?>
                        <img class="mt-5 ml-5 w-24 h-24  rounded-full" src="{{ $s3_logo_photo }}" alt=""> 
                      
                    </div>
                    <div class="flex-1 min-w-0">
                      <a >
                       <!--  <span class="absolute inset-0" aria-hidden="true"></span> -->
                        <p class="text-xl font-bold text-gray-900 mt-5">
                          {{$channel->channel_name}}
                        </p>
                        <p class="text-md text-gray-500 truncate">
                          {{ $channel->get_subs()->count() }}  subcribers   
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
                   {{-- <li @click="openTab = 6" :class="openTab === 6 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                    <a>Playlist</a>
                  </li> --}}
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
                
                <div x-show="openTab === 4">
                  <!-- tab 4 -->
                    @include('livewire.editor.channel-view.tabs.settings')
                  <!-- tab 4 -->
                </div>

                <div x-show="openTab === 1">
                  <!-- tab 1 -->
                   @include('livewire.editor.channel-view.tabs.home')
                  <!-- tab 1 -->
                </div>

                <div x-show="openTab === 2">
                  <!-- tab 2 -->
                    @include('livewire.editor.channel-view.tabs.channels')
                 <!-- tab 2 -->
                </div>

                <div x-show="openTab === 3">
                  <!-- tab 3 -->
                  @include('livewire.editor.channel-view.tabs.about')
                  <!-- tab 3 -->
                </div>

                <div x-show="openTab === 5">
                  <!-- tab 5 -->
                  @include('livewire.editor.channel-view.tabs.podcast')
                  <!-- tab 5 -->
                </div>


                <div x-show="openTab === 6">
                  <!-- tab 6 -->
                  @include('livewire.editor.channel-view.tabs.playlist')
                  <!-- tab 6 -->
                </div>


              </div>
            </div>








         </section>



        
              
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