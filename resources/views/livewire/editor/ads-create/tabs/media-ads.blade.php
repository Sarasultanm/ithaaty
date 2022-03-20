<section>
  <div class="grid gap-4 grid-cols-5 mt-5">

    <div class="col-span-3">
      <h1 class="flex-1 font-bold text-gray-800 text-lg ">Preview Ads</h1> 
      <div class="border-2 mt-3 p-3 shadow-md space-y-3">
          <div class="flex-shrink-0">

            <script src="{{ asset('videojs/video.min.js') }}"></script>
            <script src="{{ asset('videojs/nuevo.min.js') }}"></script>
            
              @if ($socialAdsFile)
                  @php $file = $this->checkFile($socialAdsFile->getMimeType()); @endphp
                    
                  @if ($file == "image")
                      <img class="h-80 rounded-md w-full" src="{{ $socialAdsFile->temporaryUrl() }}" alt="" />

                  @elseif($file == "video")
                      <video class="h-80 rounded-md w-full" poster="{{ asset('images/default_user.jpg') }}" controls>
                          <source src="{{ $socialAdsFile->temporaryUrl() }}" type="video/mp4">
                          <source src="{{ $socialAdsFile->temporaryUrl() }}" type="video/ogg">
                          Your browser does not support the video tag.
                      </video>

                  @elseif($file == "audio")
                      <video class="h-80 rounded-md w-full" poster="{{ asset('images/default_user.jpg') }}"  controls>
                          <source src="{{ $socialAdsFile->temporaryUrl() }}" type="video/mp4">
                          <source src="{{ $socialAdsFile->temporaryUrl() }}" type="video/ogg">
                          Your browser does not support the video tag.
                      </video>
                  @endif

              @else
                <video
                  id="my-video"
                  class="video-js vjs-default-skin vjs-fluid h-80 rounded-md w-full"
                      
                  controls
                  data-setup="{}">
                    <source src="{{ asset('ads/big_buck_bunny.mp4') }}" type="video/mp4"/>
                    <source src="{{ asset('ads/big_buck_bunny.mp4') }}" type="video/ogg"/>
                    <source src="{{ asset('ads/big_buck_bunny.mp4') }}" type="audio/mpeg"/>
                    <source src="{{ asset('ads/big_buck_bunny.mp4') }}" type="video/webm"/>
                    Your browser does not support the video tag.
                </video>     
                <script> 
                  var player=videojs('my-video'); 
                  player.nuevo({
                    qualityMenu: true,
                    buttonRewind: true,
                    buttonForward: true
                  });
                  player.vroll({ 
                          // src: adsVideoLink,
                          // type:"video/mp4", 
                          // href: "url-to-go-on-midroll-click",
                          // offset:adsDisplay,
                          // skip:adsSkip,
                          // id:1
                          src:"{{ asset('ads/pepsi-ads.mp4') }}", 
                          type: "video/mp4",
                          href: "url-to-go-on-preroll-click",
                          offset:1%,
                          skip: 5, //optional skip video option.
                          id=1 
                  });


                </script>
                
              {{-- <img class="h-80 rounded-md w-full" src="{{ asset('images/default_user.jpg') }}" alt="" /> --}}
              @endif
          </div>
          {{-- <div class="flex-shrink-0 self-center flex mb-auto"></div> --}}
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
                         <input type="file"  class="" wire:model="socialAdsFile">
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
                          <p x-show="error" class="text-center font-bold text-red-800 text-sm">*Error to upload the file</p> 
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

          @include('livewire.editor.ads-create.parts.payment-summary') 
          
      </div> 


  </div>















</section>