<section>
  <div class="grid grid-cols-5 gap-4 mt-5">

    <div class="col-span-3">
      <h1 class="flex-1 text-lg font-bold text-gray-800 ">Preview Ads</h1> 
      <div class="p-3 mt-3 space-y-3 border-2 shadow-md">
          <div class="flex-shrink-0">

              @if ($mediaAdsFile)
                  @php $file = $this->checkFile($mediaAdsFile->getMimeType()); @endphp
                    
                 @if($file == "video")
                      <video class="w-full rounded-md h-80" poster="{{ asset('images/default_user.jpg') }}" controls>
                          <source src="{{ $mediaAdsFile->temporaryUrl() }}" type="video/mp4">
                          <source src="{{ $mediaAdsFile->temporaryUrl() }}" type="video/ogg">
                          Your browser does not support the video tag.
                      </video>

                  @elseif($file == "audio")
                      <video class="w-full rounded-md h-80" poster="{{ asset('images/default_user.jpg') }}"  controls>
                          <source src="{{ $mediaAdsFile->temporaryUrl() }}" type="video/mp4">
                          <source src="{{ $mediaAdsFile->temporaryUrl() }}" type="video/ogg">
                          Your browser does not support the video tag.
                      </video>
                  @endif

              @else         
                {{-- <script defer src="{{ asset('videojs/video.min.js') }}"></script>
                <script defer src="{{ asset('videojs/nuevo.min.js') }}"></script> --}}
                {{-- <video class="w-full rounded-md h-80" poster="{{ asset('images/default_user.jpg') }}"  controls>
                  <source src="{{ asset('ads/big_buck_bunny.mp4') }}" type="video/mp4">
                  <source src="{{ asset('ads/big_buck_bunny.mp4') }}" type="video/ogg">
                  Your browser does not support the video tag.
                </video> --}}
                

              <img class="w-full rounded-md h-80" src="{{ asset('images/default_user.jpg') }}" alt="" /> 
              @endif
          </div>
          {{-- <div class="flex self-center flex-shrink-0 mb-auto"></div> --}}
      </div>
  </div>


      <div class="col-span-2">
          <div class="pb-10">  
              <div class="mt-5">
                  <div  x-cloak x-data="{ isUploading: false, progress: 0, success: false, error:false }" 
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false,success = true" 
                        x-on:livewire-upload-error="isUploading = false,error= true"
                        x-on:livewire-upload-progress="progress = $event.detail.progress">

                       <label for="email" class="block text-sm font-medium text-gray-700">Upload Video</label>
                       <div class="mt-1">
                         <input type="file"  class="" wire:model="mediaAdsFile">
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

      <div class="col-span-5">

          @include('livewire.editor.ads-create.parts.duration') 
          
      </div>

      <div class="col-span-5">


        @include('livewire.editor.ads-create.parts.interest') 


        @include('livewire.editor.ads-create.parts.payment-summary') 
        
        <div class="pt-10 mt-3 mb-5 text-right ">
                   
            <button wire:click="addMediaAds({{$checkAds->first()->id}})" class="inline-flex justify-center px-4 py-2 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-custom-pink hover:bg-green-700 sm:col-start-2 sm:text-md">
              Save Ads
            </button>
        </div>
    </div>
      
      
  </div>















</section>