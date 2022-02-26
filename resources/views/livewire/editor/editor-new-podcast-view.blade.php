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
                <!-- HEADER -->
                @include('layouts.editor.header')
                <!-- HEADER -->
                <div class="py-10">
                    <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
                        <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
                            <!-- sidebar -->
                            @include('layouts.editor.sidebar')
                            <!-- sidebar -->
                        </div>
                        <main class="xl:col-span-10 lg:col-span-9">
                            <div class="w-full">
                                <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
                            </div>

                            <div class="mt-4">
                                <div class="w-full xl:p-0 lg:p-0 md:p-0 sm:p-0 xs:p-0">
                                    <div class="w-full">
                                        <div class="grid grid-cols-1 gap-4">
                                            <div class="relative w-full flex items-center space-x-3 hover:border-gray-400 ">
                                                <div class="flex-shrink-0  w-44 h-44 ">
                                                    <?php $podcast_imgpath = $podcast->get_channel_photo->gallery_path ?>
                                                    <?php $podcast_s3_link = config('app.s3_public_link')."/users/podcast_img/".$podcast_imgpath; ?>
                                                    <img class="h-full w-full rounded-lg" src="{{ $podcast_s3_link }}" alt="image" />
                                                    
                                                </div>
                                                <div class="flex-1 min-w-0">
                                        
                                                        <!--  <span class="absolute inset-0" aria-hidden="true"></span> -->
                                                        <p class="text-5xl font-bold text-gray-900 mt-5">
                                                            {{$podcast->podcast_title}}
                                                        </p>
                                                         <p class="text-xl font-bold text-gray-900 mt-5">
                                                            {{$podcast->get_channel->channel_name}}
                                                        </p>
                                                        <p class="text-md text-gray-500 inline-grid">
                                                           @if($podcast->podcast_description == null)
                                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at risus facilisis, dapibus ex nec, porta massa. Duis quis massa vitae nisl gravida laoreet. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                                                           @else
                                                            {{$podcast->podcast_description}}
                                                           @endif
                                                           <div class="mt-4">
                                                                @foreach ($podcast->get_categories()->get() as $category)
                                                                    @if($category->pc_typestatus == 'active')
                                                                        <span class="inline-flex items-center px-3 py-0.5 rounded-full 
                                                                        text-sm font-medium bg-custom-pink text-white">
                                                                            {{ $category->get_category->category_name }}
                                                                        </span>
                                                                    @endif
                                                          
                                                                @endforeach
                                                              
                                                            </div>
                                                        
                                                        </p>
                                                  
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
                                            <div class="border-b border-gray-200 ">
                                                <ul class="-mb-px flex ">
                                                    <li @click="openTab = 1" :class="openTab === 1 ? activeClasses : inactiveClasses" class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                                                        <a>Home</a>
                                                    </li>
                                                    <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses" class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                                                        <a>Episodes</a>
                                                    </li>
                                                    <li @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses" class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                                                        <a>Settings</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="w-full pt-4">
                                                <div x-show="openTab === 1">
                                                    @include('livewire.editor.podcasts.tabs.home')
                                                </div>
                                                <div x-show="openTab === 2">
                                                    @include('livewire.editor.podcasts.tabs.episodes')
                                                </div>
                                                <div x-show="openTab === 3">
                                                    @include('livewire.editor.podcasts.tabs.settings')
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
</div>
