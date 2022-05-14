<div class="grid gap-4 grid-cols-9">
                  
    @foreach($sharedplaylist->get() as $sharedplist)
      @if($sharedplist->plshared_status == "active")
      <div class="col-span-3 bg-white p-2 ">
        <a href="{{ route('editorPlaylist',['id' => $sharedplist->plshared_playlistid ]) }}" class="pointer">
          <div class="mt-2 text-sm text-gray-700 space-y-4">
             <div class="text-white bg-cover h-36">
              <?php  $defaul_img = 'slide'.rand(1,10).'.jpg'; ?>
                    <img class="h-full mx-auto my-0" src="{{ asset('images/slider-img/'.$defaul_img) }}" alt=""> 
                
             </div>  
          </div>
          <div>
            <div class="flex space-x-3">
              <div class="min-w-0 flex-1">
                <p class="text-md font-bold text-gray-900 mt-2">
                 {{ $sharedplist->get_playlist()->first()->playlist_title }}
                </p>
                <p class="text-xs text-gray-500">
                  <a class="hover:underline">
                   {{ $sharedplist->get_playlist()->first()->playlist_status }} <span class="float-right">1</span>
                  </a>
                </p>
              </div>
            </div>
          </div>
        </a>
      </div>
      @endif
    @endforeach

 </div>