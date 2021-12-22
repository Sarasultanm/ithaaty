 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
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
      <main class="col-span-10">

        <div class="mt-4">
          <!-- <div class="mb-5 w-full ">
             <h1 class="font-bold text-gray-800 text-xl">Overview</h1> 
          </div> -->

           <div class="w-full ">
             <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>
          
          <!-- This example requires Tailwind CSS v2.0+ -->
            <div class=" w-full ">
                <h1 class="font-bold text-gray-800 text-xl">Pricing Plans</h1> 
            </div> 

                     
            <section class="mt-5 ">
                
                <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white p-2">
              <div class="">

<!--                <div class="sm:flex sm:flex-col sm:align-center">
                  <h1 class="text-5xl font-extrabold text-gray-900 sm:text-center">Pricing Plans</h1>
                  <p class="mt-5 text-xl text-gray-500 sm:text-center">Start building for free, then add a site plan to go live. Account plans unlock additional features.</p>
                  <div class="relative self-center mt-6 bg-gray-100 rounded-lg p-0.5 flex sm:mt-8">
                    <button type="button" class="relative w-1/2 bg-white border-gray-200 rounded-md shadow-sm py-2 text-sm font-medium text-gray-900 whitespace-nowrap focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:z-10 sm:w-auto sm:px-8">Monthly billing</button>
                    <button type="button" class="ml-0.5 relative w-1/2 border border-transparent rounded-md py-2 text-sm font-medium text-gray-700 whitespace-nowrap focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:z-10 sm:w-auto sm:px-8">Yearly billing</button>
                  </div>
                </div> -->

                <div class="mt-12 space-y-4 sm:mt-5 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-6 lg:max-w-4xl lg:mx-auto xl:max-w-none xl:mx-0 xl:grid-cols-4">

                @foreach($planList as $plan)   
                


                  <div class="border border-gray-200 rounded-lg shadow-sm divide-y divide-gray-200">
                    <div class="p-6">
                      <h2 class="text-lg leading-6 font-medium text-gray-900">{{$plan->plan_name}} 
                         @if(Auth::user()->plan == $plan->id)
                            <span class="inline-flex float-right px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-gray-800 mr-3 border-red-500 border-2">Active</span>
                         @endif 
                        
                      </h2>
                      <p class="mt-4 text-sm text-gray-500">{{$plan->plan_description}}</p>
                      <p class="mt-8">
                        <span class="text-4xl font-extrabold text-gray-900">${{$plan->plan_price}}</span>
                        <span class="text-base font-medium text-gray-500">/mo</span>
                      </p>
                       @if(Auth::user()->plan == $plan->id)
                           <button  class="mt-8 block w-full bg-custom-gray border border-custom-gray rounded-md py-2 text-sm font-semibold text-white text-center">Active</button>
                        @else
                            <button wire:click="buyPlan({{$plan->id}})" class="mt-8 block w-full bg-custom-pink border border-custom-pink rounded-md py-2 text-sm font-semibold text-white text-center hover-bg-custom-pink">Test Plan</button>
                        @endif 
                      
                    </div>
                    <div class="h-3/5 pt-6 pb-8 px-6">
                      <h3 class="text-xs font-medium text-gray-900 tracking-wide uppercase">What's included</h3>
                      <ul role="list" class="mt-6 space-y-4">
                        @foreach($plan->get_features()->orderBy('planoption_options')->get() as $features)
                        <li class="flex space-x-3">
                          @if($features->planoption_options == 'check')
                          <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                          </svg>
                           <span class="text-sm text-gray-500">{{ $features->planoption_name }}</span>
                           @endif
                         <!--  <span class="text-sm text-gray-500">Potenti felis, in cras at at ligula nunc.</span> -->
                        </li>

                        @endforeach
                      </ul>
                    
                    </div>

                       
                  </div>
                  @endforeach

                </div>
              </div>
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