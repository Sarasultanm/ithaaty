<?php
	 use Carbon\Carbon;   
?>
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

			@if(Auth::user()->get_plan->check_features('a1')->count() == 0 )

        <div class="mt-4">
          <!-- <div class="w-full mb-5 ">
          	 <h1 class="text-xl font-bold text-gray-800">Overview</h1> 
          </div> -->
           <div class="w-full ">
           		@if(Auth::user()->get_plan->check_features('a2')->count() != 0 )
                <h1 class="text-xl font-bold text-gray-800">Default Analytics</h1> 
              @endif 
              @if(Auth::user()->get_plan->check_features('a3')->count() != 0 )
                <h1 class="text-xl font-bold text-gray-800">Advance Analytics</h1> 
              @endif  
         </div> 
           <div class="w-full ">
          	 <x-auth-session-status-custom class="mt-4 mb-4" :status="session('status')" />
          </div>
          
          <!-- This example requires Tailwind CSS v2.0+ -->
			<div>
			  <dl class="grid grid-cols-1 mt-5 overflow-hidden bg-white divide-y divide-gray-200 rounded-lg shadow md:grid-cols-3 md:divide-y-0 md:divide-x">
			    <div class="px-4 py-5 sm:p-6">
			      <dt class="text-base font-normal text-gray-900">
			        Today Watch Time
			      </dt>
			      <dd class="flex items-baseline justify-between mt-1 md:block lg:flex">
			        <div class="flex items-baseline text-2xl font-semibold text-custom-pink">
			          {{-- <a href="{{ route('editorSubscriberOverview') }}">{{ $followers->count() }}</a> --}}
					  {{ $todayWatchTime }}
			        </div>


			      </dd>
			    </div>

			    <div class="px-4 py-5 sm:p-6">
			      <dt class="text-base font-normal text-gray-900">
			       Monthly Watch Time {{ Carbon::now()->month; }}
			      </dt>
			      <dd class="flex items-baseline justify-between mt-1 md:block lg:flex">
			        <div class="flex items-baseline text-2xl font-semibold text-custom-pink">
						{{ $monthlyWatchTime }}
			        </div>


			      </dd>
			    </div>

			    <div class="px-4 py-5 sm:p-6">
			      <dt class="text-base font-normal text-gray-900">
			        Total Watch Time
			      </dt>
			      <dd class="flex items-baseline justify-between mt-1 md:block lg:flex">
			        <div class="flex items-baseline text-2xl font-semibold text-custom-pink">
						@php 
							$getUserTotalHrs = 0;
						@endphp
						@foreach ( Auth::user()->get_channels as $channel_list )
							@foreach($channel_list->get_podcast()->get() as $podcast_items)
								@foreach ($podcast_items->get_episodes  as $episodes_list )
									@if($episodes_list->get_audiotimestats->count() != 0)
										@php
												$getUserTotalHrs = $getUserTotalHrs +  $this->getTotalWatchTimePerAudio($episodes_list->poditem_audioid);
												
										@endphp

									@endif
								@endforeach
							@endforeach
						@endforeach
						{{ $this->getTimeByString($getUserTotalHrs)}}
						{{-- <span class="font-bold"</span> --}}
						{{-- {{ $totalWatchTime }} --}}
						{{-- @php
							$ats_list = Auth::user()->get_audiotimestats()->get();
							$getAllTotalWatchtime = 0;
						@endphp
						@foreach ($ats_list->groupby('ats_userid') as $ats_items )
							Total:{{ $ats_items->max('ats_viewedtime') }} <br>
							@php
								$getAllTotalWatchtime = $getAllTotalWatchtime + $ats_items->max('ats_viewedtime');

							@endphp
						@endforeach
						{{ $this->getTimeByString($getAllTotalWatchtime) }} --}}
						{{-- {{ $today = Carbon::now()->format('d'); }}<br>
						Today: {{ $todayWatchTime }}<br>
						Total: <br>
						Monthy: {{ $monthlyWatchTime }} --}}
					
					
			        </div>


			      </dd>
			    </div>
			  </dl>
			</div>

			<div class="grid grid-cols-12 gap-5 mt-5">
				<div class="xl:col-span-12 lg:col-span-12 md:col-span-12 sm:col-span-12">
				
				@if($topOneView)
				<!-- This example requires Tailwind CSS v2.0+ -->
				<div class="flex flex-col">
					  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
					    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
					      <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
					        <table class="min-w-full divide-y divide-gray-200">
					          <thead class="bg-gray-50">
					            <tr>
					              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
					                Popular Episode
					              </th>
					             <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
					               
					              </th>
					              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
					                Likes
					              </th>
					              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
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
					                  <div class="flex-shrink-0 w-10 h-10">
					                    <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
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
					                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
					                  {{ $topOneView->get_like->count() }}
					                </span>
					              </td>
					              <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
					                 <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
					                  {{ $topOneView->total }}
					                </span>
					              </td>
					             <!--  <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
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
				@endif

				
				</div>

			</div>
			<div class="grid grid-cols-6 gap-4 mt-10">
		
				@foreach ( Auth::user()->get_channels as $channel_list )
					<div class="col-span-6 p-1 rounded-md">
						
						@if(Auth::user()->get_gallery('channel_cover','active')->count() != 0)
							<?php $img_path_cover = $channel_list->get_channel_cover->gallery_path ?>
							<?php $s3_cover_link = config('app.s3_public_link')."/users/channel_cover/".$img_path_cover; ?>
							<div class="w-full h-24 bg-center bg-cover" style="background-image: url({{ $s3_cover_link }});">
								&nbsp;
							</div>
						@else
							<div class="w-full h-24 bg-center bg-cover bg-custom-pink">
								&nbsp;
							</div>
			
						@endif
						<div class="w-full ">
							<div class="">
								<div class="relative flex items-center w-full pb-2 space-x-3 bg-white border-b-2 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 ">
									<div class="flex-shrink-0">
									@if(Auth::user()->get_gallery('channel_photo','active')->count() == 0)
										<img class="w-24 h-24 mt-5 ml-5 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="">
									@else
										<?php $img_path = $channel_list->get_channel_photo->gallery_path ?>
										<?php $s3_link = config('app.s3_public_link')."/users/channe_img/".$img_path; ?>
										<img class="mt-2 ml-2 rounded-full w-14 h-14" src="{{ $s3_link }}" alt=""> 
									@endif

									</div>
									<div class="flex-1 min-w-0">
										<a>
										<p class="mt-5 text-xl font-bold text-gray-900">
											{{ $channel_list->channel_name }}
										</p>
										<p class="text-gray-500 truncate text-md">
											{{ $channel_list->get_subs()->count() }}  subcribers
										</p>
										</a>
									</div>
									<div class="pr-5">
										<p class="text-sm text-right text-gray-500">
											@php 
												$getChannelTotalHrs = 0;
											@endphp
											@foreach($channel_list->get_podcast()->get() as $podcast_items)
												@foreach ($podcast_items->get_episodes  as $episodes_list )
													@if($episodes_list->get_audiotimestats->count() != 0)
													@php
															$getChannelTotalHrs = $getChannelTotalHrs +  $this->getTotalWatchTimePerAudio($episodes_list->poditem_audioid);
														@endphp
													@endif
												@endforeach
											@endforeach
											Total Hrs:<br>
											<span class="font-bold">{{ $this->getTimeByString($getChannelTotalHrs)}}</span>
										</p>
									</div>
								</div>
								<div class="mt-2">
									<div class="grid grid-cols-8 gap-4">
										@forelse($channel_list->get_podcast()->get() as $podcast_items)
											<div class="relative w-full col-span-4">
												<div class="flex p-1 bg-white rounded-md">
													<div class="flex-shrink-0">
														<?php  $podcast_img_path = $podcast_items->get_channel_photo->gallery_path ?>
														<?php $podcast_s3_link = config('app.s3_public_link')."/users/podcast_img/".$podcast_img_path; ?>
														<img class="w-12 h-12 mt-1 ml-1 rounded-md" src="{{ $podcast_s3_link }}" alt="">
													</div>
													<div class="flex-1 min-w-0">
														<a>
														<p class="mt-2 ml-3 text-sm font-bold text-gray-900">
															{{$podcast_items->podcast_title}} 
															@php
																$getPodcastTotalHrs = 0;
															@endphp
															@foreach ($podcast_items->get_episodes  as $episodes_list )
																@if($episodes_list->get_audiotimestats->count() != 0)
																	{{-- <br>{{ $episodes_list->poditem_audioid }} / --}}
																	{{-- {{ $episodes_list->get_audiotimestats->count() }} --}}
																	{{-- {{ $this->getTimeByString($this->getTotalWatchTimePerAudio($episodes_list->poditem_audioid))}} --}}
																	@php
																		$getPodcastTotalHrs = $getPodcastTotalHrs +  $this->getTotalWatchTimePerAudio($episodes_list->poditem_audioid);
																	@endphp
																@endif
															@endforeach
															
														</p>
														<p class="text-gray-500 truncate text-md">
															<p class="flex">
																<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-3 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
																	<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
																</svg>
																<span class="text-sm text-gray-500 truncate">{{ $podcast_items->get_episodes->count() }}</span>
															</p>
											
														</p>
														</a>
													</div>
													<div class="pr-5">
														<p class="text-sm text-right text-gray-500">
															Total Hrs:<br>
															<span class="font-bold">{{ $this->getTimeByString($getPodcastTotalHrs)}}</span>
														</p>
													</div>

												</div>
												@foreach ($podcast_items->get_episodes  as $episodes_list )
													
													@if($episodes_list->get_audiotimestats->count() != 0)
													<div class="flex w-full px-2 py-2 mt-1 text-sm bg-white">
														<div class="flex-1">
															{{ $episodes_list->get_audio->audio_name }}	
														</div>
														<div class="">
															{{ $this->getTimeByString($this->getTotalWatchTimePerAudio($episodes_list->poditem_audioid))}}
												
															
														</div>
													
														
														
													
													</div>
														
													@endif
												@endforeach
												
											</div>
											
										@empty
										<p>No Podcast</p>
									
										@endforelse
									</div>
									
								</div>
								
								<div>

								</div>
					
								<!-- More people... -->
							</div>
						</div>
					</div>

				@endforeach

				
			</div>

			

			<div class="grid grid-cols-3 gap-4 mt-10">
				<div class="col-span-1">
					<aside class="p-5 overflow-y-auto bg-white border-gray-200 rounded-lg lg:block">

						<div class="pb-5 space-y-6">
							<h3 class="font-medium text-gray-900">Most Views </h3>
							<ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
								@foreach($mostViews as $mViews)
								<li class="flex items-center justify-between py-3">
									<div class="flex items-center">
									<img src="{{ asset('images/slider-img/slide5.jpg') }}" class="w-8 h-8 ">
									<div class="ml-4 ">
										<p class="text-sm font-medium text-gray-900">{{ $mViews->get_audio->audio_name }} </p>
									<p class="text-sm text-gray-500">{{$mViews->get_audio->get_user->name}}</p>
									</div>
									
									</div>
									<button type="button" class="ml-6 text-sm font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ $mViews->total }}<span class="sr-only"> Aimee Douglas</span></button>
								</li>
								@endforeach
								
							</ul>
						</div>
	
						</aside>
				</div>
				<div class="col-span-1">
					<aside class="p-5 overflow-y-auto bg-white border-gray-200 rounded-lg lg:block">

						<div class="pb-5 space-y-6">
							<h3 class="font-medium text-gray-900">Recent Like</h3>
							<ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
								@foreach($recentLikes as $rLikes)
								<li class="flex items-center justify-between py-3">
									<div class="flex items-center">
									<img src="{{ asset('images/slider-img/slide5.jpg') }}" class="w-8 h-8 ">
									<div class="ml-4 ">
										<p class="text-sm font-medium text-gray-900">{{$rLikes->get_audio->audio_name}}</p>
									<p class="text-sm text-gray-500">{{$rLikes->get_audio->get_user->name}}</p>
									</div>
									
									</div>
									<button type="button" class="ml-6 text-sm font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Like<span class="sr-only"> Aimee Douglas</span></button>
								</li>
								@endforeach
								
							</ul>
						</div>
	
						</aside>
				</div>
				<div class="col-span-1">
						
					<aside class="p-5 overflow-y-auto bg-white border-gray-200 rounded-lg lg:block">

						<div class="pb-5 space-y-6">
							<h3 class="font-medium text-gray-900">Recent Comments</h3>
							<ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
								@foreach($recentComments as $rComments)
								<li class="flex items-center justify-between py-3">
									<div class="flex items-center">
									<img src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=1024&amp;h=1024&amp;q=80" alt="" class="w-8 h-8 rounded-full">
									<div class="ml-4 ">
										<p class="text-sm font-medium text-gray-900">{{$rComments->get_audio->audio_name}}</p>
										<p class="text-sm text-gray-500">{{$rComments->coms_message}}</p>
									</div>
									</div>
								<!--    <button type="button" class="ml-6 text-sm font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Remove<span class="sr-only"> Aimee Douglas</span></button> -->
								</li>
								@endforeach 
							
							</ul>
						</div>
	
						</aside>
				</div>
			</div>

          
            <!-- More questions... -->


			<div class="grid grid-cols-10 gap-4 mt-10">
				<div class="col-span-6">
					@include('livewire.editor.overview.bar-graph')
				</div>
				<div class="col-span-4">

					@include('livewire.editor.overview.gender-stats')
				</div>
			</div>
			
	




          
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