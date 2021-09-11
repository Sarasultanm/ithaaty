 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editor Dashboard') }}
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
        <div class="w-full ">
             <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
        </div>

        <!--  updated -->
        <div class="grid grid-cols-12 mt-5 gap-5">

          <div class="col-span-8">

           <div class="grid gap-4 grid-cols-12">

            @foreach($audioList->get() as $myaudio)

            <div class="col-span-4 bg-white p-2 ">
              <article aria-labelledby="question-title-81614">
               <div>
                  <div class="flex space-x-3">
                    <div class="min-w-0 flex-1">
                      <p class="text-md font-bold text-gray-900">
                        <a href="#" class="hover:underline">{{ $myaudio->audio_name }}</a>
                      </p>
                    </div>
                  </div>
                </div>


                <div class="mt-2 text-sm text-gray-700 space-y-4">
                  
                   <div class="text-white bg-cover h-36" style="background-image: url('{{ asset('images/slider-img/slide1.jpg') }}');">
          
                              
                   </div>
                    
                </div>

                <div>
                  <div class="flex space-x-3">
                    <div class="min-w-0 flex-1">                      
                      <p class="text-xs text-gray-500 mt-2">
                        <a class="hover:underline">
                          <?php $date = date_create($myaudio->created_at); ?>
                          <time datetime="2020-12-09T11:43:00">{{ date_format($date,"M, Y") }}</time>  <span class="float-left">SE:{{ $myaudio->audio_season }} | EP:{{ $myaudio->audio_episode }}</span>
                        </a>
                      </p>
                      <div class="text-xs font-bold text-gray-900 mt-5" x-data="{ open: false }">
                        <!-- <a  wire:click="editdata({{$myaudio->id}})" class="hover:underline" @click="open = true" >Update</a> -->
                        <a href="{{ route('editorPodcastUpdate',['id' => $myaudio->id]) }}"  class="hover:underline">Update</a>
                        <a href="{{ route('editorPodcastDetails',['id' => $myaudio->id]) }}" class="hover:underline float-right" >Details</a>

                                <div x-show="open"
                                     x-transition:enter="ease-out duration-300"
                                     x-transition:enter-start="opacity-0"
                                     x-transition:enter-end="opacity-100"
                                     x-transition:leave="ease-in duration-200"
                                     x-transition:leave-start="opacity-100"
                                     x-transition:leave-end="opacity-0"
                                     class="fixed z-10 inset-0 overflow-y-auto">
                                  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                    </div>

                                    <!-- This element is to trick the browser into centering the modal contents. -->
                                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                                    <div 
                                     x-transition:enter="ease-out duration-300"
                                       x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                       x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                       x-transition:leave="ease-in duration-200"
                                       x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                       x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                       class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle lg:max-w-4xl sm:max-w-sm sm:w-full sm:p-6" role="dialog" aria-modal="true" aria-labelledby="modal-headline" @click.away="open = false">

                                   

                                        <div>
                                        <div class="mx-auto flex">
                                          <!-- Heroicon name: outline/check -->
                                          <h3 class="text-lg leading-6 font-medium text-gray-900">
                                            Update Post
                                          </h3>
                                        </div>
                                          <input type="hidden" wire:model="ea_id">
                                        <div class="mt-3 text-left sm:mt-5">
                                           <div class="flex">
                                            <div class="flex-1 mr-3">
                                              <div>

                                          <label for="email" class="block text-sm font-medium text-gray-700">Category</label>
                                          @if($categoryList->count() == 0 )
                                                 <span class="text-sm font-medium text-red-600">Add category in the settings</span>
                                                @else
                                                <select id="country" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="ea_category">
                                                      
                                                      @foreach($categoryList->get() as $cat)
                                                      <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                                      @endforeach
                                                 </select> 

                                                @endif
                                          
                                        </div>
                                        <div class="mt-5">
                                                  <label for="email" class="block text-sm font-medium text-gray-700">Title</label>
                                                  <div class="mt-1">
                                                    <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"  wire:model="ea_name">
                                                  </div>
                                              </div>
                                              
                                              <div class="mt-5">
                                                <div class="flex">
                                          <div class="flex-1 mr-2">
                                            <label for="email" class="block text-sm font-medium text-gray-700">Season</label>
                                            <div class="mt-1">
                                                      <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"  wire:model="ea_season">
                                                    </div>
                                          </div>
                                          <div class="flex-1 ml-2">
                                            <label for="email" class="block text-sm font-medium text-gray-700">Episode</label>
                                           <div class="mt-1">
                                                      <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"  wire:model="ea_episode">
                                                    </div>
                                          </div>
                                         
                                        </div>
                                      </div>
                                      <div class="mt-5">
                                        <fieldset>
                                            <legend class="">
                                             Upload Type
                                            </legend>
                                            <div class="bg-white rounded-md -space-y-px mt-1">
                                              <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
                                              <label class="border-gray-200 rounded-tl-md rounded-tr-md relative border p-2 flex cursor-pointer">
                                                <input wire:model="uploadType" value="uploadFile" type="radio" id="uploadAudio" class="h-4 w-4 mt-0.5 cursor-pointer text-indigo-600 border-gray-300 focus:ring-indigo-500" >
                                                <div class="ml-3 flex flex-col">
                                                  <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                                                  <span id="privacy-setting-0-label" class="text-gray-900 block text-sm font-medium">
                                                    Upload File
                                                  </span>
                                                  <!-- Checked: "text-indigo-700", Not Checked: "text-gray-500" -->
                                                  <span id="privacy-setting-0-description" class="text-gray-500 block text-xs">
                                                    This project would be available to anyone who has the link
                                                  </span>
                                                </div>
                                              </label>

                                              <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
                                              <label class="border-gray-200 relative border p-2 flex cursor-pointer">
                                                <input wire:model="uploadType" value="embedLink" type="radio" id="embedAudio" class="h-4 w-4 mt-0.5 cursor-pointer text-indigo-600 border-gray-300 focus:ring-indigo-500" aria-labelledby="privacy-setting-1-label" aria-describedby="privacy-setting-1-description">
                                                <div class="ml-3 flex flex-col">
                                                  <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                                                  <span id="privacy-setting-1-label" class="text-gray-900 block text-sm font-medium">
                                                   Embed Code
                                                  </span>
                                                  <!-- Checked: "text-indigo-700", Not Checked: "text-gray-500" -->
                                                  <span id="privacy-setting-1-description" class="text-gray-500 block text-xs">
                                                    Only members of this project would be able to access
                                                  </span>
                                                </div>
                                              </label>

                                            </div>
                                          </fieldset>
                                      </div>
                                      @if($uploadType == 'uploadFile')
                                      <div class="mt-5" id="audioContainer">
                                                    <label class="block text-sm font-medium text-gray-700">
                                                     Audio
                                                    </label>
                                                     <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                                          <input type="file" wire:model="audiofile">
                                                  </div>
                                              </div>
                                              @else
                                              <div class="mt-5" id="embedContainer">
                                                    <label class="block text-sm font-medium text-gray-700">
                                                     Embed Code
                                                    </label>
                                                     <div class="mt-1">
                                                <textarea id="about" name="about" rows="4" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="ea_path" ></textarea>
                                              </div>
                                              </div>
                                              @endif
                                            </div>
                                            <div class="flex-1 ml-3">
                                              <div class="">
                                            <label for="about" class="block text-sm font-medium text-gray-700">
                                              Transcript
                                            </label>
                                            <div class="mt-1">
                                              <textarea id="about" name="about" rows="25" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="ea_summary" ></textarea>
                                            </div>
                                        </div>

                                         <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                                            <button type="button" wire:click="updatepost" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">
                                              Save
                                            </button>
                                            <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm"  @click="open = false">
                                              Close
                                            </button>
                                          </div>
                                            </div>
                                           </div>
                                   </div>


                                      </div>

                                 
                                  
                                    </div>
                                  </div>
                                </div>

                      </div>
                    </div>
                   
                  </div>
                </div>

              </article>
            </div>




             @endforeach
              </div>
       








          </div>

          <div class="col-span-4">
            
        <aside >

          <div class=" bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">
            
            <div class="pb-5 space-y-6">
                  <h3 class="font-medium text-gray-900">Favorites</h3>
                  <ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
                      @foreach($favorite->get() as $fav)
                      <li class="py-3 flex justify-between items-center">
                        <div class="flex items-center">
                          <img src="{{ asset('images/slider-img/slide1.jpg') }}" alt="" class="w-8 h-8 ">
                          <div class="ml-4 ">
                             <p class="text-sm font-medium text-gray-900">{{ $fav->get_audio->audio_name }}</p>
                             <p class="text-sm text-gray-500">{{ $fav->get_audio->get_user->email }}</p>
                          </div>
                        </div>
                        <p class="ml-6 bg-white rounded-md text-xs font-medium ext-gray-500"></p>
                      </li>
                     @endforeach
<!--                       <li class="py-3 flex justify-between items-center">
                        <div class="flex items-center">
                          <img src="{{ asset('images/slider-img/slide5.jpg') }}" alt="" class="w-8 h-8">
                           <div class="ml-4 ">
                             <p class="text-sm font-medium text-gray-900">Podcast Title</p>
                             <p class="text-sm text-gray-500">Guest: user@gmail.com</p>
                          </div>
                        </div>
                       <p class="ml-6 bg-white rounded-md text-xs font-medium ext-gray-500">3:10 mins</p>
                      </li> -->
  
                  </ul>
              </div>




          </div>

           <div class="mt-5 bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">
            
            <div class="pb-5 space-y-6">
                  <h3 class="font-medium text-gray-900">Categories</h3>
                  <ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
                      @foreach($categoryList->get() as $category)
                      <li class="py-3 flex justify-between items-center">
                        <div class="flex items-center">
                          <img src="{{ asset('images/slider-img/slide1.jpg') }}" alt="" class="w-8 h-8 ">
                          <div class="ml-4 ">
                             <p class="text-sm font-medium text-gray-900">{{ $category->category_name }}</p>
                             <!-- <p class="text-sm text-gray-500">Guest: user@gmail.com</p> -->
                          </div>
                        </div>
                        <p class="ml-6 bg-white rounded-md text-xs font-medium ext-gray-500"></p>
                      </li>
                     @endforeach
                     <!--  <li class="py-3 flex justify-between items-center">
                        <div class="flex items-center">
                          <img src="{{ asset('images/slider-img/slide5.jpg') }}" alt="" class="w-8 h-8">
                           <div class="ml-4 ">
                             <p class="text-sm font-medium text-gray-900">Category Title</p>
                          </div>
                        </div>
                       <p class="ml-6 bg-white rounded-md text-xs font-medium ext-gray-500">2</p>
                      </li> -->
  
                  </ul>
              </div>

              


          </div>




          </aside> 









          </div>  



        </div>  


        <!-- updated -->
















































      </main>
      <!-- aside -->
    
      <!-- aside -->
    </div>
  </div>
</div>





















        </div>
</div>






