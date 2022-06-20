 <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Notes') }}
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
        @if(Auth::user()->get_plan->check_features('s2')->count() != 0 )
        <div class="mt-4">
          <!-- <div class="w-full mb-5 ">
          	 <h1 class="text-xl font-bold text-gray-800">Overview</h1> 
          </div> -->

           <div class="w-full ">
          	 <x-auth-session-status-custom class="mt-4 mb-4" :status="session('status')" />
          </div>
          
          <!-- This example requires Tailwind CSS v2.0+ -->
			<div class="w-full ">
                <h1 class="text-xl font-bold text-gray-800">Notes</h1> 
         </div> 

				<div class="grid grid-cols-12 gap-5 mt-5">
					<div class="col-span-12">

					
							<!-- This example requires Tailwind CSS v2.0+ -->
				<div class="flex flex-col">
					  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
					    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
					      <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
					        <table class="min-w-full divide-y divide-gray-200">
					          <thead class="bg-gray-50">
					            <tr>
					              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
					               Audio
					              </th>
					             <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
					               
					              </th>
					              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
					                Message
					              </th>
					              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
					                Time
					              </th>
					              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">
					                Share
					              </th>
					            <!--   <th scope="col" class="relative px-6 py-3">
					                <span class="sr-only">Edit</span>
					              </th> -->
					            </tr>
					          </thead>
					          <tbody class="bg-white divide-y divide-gray-200">
					          	@foreach($notesList as $notes)
			
					            <tr>
					              <td class="px-6 py-4 whitespace-nowrap">
					                <div class="flex items-center">
					                  <!-- <div class="flex-shrink-0 w-10 h-10">
					                    <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
					                  </div> -->
					                  <div class="">
					                  	<a href="{{ route('editorPodcastView',['id' => $notes->get_audio->id ]) }}">
					                    <div class="text-sm font-bold text-gray-900">
					                     {{ $notes->get_audio->audio_name }}
					                    </div>
					                    <div class="text-sm text-gray-500">
					                    	 {{ $notes->get_user->name }}
					                    </div>
					                  	</a>
					                  </div>
					                </div>
					              </td>
					              <td class="px-6 py-4 whitespace-nowrap">
					               <!--  <div class="text-sm text-gray-900">Category</div> -->
					                <div class="text-sm text-gray-500"></div>
					              </td>
					              <td class="px-6 py-4 whitespace-nowrap">
					              	 <div class="text-sm font-medium text-gray-500"> {{ $notes->notes_message }}  </div>
					              </td>
					              <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
					            {{ $notes->notes_time }}
					               
					              </td>
					              <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
					            		
					            	<!-- This example requires Tailwind CSS v2.0+ -->
													<span class="relative z-0 inline-flex float-right rounded-md shadow-sm">
													  <button wire:click="shareButton('facebook',{{ $notes->id }})"  type="button" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
													    Facebook
													  </button>
													 <!--  <button type="button" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
													    Instagram
													  </button> -->
													  <button wire:click="shareButton('facebook',{{ $notes->id }})"  type="button" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
													    Twitter
													  </button>
													</span>
													
													 
					               
					              </td>
					             <!--  <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
					                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
					              </td> -->
					            </tr>

					            @endforeach
					            <!-- More people... -->
					          </tbody>
					        </table>
					        <nav class="flex items-center justify-between px-4 py-3 bg-white border-t border-gray-200 sm:px-6" aria-label="Pagination">
			                    {{ $notesList->links() }}
			                  </nav>
					      </div>
					    </div>
					  </div>
				</div>




					</div>	
				</div>

          
            <!-- More questions... -->
          
        </div>
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