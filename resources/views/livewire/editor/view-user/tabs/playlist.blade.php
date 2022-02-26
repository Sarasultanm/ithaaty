<section>
    <div class="grid gap-4 grid-cols-10">
        <div class="col-span-10">
          <div class=" w-full ">
               <h1 class="font-bold text-gray-800 text-xl">My Playlist</h1> 
          </div> 
          <div x-data="{
            openTab: 10,
            activeClasses: 'border-custom-pink text-custom-pink',
            inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
          }" 
          class="">
          <div class="border-b border-gray-200 mb-5">
            <ul class="-mb-px flex" >
              <li @click="openTab = 10"  :class="openTab === 10 ? activeClasses : inactiveClasses"   class="w-1/2 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer" >
                <a  >Public</a>
              </li>
              <li @click="openTab = 20" :class="openTab === 20 ? activeClasses : inactiveClasses"  class="w-1/2 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                <a  >Private</a>
              </li>
            </ul>
          </div>
             <div x-show="openTab === 10">
               <div class="grid gap-4 grid-cols-9">
                  @foreach($userInfo->get_playlist as $playlist)
                    @if($playlist->playlist_status == "Public")
                  
                        <div class="col-span-3 bg-white p-2 ">
                           <a href="{{ route('editorPlaylist',['id' => $playlist->id ]) }}" class="pointer">
                            <div class="mt-2 text-sm text-gray-700 space-y-4">
                               <div class="text-white bg-cover h-36">

                                <img class="h-full mx-auto my-0" src="https://d3t3ozftmdmh3i.cloudfront.net/production/podcast_uploaded/17789837/17789837-1631013743470-36b9d215bea63.jpg" alt="">
                               </div>  
                            </div>
                            <div>
                              <div class="flex space-x-3">
                                <div class="min-w-0 flex-1">
                                  <p class="text-md font-bold text-gray-900 mt-2">
                                   {{ $playlist->playlist_title }}
                                  </p>
                                  <p class="text-xs text-gray-500">
                                    <a class="hover:underline">
                                     {{ $playlist->playlist_status }} <span class="float-right">{{  $playlist->get_playlistItems->count() }}</span>
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
             </div>
             <div x-show="openTab === 20">
                 <div class="grid gap-4 grid-cols-9">
                  @if(Auth::user()->id == $userInfo->id )
                  @foreach($userInfo->get_playlist as $playlist)
                    @if($playlist->playlist_status == "Private")
                    <div class="col-span-3 bg-white p-2 ">
                      <a href="{{ route('editorPlaylist',['id' => $playlist->id ]) }}" class="pointer">
                        <div class="mt-2 text-sm text-gray-700 space-y-4">
                           <div class="text-white bg-cover h-36">
                               <img class="h-full mx-auto my-0" src="https://d3t3ozftmdmh3i.cloudfront.net/production/podcast_uploaded/17789837/17789837-1631013743470-36b9d215bea63.jpg" alt="">        
                           </div>  
                        </div>
                        <div>
                          <div class="flex space-x-3">
                            <div class="min-w-0 flex-1">
                              <p class="text-md font-bold text-gray-900 mt-2">
                               {{ $playlist->playlist_title }}
                              </p>
                              <p class="text-xs text-gray-500">
                                <a class="hover:underline">
                                 {{ $playlist->playlist_status }} <span class="float-right">1</span>
                                </a>
                              </p>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                    @endif
                  @endforeach
                  @endif
               </div>
             </div>
          </div>
        </div>
     </div>
</section>