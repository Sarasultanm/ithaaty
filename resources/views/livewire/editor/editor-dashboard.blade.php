<?php use App\Http\Livewire\Editor\EditorDashboard; ?>
<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Editor Dashboard') }}
    </h2>
</x-slot>

<!-- header top bar bgcolor-->
@if(Auth::user()->get_csm('csm_pagebg','active')->count() != 0 )
<div class="min-h-screen" style="background:{{Auth::user()->get_csm('csm_pagebg','active')->first()->csm_value }};">
@else
<div class="min-h-screen bg-gray-100">
@endif
<!-- header top bar bgcolor-->

@include('layouts.editor.header')

      <div class="py-10">
            <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">

                <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
                    <!-- sidebar -->
                      @include('layouts.editor.sidebar')
                    <!-- sidebar -->
                </div>

                <main class="lg:col-span-9 xl:col-span-6">
                    <div class="">
                        <h1 class="sr-only">Recent questions</h1>
                        <div class="w-full">
                            <x-auth-session-status-custom class="mt-4 mb-4" :status="session('status')" />
                        </div>
                        
                        <div class="flex" x-data="{ open: false }">
                          @if(Auth::user()->plan == 'new' || Auth::user()->plan =="") 
                          @else  
                              @if(Auth::user()->get_plan->check_features('p3')->count() != 0 || Auth::user()->get_plan->check_features('p2')->count() != 0 )
                                @if(Auth::user()->get_audio->count() != 0 )
                                <a href="{{ route('editorPodcastCreate') }}" class="w-full px-4 py-2 mb-5 text-sm font-medium text-center text-white border border-transparent rounded-md shadow-sm" style="background-color: #f98b88;">
                                    New Post
                                </a>
                                @endif 
                              @endif 
                          @endif
                        </div>

                        <ul class="space-y-4">
                         
                            @foreach($audioList->get() as $audio) 

                                @if($audio->check_in_podcasts()->count() != 0) 

                                  @if( $audio->audio_status == 'public' || $audio->audio_editor == Auth::user()->id || $this->get_if_friends($audio->audio_editor) == "Friends")

                                    <!-- post-->
                                    <li class="px-4 py-6 bg-white shadow sm:p-6 sm:rounded-lg">
                                        <!-- episode-parts -->
                                        @include('livewire.editor.dashboard.parts.episodes')
                                        <!-- episode-parts -->
                                        <!-- podcast-parts -->
                                        @include('livewire.editor.dashboard.parts.podcasts')
                                        <!-- podcast-parts -->

                                      <!-- like/ -->
                                        <div x-data="{
                                            openTab: 1,
                                            activeClasses: 'border-indigo-500 text-indigo-600',
                                            inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
                                            }"
                                        >
                                              <div class="flex justify-between mt-6 space-x-8">
                                                  @include('livewire.editor.dashboard.parts.reactions-button')

                                                  <div class="flex text-sm">
                                                      @include('livewire.editor.dashboard.parts.notes-button') 
                                                      @include('livewire.editor.dashboard.parts.referrence-button')
                                                  </div>
                                              </div>

                                              <div x-show="openTab === 1">
                                                  <!-- comments -->
                                                  @include('livewire.editor.dashboard.tabs.comments')
                                                  <!-- comments -->
                                              </div>

                                              <div x-show="openTab === 2">
                                                  <!-- notes -->
                                                  @include('livewire.editor.dashboard.tabs.notes')
                                                  <!-- notes -->
                                              </div>

                                              <div x-show="openTab === 3">
                                                  <!-- referrence-view -->
                                                  @include('livewire.editor.dashboard.tabs.referrence')
                                                  <!-- referrence-view -->
                                              </div>

                                              <div x-show="openTab === 4">
                                                  <!-- referrence-view -->
                                                  @include('livewire.editor.dashboard.tabs.likes')
                                                  <!-- referrence-view -->
                                              </div>

                                        </div>
                                    </li>
                                    <!-- post-->

                                    <!-- social ads disple here -->
                                    @php $post_ads++; @endphp
                                    
                                    @if ($post_ads % 2 != 0)
                                       @include('livewire.editor.dashboard.parts.social-ads')  
                                    @endif

                                    <!-- social ads disple here -->

                                  @endif 

                                @endif

                            @endforeach
                        </ul>
                    </div>
                </main>
                @if(Auth::user()->plan == 'new' || Auth::user()->plan =="") 
                @else
                 @include('layouts.editor.aside') 
                @endif

                <!-- aside -->

                <!-- aside -->

            </div>
      </div>


        <script>
            function copyLink(id) {
                /* Get the text field */
                var copyText = document.getElementById(id);
                /* Select the text field */
                copyText.select();
                copyText.setSelectionRange(0, 99999); /* For mobile devices */
                /* Copy the text inside the text field */
                navigator.clipboard.writeText(copyText.value);
                /* Alert the copied text */
                // alert("Copied the text: " + copyText.value);
                alert("Link was copy");
            }
            function copyEmded(id) {
                /* Get the text field */
                var copyText = document.getElementById(id);
                /* Select the text field */
                copyText.select();
                copyText.setSelectionRange(0, 99999); /* For mobile devices */
                /* Copy the text inside the text field */
                navigator.clipboard.writeText(copyText.value);
                /* Alert the copied text */
                // alert("Copied the text: " + copyText.value);
                alert("Embed was copy");
            }
        </script>
      </div>

             {{-- <div class="bottom-0 hidden text-xs" wire:poll.750ms> Current time: {{ now() }} </div> --}}
</div>

