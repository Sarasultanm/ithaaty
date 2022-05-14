<div class="grid gap-4 xl:grid-cols-9 md:grid-cols-6 sm:grid-cols-6">
  @foreach($playlist->get() as $plist)
    @if($plist->playlist_status == "Deleted")
    
        <div class="xl:col-span-3 md:col-span-2 sm:col-span-2 bg-white p-2 ">
           <a href="{{ route('editorPlaylist',['id' => $plist->id ]) }}" class="pointer">
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
                   {{ $plist->playlist_title }}
                  </p>
                  <p class="text-xs text-gray-500">
                    <a wire:click="restorePlaylist({{ $plist->id }})"  class="hover:underline">
                     Restore Playlist <span class="float-right">{{  $plist->get_playlistItems->count() }}</span>
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