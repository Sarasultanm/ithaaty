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

        <div class="mt-4">
         <div class=" w-full flex xl:p-0 lg:p-0 md:p-0 sm:p-0 xs:p-0">
            <div class="flex-1">
               <h1 class="font-bold text-gray-800 text-xl">Create Channels</h1>  
            </div>    
         </div> 
          
          <!-- This example requires Tailwind CSS v2.0+ -->
           
          <section>
              
                <div class="mt-5">
                            <label for="email" class="block text-sm font-medium text-gray-700">Title</label>
                            <div class="mt-1">
                              <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"  wire:model="title">
                            </div>
                            @error('title') <span class="text-xs text-red-600">Empty fields</span> @enderror
                        </div>










          </section>


          
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