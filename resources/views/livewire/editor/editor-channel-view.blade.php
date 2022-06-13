 <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
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

        <div class="w-full ">
             <x-auth-session-status-custom class="mt-4 mb-4" :status="session('status')" />
        </div>

        <div class="mt-4">
         <div class="w-full xl:p-0 lg:p-0 md:p-0 sm:p-0 xs:p-0">
          
                  <?php $cover_photo = $channel->get_channel_cover->gallery_path ?>
                  <?php $s3_cover_photo = config('app.s3_public_link')."/users/channel_cover/".$cover_photo; ?>
                    <div class="w-full h-48 bg-center bg-cover bg-custom-pink" style="background-image: url({{ $s3_cover_photo }});">
                        &nbsp;
                    </div>
                
            <div class="w-full">
               

                <div class="grid grid-cols-1 gap-4 ">
                  <div class="relative flex items-center w-full space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 ">
                    <div class="flex-shrink-0">

                        <?php $logo_photo = $channel->get_channel_photo->gallery_path; ?>
                        <?php $s3_logo_photo = config('app.s3_public_link')."/users/channe_img/".$logo_photo; ?>
                        <img class="w-24 h-24 mt-5 ml-5 rounded-full" src="{{ $s3_logo_photo }}" alt=""> 
                      
                    </div>
                    <div class="flex-1 min-w-0">
                      <a >
                       <!--  <span class="absolute inset-0" aria-hidden="true"></span> -->
                        <p class="mt-5 text-xl font-bold text-gray-900">
                          {{$channel->channel_name}}
                        </p>
                        <p class="text-gray-500 truncate text-md">
                          {{ $channel->get_subs()->count() }}  subcribers   
                        </p>
                      </a>
                    </div>
                    <div class="flex-1 min-w-0">
                      <button  class="float-right  inline-flex  rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Subcribe
                      </button>
                    </div>
                  </div>

                  <!-- More people... -->
                </div>


            </div>

            <section class="w-full mt-5">

          @if ($channel->channel_typestatus == 'private')
             
              @if($channel->channel_ownerid == Auth::user()->id)

            
              <!-- main tabs-->
               @include('livewire.editor.channel-view.body-tabs')
              <!-- main tabs-->


              @else

              @if($channel->get_channel_access(Auth::user()->email)->count() != 0)

              <!-- main tabs-->
               @include('livewire.editor.channel-view.body-tabs')
              <!-- main tabs-->

              @else
              

                <center>
                <p class="text-center ">This channel is private</p>
                <div>
                  <div class="mt-1">
                    <input wire:model="vpc_email" type="text" class="block w-1/3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter your email">
                  </div>
                  <div class="mt-1">
                    <input wire:model="vpc_code"  type="text" class="block w-1/3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter your code">
                  </div>
                </div>
                <button wire:click="verifyPrivateCode({{ $channel->id }})" type="button" class="mt-2 items-center px-2.5 py-1.5 border border-transparent text-sm font-medium rounded shadow-sm text-white bg-custom-pink">
                    Submit
                </button>
              </center>

              @endif


              @endif


          @else
          
           <!-- main tabs-->
           @include('livewire.editor.channel-view.body-tabs')
           <!-- main tabs-->

          @endif

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