 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Overview') }}
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
			
			<div class="grid grid-cols-12 mt-5 gap-5">
				<div class="col-span-8">

			  <div 
			    x-data="{
			      openTab: 1,
			      activeClasses: 'border-indigo-500 text-indigo-600',
			      inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
			    }" 
			    class=""
			  >
			  <div class="border-b border-gray-200">
			  	<ul class="-mb-px flex" >
			      <li @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm" >
			        <a>Following</a>
			      </li>
			      <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm">
			        <a>Followers</a>
			      </li>
			      <li @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm">
			        <a>Request 
			        	@if($request->count() != 0)
			        	<span class="inline-flex items-center justify-center px-2 py-1 ml-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">{{ $request->count() }}</span>
			        	@endif
			        </a>
			      </li>
			      <li @click="openTab = 4" :class="openTab === 4 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm">
			        <a>Rejected </a>
			      </li>
			    </ul>
			  </div>
			
			    <div class="w-full pt-4">
			      <div x-show="openTab === 1">
			      	
			      	<div class="grid grid-cols-12 gap-5">

					@foreach($following->get() as $follow)
			            <div class="col-span-4 bg-white p-2 rounded-lg">
			              <article aria-labelledby="question-title-81614">
			                <div class="mt-2 text-sm text-gray-700 space-y-4">
			                   <div class="text-white bg-cover h-36">
			                       <img class="h-full mx-auto my-0 rounded-full" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
			                             
			                   </div>
			                </div>
			                <div>
			                  <div class="flex space-x-3">
			                    <div class="min-w-0 flex-1">
			                      <p class="text-md font-bold text-gray-900 mt-2">
			                        <a href="#" class="hover:underline">{{ $follow->get_user->name }}</a>
			                      </p>
			                      <p class="text-xs text-gray-500">
			                        <a class="hover:underline">
			                          Followers <span class="float-right">0,000,000</span>
			                        </a>
			                      </p>
			                    </div>
			                   
			                  </div>
			                </div>
			              </article>
			            </div>

             		@endforeach 
					</div>


			      </div>
			      <div x-show="openTab === 2">
			      	

			      	<div class="grid grid-cols-12 gap-5">

			      	@foreach($followers->get() as $follow)
			            <div class="col-span-4 bg-white p-2 rounded-lg">
			              <article aria-labelledby="question-title-81614">
			                <div class="mt-2 text-sm text-gray-700 space-y-4">
			                   <div class="text-white bg-cover h-36">
			                       <img class="h-full mx-auto my-0 rounded-full" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
			                             
			                   </div>
			                </div>
			                <div>
			                  <div class="flex space-x-3">
			                    <div class="min-w-0 flex-1">
			                      <p class="text-md font-bold text-gray-900 mt-2">
			                        <a href="#" class="hover:underline">{{ $follow->get_user_following->name }}</a>
			                      </p>
			                      <p class="text-xs text-gray-500">
			                        <a class="hover:underline">
			                          Followers <span class="float-right">0,000,000</span>
			                        </a>
			                      </p>
			                    </div>
			                   
			                  </div>
			                </div>
			              </article>
			            </div>

             		@endforeach 
             		</div>

			      </div>

			      <div x-show="openTab === 3">
			      	

			      	<div class="grid grid-cols-12 gap-5">

			      	@foreach($request->get() as $req)
			            <div class="col-span-4 bg-white p-2 rounded-lg">
			              <article aria-labelledby="question-title-81614">
			                <div class="mt-2 text-sm text-gray-700 space-y-4">
			                   <div class="text-white bg-cover h-36">
			                       <img class="h-full mx-auto my-0 rounded-full" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
			                             
			                   </div>
			                </div>
			                <div>
			                  <div class="flex space-x-3">
			                    <div class="min-w-0 flex-1">
			                      <p class="text-md font-bold text-gray-900 mt-2">
			                        <a href="#" class="hover:underline">{{ $req->get_user_following->name }}</a>
			                      </p>
			                      <p class="text-xs text-gray-500">
			                        <a wire:click="accept({{$req->id }},{{$req->follow_userid}})" class="hover:underline font-bold cursor-pointer">
			                          Accept 
			                        </a>
			                        <a wire:click="reject({{$req->id }},{{$req->follow_userid}})" class="hover:underline font-bold float-right cursor-pointer">
			                          Decline 
			                        </a>
			                      </p>
			                    </div>
			                   
			                  </div>
			                </div>
			              </article>
			            </div>

             		@endforeach 
             		</div>

			      </div>

			          <div x-show="openTab === 4">
			      	

			      	<div class="grid grid-cols-12 gap-5">

			      	@foreach($reject->get() as $rej)
			            <div class="col-span-4 bg-white p-2 rounded-lg">
			              <article aria-labelledby="question-title-81614">
			                <div class="mt-2 text-sm text-gray-700 space-y-4">
			                   <div class="text-white bg-cover h-36">
			                       <img class="h-full mx-auto my-0 rounded-full" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
			                             
			                   </div>
			                </div>
			                <div>
			                  <div class="flex space-x-3">
			                    <div class="min-w-0 flex-1">
			                      <p class="text-md font-bold text-gray-900 mt-2">
			                        <a href="#" class="hover:underline">{{ $rej->get_user_following->name }}</a>
			                      </p>
			                      <!--  -->
			                    </div>
			                   
			                  </div>
			                </div>
			              </article>
			            </div>

             		@endforeach 
             		</div>

			      </div>

			    </div>
			  </div>












				

				<!-- This example requires Tailwind CSS v2.0+ -->
			



				</div>
				<div class="col-span-4">

				<aside class=" bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">

		          <div class="pb-5 space-y-6">
		          		<div class="flex">
		          		  <div class="flex-auto">
		          		  	<dt class="text-base font-normal text-gray-900">
					      Following
					      </dt>
					      <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
					        <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
					         {{ $following->count() }}
					        </div>
					      </dd>
		          		  </div>
		          		  <div class="flex-auto">
		          		  	<dt class="text-base font-normal text-gray-900">
					       Followers
					      </dt>
					      <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
					        <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
					         {{ $followers->count() }}
					        </div>
					      </dd>
		          		  </div>
		          		

		          		</div>
		          	      

		              <h3 class="font-medium text-gray-900">Recent Subs</h3>
		              <ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
		                
		                  <li class="py-3 flex justify-between items-center">
		                    <div class="flex items-center">
		                      <img src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=1024&amp;h=1024&amp;q=80" alt="" class="w-8 h-8 rounded-full">
		                      <p class="ml-4 text-sm font-medium text-gray-900">Aimee Douglas</p>
		                    </div>

		                  </li>
		                
		                  <li class="py-3 flex justify-between items-center">
		                    <div class="flex items-center">
		                      <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixqx=oilqXxSqey&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="w-8 h-8 rounded-full">
		                      <p class="ml-4 text-sm font-medium text-gray-900">Andrea McMillan</p>
		                    </div>
		                  
		                  </li>
	
		              </ul>
		          </div>

        		</aside>



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