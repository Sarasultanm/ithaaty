
 <x-slot name="header">
	<h2 class="text-xl font-semibold leading-tight text-gray-800">
		{{ __('Podcast Create') }}
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
	  
	  <div class="w-full ">
		   <x-auth-session-status-custom class="mt-4 mb-4" :status="session('status')" />
	  </div>
	  
	@if(Auth::user()->plan == 'new' || Auth::user()->plan =="")

	 @include('layouts.editor.page-404')

	@else

		<div class="w-full pt-4">
				<div >
					 @if(Auth::user()->get_plan->check_features('p3')->count() != 0 )
				<!-- 	<form wire:submit.prevent="save">  -->

				<div>
			  <h2 class="text-lg font-medium leading-6 text-gray-900"> Creat Post</h2>
			  <p class="mt-1 text-sm text-gray-500">
				This information will be displayed publicly so be careful what you share.
			  </p>
			 </div>

		<div class="border-t-2 border-custom-pink ">	
					<div class="mt-5">
						<label for="email" class="block text-sm font-medium text-gray-700">Title</label>
						<div class="mt-1">
						  <input type="text" name="email" id="email" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="title">
						</div>
						@error('title') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
					</div>

			<div class="mt-5">
			
			@if(Auth::user()->get_podcasts()->count() != 0)
			<label for="email" class="block text-sm font-medium text-gray-700">Podcast</label>
				<select wire:model="podcast_item" id="podcast" name="podcast" autocomplete="podcast" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="category">
					<option>Select</option>
					@foreach ($podcasts as $podcast  )
					<option value="{{ $podcast->id }}">{{ $podcast->podcast_title }}</option>
					@endforeach
				</select>
				@error('podcast_item') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
			</div>
			@else
				<p class="text-center text-red-400 font-regular text-md">No Podcast Available <a href="{{ route('editorChannel') }}" class="font-bold text-indigo-600">click here</a> to create podcast and channel <p>
			@endif

			{{-- <div class="hidden mt-5">

				<label for="email" class="block text-sm font-medium text-gray-700">Category</label>
					@if($categoryList->count() == 0 )
						<span class="text-sm font-medium text-red-600">Add category in the settings</span>
					 @else
					   <select id="country" name="country" autocomplete="country" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="category">
						<option>Select</option>
						@foreach($categoryList->get() as $cat)
						<option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
						@endforeach
					  </select> 

					   @endif
						@error('category') <span class="text-xs text-red-600">{{ $message }}</span> @enderror

			</div> --}}

			 
			<div class="mt-5">
			  <div class="flex">
						  <div class="flex-1 mr-2">

							  <label for="email" class="block text-sm font-medium text-gray-700">Season</label>
			    <select class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="season">
				  <option>Select</option>
				  @for ($s = 1; $s < 50; $s++)
					 <option value="{{ $s }}">{{ $s }}</option>
										@endfor
				</select> 
					 @error('season') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
						  </div>
				  <div class="flex-1 ml-2">
					  <label for="email" class="block text-sm font-medium text-gray-700">Episode</label>
					  <select class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="episode">
						<option>Select</option>
						@for ($e = 1; $e < 50; $e++)
						   <option value="{{ $e }}">{{ $e }}</option>
						@endfor
					  </select> 
					  @error('episode') <span class="text-xs text-red-600">{{ $message }}</span> @enderror

				  </div>
				   <div class="flex-1 ml-2">
					  <label for="email" class="block text-sm font-medium text-gray-700">Status</label>
					  <select class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="status">
						<option>Select</option>
						   <option value="public">Public</option>
							<option value="private">Private</option>
					  </select> 
					  @error('status') <span class="text-xs text-red-600">{{ $message }}</span> @enderror

				  </div>
				 
				</div>
			</div>

			<div class="mt-5" x-data="{ on: false }" >
					<div class="flex">
						<div class="flex-1">
							 <label for="about" class="mr-2 text-sm font-medium text-gray-700" :class="{ 'hidden': on, 'block': !(on) }">
								Transcript
							 </label>
						</div>
						<div>
							 <label for="about" class="block float-left mt-1 mr-2 text-xs font-medium text-gray-700">
								Toggle to hide textbox:
							 </label>
							 <button type="button" class="relative inline-flex flex-shrink-0 h-6 transition-colors duration-200 ease-in-out bg-gray-500 border-transparent rounded-full cursor-pointer w-11 " role="switch" aria-checked="false" :aria-checked="on.toString()" @click="on = !on" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'bg-custom-pink': on, 'bg-gray-500': !(on) }">
								<span class="sr-only">Use setting</span>
								<span aria-hidden="true" class="inline-block w-5 h-5 transition duration-200 ease-in-out transform translate-x-0 bg-white rounded-full shadow ring-0" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'translate-x-5': on, 'translate-x-0': !(on) }" style="margin-top:2px;"></span>
							</button>
							
						</div>
					</div>
					  <div class="mt-1" :class="{ 'hidden': on, 'block': !(on) }">
						<textarea id="about" name="about" rows="15" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="summary" ></textarea>
					  </div>
					  
			</div>

			<div class="mt-5" x-data="{ on: false }" >
					<div class="flex">
						<div class="flex-1">
							 <label for="about" class="mr-2 text-sm font-medium text-gray-700" :class="{ 'hidden': on, 'block': !(on) }">
								Hashtags
							 </label>
						</div>
						<div>
							 <label for="about" class="block float-left mt-1 mr-2 text-xs font-medium text-gray-700">
								Toggle to hide textbox:
							 </label>
							 <button type="button" class="relative inline-flex flex-shrink-0 h-6 transition-colors duration-200 ease-in-out bg-gray-500 border-transparent rounded-full cursor-pointer w-11 " role="switch" aria-checked="false" :aria-checked="on.toString()" @click="on = !on" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'bg-custom-pink': on, 'bg-gray-500': !(on) }">
								<span class="sr-only">Use setting</span>
								<span aria-hidden="true" class="inline-block w-5 h-5 transition duration-200 ease-in-out transform translate-x-0 bg-white rounded-full shadow ring-0" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'translate-x-5': on, 'translate-x-0': !(on) }" style="margin-top:2px;"></span>
							</button>
							
						</div>
					</div>
					  <div class="mt-1" :class="{ 'hidden': on, 'block': !(on) }">
						<textarea id="about" name="about" rows="3" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="hashtags" ></textarea>
					  </div>
					  
			</div>	


			<div class="mt-5 border-2 border-custom-pink rounded-sm px-2 py-5" x-data="{ on: true }" >
				<div class="flex">
					<div class="flex-1">
						 <label for="about" class="mr-2 text-sm  text-gray-700 font-bold">
							Premier Options
						 </label>
					</div>
					<div>
						 <label for="about" class="block float-left mt-1 mr-2 text-xs font-medium text-gray-700">
							Toggle to set premier option:
						 </label>
						 <button type="button" class="relative inline-flex flex-shrink-0 h-6 transition-colors duration-200 ease-in-out bg-gray-500 border-transparent rounded-full cursor-pointer w-11 " role="switch" aria-checked="false" :aria-checked="on.toString()" @click="on = !on" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'bg-custom-pink': on, 'bg-gray-500': !(on) }">
							<span class="sr-only">Use setting</span>
							<span aria-hidden="true" class="inline-block w-5 h-5 transition duration-200 ease-in-out transform translate-x-0 bg-white rounded-full shadow ring-0" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'translate-x-5': on, 'translate-x-0': !(on) }" style="margin-top:2px;"></span>
						</button>
						
					</div>
				</div>
				  <div class="mt-1" :class="{ 'hidden': on, 'block': !(on) }">
					<div class="flex">
						<div class="flex-1 mr-2">

						<label for="email" class="block text-sm font-medium text-gray-700">Month</label>
							<select wire:model="pr_month" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="season">
								<option selected value="0">Select</option>
								<option value='01'>Janaury</option>
								<option value='02'>February</option>
								<option value='03'>March</option>
								<option value='04'>April</option>
								<option value='05'>May</option>
								<option value='06'>June</option>
								<option value='07'>July</option>
								<option value='08'>August</option>
								<option value='09'>September</option>
								<option value='10'>October</option>
								<option value='11'>November</option>
								<option value='12'>December</option>
							</select> 
							@error('pr_month') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
						</div>

						<div class="flex-1 ml-2">
							<label for="email" class="block text-sm font-medium text-gray-700">Days</label>
								<select  wire:model="pr_day" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="episode">
									<option selected  value="0">Select</option>
									@for ($e = 1; $e < 31; $e++)
										<option value="{{ $e }}">{{ $e }}</option>
									@endfor
								</select> 
							@error('pr_day') <span class="text-xs text-red-600">{{ $message }}</span> @enderror

						</div>

						<div class="flex-1 ml-2">
							<label for="email" class="block text-sm font-medium text-gray-700">Year</label>
								<select  wire:model="pr_year" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="status">
								<option selected value="0">Select</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
								</select> 
							@error('pr_year') <span class="text-xs text-red-600">{{ $message }}</span> @enderror

						</div>
			   
			  </div>



					{{-- <textarea id="about" name="about" rows="3" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="hashtags" ></textarea> --}}
				  </div>
				  
		   </div>	




		</div>

		  <div x-data="{
		  openTab: 1,
		  activeClasses: 'border-custom-pink text-custom-pink',
		  inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
		}" 
		class="mb-20">

		<div class="mt-10 border-b border-gray-200">
			  <ul class="flex -mb-px" >
				   @if(Auth::user()->get_plan->check_features('p3')->count() != 0 )
			  <li @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses"   class="w-1/2 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer" >
				<a  >Embed Code</a>
			  </li>
			  @endif

			  @if(Auth::user()->get_plan->check_features('u1')->count() == 0 )
			  <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/2 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer">
				<a  >Media Files (mp3,mp4..)</a>
			  </li>
			  @endif
			</ul>

		</div>

		<div x-show="openTab === 1">
				
			<!-- embed code -->

			<div>
				<div class="mt-5">
					  <h2 class="text-lg font-medium leading-6 text-gray-900"> Embed Code</h2>
					  <p class="mt-1 text-sm text-gray-500">
						This information will be displayed publicly so be careful what you share.
					  </p>
				</div>   
				<div class="mt-5">
				 <div class="mt-1">
						<textarea id="about" name="about" rows="4" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="embedlink" ></textarea>
					  </div>
					   @error('embedlink') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
			  </div>



		  <div class="mt-3 mb-20 sm:mt-5">
				  <div class="w-full">
					  <div class="float-left w-1/2">&nbsp;</div>
						<div class="float-left w-1/2 text-right">
							@if(Auth::user()->get_podcasts()->count() != 0)
							<button type="submit" wire:click="save()" class="inline-flex justify-center w-1/2 px-4 py-2 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-custom-pink sm:col-start-2 sm:text-md">Save</button>
							@endif
						</div>
							  </div>    
					   </div>

				   </div


			<!-- embed code -->


		</div>

		<div x-show="openTab === 2">

			<!-- upload file -->

			<div>
			   
				<div class="mt-5">
					  <h2 class="text-lg font-medium leading-6 text-gray-900"> Upload Media File</h2>
					  <p class="mt-1 text-sm text-gray-500">
						This information will be displayed publicly so be careful what you share.
					  </p>
				</div> 

		   <div class="mt-5">

		   <div x-data="{ isUploading: false, progress: 0, success: false, error:false }" 
			 x-on:livewire-upload-start="isUploading = true"
			 x-on:livewire-upload-finish="isUploading = false,success = true" 
			 x-on:livewire-upload-error="isUploading = false,error= true"
			 x-on:livewire-upload-progress="progress = $event.detail.progress">

				<label for="email" class="block text-sm font-medium text-gray-700">Upload Media File (.mp3, .mp4 )</label>
				<div class="mt-1">
				  <input type="file"  class="" wire:model="audio">
				</div>

				<div class="mt-5">
				  <div x-show="isUploading"  class="relative pt-1">
					<div class="text-center text-gray-700">
					  Please wait while uploading the file .. <input x-bind:value="`${progress}%`" disabled style="width: 60px;">
					</div>
					<div  class="flex h-2 overflow-hidden text-xs bg-purple-200 rounded progress">
					  <div x-bind:style="`width:${progress}%`"
						class="flex flex-col justify-center text-center text-white shadow-none whitespace-nowrap bg-custom-pink"
					  ></div>
					</div>

				  </div>

				 <div  x-show="success">
					 <div class="mt-3 mb-20 sm:mt-5">
							  <div class="w-full">
								<div class="float-left w-1/2">&nbsp;
									<div class="text-sm font-bold text-center text-gray-800 text-custom-pink"" wire:loading wire:target="saveMedia">
													Please wait while saving your file to server...
												</div>
								</div>
									<div class="float-left w-1/2 text-right">
									<div class="text-right">
										@if(Auth::user()->get_podcasts()->count() != 0)
										<button type="submit" wire:click="saveMedia()" wire:loading.attr="disabled" class="inline-flex justify-center w-1/2 px-4 py-2 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-custom-pink sm:col-start-2 sm:text-md">Save Podcast</button>
										@endif
									</div>
										  </div>    
									   </div>

								   


				</div>

				  <!-- <p x-show="success" class="text-sm font-bold text-center text-gray-800 text-custom-pink">File Upload Complete</p>  -->
				   <p x-show="error" class="text-sm font-bold text-center text-red-800">*Error to upload the file</p> 

				</div>

			   </div>
			  
						
				</div>

				   
		  
		 


			   </div>


			<!-- upload file -->

		</div>


	  </div>



				  @else
				  @include('layouts.editor.page-404')

		 <!-- 
		  </form>  -->
		  @endif
				</div>

		</div>

	<!--    </div> -->

	
	   @endif










	 

	</div>
  </main>
  
</div>
</div>
</div>


	</div>
</div><div>
{{-- The best athlete wants his opponent at his best. --}}
</div>
