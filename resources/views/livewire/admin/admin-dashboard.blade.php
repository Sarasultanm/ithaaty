


 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
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
          <div class="mb-5 w-full ">
          	 <h1 class="font-bold text-gray-800 text-xl">Dashboard</h1> 
          </div>
       
         <!-- stats -->	
         <div>
			  <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
			    <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
			      <dt>
			        <div class="absolute bg-indigo-500 rounded-md p-3">
			          <!-- Heroicon name: outline/users -->
			          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
			            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
			          </svg>
			        </div>
			        <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Podcaster</p>
			      </dt>
			      <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
			        <p class="text-2xl font-semibold text-gray-900">
			          {{ $totalpodcaster }}
			        </p>
			      <!--   <p class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
			         
			          <svg class="self-center flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
			            <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
			          </svg>
			          <span class="sr-only">
			            Increased by
			          </span>
			          122
			        </p> -->
			        <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
			          <div class="text-sm">
			            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> View all<span class="sr-only"> Total Subscribers stats</span></a>
			          </div>
			        </div>
			      </dd>
			    </div>

			    <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
			      <dt>
			        <div class="absolute bg-indigo-500 rounded-md p-3">
			          <!-- Heroicon name: outline/mail-open -->
			          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
			            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
			          </svg>
			        </div>
			        <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total SignIn Users</p>
			      </dt>
			      <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
			        <p class="text-2xl font-semibold text-gray-900">
			         {{ $podcaster->count() }}
			        </p>
			     <!--    <p class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
			          
			          <svg class="self-center flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
			            <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
			          </svg>
			          <span class="sr-only">
			            Increased by
			          </span>
			          5.4%
			        </p> -->
			        <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
			          <div class="text-sm">
			            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> View all<span class="sr-only"> Avg. Open Rate stats</span></a>
			          </div>
			        </div>
			      </dd>
			    </div>

			    <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
			      <dt>
			        <div class="absolute bg-indigo-500 rounded-md p-3">
			          <!-- Heroicon name: outline/cursor-click -->
			          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
			            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
			          </svg>
			        </div>
			        <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Subscriber</p>
			      </dt>
			      <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
			        <p class="text-2xl font-semibold text-gray-900">
			         {{ $totalfollower }}
			        </p>
			   <!--      <p class="ml-2 flex items-baseline text-sm font-semibold text-red-600">
			          
			          <svg class="self-center flex-shrink-0 h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
			            <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
			          </svg>
			          <span class="sr-only">
			            Decreased by
			          </span>
			          3.2%
			        </p> -->
			        <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
			          <div class="text-sm">
			            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> View all<span class="sr-only"> Avg. Click Rate stats</span></a>
			          </div>
			        </div>
			      </dd>
			    </div>
			  </dl>
			</div>
         <!-- stats -->
         <!-- users -->
          <div class="mt-10 mb-5 w-full ">
          	 <h1 class="font-bold text-gray-800 text-xl">New Users</h1> 
          </div>

          <!-- This example requires Tailwind CSS v2.0+ -->
			<div class="flex flex-col">
			  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
			    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
			      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
			        <table class="min-w-full divide-y divide-gray-200">
			          <thead class="bg-gray-50">
			            <tr>
			              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
			                Name
			              </th>
			              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
			                Email
			              </th>
			              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
			                Status
			              </th>
			              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
			                Role
			              </th>
			              <th scope="col" class="relative px-6 py-3">
			                <span class="sr-only">Edit</span>
			              </th>
			            </tr>
			          </thead>
			          <tbody class="bg-white divide-y divide-gray-200">
			          	 @foreach($podcaster->get() as $pod)
			            <tr>
			              <td class="px-6 py-4 whitespace-nowrap">
			                <div class="flex items-center">
			                  <div class="flex-shrink-0 h-10 w-10">
			                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
			                  </div>
			                  <div class="ml-4">
			                    <div class="text-sm font-medium text-gray-900">
			                      {{ $pod->name }}
			                    </div>
			                    <!-- <div class="text-sm text-gray-500">
			                      jane.cooper@example.com
			                    </div> -->
			                  </div>
			                </div>
			              </td>
			              <td class="px-6 py-4 whitespace-nowrap">
			                <div class="text-sm text-gray-900">{{ $pod->email }}</div>
			                <!-- <div class="text-sm text-gray-500">Optimization</div> -->
			              </td>
			              <td class="px-6 py-4 whitespace-nowrap">
			                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
			                  Active
			                </span>
			              </td>
			              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
			                {{ $pod->roles }}
			              </td>
			              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
			                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
			              </td>
			            </tr>
			             @endforeach
			            <!-- More people... -->
			          </tbody>
			        </table>
			      </div>
			    </div>
			  </div>
			</div>



         <!-- users -->


          <!-- users -->
          <div class="mt-10 mb-5 w-full ">
          	 <h1 class="font-bold text-gray-800 text-xl">New Subcriber</h1> 
          </div>

                  <div class="grid gap-4 grid-cols-8">
          	

              
            @foreach($podcaster->get() as $pod)

     


            <div class="col-span-2 bg-white p-2  bg-white p-2 ">
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
                        <a href="#" class="hover:underline">{{ $pod->name }}</a>
                      </p>
                      <p class="text-xs text-gray-500">
                        <a class="hover:underline">
                          Followers <span class="float-right">{{ $pod->get_followers->count() }}</span>
                        </a>
                      </p>
                    </div>

                   
                  </div>

                    <div class="mt-3">
                      <center>
                        <button type="button" class="inline-flex items-center px-3 py-0.5 rounded-full bg-rose-50 text-sm font-medium text-rose-700 hover:bg-rose-100">
                          <!-- Heroicon name: solid/plus -->
                          <span>
                            Follow
                          </span>
                        </button>
                        </center>
                      </div>


                </div>

              </article>
            </div>




             @endforeach
        


          </div>



          
         <!-- users -->


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






