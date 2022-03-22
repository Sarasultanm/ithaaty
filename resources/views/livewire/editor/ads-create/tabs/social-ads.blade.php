<section>
    <div class="grid grid-cols-5 gap-4 mt-5">
        <div class="col-span-2">
            <h1 class="flex-1 text-lg font-bold text-gray-800 ">Preview Ads</h1> 
            <div class="p-3 mt-3 space-y-3 border-2 shadow-md">
                
                <div class="flex-1 min-w-0">
                    <p class="text-lg font-bold text-gray-900 break-words h-7">
                        <a href="#" target="_blank" class="hover:underline">
                           {{ $contextTitle }} 
                        </a>
                    </p>
                    <p class="text-xs text-gray-700 font-regular">
                        <a href="#" target="_blank" class="hover:underline">
                            {{ $contextUrlName }}
                        </a>
                    </p>
                    <p class="text-xs text-gray-500 font-regular">{{ $contextDescription }}</p>
                </div>
                <div class="flex-shrink-0">
                    @if ($socialAdsFile)
                        @php $file = $this->checkFile($socialAdsFile->getMimeType()); @endphp
                          
                        @if ($file == "image")
                            <img class="w-full rounded-md h-80" src="{{ $socialAdsFile->temporaryUrl() }}" alt="" />

                        @elseif($file == "video")
                            <video class="w-full rounded-md h-80" poster="{{ asset('images/default_user.jpg') }}" controls>
                                <source src="{{ $socialAdsFile->temporaryUrl() }}" type="video/mp4">
                                <source src="{{ $socialAdsFile->temporaryUrl() }}" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>

                        @elseif($file == "audio")
                            <video class="w-full rounded-md h-80" poster="{{ asset('images/default_user.jpg') }}"  controls>
                                <source src="{{ $socialAdsFile->temporaryUrl() }}" type="video/mp4">
                                <source src="{{ $socialAdsFile->temporaryUrl() }}" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        @endif

                    @else

                    <img class="w-full rounded-md h-80" src="{{ asset('images/default_user.jpg') }}" alt="" />
                    @endif
                </div>
                {{-- <div class="flex self-center flex-shrink-0 mb-auto"></div> --}}
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

                         <label for="email" class="block text-sm font-medium text-gray-700">Upload File</label>
                         <div class="mt-1">
                           <input type="file"  class="" wire:model="socialAdsFile">
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
                            <p x-show="error" class="text-sm font-bold text-center text-red-800">*Error to upload the file</p> 
                         </div>

                        </div>


                </div>
                @include('livewire.editor.ads-create.parts.details')  
                

            </div>
        </div>
        

        <div class="col-span-5">

            @include('livewire.editor.ads-create.parts.segments') 
             
        </div>


    </div>
</section>