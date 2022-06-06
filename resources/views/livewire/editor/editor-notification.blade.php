 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
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

        <div class="mt-4">
          <!-- <div class="mb-5 w-full ">
          	 <h1 class="font-bold text-gray-800 text-xl">Overview</h1> 
          </div> -->

           <div class="w-full ">
          	 <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>
          
          <!-- This example requires Tailwind CSS v2.0+ -->

			<div class=" w-full ">
                <h1 class="font-bold text-gray-800 text-xl">Notification</h1> 
            </div> 

			<div class="grid grid-cols-12 mt-5 gap-5">
				<div class="col-span-12">
				

				<!-- This example requires Tailwind CSS v2.0+ -->
				<div class="flex flex-col ">
					  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
					    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
					      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
					        <table class="min-w-full divide-y divide-gray-200">
					          <thead class="bg-gray-50">
					            <tr>
					              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					               Notification
					              </th>
					             <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					               {{-- Activity --}}
					              </th>
					              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					                {{-- Post --}}
					              </th>
					              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					                Time
					              </th>
					            <!--   <th scope="col" class="relative px-6 py-3">
					                <span class="sr-only">Edit</span>
					              </th> -->
					            </tr>
					          </thead>
					          <tbody class="bg-white divide-y divide-gray-200">
					          	@foreach($notif_list as $notif)

								@if($notif->notif_type == 'register' )  
								  @include('livewire.editor.notification.register-notifcation')
								@elseif($notif->notif_type == 'channel_collaborators')
									@include('livewire.editor.notification.channel-collaborators-invite')
								@elseif($notif->notif_type == 'channel_collaborators_accept')
									@include('livewire.editor.notification.channel-collaborators-accept')
								@endif
					          	{{--
								 @if($notif->notif_type == 'follow' )
								
								 	 @include('livewire.editor.notification.follow-notifcation')

					            @elseif($notif->notif_type == 'following')

								  	@include('livewire.editor.notification.following-notification')

					            @elseif($notif->notif_type == 'like')

									 @include('livewire.editor.notification.like-notifcation')

					            @elseif($notif->notif_type == 'liked')

									@include('livewire.editor.notification.liked-notifcation')

					            @elseif($notif->notif_type == 'comments')

									@include('livewire.editor.notification.comments-notifcation')

					            @elseif($notif->notif_type == 'commenting')

									@include('livewire.editor.notification.commenting-notifcation')
					            
					            @elseif($notif->notif_type == 'addnotes')
					            
									@include('livewire.editor.notification.addnotes-notification')

					            @elseif($notif->notif_type == 'friend now')

									@include('livewire.editor.notification.friend-now-notifcation')
					            
					           
					            @elseif($notif->notif_type == 'friend')
					            
									@include('livewire.editor.notification.friend-notifcation')
					            
					            @endif
								
								--}}








					            @endforeach
					            <!-- More people... -->
					          </tbody>
					        </table>
					         <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6" aria-label="Pagination">
			                   {{ $notif_list->links() }}
			                  </nav>
					      </div>
					    </div>
					  </div>
				</div>


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