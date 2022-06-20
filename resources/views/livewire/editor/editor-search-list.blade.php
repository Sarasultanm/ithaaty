<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Overview') }}
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
    <!-- following -->
    <div class="mt-4">
      <!-- <div class="w-full mb-5 ">
           <h1 class="text-xl font-bold text-gray-800">Overview</h1> 
      </div> -->

       <div class="w-full ">
           <x-auth-session-status-custom class="mt-4 mb-4" :status="session('status')" />
      </div>
      
      <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="w-full ">
            <h1 class="text-xl font-bold text-gray-800">Result List</h1> 
        </div> 
        <div class=" mt-5">
            <div class="">
                <div 
                    x-data="{
                    openTab: 1,
                    activeClasses: 'border-custom-pink text-custom-pink',
                    inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
                    }" 
                    class=""
                > 
                
                        <div class="border-b border-gray-200">
                            <ul class="flex -mb-px" >
                            <li @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses"   class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer" >
                                <a>Users</a>
                            </li>
                            <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer">
                                <a>Channels</a>
                            </li>
                            <li @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer">
                                <a>Podcasts</a>
                            </li>
                            <li @click="openTab = 4" :class="openTab === 4 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer">
                                <a>Episodes</a>
                            </li>
                            </ul>
                        </div>

                        <div class="w-full pt-4">
                        
                            <div x-show="openTab === 1">
                                @include('livewire.editor.search-list.user-list')
                            </div>
                            <div x-show="openTab === 2">
                                @include('livewire.editor.search-list.channel-list')
                            </div>
                            <div x-show="openTab === 3">
                                @include('livewire.editor.search-list.podcast-list')
                            </div>
                            <div x-show="openTab === 4">
                                @include('livewire.editor.search-list.episode-list')
                            </div>
 
                        
                          </div>


                </div>


          </div>

            <!-- This example requires Tailwind CSS v2.0+ -->
        



            <!-- </div> -->

        </div>

      
        <!-- More questions... -->

    </div>
    <!-- following -->
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