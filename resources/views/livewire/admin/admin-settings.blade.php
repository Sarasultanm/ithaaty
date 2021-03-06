


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
          <div class="mb-5 w-full ">
          	 <h1 class="font-bold text-gray-800 text-xl">Settings</h1> 
          </div>
          <div class="w-full ">
             <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>

          <!-- setting -->

                  <div 
          x-data="{
            openTab: 4,
            activeClasses: 'border-indigo-500 text-indigo-600',
            inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
          }" 
          class="p-6"
        >
        <div class="border-b border-gray-200">
          <ul class="-mb-px flex" >
            <li @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm" >
              <a  href="#">My Account </a>
            </li>
            <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm">
              <a  href="#">Password</a>
            </li>
            <li @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses" class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm" >
              <a  href="#">Categories</a>
            </li>
            <li @click="openTab = 4" :class="openTab === 4 ? activeClasses : inactiveClasses" class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm" >
              <a  href="#">Interest</a>
            </li>
          </ul>
        </div>
      
          <div class="w-full pt-4">
            <div x-show="openTab === 1">
              
             <section>

                 <form wire:submit.prevent="updateName"> 
                  <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 sm:p-6">
                      <div>
                        <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">User Profile</h2>
                        <p class="mt-1 text-sm text-gray-500">Update your personal information.</p>
                      </div>

                      <div class="mt-6 grid grid-cols-4 gap-6">

                        <div class="col-span-4 sm:col-span-4">
                          <h3 class="text-md leading-6 font-medium text-gray-900">Name</h3>
                          <input wire:model="userName" type="text" name="first_name" id="first_name" autocomplete="cc-given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        </div>

                        <div class="col-span-4 sm:col-span-4 text-right">
                          <button type="submit" class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">Update</button>
                        </div>

                      </div>



                    </div>
                   
                  </div>
                </form>

            </section>


            </div>
            <div x-show="openTab === 2">
              
                <section>

                 <form wire:submit.prevent="updatePass"> 
                  <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 sm:p-6">
                      <div>
                        <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Password</h2>
                        <p class="mt-1 text-sm text-gray-500">Update your password.</p>
                      </div>

                      <div class="mt-6 grid grid-cols-4 gap-6">

                        <div class="col-span-4 sm:col-span-4">
                         <h3 class="text-md leading-6 font-medium text-gray-900">Old Password</h3>
                          <input wire:model="oldPass" type="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        </div>

                        <div class="col-span-4 sm:col-span-4">
                         <h3 class="text-md leading-6 font-medium text-gray-900">New Password</h3>
                          <input wire:model="newPass" type="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        </div>

                        <div class="col-span-4 sm:col-span-4 text-right">
                          <button type="submit" class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex float-right text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">Update</button>
                        </div>

                      </div>



                    </div>
                   
                  </div>
                </form>

            </section>












            </div>
            <div x-show="openTab === 3">
              
              <section >

                 <form wire:submit.prevent="addCategory"> 
                  <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 sm:p-6">
                      <div>
                        <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Category</h2>
                        <p class="mt-1 text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id semper libero. </p>
                      </div>

                      <div class="mt-6 grid grid-cols-4 gap-6">
                        <div class="col-span-4 sm:col-span-2">
                          <input wire:model="categoryTitle" type="text" name="first_name" id="first_name" autocomplete="cc-given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        </div>

                        <div class="col-span-4 sm:col-span-2 text-right">
                          <button type="submit" class="bg-custom-pink hover-bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white ">
                        Add
                      </button>
                        </div>

                      </div>
                    </div>
                   
                  </div>
                </form>

            </section>

            <section class="mt-5">
                  <div class="bg-white pt-6 shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 sm:px-6">
                      <h2 id="billing_history_heading" class="text-lg leading-6 font-medium text-gray-900">Category List</h2>
                    </div>
                    <div class="mt-6 flex flex-col">
                      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                          <div class="overflow-hidden border-t border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">
                              <thead class="bg-gray-50">
                                <tr>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Title
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Episodes
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                  </th>
                                  <th scope="col" class="relative px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <span class="sr-only">View receipt</span>
                                  </th>
                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-gray-200">
                                @if($category_list)
                                @foreach($category_list as $cat)
                                  <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                   {{ $cat->category_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                     {{ $cat->category_status }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                     {{ $cat->created_at }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                      <a href="#" class="text-orange-600 hover:text-orange-900">Details</a>
                                    </td>
                                  </tr>
                               @endforeach
                               @endif
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>

            </div>


            <!-- interest -->
            <div x-show="openTab === 4">
              <section>
                  <form wire:submit.prevent="addInterest"> 
                  <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 sm:p-6">
                      <div>
                        <h2 class="text-lg leading-6 font-medium text-gray-900">Interest</h2>
                        <p class="mt-1 text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id semper libero. </p>
                      </div>

                      <div class="mt-6">

                        <input wire:model.lazy="title" type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" placeholder="Title">
                         @error('title') <span class="text-xs text-red-600">{{$message}}</span> @enderror
                       
                        <label class="block mt-2 text-gray-500 text-sm">Description</label>
                        <textarea wire:model.lazy="in_desc" rows="5" class=" block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"></textarea>
                         @error('in_desc') <span class="text-xs text-red-600">{{$message}}</span> @enderror
                        <div class="mt-5 text-right">

                          <button type="submit" class="bg-custom-pink hover-bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white ">
                          Add
                         </button>
                        </div>

                      </div>
                    </div>
                   
                  </div>
                </form>
              </section>

              <section class="mt-5">
                  <div class="bg-white pt-6 shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 sm:px-6">
                      <h2 id="billing_history_heading" class="text-lg leading-6 font-medium text-gray-900">Interest</h2>
                    </div>
                    <div class="mt-6 flex flex-col">
                      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                          <div class="overflow-hidden border-t border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">
                              <thead class="bg-gray-50">
                                <tr>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Title
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Description
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                  </th>
                                  <th scope="col" class="relative px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <span class="sr-only">View receipt</span>
                                  </th>
                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($interest_list as $interest_item)
                                  <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                   {{ $interest_item->title }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                     {{ $interest_item->description }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                     {{ $interest_item->created_at }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                      <a href="#" class="text-orange-600 hover:text-orange-900">Details</a>
                                    </td>
                                  </tr>
                               @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>


            </div>

            <!-- interest -->




          </div>
        </div>




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






