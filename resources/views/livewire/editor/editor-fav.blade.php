<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Favorites') }}
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
    @if(Auth::user()->get_plan->check_features('s2')->count() != 0 )
    <div class="mt-4">
      <!-- <div class="mb-5 w-full ">
           <h1 class="font-bold text-gray-800 text-xl">Overview</h1> 
      </div> -->

       <div class="w-full ">
           <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
      </div>
      
      <!-- This example requires Tailwind CSS v2.0+ -->
        <div class=" w-full ">
            <h1 class="font-bold text-gray-800 text-xl">Favorites</h1> 
        </div> 


            <div class="mt-5 grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mb-5">
                @foreach($favList as $fav)
                <div class="xl:col-span-1 lg:col-span-6 md:col-span-6 sm:col-span-6 xs:col-span-6 bg-white p-2 rounded-lg shadow-sm">
                    <div>
                        <div class="flex space-x-3">
                            <div class="min-w-0 flex-1 flex justify-between">
                                <p class="text-md font-bold text-gray-900 truncate">
                                    <a href="#" class="hover:underline">
                                        <span class=""> {{ $fav->get_audio->audio_name }}</span>
                                    </a>
                                </p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 text-sm text-gray-700 space-y-4">
                        <a href="{{ route('editorPodcastView',['id' => $fav->get_audio->id ]) }}">
                         <div class="text-white bg-cover h-36" style="background-image: url(http://127.0.0.1:8000/images/default_podcast.jpg);"></div>
                        </a>
                    </div>

                    <div>
                        <div class="flex space-x-3">
                            <div class="min-w-0 flex-1">
                                <p class="text-xs text-gray-500 mt-2">
                                    <a class="hover:underline">
                                        <span class="float-left">SE : {{ $fav->get_audio->audio_season }} | EP : {{ $fav->get_audio->audio_episode }}</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>



        <!-- More questions... -->
      
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