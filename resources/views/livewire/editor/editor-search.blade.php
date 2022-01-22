 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Searcj') }}
        </h2>
</x-slot>

   <div class="">
        <div class="">
            


<div class="min-h-screen bg-gray-100">
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
          <!-- <div class="mb-5 w-full ">
             <h1 class="font-bold text-gray-800 text-xl">Overview</h1> 
          </div> -->

           <div class="w-full ">
             <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>
          
          <!-- This example requires Tailwind CSS v2.0+ -->
            <div class=" w-full flex">
                <h1 class="font-bold text-gray-800 text-xl flex-auto">Search</h1> 
                <div>
                  <label for="email" class="sr-only">Email</label>
                  <input wire:model.debounce.300ms="search" wire:keydown.enter="get_search()" type="email" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Search Friends">
                </div>
            </div> 

                     
            <section class="mt-5 ">
                
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
               @if($result)
                @foreach($result as $items)
                  <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    <div class="flex-shrink-0">
                      <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </div>
                    <div class="flex-1 min-w-0">
                      <a href="{{ route('editorViewUser',['id' => $items->id ]) }}" class="focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        <p class="text-sm font-medium text-gray-900">
                          {{ $items->name }}
                        </p>
                        <p class="text-sm text-gray-500 truncate">
                          {{ $items->email }}
                        </p>
                      </a>
                    </div>
                  </div>

                  @endforeach

                @else


                @endif
                  <!-- More people... -->
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