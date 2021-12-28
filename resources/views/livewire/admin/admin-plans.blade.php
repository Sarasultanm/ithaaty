


 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Settings') }}
        </h2>
  </x-slot>

 <div class="">
 <div class="">
            


<div class="min-h-screen bg-gray-100">
  <!--
    When the mobile menu is open, add `overflow-hidden` to the `body` element to prevent double scrollbars

    Menu open: "fixed inset-0 z-40 overflow-y-auto", Menu closed: ""
  -->


  <div class="py-10">

    <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
      <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
      	<!-- sidebar -->
        @include('layouts.admin.sidebar')
        <!-- sidebar -->
      </div>
      <main class="lg:col-span-12 xl:col-span-10">

        <div class="mt-4">
         
          <div class="w-full flex mb-5">
            <div class="flex-1">
               <h1 class="font-bold text-gray-800 text-xl">Pricing Plans</h1> 
            </div>
            <div>
                <a href="{{ route('adminPlansCreate') }}" class=" inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white sm:col-start-2 sm:text-sm">Create Plan</a>
            </div>
               
              
         </div>
          <div class="w-full ">
             <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>

          <!-- setting -->

              
           
            <section class="mt-5 ">
                
            	<!-- This example requires Tailwind CSS v2.0+ -->
			<div class="bg-white p-2">
			  <div class="">

<!-- 			    <div class="sm:flex sm:flex-col sm:align-center">
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
			          <h2 class="text-lg leading-6 font-medium text-gray-900">{{$plan->plan_name}}</h2>
			          <p class="mt-4 text-sm text-gray-500">{{$plan->plan_description}}</p>
			          <p class="mt-8">
			            <span class="text-4xl font-extrabold text-gray-900">${{$plan->plan_price}}</span>
			            <span class="text-base font-medium text-gray-500">/mo</span>
			          </p>
			          <a href="{{ route('adminPlansUpdate',['id' => $plan->id]) }}" class="mt-8 block w-full bg-custom-pink border border-custom-pink rounded-md py-2 text-sm font-semibold text-white text-center hover-bg-custom-pink">Update Plan</a>
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
			        <div class=" bottom-0 p-2">
			        	<div class="relative flex items-start">
                        <div class="flex items-center h-5">
                          <input id="default" name="default_method"   type="radio"  class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded <?php echo ($plan->plan_status == 'default') ? "bg-blue-600 border-blue-600 ring-indigo-500" : "false"; ?>" wire:click="setDefault({{$plan->id}})">
                        </div>
                        <div class="ml-3 text-sm pb-3">
                          <label for="comments" class="font-bold text-gray-900">Set as Default </label>
                          <p id="comments-description" class="text-xs text-gray-500">This is will set as a default<br> plan for new users</p>
                        </div>
                      </div>
			        </div>
			           
			      </div>
			      @endforeach

			    </div>
			  </div>
			</div>










            </section>


          <!-- setting -->
     


        </div>
      </main>
      <!-- aside -->
     
      <!-- aside -->
    </div>
  </div>
</div>



















  <!--  <div class="text-xs bottom-0 hidden" wire:poll.750ms> Current time: {{ now() }} </div> -->

        </div>
</div>






