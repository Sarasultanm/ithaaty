


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
          	 <h1 class="font-bold text-gray-800 text-xl">Create Plan</h1> 
          </div>
          <div class="w-full ">
             <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>

          <!-- setting -->

              
               <section>
                  <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 sm:p-6">
                      <div>
                        <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Details</h2>
                        <p class="mt-1 text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et nisl nibh</p>
                      </div>
                      <div class="mt-5">
                          <label for="about" class="block text-sm font-medium text-gray-700">
                            Title
                          </label>
                          <div class="mt-1">
                            <input type="text" name="first_name" id="first_name" autocomplete="cc-given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" wire:model="plan_name">
                          </div>
                     </div>

                      <div class="mt-5">
                          <label for="about" class="block text-sm font-medium text-gray-700">
                            Description
                          </label>
                          <div class="mt-1">
                            <textarea id="about" name="about" rows="5" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="plan_description" ></textarea>
                          </div>
                     </div>

                    </div>
                   
                  </div>


                  <div class="mt-5 shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 sm:p-6">

                              <div class="">
                                  <div>
                                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Social Features</h2>
                                    <p class="mt-1 text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et nisl nibh</p>
                                  </div>

                                <div class="grid grid-cols-4 gap-4 mt-3">

                                  <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="sf_typeOne" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Share</label>
                                          <p id="comments-description" class="text-gray-500">Lorem ipsum dolor sit amet, consectetur</p>
                                        </div>
                                      </div>
                                  </div>
                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="sf_typeTwo" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Comments</label>
                                          <p id="comments-description" class="text-gray-500">Lorem ipsum dolor sit amet, consectetur</p>
                                        </div>
                                      </div>

                                  </div>

                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="sf_typeThree" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Friends</label>
                                          <p id="comments-description" class="text-gray-500">Lorem ipsum dolor sit amet, consectetur</p>
                                        </div>
                                      </div>
                                  </div>
                                 <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="sf_typeFour" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Playlist</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>

                                  </div>

                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="sf_typeFive" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Favorite</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>

                                  </div>

                                    <!-- <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="of_typeSix" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Word Counter</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>

                                  </div> -->
                                
                                </div>

                              </div>

                    </div>

                  </div>


                  <div class="mt-5 shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 sm:p-6">

                              <div class="">
                                  <div>
                                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Podcast Features</h2>
                                    <p class="mt-1 text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et nisl nibh</p>
                                  </div>

                                <div x-data="{ on: false }"  class="grid grid-cols-4 gap-4 mt-3">

                                  <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                         
                                          <input type="checkbox"  class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"  wire:model="pf_typeOne" @click="on = !on">
                                         
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">No Podcast Features </label>
                                          <p id="comments-description" class="text-gray-500">Lorem ipsum dolor sit amet, consectetur</p>
                                        </div>
                                      </div>
                                  </div>
                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input type="checkbox"   x-bind:disabled="on"  :class="{ 'cursor-not-allowed': on, '': !(on) }"   class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded " wire:model="pf_typeTwo" >
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900"  :class="{ 'line-through': on, '': !(on) }">Embed Code</label>
                                          <p id="comments-description" class="text-gray-500">Lorem ipsum dolor sit amet, consectetur</p>
                                        </div>
                                      </div>

                                  </div>

                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="pf_typeThree"  x-bind:disabled="on"  :class="{ 'cursor-not-allowed': on, '': !(on) }"  type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900" :class="{ 'line-through': on, '': !(on) }">Import Rss</label>
                                          <p id="comments-description" class="text-gray-500">Lorem ipsum dolor sit amet, consectetur</p>
                                        </div>
                                      </div>
                                  </div>
                                 
                                </div>

                              </div>

                    </div>

                  </div>


                   <div class="mt-5 shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 sm:p-6">

                              <div class="">
                                  <div>
                                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Analytics</h2>
                                    <p class="mt-1 text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et nisl nibh</p>
                                  </div>

                                <div class="grid grid-cols-4 gap-4 mt-3">

                                  <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="a_typeOne" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">No Analytics</label>
                                          <p id="comments-description" class="text-gray-500">Lorem ipsum dolor sit amet, consectetur</p>
                                        </div>
                                      </div>
                                  </div>
                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="a_typeTwo"  type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Default Analytics</label>
                                          <p id="comments-description" class="text-gray-500">Lorem ipsum dolor sit amet, consectetur</p>
                                        </div>
                                      </div>

                                  </div>

                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="a_typeThree"  type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Advance Analytics</label>
                                          <p id="comments-description" class="text-gray-500">Lorem ipsum dolor sit amet, consectetur</p>
                                        </div>
                                      </div>
                                  </div>
                               <!--     <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Credits</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>

                                  </div>
 -->                                  
                                </div>

                              </div>

                    </div>

                  </div>

                   <div class="mt-5 shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 sm:p-6">

                              <div class="">
                                  <div>
                                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Upload Features</h2>
                                    <p class="mt-1 text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et nisl nibh</p>
                                  </div>

                                <div class="grid grid-cols-4 gap-4 mt-3">

                                  <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="uf_typeOne"  type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">No Upload</label>
                                          <p id="comments-description" class="text-gray-500">Lorem ipsum dolor sit amet, consectetur</p>
                                        </div>
                                      </div>
                                  </div>
                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="uf_typeTwo"  type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">4 Podcast Per Month</label>
                                          <p id="comments-description" class="text-gray-500">Lorem ipsum dolor sit amet, consectetur</p>
                                        </div>
                                      </div>

                                  </div>

                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="uf_typeThree" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">8 Podcast Per Month</label>
                                          <p id="comments-description" class="text-gray-500">Lorem ipsum dolor sit amet, consectetur</p>
                                        </div>
                                      </div>
                                  </div>
                               <!--     <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Credits</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>

                                  </div>
 -->                                  
                                </div>

                              </div>

                    </div>

                  </div>

                           <div class="mt-5 shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 sm:p-6">

                              <div class="">
                                  <div>
                                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Other Features</h2>
                                    <p class="mt-1 text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et nisl nibh</p>
                                  </div>

                                <div class="grid grid-cols-4 gap-4 mt-3">

                                  <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="of_typeOne" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Advertisement</label>
                                          <p id="comments-description" class="text-gray-500">Lorem ipsum dolor sit amet, consectetur</p>
                                        </div>
                                      </div>
                                  </div>
                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="of_typeTwo" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Monitize</label>
                                          <p id="comments-description" class="text-gray-500">Lorem ipsum dolor sit amet, consectetur</p>
                                        </div>
                                      </div>

                                  </div>

                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="of_typeThree" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Sponsorhip</label>
                                          <p id="comments-description" class="text-gray-500">Lorem ipsum dolor sit amet, consectetur</p>
                                        </div>
                                      </div>
                                  </div>
                                 <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="of_typeFour" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Reference</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>

                                  </div>

                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="of_typeFive" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">QA</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>

                                  </div>

                                    <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="of_typeSix" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Word Counter</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>

                                  </div>

                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="of_typeSeven" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Default Affiliation ( 3rd Party Ithaaty Affiliation ) </label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>

                                  </div>

                                    <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="of_typeEight" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Chapter Breakdown</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>

                                  </div>

                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="of_typeNine" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Affiliate Marketing Features </label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>

                                  </div>

                                  <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input wire:model="of_typeTen" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Create Channels</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>

                                  </div>

                                  <div class="col-span-2">
                                    <div class="relative flex items-start">
                                      <div class="flex items-center h-5">
                                        <input wire:model="of_typeEleven" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                      </div>
                                      <div class="ml-3 text-sm">
                                        <label for="comments" class="font-bold text-gray-900">Create Multiple Channels</label>
                                        <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                      </div>
                                    </div>

                                </div>

                                
                                </div>

                              </div>

                    </div>

                  </div>

               <div class="mt-3  sm:mt-5 mb-20">
                    <div class="w-full">
                      <div class="w-1/2 float-left">&nbsp;</div>
                      <div class="w-1/2 float-left text-right">
                        <button wire:click="createPlan()" type="submit" class="w-1/2 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white sm:col-start-2 sm:text-md"> Save</button>
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






