<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Collaborators Channel') }}
    </h2>
</x-slot>

<div class="">
    <div class="">
        <div class="min-h-screen bg-gray-100">
          
            @include('layouts.collaborators.header')

            <div class="py-10">
                <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
                    <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
                        <!-- sidebar -->
                        @include('layouts.collaborators.sidebar')
                        <!-- sidebar -->
                    </div>
                    <main class="xl:col-span-10 lg:col-span-9">
                        <div class="mt-4">
                            <div class="w-full">
                                <x-auth-session-status-custom class="mt-4 mb-4" :status="session('status')" />
                            </div>

                            <!-- content -->
                            @php
                              $cover_photo = $channel->get_channel_cover->gallery_path;
                              $s3_cover_photo = config('app.s3_public_link')."/users/channel_cover/".$cover_photo; 
                            @endphp
                            <div class="w-full h-48 bg-center bg-cover bg-custom-pink" style="background-image: url({{ $s3_cover_photo }});">
                                &nbsp;
                            </div>

                            
                            <div class="w-full">
                                <div class="grid grid-cols-1 gap-4 ">
                                  <div class="relative flex items-center w-full space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 ">
                                    <div class="flex-shrink-0">
                                      @php
                                        $logo_photo = $channel->get_channel_photo->gallery_path;
                                        $s3_logo_photo = config('app.s3_public_link')."/users/channe_img/".$logo_photo;
                                      @endphp
                                      <img class="w-24 h-24 mt-5 ml-5 rounded-full" src="{{ $s3_logo_photo }}" alt=""> 
                                    </div>
                                    <div class="flex-1 min-w-0">
                                      <a >
                                       <!--  <span class="absolute inset-0" aria-hidden="true"></span> -->
                                        <p class="mt-5 text-xl font-bold text-gray-900">
                                        {{ $channel->channel_name }}
                                        </p>
                                        <p class="text-gray-500 truncate text-md">
                                          {{ $channel->get_subs->count() }}  subcribers
                                          
                                        </p>
                                      </a>
                                    </div>
                                  </div>
                
                                  <!-- More people... -->
                                </div>
                
                
                            </div>

                            <section class="w-full mt-5">

                              <div x-data="{
                                      openTab: 2,
                                      activeClasses: 'border-custom-pink text-custom-pink',
                                      inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
                                    }" 
                                    class="">
              
                                    <div class="border-b border-gray-200">
                                      <ul class="flex -mb-px" >
                                        <li @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses"   class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer" >
                                          <a>Home</a>
                                        </li>
                                         <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer">
                                          <a>Podcast</a>
                                        </li>
                                         <li @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer">
                                          <a>About</a>
                                        </li>
                                         <li @click="openTab = 4" :class="openTab === 4 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer">
                                          <a>Settings</a>
                                        </li>
                                      
                      
                                      </ul>
                                    </div>

                                    <div class="w-full pt-4">
                
                                        <div x-show="openTab === 1">
                                          <!-- tab 1 -->
                                           @include('livewire.collaborators.channel.tabs.home')
                                          <!-- tab 1 -->
                                        </div>
                                        
                                        <div x-show="openTab === 2">
                                            <!-- tab 2-->
                                             @include('livewire.collaborators.channel.tabs.podcast')
                                            <!-- tab 2 -->
                                        </div>

                                        <div x-show="openTab === 3">
                                            <!-- tab 2-->
                                             @include('livewire.collaborators.channel.tabs.about')
                                            <!-- tab 2 -->
                                        </div>

                                        <div x-show="openTab === 4">
                                            <!-- tab 2-->
                                             @include('livewire.collaborators.channel.tabs.settings')
                                            <!-- tab 2 -->
                                        </div>


                        
                                      </div>


                              </div>

                            </section>








                            <!-- content -->















                        </div>
                    </main>
                    <!-- aside -->

                    <!-- aside -->
                </div>
            </div>
        </div>
    </div>
</div>
