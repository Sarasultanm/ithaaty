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
          
          <!-- This example requires Tailwind CSS v2.0+ -->


			<div class="grid grid-cols-12 mt-5 gap-5">
				<div class="col-span-8">
				
				<div x-data="{
			      openTab: 1,
			      activeClasses: 'border-indigo-500 text-indigo-600',
			      inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
			    }" 
			    class="">

			   <div class="border-b border-gray-200">
			  	<ul class="-mb-px flex" >
			      <li @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses"   class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm" >
			        <a  href="#">Age Analytics</a>
			      </li>
			      <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm">
			        <a  href="#">Likes & Comments</a>
			      </li>
			      <li @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses"  class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm">
			        <a  href="#">Country</a>
			      </li>
			    
			    </ul>
			  </div>
			  	<div class="w-full pt-4">
			  			<div x-show="openTab === 1">

			  				 <div class="mb-5">
							
						   <div class="shadow-lg rounded-lg overflow-hidden">
							  <div class="py-3 px-5 bg-gray-50">
							      Age
							  </div>
							  <canvas class="p-10 " id="chartBarAge"></canvas>
							</div>

									<!-- Required chart.js -->
									<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

									<!-- Chart bar -->
									<script>

									  const labelsBarChart_age = [
									    '15-19',
									    '20-29',
									    '30-39',
									    '40-59',
									    
									  ];
									  const dataBarChart_age = {
									    labels: labelsBarChart_age,
									    datasets: [{
									      label: 'Subcribers by Age',
									      backgroundColor: 'hsl(252, 82.9%, 67.8%)',
									      borderColor: 'hsl(252, 82.9%, 67.8%)',
									      data: [5,1,10,3,4],
									    }]
									  };

									  const configBarChart_age = {
									    type: 'bar',
									    data: dataBarChart_age,
									    options: {}
									  };


									  var chartBar_age = new Chart(
									    document.getElementById('chartBarAge'),
									    configBarChart_age
									  );
									</script>

						</div>	

			  			</div>



			  			<div x-show="openTab === 2">

					  	 <div class="mb-5">
							
						   <div class="shadow-lg rounded-lg overflow-hidden">
							  <div class="py-3 px-5 bg-gray-50">
							      Likes
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
									      label: 'Likes per month',
									      backgroundColor: 'hsl(252, 82.9%, 67.8%)',
									      borderColor: 'hsl(252, 82.9%, 67.8%)',
									      data: [{{$jan_likes}},{{$feb_likes}},{{$mar_likes}},{{$apr_likes}},{{$may_likes}},{{$jun_likes}},{{$jul_likes}},{{$aug_likes}},{{$sep_likes}},{{$oct_likes}},{{$nov_likes}},{{$dec_likes}}],
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
	

						<div class="mt-5">
							<div class="shadow-lg rounded-lg overflow-hidden">
							  <div class="py-3 px-5 bg-gray-50">
							      Comments
							  </div>
							  <canvas class="p-10 " id="chartLine"></canvas>
							</div>

							<!-- Required chart.js -->
							<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

							<!-- Chart line -->
							<script>

							    const labels = [
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
							    const data = {
							        labels: labels,
							        datasets: [{
							            label: 'Comments per month',
							            backgroundColor: 'hsl(252, 82.9%, 67.8%)',
							            borderColor: 'hsl(252, 82.9%, 67.8%)',
							            data: [{{$jan_coms}},{{$feb_coms}},{{$mar_coms}},{{$apr_coms}},{{$may_coms}},{{$jun_coms}},{{$jul_coms}},{{$aug_coms}},{{$sep_coms}},{{$oct_coms}},{{$nov_coms}},{{$dec_coms}}],
							        }]
							    };

							    const configLineChart = {
							        type: 'line',
							        data,
							        options: {}
							    };

							    var chartLine = new Chart(
							        document.getElementById('chartLine'),
							        configLineChart
							    );
							</script>
							
						</div>






			  			</div>


			  			<div x-show="openTab === 3">

			  				<div class="shadow-lg rounded-lg overflow-hidden">
							  <div class="py-3 px-5 bg-gray-50">
							      Followers by Countro
							  </div>
							  <canvas class="p-10 " id="chartBar_country"></canvas>
							</div>

							<!-- Required chart.js -->
							<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

							<!-- Chart bar -->
							<script>

							  const labelsBarChart_country = [
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
							  const dataBarChart_country = {
							    labels: labelsBarChart_country,
							    datasets: [{
							      label: 'My First dataset',
							      backgroundColor: 'hsl(252, 82.9%, 67.8%)',
							      borderColor: 'hsl(252, 82.9%, 67.8%)',
							      data: [0,1,2,3,4,5,6,7,8,9,10],
							    }]
							  };

							  const configBarChart_country = {
							    type: 'bar',
							    data: dataBarChart_country,
							    options: {}
							  };


							  var chartBar_country = new Chart(
							    document.getElementById('chartBar_country'),
							    configBarChart_country
							  );
							</script>
			  			
			  			</div>	





			    </div>

			   </div> 	












				<!-- This example requires Tailwind CSS v2.0+ -->

			







				</div>
				<div class="col-span-4">

				<div>
				  <dl class="mb-5  rounded-lg bg-white overflow-hidden shadow divide-y divide-gray-200 md:grid-cols-3 md:divide-y-0 md:divide-x">
				    
				    <div class="px-4 py-5 sm:p-6">
				      <dt class="text-base font-normal text-gray-900">
				        Total Subcribers
				      </dt>
				      <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
				        <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
				         {{ $followers->count() }}
				         <?php $female=0;$male=0; ?> 
				         @foreach ($followers->get() as $follows)

				         @if($follows->get_user_following->gender == "Female")
				         	<?php $female++; ?>
				         @else
				         	<?php $male++; ?>

				         @endif
				         	

				         @endforeach

				         

				        </div>


				      </dd>
				    </div>
				  </dl>
				</div>

				<div class="mb-5">
					<div class="shadow-lg rounded-lg overflow-hidden">
				  <div class="py-3 px-5 bg-gray-50">
				    Gender Audience
				  </div>
				  <canvas class="p-10 " id="chartPie"></canvas>
				</div>

				<!-- Required chart.js -->
				<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

				<!-- Chart pie -->
				<script>

				  const dataPie = {
				    labels: [
				      'Female '+{{ $female }},
				      'Male '+{{ $male }}
				    ],
				    datasets: [{
				      label: 'My First Dataset',
				      data: [{{ $female }}	,{{ $male }}	],
				      backgroundColor: [
				        'rgb(133, 105, 241)',
				        'rgb(101, 143, 241)'
				      ],
				      hoverOffset: 4
				    }]
				  };

				  const configPie = {
				    type: 'pie',
				    data: dataPie,
				    options: {}
				  };


				  var chartBar = new Chart(
				    document.getElementById('chartPie'),
				    configPie
				  );
				</script>
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