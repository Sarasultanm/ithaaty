 <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Overview') }}
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
      	@if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
      	@include('layouts.editor.page-404')
        @else
        @if(Auth::user()->get_plan->check_features('s3')->count() != 0 )
        <!-- friend -->
        <div class="mt-4">
          <!-- <div class="w-full mb-5 ">
          	 <h1 class="text-xl font-bold text-gray-800">Overview</h1> 
          </div> -->

           <div class="w-full ">
          	 <x-auth-session-status-custom class="mt-4 mb-4" :status="session('status')" />
          </div>
          <div class="flex w-full ">
                <h1 class="flex-auto text-xl font-bold text-gray-800">Friends</h1>
                <div>
	                <input wire:model.debounce.300ms="searchbarfriend" wire:keydown.enter="get_search()" type="email" name="email" id="email" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Search Friends">
	              </div>
         	</div> 
          <!-- This example requires Tailwind CSS v2.0+ -->
			
			<div class="grid grid-cols-12 gap-5 mt-5">
				<div class="col-span-12">

			  <div 
			    x-data="{
			      openTab: 1,
			      activeClasses: 'border-custom-pink text-custom-pink',
			      inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
			    }" 
			    class=""
			  >
			  <div class="border-b border-gray-200">
			  	<ul class="flex -mb-px" >
			      <li @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses"   class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2" >
			        <a>Friends</a>
			      </li>
			      <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2">
			        <a>Confirm</a>
			      </li>
			       <li @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2">
			        <a>Request</a>
			      </li>
			       <li @click="openTab = 4" :class="openTab === 4 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2">
			        <a>Block</a>
			      </li>


			    </ul>
			  </div>
			
			    <div class="w-full pt-4">
			      <div x-show="openTab === 1">
			      	
			      	<div class="grid gap-5 xl:grid-cols-12 lg:grid-cols-12 md:grid-cols-12 sm:grid-cols-8 ">

					@foreach($friendList as $friends)


						@if($friends->friend_status == "active")

						@if($friends->friend_type == "Friends")


			            <div class="p-2 rounded-lg xl:col-span-3 lg:col-span-4 md:col-span-4 sm:col-span-4">
			            	  <!-- @if(Auth::user()->id == $friends->friend_userid )  
				              <a href="" class="float-left w-full bg-white border-2 border-white rounded-lg pointer hover:border-gray-300">
				              @else
				               <a href="{{ route('editorViewUser',['id' => $friends->get_add_friend->id ]) }}" class="float-left w-full bg-white border-2 border-white rounded-lg pointer hover:border-gray-300">
				              @endif -->
				              <div class="float-left w-full bg-white border-2 border-white rounded-lg pointer hover:border-gray-300">
				                <div class="mt-2 space-y-4 text-sm text-gray-700">
				                   <div class="text-white bg-cover h-36">
				                      <!--  <img class="h-full mx-auto my-0 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="">    --> 
				                      @if(Auth::user()->id == $friends->friend_userid )
				                      		
				                      		@if($friends->get_request_user->get_profilephoto->count() == 0)
					                         <img class="h-full mx-auto my-0 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="">
					                        @else
					                          <?php $friendprofile_path = $friends->get_request_user->get_profilephoto->first()->gallery_path; ?>
					                          <img class="h-full mx-auto my-0 rounded-full" src="{{ asset('users/profile_img/'.$friendprofile_path) }}" alt="">
					                        @endif 

				                      @else
				                      		@if($friends->get_add_friend->get_profilephoto->count() == 0)
					                         <img class="h-full mx-auto my-0 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="">
					                        @else
					                          <?php $friendprofile_path = $friends->get_add_friend->get_profilephoto->first()->gallery_path; ?>
					                          <img class="h-full mx-auto my-0 rounded-full" src="{{ asset('users/profile_img/'.$friendprofile_path) }}" alt="">
					                        @endif 

				                      @endif  

				                        
				                   </div>
				                </div>
				                <div>
				                  <div class="flex space-x-3">
				                    <div class="flex-1 min-w-0">
				                    	@if(Auth::user()->id == $friends->friend_userid )
					                      <p class="mt-2 font-bold text-center text-gray-900 text-md">  
					                      	<a href="#">
					                      		{{ $friends->get_request_user->name }} 
					                      	</a>
						                 	  </p>
						                  	<p class="text-xs text-center text-gray-500 font-regular">  
					                      	{{ $friends->get_request_user->email }}
						                    </p>
							                @else
							                  <p class="mt-2 font-bold text-center text-gray-900 text-md">  
						                      	{{ $friends->get_add_friend->name }}
							                  </p>
							                  <p class="text-xs text-center text-gray-500 font-regular">  
						                      	{{ $friends->get_add_friend->email }}
							                  </p>
							                @endif  

						                  @if(Auth::user()->id == $friends->friend_userid )
					                      <p class="my-2 text-center">
					                       <!-- <button wire:click="removeFriend({{ $friends->get_request_user->id }})" class="bg-custom-pink text-white text-sm font-bold rounded-md px-2 py-1.5 pointer">
					                         Remove as Friend
					                        </button> -->
					                        <button wire:click="blockFriend({{$friends->id}},{{ $friends->get_request_user->id }},'user')" class="bg-custom-pink text-white text-sm font-bold rounded-md px-2 py-1.5 pointer">
					                         Block Friend
					                        </button>
					                      </p>
					                      @else
					                      <p class="my-2 text-center">
					                      <button wire:click="blockFriend({{$friends->id}},{{ $friends->get_add_friend->id }},'request')" class="bg-custom-pink text-white text-sm font-bold rounded-md px-2 py-1.5 pointer">
					                         Block Friend
					                        </button>
					                      </p>
					                      @endif 
				                    </div>
				                   
				                  </div>
				                </div>
				              </div>
				              <!-- </a> -->
				            </div>

				           @endif

			            @endif

             		@endforeach 
					</div>


			      </div>
			      <div x-show="openTab === 2">
			      	

			      	<div class="grid gap-5 xl:grid-cols-12 lg:grid-cols-12 md:grid-cols-12 sm:grid-cols-8 ">

			      		@foreach($confirmrequest as $friend)

							@if($friend->friend_type == "Send Request")

				            <div class="p-2 rounded-lg xl:col-span-3 lg:col-span-4 md:col-span-4 sm:col-span-4">
				              <a href="{{ route('editorViewUser',['id' => $friend->get_add_friend->id ]) }}" class="float-left w-full bg-white border-2 border-white rounded-lg pointer hover:border-gray-300">
				                <div class="mt-2 space-y-4 text-sm text-gray-700">
				                   <div class="text-white bg-cover h-36">
				                       <img class="h-full mx-auto my-0 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="">    
				                   </div>
				                </div>
				                <div>
				                  <div class="flex space-x-3">
				                    <div class="flex-1 min-w-0">
				                      <p class="mt-2 font-bold text-center text-gray-900 text-md">  
				                      	{{ $friend->get_add_friend->name }}
					                  </p>
					                  <p class="text-xs text-center text-gray-500 font-regular">  
				                      	{{ $friend->get_add_friend->email }}
					                  </p>
				                      <p class="my-2 text-center">
				                        <button wire:click="confirmFriend({{ $friend->get_add_friend->id }})" class="bg-custom-pink text-white text-sm font-bold rounded-md px-2 py-1.5 pointer">
				                         Confirm Request
				                        </button>
				                      </p>
				                    </div>
				                   
				                  </div>
				                </div>
				              </a>
				            </div>

				            @endif
				            
	             		@endforeach 
			      
             		</div>

			      </div>


			         <div x-show="openTab === 3">
			      	

			      	<div class="grid gap-5 xl:grid-cols-12 lg:grid-cols-12 md:grid-cols-12 sm:grid-cols-8 ">

				      	@foreach($friendrequest as $requestfriend)

							@if($requestfriend->friend_type == "Send Request")
				             <div class="p-2 rounded-lg xl:col-span-3 lg:col-span-4 md:col-span-4 sm:col-span-4">
				              <a href="{{ route('editorViewUser',['id' => $requestfriend->get_request_user->id ]) }}" class="float-left w-full bg-white border-2 border-white rounded-lg pointer hover:border-gray-300">
				                <div class="mt-2 space-y-4 text-sm text-gray-700">
				                   <div class="text-white bg-cover h-36">
				                       <img class="h-full mx-auto my-0 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="">    
				                   </div>
				                </div>
				                <div>
				                  <div class="flex space-x-3">
				                    <div class="flex-1 min-w-0">
				                      <p class="mt-2 font-bold text-center text-gray-900 text-md">  
				                      	{{ $requestfriend->get_request_user->name }}
					                  </p>
					                  <p class="text-xs text-center text-gray-500 font-regular">  
				                      	{{ $requestfriend->get_request_user->email }}
					                  </p>
				                     <!--  <p class="my-2 text-center">
				                       <button wire:click="cancelRequest({{ $requestfriend->get_request_user->id }})" class="bg-custom-pink text-white text-sm font-bold rounded-md px-2 py-1.5 pointer">
				                        Cancel Request
				                        </button>
				                      </p> -->
				                    </div>
				                   
				                  </div>
				                </div>
				              </a>
				            </div>


				            @endif
				            
	             		@endforeach 
			      
             		</div>

			      </div>
			     

			      <div x-show="openTab === 4">
			      	

			      	<div class="grid gap-5 xl:grid-cols-12 lg:grid-cols-12 md:grid-cols-12 sm:grid-cols-8 ">

				    @foreach($friendList as $friends)

						@if($friends->friend_status == "active" && $friends->friend_type == "Block")


								@if(Auth::user()->id == $friends->get_block->block_userid)

			            <div class="p-2 rounded-lg xl:col-span-3 lg:col-span-4 md:col-span-4 sm:col-span-4">
			            	  <!-- @if(Auth::user()->id == $friends->friend_userid )  
				              <a href="" class="float-left w-full bg-white border-2 border-white rounded-lg pointer hover:border-gray-300">
				              @else
				               <a href="{{ route('editorViewUser',['id' => $friends->get_add_friend->id ]) }}" class="float-left w-full bg-white border-2 border-white rounded-lg pointer hover:border-gray-300">
				              @endif -->
				              <div class="float-left w-full bg-white border-2 border-white rounded-lg pointer hover:border-gray-300">
				                <div class="mt-2 space-y-4 text-sm text-gray-700">
				                   <div class="text-white bg-cover h-36">
				                      <!--  <img class="h-full mx-auto my-0 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="">    --> 
				                      @if(Auth::user()->id == $friends->friend_userid )
				                      		
				                      		@if($friends->get_request_user->get_profilephoto->count() == 0)
					                         <img class="h-full mx-auto my-0 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="">
					                        @else
					                          <?php $friendprofile_path = $friends->get_request_user->get_profilephoto->first()->gallery_path; ?>
					                          <img class="h-full mx-auto my-0 rounded-full" src="{{ asset('users/profile_img/'.$friendprofile_path) }}" alt="">
					                        @endif 

				                      @else
				                      		@if($friends->get_add_friend->get_profilephoto->count() == 0)
					                         <img class="h-full mx-auto my-0 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="">
					                        @else
					                          <?php $friendprofile_path = $friends->get_add_friend->get_profilephoto->first()->gallery_path; ?>
					                          <img class="h-full mx-auto my-0 rounded-full" src="{{ asset('users/profile_img/'.$friendprofile_path) }}" alt="">
					                        @endif 

				                      @endif  

				                        
				                   </div>
				                </div>
				                <div>
				                  <div class="flex space-x-3">
				                    <div class="flex-1 min-w-0">
				                    	@if(Auth::user()->id == $friends->friend_userid )
					                      <p class="mt-2 font-bold text-center text-gray-900 text-md">  
					                      	<a href="#">
					                      		{{ $friends->get_request_user->name }} 
					                      	</a>
						                 	  </p>
						                  	<p class="text-xs text-center text-gray-500 font-regular">  
					                      	{{ $friends->get_request_user->email }}
						                    </p>
							                @else
							                  <p class="mt-2 font-bold text-center text-gray-900 text-md">  
						                      	{{ $friends->get_add_friend->name }}
							                  </p>
							                  <p class="text-xs text-center text-gray-500 font-regular">  
						                      	{{ $friends->get_add_friend->email }}
							                  </p>
							                @endif  

						                  @if(Auth::user()->id == $friends->friend_userid )
					                      <!-- <p class="my-2 text-center">
					                        <button wire:click="unblockFriend({{$friends->id}},{{ $friends->get_request_user->id }},'user')" class="bg-custom-pink text-white text-sm font-bold rounded-md px-2 py-1.5 pointer">
					                        Unblock
					                        </button>
					                      </p> -->
					                      @else
					                     <!--  <p class="my-2 text-center">
					                      <button wire:click="unblockFriend({{$friends->id}},{{ $friends->get_add_friend->id }},'request')" class="bg-custom-pink text-white text-sm font-bold rounded-md px-2 py-1.5 pointer">
					                         Unblock
					                        </button>
					                      </p> -->
					                      @endif 
				                    </div>
				                   
				                  </div>
				                </div>
				              </div>
				              <!-- </a> -->
				            </div>

				           
				            @endif
			            @endif

             		@endforeach 
			      
             		</div>

			      </div>
			     

			    </div>
			  </div>












				

				<!-- This example requires Tailwind CSS v2.0+ -->
			



				</div>
				<div class="col-span-4">





				</div>
			</div>

          
            <!-- More questions... -->








          
        </div>
        <!-- friend -->
        @else
        @include('layouts.editor.page-404')
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