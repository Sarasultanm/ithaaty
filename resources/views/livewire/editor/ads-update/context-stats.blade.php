<section>
    <div class="grid grid-cols-5 gap-4 mt-5">
    <!-- content -->    
        <div class="col-span-2">
            <h1 class="flex-1 text-lg font-bold text-gray-800 ">Preview Ads</h1> 
            <div class="flex p-1 mt-3 space-x-3 border-2 shadow-md">
                <div class="flex-shrink-0">
                  @if ($contextAdsImage)  
                      @php $ads_image_link = $contextAdsImage->temporaryUrl() @endphp
                  @else 
                      @php $ads_image_link = config('app.s3_public_link')."/ads/context_ads/".$ads_list->get_gallery->gallery_path ; @endphp               
                  @endif
                    
                    <img class="w-24 h-24 rounded-md" src="{{ $ads_image_link }}" alt="" />
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-lg font-bold text-gray-900 break-words h-7">
                        <a href="#" target="_blank" class="hover:underline">
                            {{ $adslist_name }}
                        </a>
                    </p>
                    <p class="text-xs text-gray-700 font-regular">
                        <a href="{{ $adslist_weblink }}" target="_blank" class="hover:underline">
                            {{ $adslist_webname }}
                        </a>
                    </p>
                    <p class="text-xs text-gray-500 break-all font-regular">{{ $adslist_desc }}</p>
                </div>
                <div class="flex self-center flex-shrink-0 mb-auto"></div>
             
            </div>
            

             <div class="w-full">
                <div class="pt-5 pb-10 lg:px-0 sm:px-3">
                    <h1 class="flex-1 text-xl font-bold text-gray-800 ">Payment Summary</h1> 
                    <p class="mt-1 mb-3 text-sm text-gray-500">
                      Your ad will run for {{ $ads_list->adslist_days }} days.
                    </p>
                    <div class="px-3 py-2 bg-white rounded-md ">
                        <div class="flex-1">
                            <label for="email" class="block text-sm font-medium text-gray-700">Days</label>
                            <div class="mt-1">
                              <!-- <input type="text" name="website" id="website" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="adslist_displaytime"> -->
                               <select wire:model="adslist_days" wire:click="adsContextComputation($event.target.value)"  class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"   >
                                   <!--  <option>Select</option> -->
                                    <option value="3">3 days</option>
                                    <option value="7">7 days</option>
                                    <option value="9">9 days</option>
                                    <option value="12">12 days</option>
                                </select> 
                            </div>
                         </div>

                    </div>
                   
                    <div class="px-3 py-2 bg-white rounded-md ">
                      
                      <p class="mt-1 text-sm text-gray-800">
                        Days : {{ $ads_list->adslist_days }} days 
                      </p>
                      <?php 
                      $date = date_create(now());
                      date_add($date, date_interval_create_from_date_string($ads_list->adslist_days." days"));
                      //echo date_format($date, "M d, Y");
                      ?>
                      <p class="mt-1 text-sm text-gray-800">
                        End Date : {{ date_format($date, "M d, Y") }}
                      </p>
                     </div>
                     <p class="px-3 py-2 mt-3 text-white rounded-md text-md bg-custom-pink ">
                      Total Budget : <b class="float-right font-bold">${{ $adsContextValue * $ads_list->adslist_days }}</b><br>
                       <small> ${{ $adsContextValue }} a day x {{ $ads_list->adslist_days }} days</small>
                       
                   
                    </p>
                
                </div>
             </div>

        </div>

        <div class="col-span-3">
            <div class="pb-10">  
                <div class="mt-5">
                    <div x-cloak x-data="{ isUploading: false, progress: 0, success: false, error:false }" 
                      x-on:livewire-upload-start="isUploading = true"
                      x-on:livewire-upload-finish="isUploading = false,success = true" 
                      x-on:livewire-upload-error="isUploading = false,error= true"
                      x-on:livewire-upload-progress="progress = $event.detail.progress">

                         <label for="email" class="block text-sm font-medium text-gray-700">Upload Image</label>
                         <div class="mt-1">
                           <input type="file"  class="" wire:model="contextAdsImage">
                         </div>

                         <div class="mt-5">
                           <div x-cloak x-show="isUploading"  class="relative pt-1">
                             <div class="text-center text-gray-700">
                               Please wait while uploading the file .. <input x-bind:value="`${progress}%`" disabled style="width: 60px;">
                             </div>
                             <div  class="flex h-2 overflow-hidden text-xs bg-purple-200 rounded progress">
                               <div x-bind:style="`width:${progress}%`"
                                 class="flex flex-col justify-center text-center text-white shadow-none whitespace-nowrap bg-custom-pink"
                               ></div>
                             </div>
                           </div>
                           <p x-show="success" class="text-sm font-bold text-center text-gray-800 text-custom-pink">File Upload Complete</p> 
                            <p x-show="error" class="text-sm font-bold text-center text-red-800">
                                *Error to upload the file
                              
                            </p> 
                         </div>

                    </div>
                
                </div>

            
                @include('livewire.editor.ads-update.parts.details')   



            </div>
        </div>

        <div class="col-span-5">

            {{-- @include('livewire.editor.ads-create.parts.segments') 


            @include('livewire.editor.ads-create.parts.interest')  --}}
            
            <div class="pt-10 mt-3 mb-5 text-right border-t-2 sm:mt-5 border-custom-pink">
                       
                <button wire:click="updateAds()" class="inline-flex justify-center px-4 py-2 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-custom-pink hover:bg-green-700 sm:col-start-2 sm:text-md">
                  Update Ads
                </button>
            </div>
        </div>

       


    <!-- content -->
    </div>
</section>