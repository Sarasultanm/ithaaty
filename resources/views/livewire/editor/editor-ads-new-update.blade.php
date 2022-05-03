<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Ads Update') }}
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
    <div class="mt-4">
      <div class="w-full mb-5 ">
         <h1 class="text-xl font-bold text-gray-800">Update Ads</h1> 
      </div>

      <div class="w-full ">
         <x-auth-session-status-custom class="mt-4 mb-4" :status="session('status')" />
      </div>
    
        @if($type == "context")

            @include('livewire.editor.ads-update.context-stats')

        @elseif($type == "social")

            @include('livewire.editor.ads-update.social-stats')

        @elseif($type == "media")

            @include('livewire.editor.ads-update.media-stats')

        @endif
        

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