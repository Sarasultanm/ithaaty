 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setup') }}
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
    
      <main class="xl:col-span-12 lg:col-span-12">
        @if(Auth::user()->firstlogin == 0)
        <div class="mt-4">
         <div class="mb-5 w-full ">
             <h1 class="font-bold text-gray-800 text-xl">Setting up your account</h1> 
          </div>

          <div class="w-full ">
             <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>
          
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div x-data="{steps:{{$currentSteps}}}" class="bg-white p-2">
                <nav aria-label="Progress">
                  <ol role="list" class="border border-gray-300 rounded-md divide-y divide-gray-300 md:flex md:divide-y-0 mb-5">
                    <li class="relative md:flex-1 md:flex">
                      <!-- Completed Step -->
                      <a class="group flex items-center w-full">
                        <span class="px-6 py-4 flex items-center text-sm font-medium">
                         @if($stepOne == 1)
                         <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-custom-pink rounded-full">
                            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                          </span>
                          @else
                          <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-custom-pink rounded-full">
                            <span class="text-custom-pink">01</span>
                          </span>
                          @endif
                          <span class="ml-4 text-sm font-medium text-gray-900">Friends</span>
                        </span>
                      </a>

                      <!-- Arrow separator for lg screens and up -->
                      <div class="hidden md:block absolute top-0 right-0 h-full w-5" aria-hidden="true">
                        <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                          <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                        </svg>
                      </div>
                    </li>

                    <li class="relative md:flex-1 md:flex">
                      <!-- Current Step -->
                      <a class="px-6 py-4 flex items-center text-sm font-medium" aria-current="step">
                        
                         @if($stepTwo == 1)
                         <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-custom-pink rounded-full">
                            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                          </span>
                          @else
                            @if($stepOne == 0)
                              <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full">
                                <span class="text-custom-pink">02</span>
                              </span>
                             @else
                             <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-custom-pink rounded-full">
                                <span class="text-custom-pink">02</span>
                              </span>
                              

                             @endif 
                          @endif


                        <span class="ml-4 text-sm font-medium text-custom-pink">Interest</span>

                      </a>

                      <!-- Arrow separator for lg screens and up -->
                      <div class="hidden md:block absolute top-0 right-0 h-full w-5" aria-hidden="true">
                        <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                          <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                        </svg>
                      </div>
                    </li>

                    <li class="relative md:flex-1 md:flex">
                      <!-- Upcoming Step -->
                      <a class="group flex items-center">
                        <span class="px-6 py-4 flex items-center text-sm font-medium">
                          @if($stepThree == 1)
                          <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full group-hover:border-gray-400">
                            <span class="text-gray-500 group-hover:text-gray-900">03</span>
                          </span>
                          <span class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">Channels</span>
                          @else
                             @if($stepTwo == 0)
                              <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full">
                                <span class="text-custom-pink">03</span>
                              </span>
                             @else
                             <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-custom-pink rounded-full">
                                <span class="text-custom-pink">03</span>
                              </span>
                              

                             @endif 

                          @endif
                        </span>
                      </a>
                    </li>              
                  </ol>
                </nav>

                <div class="w-full">
                    <div  class=" {{ $currentSteps != 1 ? 'hidden' : '' }}">
                        <!-- step 1 content -->
                        <div class="w-full mb-5 flex justify-end">
                            <div>
                            <label for="search" class="block text-sm font-medium text-gray-700">Quick search</label>
                              <div class="mt-1 relative flex items-center">
                                <input wire:model.debounce.300ms="search" wire:keydown.enter="get_search()" type="text" name="search" id="search" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md">
                              </div>
                            </div>
                        </div>

                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 w-full">

                          @if($result)
                              @foreach($result as $items)
                                @if(Auth::user()->id != $items->id  && ($this->get_if_friends($items->id) == "Add Friend"  || $this->get_if_friends($items->id) == "Send Request" ) )

                                  <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <div class="flex-shrink-0">
                                      @if($items->get_profilephoto->count() == 0)
                                      <img class="h-10 w-10 rounded-full " src="{{ asset('images/default_user.jpg') }}" alt="">
                                      @else
                                          <?php $img_path = $items->get_profilephoto->first()->gallery_path; ?>
                                          <?php $s3_profilelink = config('app.s3_public_link')."/users/profile_img/".$img_path; ?>
                                          <?php $userviewprofile = $items->get_profilephoto->first()->gallery_path; ?>
                                          <img class="h-10 w-10 rounded-full " src="{{$s3_profilelink}}" alt="">
                                      @endif 
                                       
                                    </div>
                                    <div class="flex-1 min-w-0">
                                      <a class="focus:outline-none">
                                        <!-- <span class="absolute inset-0" aria-hidden="true"></span> -->
                                        <p class="text-sm font-medium text-gray-900">
                                          {{ $items->name }}  
                                        </p>
                                        <p class="text-sm text-gray-500 truncate">
                                           {{ $items->email }}
                                        </p>
                                      </a>
                                    </div>
                                    <div class="flex-auto min-w-0">
                                      @if($this->get_if_friends($items->id) == "Send Request" )
                                      <button  type="button" class="float-right inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-custom-pink">
                                          {{ $this->get_if_friends($items->id)  }}
                                     </button>
                                     @else
                                     <button wire:click="addFriend({{ $items->id }})" type="button" class="float-right inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-custom-pink">
                                          {{ $this->get_if_friends($items->id)  }}
                                     </button>

                                     @endif
                                    </div>
                                  </div>
                                  @endif
                              @endforeach
                          @endif
                          <!-- More people... -->
                         </div>


                         <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="w-full mt-5 flex justify-end space-x-3">
                          
                          
                               <button wire:click="friendSetup()" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-custom-pink ">
                               Next
                              </button>   
                     
                             <button wire:click="skipSetup('Friend')" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-custom-pink ">
                               Skip
                              </button> 
                           

                           

                        </div>
                       
                        <!-- step 1 content -->
                    </div>


                     <div  class=" {{ $currentSteps != 2 ? 'hidden' : '' }}">
                       <!-- step 2 content -->
                       <div class="mt-5">
                               <p class="mt-1 text-sm text-gray-500">
                                    Please check the checkbox for the interest.
                               </p>
                                <div class="grid grid-cols-4 gap-4 mt-3">

                                  <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Social Issues, Election or Politics</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>
                                  </div>
                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Housing</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>

                                  </div>

                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Employment</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>
                                  </div>
                                   <div class="col-span-2">
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
                                </div>
                       </div>
                         <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="w-full mt-5 flex justify-end space-x-3">
                            <!-- <button wire:click="friendSetup()" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-custom-pink ">
                              Back
                            </button>   -->
                            <div>
                                &nbsp;
                            </div>
                            <button wire:click="interestSetup()" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-custom-pink ">
                              Next
                            </button> 
                            <button wire:click="skipSetup('Interest')" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-custom-pink ">
                               Skip
                              </button> 
                             
                        </div>
                        <!-- step 2 content -->
                    </div>



                     <div  class=" {{ $currentSteps != 3 ? 'hidden' : '' }}">
                        <!-- step 3 content -->
                        <!-- This example requires Tailwind CSS v2.0+ -->
                            <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                              <li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
                                <div class="flex-1 flex flex-col p-8">
                                  <img class="w-32 h-32 flex-shrink-0 mx-auto rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                  <h3 class="mt-6 text-gray-900 text-sm font-medium">Jane Cooper</h3>
                                  <dl class="mt-1 flex-grow flex flex-col justify-between">
                                    <dt class="sr-only">Title</dt>
                                    <dd class="text-gray-500 text-sm">Paradigm Representative</dd>
                                    <dt class="sr-only">Role</dt>
                                    <dd class="mt-3">
                                      <span class="px-2 py-1 text-green-800 text-xs font-medium bg-green-100 rounded-full">Admin</span>
                                    </dd>
                                  </dl>
                                </div>
                                <div>
                                  <div class="-mt-px flex divide-x divide-gray-200">
                                    <div class="w-0 flex-1 flex">
                                      <a href="mailto:janecooper@example.com" class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                        <!-- Heroicon name: solid/mail -->
                                      
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400"  viewBox="0 0 20 20" fill="currentColor">
                                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="ml-3">Subcribe</span>
                                      </a>
                                    </div>
                                  

                                  </div>
                                </div>
                              </li>

                              <!-- More people... -->
                            </ul>

                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <div class="w-full mt-5 flex justify-end space-x-3">
                                <!-- <button wire:click="friendSetup()" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-custom-pink ">
                                  Back
                                </button> -->
                                <div>&nbsp;</div>  
                                <button wire:click="channelSetup()" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-custom-pink ">
                                  Next
                                </button>   
                                <button wire:click="skipSetup('Channel')" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-custom-pink ">
                               Skip
                              </button> 
                            </div>  
                      

                        <!-- step 3 content -->
                    </div>

                </div>
             </div>
          
            <!-- More questions... -->



          
        </div>
        @endif
      </main>
      <!-- aside -->
    
      <!-- aside -->
    </div>
  </div>
</div>





















        </div>
</div>