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
        @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
        @else
        @if(Auth::user()->get_plan->check_features('s3')->count() != 0 )
        <!-- following -->
        <div class="mt-4">
          <!-- <div class="mb-5 w-full ">
             <h1 class="font-bold text-gray-800 text-xl">Overview</h1> 
          </div> -->

           <div class="w-full ">
             <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>
          
          <!-- This example requires Tailwind CSS v2.0+ -->
            <div class=" w-full ">
                <h1 class="font-bold text-gray-800 text-xl">Follow</h1> 
            </div> 
            <div class="grid grid-cols-12 mt-5 gap-5">
                <div class="col-span-12">

              <!-- <div 
                x-data="{
                  openTab: 1,
                  activeClasses: 'border-custom-pink text-custom-pink',
                  inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
                }" 
                class=""
              > -->
<!--              <div class="border-b border-gray-200">
                
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
                
              </div> -->
            
                <div class="w-full pt-4">
                
                    <div class="grid grid-cols-8 gap-5">

                    @foreach($followers->get() as $follow)
                        <div class="col-span-2 bg-white p-2 rounded-lg">
                            <a href="{{ route('editorViewUser',['id' => $follow->follow_userid ]) }}">
                          <article aria-labelledby="question-title-81614">
                            <div class="mt-2 text-sm text-gray-700 space-y-4">
                               <div class="text-white bg-cover h-36">
                                   <!--  <img class="h-full mx-auto my-0 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt=""> -->
                                    @if($follow->get_user_following->get_profilephoto->count() == 0)
                                     <img class="h-full mx-auto my-0 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="">
                                    @else
                                      <?php $subsprofile_path = $follow->get_user_following->get_profilephoto->first()->gallery_path; ?>
                                      <img class="h-full mx-auto my-0 rounded-full" src="{{ asset('users/profile_img/'.$subsprofile_path) }}" alt="">
                                    @endif    
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
                      </a>
                        </div>

                    @endforeach 
                    </div>


                </div>
              </div>












                

                <!-- This example requires Tailwind CSS v2.0+ -->
            



                <!-- </div> -->

            </div>

          
            <!-- More questions... -->








          
        </div>
        <!-- following -->
        @endif
        @endif
      </main>
      <!-- aside -->
    
      <!-- aside -->
    </div>
  </div>
</div>





















        </div>
</div>