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
          	<div class=" w-full ">
                <h1 class="font-bold text-gray-800 text-xl">Friends</h1> 
         	</div> 
          <!-- This example requires Tailwind CSS v2.0+ -->
			
			<div class="grid grid-cols-12 mt-5 gap-5">
				<div class="col-span-8">

			  <div 
			    x-data="{
			      openTab: 1,
			      activeClasses: 'border-custom-pink text-custom-pink',
			      inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
			    }" 
			    class=""
			  >
			  <div class="border-b border-gray-200">
			  	<ul class="-mb-px flex" >
			      <li @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm" >
			        <a>Friend</a>
			      </li>
			      <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm">
			        <a>Confirm Request</a>
			      </li>
			       <li @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm">
			        <a>Sending Request</a>
			      </li>


			    </ul>
			  </div>
			
			    <div class="w-full pt-4">
			      <div x-show="openTab === 1">
			      	
			      	<div class="grid grid-cols-12 gap-5">

					@foreach($friendList as $friends)


						@if($friends->friend_status == "active")

						@if($friends->friend_type == "Friends")


			            <div class="col-span-4 p-2 rounded-lg">
			            	 @if(Auth::user()->id == $friends->friend_userid )  
				              <a href="{{ route('editorViewUser',['id' => $friends->get_request_user->id ]) }}" class="bg-white pointer rounded-lg border-2 border-white hover:border-gray-300 float-left w-full">
				              @else
				               <a href="{{ route('editorViewUser',['id' => $friends->get_add_friend->id ]) }}" class="bg-white pointer rounded-lg border-2 border-white hover:border-gray-300 float-left w-full">
				              @endif
				                <div class="mt-2 text-sm text-gray-700 space-y-4">
				                   <div class="text-white bg-cover h-36">
				                       <img class="h-full mx-auto my-0 rounded-full" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">    
				                   </div>
				                </div>
				                <div>
				                  <div class="flex space-x-3">
				                    <div class="min-w-0 flex-1">
			                    	@if(Auth::user()->id == $friends->friend_userid )
				                      <p class="text-md font-bold text-gray-900 mt-2 text-center">  
				                      	{{ $friends->get_request_user->name }} 
					                  </p>
					                  <p class="text-xs font-regular text-gray-500  text-center">  
				                      	{{ $friends->get_request_user->email }}
					                  </p>
					                @else
					                 <p class="text-md font-bold text-gray-900 mt-2 text-center">  
				                      	{{ $friends->get_add_friend->name }}
					                  </p>
					                  <p class="text-xs font-regular text-gray-500  text-center">  
				                      	{{ $friends->get_add_friend->email }}
					                  </p>
					                @endif  

					                  @if(Auth::user()->id == $friends->friend_userid )
				                      <p class="my-2 text-center">
				                        <button wire:click="removeFriend({{ $friends->get_request_user->id }})" class="bg-custom-pink text-white text-sm font-bold rounded-md px-2 py-1.5 pointer">
				                         Remove as Friend
				                        </button>
				                      </p>
				                      @else
				                      <p class="my-2 text-center">
				                      <!--   <button wire:click="removeFriend({{ $friends->get_add_friend->id }})" class="bg-custom-pink text-white text-sm font-bold rounded-md px-2 py-1.5 pointer">
				                         Remove as Friend
				                        </button> -->
				                      </p>
				                      @endif 
				                    </div>
				                   
				                  </div>
				                </div>
				              </a>
				            </div>

				           @endif

			            @endif

             		@endforeach 
					</div>


			      </div>
			      <div x-show="openTab === 2">
			      	

			      	<div class="grid grid-cols-12 gap-5">

			      		@foreach($confirmrequest as $friend)

							@if($friend->friend_type == "Send Request")

				            <div class="col-span-4 p-2 rounded-lg">
				              <a href="{{ route('editorViewUser',['id' => $friend->get_add_friend->id ]) }}" class="bg-white pointer rounded-lg border-2 border-white hover:border-gray-300 float-left w-full">
				                <div class="mt-2 text-sm text-gray-700 space-y-4">
				                   <div class="text-white bg-cover h-36">
				                       <img class="h-full mx-auto my-0 rounded-full" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">    
				                   </div>
				                </div>
				                <div>
				                  <div class="flex space-x-3">
				                    <div class="min-w-0 flex-1">
				                      <p class="text-md font-bold text-gray-900 mt-2 text-center">  
				                      	{{ $friend->get_add_friend->name }}
					                  </p>
					                  <p class="text-xs font-regular text-gray-500  text-center">  
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
			      	

			      	<div class="grid grid-cols-12 gap-5">

				      	@foreach($friendrequest as $requestfriend)

							@if($requestfriend->friend_type == "Send Request")
				             <div class="col-span-4 p-2 rounded-lg">
				              <a href="{{ route('editorViewUser',['id' => $requestfriend->get_request_user->id ]) }}" class="bg-white pointer rounded-lg border-2 border-white hover:border-gray-300 float-left w-full">
				                <div class="mt-2 text-sm text-gray-700 space-y-4">
				                   <div class="text-white bg-cover h-36">
				                       <img class="h-full mx-auto my-0 rounded-full" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">    
				                   </div>
				                </div>
				                <div>
				                  <div class="flex space-x-3">
				                    <div class="min-w-0 flex-1">
				                      <p class="text-md font-bold text-gray-900 mt-2 text-center">  
				                      	{{ $requestfriend->get_request_user->name }}
					                  </p>
					                  <p class="text-xs font-regular text-gray-500  text-center">  
				                      	{{ $requestfriend->get_request_user->email }}
					                  </p>
				                      <p class="my-2 text-center">
				                       <!--  <button wire:click="cancelRequest({{ $requestfriend->get_request_user->id }})" class="bg-custom-pink text-white text-sm font-bold rounded-md px-2 py-1.5 pointer">
				                        Cancel Request
				                        </button> -->
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
			     


			    </div>
			  </div>












				

				<!-- This example requires Tailwind CSS v2.0+ -->
			



				</div>
				<div class="col-span-4">





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