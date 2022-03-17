<section>
    <div class="grid gap-4 grid-cols-5 mt-5">
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
                             <div  class="overflow-hidden h-2 text-xs flex rounded bg-purple-200 progress">
                               <div x-bind:style="`width:${progress}%`"
                                 class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-custom-pink"
                               ></div>
                             </div>
                           </div>
                           <p x-show="success" class="text-center text-custom-pink font-bold text-gray-800 text-sm">File Upload Complete</p> 
                            <p x-show="error" class="text-center font-bold text-red-800 text-sm">
                                *Error to upload the file
                              
                            </p> 
                         </div>

                    </div>
                
                </div>

                   <div class="">
                        <label for="email" class="block text-sm font-medium text-gray-700">Title</label>
                        <div class="mt-1">
                            <input wire:model.lazy="contextTitle" type="text" name="name" id="name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md " >
                            @error('adslist_name') <span class="text-xs text-red-600">Empty fields</span> @enderror
                        </div>
                   </div>
            
                   <div class="mt-5">
                        <label for="email" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                            <textarea wire:model.lazy="contextDescription" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md " ></textarea>
                            @error('adslist_desc') <span class="text-xs text-red-600">Empty fields</span> @enderror
                        </div>
                   </div>
            
                   <div class="mt-5">
                        <label for="email" class="block text-sm font-medium text-gray-700">Website Name</label>
                        <div class="mt-1">
                            <input wire:model.lazy="contextUrlName" type="text" name="name" id="name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md " >
                            @error('adslist_weblink') <span class="text-xs text-red-600">Empty fields</span> @enderror
                        </div>
                   </div>
                   <div class="mt-5">
                    <label for="email" class="block text-sm font-medium text-gray-700">Website Link <span class="text-gray-400">(example : https://wwww.your-sample-complete-url.com)</span></label>
                    <div class="mt-1">
                        <input wire:model.lazy="contextUrlLink" type="text" name="name" id="name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md " >
                        @error('adslist_weblink') <span class="text-xs text-red-600">Empty fields</span> @enderror
                    </div>
               </div>
            </div>
        </div>
        <div class="col-span-2">
            <h1 class="flex-1 font-bold text-gray-800 text-lg ">Preview Ads</h1> 
            <div class="border-2 flex p-1 shadow-md space-x-3 mt-3">
                <div class="flex-shrink-0">
                    <img class="h-24 w-24 rounded-md" src="@if ($contextAdsImage)  {{ $contextAdsImage->temporaryUrl() }} @else {{ asset('images/default_user.jpg') }}  @endif" alt="" />
                </div>
                <div class="min-w-0 flex-1">
                    <p class="font-bold text-lg text-gray-900 h-7 break-words">
                        <a href="#" target="_blank" class="hover:underline">
                           {{ $contextTitle }}
                        </a>
                    </p>
                    <p class="font-regular text-gray-700 text-xs">
                        <a href="#" target="_blank" class="hover:underline">
                            {{ $contextUrlName }}
                        </a>
                    </p>
                    <p class="font-regular text-gray-500 text-xs break-all">{{ $contextDescription }}</p>
                </div>
                <div class="flex-shrink-0 self-center flex mb-auto"></div>
            </div>
        </div>

    </div>


  












</section>