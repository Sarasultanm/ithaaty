 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
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
         <div class="mb-5 w-full ">
             <h1 class="font-bold text-gray-800 text-xl">Ads Analytics</h1> 
          </div>

          <div class="w-full ">
             <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>
          
            <div>
              <dl class="mt-5 grid grid-cols-1 rounded-lg bg-white overflow-hidden shadow divide-y divide-gray-200 md:grid-cols-3 md:divide-y-0 md:divide-x">
                <div class="px-4 py-5 sm:p-6">
                  <dt class="text-base font-normal text-gray-900">
                    Total Views
                  </dt>
                  <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                    <div class="flex items-baseline text-2xl font-semibold text-custom-pink">
                      <a>0</a>
                    
                    </div>


                  </dd>
                </div>

                <div class="px-4 py-5 sm:p-6">
                  <dt class="text-base font-normal text-gray-900">
                    Avg. Open Rate
                  </dt>
                  <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                    <div class="flex items-baseline text-2xl font-semibold text-custom-pink">
                      0%
    
                    </div>


                  </dd>
                </div>

                <div class="px-4 py-5 sm:p-6">
                  <dt class="text-base font-normal text-gray-900">
                    Avg. Watch Time
                  </dt>
                  <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                    <div class="flex items-baseline text-2xl font-semibold text-custom-pink">
                      0%
                      
                    </div>


                  </dd>
                </div>
              </dl>
            </div>

            <div class="grid grid-cols-12 mt-5 gap-5">
                <div class="xl:col-span-8 lg:col-span-12 md:col-span-12 sm:col-span-12">

                </div>
            </div>
          
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