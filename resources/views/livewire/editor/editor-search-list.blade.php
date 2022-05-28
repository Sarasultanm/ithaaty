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
        <div class="grid grid-cols-12 gap-5 mt-5">
            <div class="col-span-12">
                <div class="w-full pt-4">

                    <div class="relative flex justify-between p-2 mb-5 space-x-3 rounded-md shadow-md">

                        <div class="bg-center bg-cover rounded-lg w-28 h-28" style="background-image:url(http://s3.ap-southeast-1.amazonaws.com/ithaaty-local-new-file/users/podcast_img/Kl1cTnOXbErag3Who2R3x0ZFDDkFBoeZPGB0q1RT.png)">
                        </div>

                        <div class="flex-1 min-w-0">
                            <p class="text-xl font-bold text-gray-900"> Episode Name</p>
                            <p class="mt-0 text-sm text-gray-500 truncate">Episode 1 Season 2</p>
                            <p class="mt-2 text-xs text-gray-500 truncate">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris at porttitor elit, ut pulvinar ante. Morbi porta, sem nec porta rhoncus, risus dui cursus metus, in efficitur eros dolor eget est. Cras efficitur leo
                            </p>
                        </div>
                        <div class="inline-flex flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">
                            {{-- <p class="text-sm text-gray-500">
                                <a href="#" class="flex hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="float-left w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </a>
                            </p> --}}
                        </div>
                        <a href="http://127.0.0.1:8000/editor/podcast/view/49" class="absolute inset-0 cursor-pointer" aria-hidden="true"></a>
                    </div>
                    

                    
                    <div class="relative flex justify-between p-2 mb-5 space-x-3 rounded-md shadow-md">

                        <div class="bg-center bg-cover rounded-lg w-28 h-28" style="background-image:url(http://s3.ap-southeast-1.amazonaws.com/ithaaty-local-new-file/users/podcast_img/Kl1cTnOXbErag3Who2R3x0ZFDDkFBoeZPGB0q1RT.png)">
                        </div>

                        <div class="flex-1 min-w-0">
                            <p class="text-xl font-bold text-gray-900"> Channel name</p>
                            <p class="mt-0 text-sm text-gray-500 truncate">0 Subribers</p>
                            <p class="mt-2 text-xs text-gray-500 truncate">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris at porttitor elit, ut pulvinar ante. Morbi porta, sem nec porta rhoncus, risus dui cursus metus, in efficitur eros dolor eget est. Cras efficitur leo
                            </p>
                        </div>
                        <div class="inline-flex flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">
                            {{-- <p class="text-sm text-gray-500">
                                <a href="#" class="flex hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="float-left w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </a>
                            </p> --}}
                        </div>
                        <a href="http://127.0.0.1:8000/editor/podcast/view/49" class="absolute inset-0 cursor-pointer" aria-hidden="true"></a>
                    </div>
                    

                    <div class="relative flex justify-between p-2 mb-5 space-x-3 rounded-md shadow-md">

                        <div class="bg-center bg-cover rounded-lg w-28 h-28" style="background-image:url(http://s3.ap-southeast-1.amazonaws.com/ithaaty-local-new-file/users/podcast_img/Kl1cTnOXbErag3Who2R3x0ZFDDkFBoeZPGB0q1RT.png)">
                        </div>

                        <div class="flex-1 min-w-0">
                            <p class="text-xl font-bold text-gray-900"> Podcasts</p>
                            <p class="mt-0 text-sm text-gray-500 truncate">0 Videos</p>
                            <p class="mt-2 text-xs text-gray-500 truncate">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris at porttitor elit, ut pulvinar ante. Morbi porta, sem nec porta rhoncus, risus dui cursus metus, in efficitur eros dolor eget est. Cras efficitur leo
                            </p>
                        </div>
                        <div class="inline-flex flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">
                            {{-- <p class="text-sm text-gray-500">
                                <a href="#" class="flex hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="float-left w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </a>
                            </p> --}}
                        </div>
                        <a href="http://127.0.0.1:8000/editor/podcast/view/49" class="absolute inset-0 cursor-pointer" aria-hidden="true"></a>
                    </div>
                    
                    <div class="relative flex justify-between p-2 mb-5 space-x-3 rounded-md shadow-md">

                        <div class="bg-center bg-cover rounded-lg w-28 h-28" style="background-image:url(http://s3.ap-southeast-1.amazonaws.com/ithaaty-local-new-file/users/podcast_img/Kl1cTnOXbErag3Who2R3x0ZFDDkFBoeZPGB0q1RT.png)">
                        </div>

                        <div class="flex-1 min-w-0">
                            <p class="text-xl font-bold text-gray-900"> Podcaster</p>
                            <p class="mt-0 text-sm text-gray-500 truncate">0 Subcribers</p>
                            <p class="mt-2 text-xs text-gray-500 truncate">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris at porttitor elit, ut pulvinar ante. Morbi porta, sem nec porta rhoncus, risus dui cursus metus, in efficitur eros dolor eget est. Cras efficitur leo
                            </p>
                        </div>
                        <div class="inline-flex flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">
                            {{-- <p class="text-sm text-gray-500">
                                <a href="#" class="flex hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="float-left w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </a>
                            </p> --}}
                        </div>
                        <a href="http://127.0.0.1:8000/editor/podcast/view/49" class="absolute inset-0 cursor-pointer" aria-hidden="true"></a>
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