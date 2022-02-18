<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Podcast Update') }}
    </h2>
</x-slot>

<div class="">
    <div class="">
        @if(Auth::user()->get_csm('csm_pagebg','active')->count() != 0 )
        <div class="min-h-screen" style="background:{{Auth::user()->get_csm('csm_pagebg','active')->first()->csm_value }};">
            @else
            <div class="min-h-screen bg-gray-100">
                @endif
                
                @include('layouts.editor.header')

                <div class="py-10">
                    <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
                        <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
                            <!-- sidebar -->
                            @include('layouts.editor.sidebar')
                            <!-- sidebar -->
                        </div>

                        @if(Auth::user()->plan == 'new' || Auth::user()->plan =="") @else @if(Auth::user()->get_plan->check_features('p3')->count() != 0 || Auth::user()->get_plan->check_features('p2')->count() != 0 )

                        <main class="xl:col-span-10 lg:col-span-9">
                            <div class="mt-4">
                                

                                <div class="w-full">
                                    <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
                                </div>

                                @if($checkAudio == 'true')

                                <!-- This example requires Tailwind CSS v2.0+ -->
                                @if($audio->audio_publish != "Publish")
                                <div class="rounded-md bg-custom-pink p-4">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: solid/information-circle -->
                                            <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-3 flex-1 md:flex md:justify-between">
                                            <p class="text-sm text-white">
                                                Your podcast is currently in a draft, please update the information in the tab below. If you want to publish your podcast now hit the publish button.
                                            </p>
                                            <p class="mt-4 text-sm md:mt-0 md:ml-6">
                                                <button wire:click="publishAudio({{$a_id}})" class="whitespace-nowrap font-medium text-white hover-bg-custom-pink hover:text-white p-2 border-2 border-white rounded-md">Publish</button>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <!-- <form wire:submit.prevent="updatepost">  -->

                                <div
                                    x-data="{
										openTab: 1,
										activeClasses: 'border-custom-pink text-custom-pink',
										inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
										}"
                                    class=""
                                >
                                    <div class="border-b border-gray-200">
                                        <ul class="-mb-px flex">
                                            <li @click="openTab = 1" :class="openTab === 1 ? activeClasses : inactiveClasses" class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                                                <a>Info</a>
                                            </li>
                                            <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses" class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                                                <a>Embed</a>
                                            </li>
                                            @if(Auth::user()->get_plan->check_features('o4')->count() != 0 )
                                            <li @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses" class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                                                <a>References</a>
                                            </li>
                                            @endif @if(Auth::user()->get_plan->check_features('o3')->count() != 0 )
                                            <li @click="openTab = 4" :class="openTab === 4 ? activeClasses : inactiveClasses" class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                                                <a>Sponsor</a>
                                            </li>
                                            @endif @if(Auth::user()->get_plan->check_features('o7')->count() != 0 )
                                            <li @click="openTab = 5" :class="openTab === 5 ? activeClasses : inactiveClasses" class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                                                <a>Affiliate</a>
                                            </li>
                                            @endif @if(Auth::user()->get_plan->check_features('o5')->count() != 0 )
                                            <li @click="openTab = 6" :class="openTab === 6 ? activeClasses : inactiveClasses" class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                                                <a>Q&A</a>
                                            </li>
                                            @endif @if(Auth::user()->get_plan->check_features('o2')->count() != 0 )
                                            <li @click="openTab = 7" :class="openTab === 7 ? activeClasses : inactiveClasses" class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                                                <a>Monetize</a>
                                            </li>
                                            @endif @if(Auth::user()->get_plan->check_features('o8')->count() != 0 )
                                            <li @click="openTab = 8" :class="openTab === 8 ? activeClasses : inactiveClasses" class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                                                <a>Chapters</a>
                                            </li>
                                            @endif

                                          
                                        </ul>
                                    </div>

                                    <div class="w-full pt-4">
                                        <input type="text" class="hidden" wire:model="a_id" />

                                        <div x-show="openTab === 1">
                                            <!-- tab 1 -->
                                            @include('livewire.editor.update-posts.tabs.info')
                                            <!-- tab 1 -->
                                        </div>

                                        <div x-show="openTab === 2">
                                            <!-- tab 2 -->
                                            @include('livewire.editor.update-posts.tabs.embed')
                                            <!-- tab 2 -->
                                        </div>

                                        <div x-show="openTab === 3">
                                            <!-- tab 3 -->
                                            @include('livewire.editor.update-posts.tabs.reference')
                                            <!-- tab 3 -->
                                        </div>

                                        <div x-show="openTab === 4">
                                            <!-- tab 4 -->
                                            @include('livewire.editor.update-posts.tabs.sponsor')
                                            <!-- tab 4 -->
                                        </div>

                                        <div x-show="openTab === 5">
                                            <!-- tab 5 -->
                                            @include('livewire.editor.update-posts.tabs.affiliate')
                                            <!-- tab 5 -->
                                        </div>

                                        <div x-show="openTab === 6">
                                            <!-- tab 6 -->
                                            @include('livewire.editor.update-posts.tabs.qa')
                                            <!-- tab 6 -->
                                        </div>

                                        <div x-show="openTab === 7">
                                            <!-- tab 7 -->
                                            @include('livewire.editor.update-posts.tabs.monitize')
                                            <!-- tab 7 -->
                                        </div>

                                        <div x-show="openTab === 8">
                                            <!-- tab 8 -->
											@include('livewire.editor.update-posts.tabs.chapter')
                                            <!-- tab 8 -->
                                        </div>
                                    </div>
                                </div>

                  

                                <!--    	</form>  -->
                                @else @include('layouts.editor.page-404') @endif
                            </div>
                        </main>
                        @endif @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        {{-- The best athlete wants his opponent at his best. --}}
    </div>
</div>
