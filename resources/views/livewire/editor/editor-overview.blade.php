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

     

      <main class="xl:col-span-10 lg:col-span-9">

      @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
      	@include('layouts.editor.page-404')
			@else

			@if(Auth::user()->get_plan->check_features('a1')->count() == 0 )

        <div class="mt-4">
          <!-- <div class="mb-5 w-full ">
          	 <h1 class="font-bold text-gray-800 text-xl">Overview</h1> 
          </div> -->
           <div class=" w-full ">
           		@if(Auth::user()->get_plan->check_features('a2')->count() != 0 )
                <h1 class="font-bold text-gray-800 text-xl">Default Analytics</h1> 
              @endif 
              @if(Auth::user()->get_plan->check_features('a3')->count() != 0 )
                <h1 class="font-bold text-gray-800 text-xl">Advance Analytics</h1> 
              @endif  
         </div> 
           <div class="w-full ">
          	 <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>
          
          <!-- This example requires Tailwind CSS v2.0+ -->
			<div>
			  <dl class="mt-5 grid grid-cols-1 rounded-lg bg-white overflow-hidden shadow divide-y divide-gray-200 md:grid-cols-3 md:divide-y-0 md:divide-x">
			    <div class="px-4 py-5 sm:p-6">
			      <dt class="text-base font-normal text-gray-900">
			        Total Subscribers
			      </dt>
			      <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
			        <div class="flex items-baseline text-2xl font-semibold text-custom-pink">
			          <a href="{{ route('editorSubscriberOverview') }}">{{ $followers->count() }}</a>
			    	
			        </div>


			      </dd>
			    </div>

			    <div class="px-4 py-5 sm:p-6">
			      <dt class="text-base font-normal text-gray-900">
			        Avg. Open Rate
			      </dt>
			      <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
			        <div class="flex items-baseline text-2xl font-semibold text-custom-pink">
			          0%
	
			        </div>


			      </dd>
			    </div>

			    <div class="px-4 py-5 sm:p-6">
			      <dt class="text-base font-normal text-gray-900">
			        Avg. Watch Time
			      </dt>
			      <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
			        <div class="flex items-baseline text-2xl font-semibold text-custom-pink">
			          0%
			          
			        </div>


			      </dd>
			    </div>
			  </dl>
			</div>

			<div class="grid grid-cols-12 mt-5 gap-5">
				<div class="xl:col-span-8 lg:col-span-12 md:col-span-12 sm:col-span-12">
				

				<!-- This example requires Tailwind CSS v2.0+ -->
				<div class="flex flex-col">
					  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
					    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
					      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
					        <table class="min-w-full divide-y divide-gray-200">
					          <thead class="bg-gray-50">
					            <tr>
					              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					                Popular Episode
					              </th>
					             <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					               
					              </th>
					              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					                Likes
					              </th>
					              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					                Views
					              </th>
					            <!--   <th scope="col" class="relative px-6 py-3">
					                <span class="sr-only">Edit</span>
					              </th> -->
					            </tr>
					          </thead>
					          <tbody class="bg-white divide-y divide-gray-200">
					            <tr>
					              <td class="px-6 py-4 whitespace-nowrap">
					                <div class="flex items-center">
					                  <div class="flex-shrink-0 h-10 w-10">
					                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
					                  </div>
					                  <div class="ml-4">
					                    <div class="text-sm font-medium text-gray-900">
					                     {{ $topOneView->get_audio->audio_name }}
					                    </div>
					                    <div class="text-sm text-gray-500">
					                    
					                    </div>
					                  </div>
					                </div>
					              </td>
					              <td class="px-6 py-4 whitespace-nowrap">
					                <div class="text-sm text-gray-900">Category</div>
					                <div class="text-sm text-gray-500">Music, Ads</div>
					              </td>
					              <td class="px-6 py-4 whitespace-nowrap">
					                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
					                  {{ $topOneView->get_like->count() }}
					                </span>
					              </td>
					              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
					                 <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
					                  {{ $topOneView->total }}
					                </span>
					              </td>
					             <!--  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
					                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
					              </td> -->
					            </tr>

					            <!-- More people... -->
					          </tbody>
					        </table>
					      </div>
					    </div>
					  </div>
				</div>
				<div class="mt-5">
					
									<div class="shadow-lg rounded-lg overflow-hidden">
					  <div class="py-3 px-5 bg-gray-50">
					      Audience
					  </div>
					  <canvas class="p-10 " id="chartBar"></canvas>
					</div>

							<!-- Required chart.js -->
							<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

							<!-- Chart bar -->
							<script>

							  const labelsBarChart = [
							    'Jan',
							    'Feb',
							    'Marc',
							    'Apri',
							    'May',
							    'Jun',
							    'Jul',
							    'Aug',
							    'Sep',
							    'Oct',
							    'Nov',
							    'Dec',
							  ];
							  const dataBarChart = {
							    labels: labelsBarChart,
							    datasets: [{
							      label: 'My First dataset',
							      backgroundColor: '#f98b88',
							      borderColor: 'hsl(252, 82.9%, 67.8%)',
							      data: [{{$jan}},{{$feb}},{{$mar}},{{$apr}},{{$may}},{{$jun}},{{$jul}},{{$aug}},{{$sep}},{{$oct}},{{$nov}},{{$dec}}],
							    }]
							  };

							  const configBarChart = {
							    type: 'bar',
							    data: dataBarChart,
							    options: {}
							  };


							  var chartBar = new Chart(
							    document.getElementById('chartBar'),
							    configBarChart
							  );
							</script>

				</div>
	



				</div>
				<div class="xl:col-span-4 lg:col-span-12 md:col-span-12 sm:col-span-12">


				<aside class=" bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">

		          <div class="pb-5 space-y-6">
		              <h3 class="font-medium text-gray-900">Most Views </h3>
		              <ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
		                 @foreach($mostViews as $mViews)
		                  <li class="py-3 flex justify-between items-center">
		                    <div class="flex items-center">
		                      <img src="{{ asset('images/slider-img/slide5.jpg') }}" class="w-8 h-8 ">
		                      <div class="ml-4 ">
		                      	 <p class="text-sm font-medium text-gray-900">{{ $mViews->get_audio->audio_name }} </p>
		                      <p class="text-sm text-gray-500">{{$mViews->get_audio->get_user->name}}</p>
		                      </div>
		                     
		                    </div>
		                    <button type="button" class="ml-6 bg-white rounded-md text-sm font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ $mViews->total }}<span class="sr-only"> Aimee Douglas</span></button>
		                  </li>
		                @endforeach
		                  
		              </ul>
		          </div>

        		</aside>

				<aside class="mt-5 bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">

		          <div class="pb-5 space-y-6">
		              <h3 class="font-medium text-gray-900">Recent Like</h3>
		              <ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
		                 @foreach($recentLikes as $rLikes)
		                  <li class="py-3 flex justify-between items-center">
		                    <div class="flex items-center">
		                      <img src="{{ asset('images/slider-img/slide5.jpg') }}" class="w-8 h-8 ">
		                      <div class="ml-4 ">
		                      	 <p class="text-sm font-medium text-gray-900">{{$rLikes->get_audio->audio_name}}</p>
		                      <p class="text-sm text-gray-500">{{$rLikes->get_audio->get_user->name}}</p>
		                      </div>
		                     
		                    </div>
		                    <button type="button" class="ml-6 bg-white rounded-md text-sm font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Like<span class="sr-only"> Aimee Douglas</span></button>
		                  </li>
		                @endforeach
		                  
		              </ul>
		          </div>

        		</aside>

        		<aside class="mt-5 bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">

		          <div class="pb-5 space-y-6">
		              <h3 class="font-medium text-gray-900">Recent Comments</h3>
		              <ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
		                @foreach($recentComments as $rComments)
		                  <li class="py-3 flex justify-between items-center">
		                    <div class="flex items-center">
		                      <img src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=1024&amp;h=1024&amp;q=80" alt="" class="w-8 h-8 rounded-full">
		                      <div class="ml-4 ">
		                      	 <p class="text-sm font-medium text-gray-900">{{$rComments->get_audio->audio_name}}</p>
		                      	 <p class="text-sm text-gray-500">{{$rComments->coms_message}}</p>
		                      </div>
		                    </div>
		                 <!--    <button type="button" class="ml-6 bg-white rounded-md text-sm font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Remove<span class="sr-only"> Aimee Douglas</span></button> -->
		                  </li>
		                @endforeach 
		               
		              </ul>
		          </div>

        		</aside>

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