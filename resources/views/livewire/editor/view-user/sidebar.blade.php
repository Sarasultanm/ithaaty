<div class="mt-5">
    <div class=" bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">
        <div class="pb-5">
              <h3 class="font-bold text-gray-900">Profile Information</h3>
              <p class="text-gray-500 font-regular text-sm mt-4">{{ $userInfo->about }}</p>
              <ul class="mt-5 space-y-1 text-center">

                <li class="text-gray-500 inline-block">
                  @if(strpos($userFacebook, "https://")!==false)
                  <a target="_black" href="{{$userFacebook}}">
                    <i class="fab fa-facebook-square mr-2 h-5 w-5 text-xl"></i> 
                  </a>
                  @else
                  <a target="_black" href="{{ 'https://'.$userFacebook }}">
                    <i class="fab fa-facebook-square mr-2 h-5 w-5 text-xl"></i> 
                  </a>
                  @endif
                </li>

                <li class="text-gray-500 inline-block">
                   @if(strpos($userTwitter, "https://")!==false)
                  <a target="_black" href="{{$userTwitter}}">
                    <i class="fab fa-twitter-square mr-2 h-5 w-5 text-xl"></i>
                  </a>
                  @else
                  <a target="_black" href="{{ 'https://'.$userTwitter }}">
                    <i class="fab fa-twitter-square mr-2 h-5 w-5 text-xl"></i>
                  </a>
                  @endif
               </li>

               <li class="text-gray-500 inline-block">
                 @if(strpos($userInstagram, "https://")!==false)
                  <a target="_black" href="{{$userInstagram}}">
                    <i class="fab fa-instagram-square mr-2 h-5 w-5 text-xl"></i>
                  </a>
                 @else
                  <a target="_black" href="{{ 'https://'.$userInstagram }}">
                    <i class="fab fa-instagram-square mr-2 h-5 w-5 text-xl"></i>
                  </a>
                 @endif
               </li>

              </ul>
              <!-- separator -->
                <div class="relative mt-5">
                  <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="w-full border-t border-gray-300"></div>
                  </div>
                  <div class="relative flex justify-center">
                    <span class="px-2 bg-white text-sm text-gray-500">
                      Other Info
                    </span>
                  </div>
                </div>
              <!-- separator -->
              <ul class="mt-5 space-y-1">
                @forelse ($userInfo->channels()->get() as $user_channel )
                <li class="text-gray-500">
                  <a href="">
                    <i class="fas fa-podcast pl-1 mr-2 h-5 w-5 text-xl text-center"></i>
                    <span><b>{{ $user_channel->channel_name }}</b></span>
                  </a>
              </li>
                @empty
                  <li class="text-gray-500">
                    <a href="">
                      <i class="fas fa-podcast pl-1 mr-2 h-5 w-5 text-xl text-center"></i>
                      <span><b>{{ $userInfo->alias }}</b></span>
                    </a>
                </li>
                @endforelse
                

               <li class="text-gray-500">
                  <a href="">
                    <i class="fas fa-map-marker-alt pl-1 mr-2 h-5 w-5 text-xl text-center"></i>
                    <span>Lives in <b>{{ $userInfo->country }}</b></span>
                  </a>
               </li>
               <li class="text-gray-500">
                  <a href="">
                    <i class="fas fa-users mr-2 h-5 w-5 text-xl"></i>
                    <span>Followed by <b>{{ $userInfo->get_followers()->count() }} users</b></span>
                  </a>
               </li>
               
              </ul>
          </div>
      </div>

      <div class="mt-5 bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">
        <div class="pb-5">
              <h3 class="font-bold text-gray-900 mb-5">Friends</h3>
              <div class="grid grid-cols-3 gap-2">
                 @foreach($userFriendList as $friends)
                 @if($friends->friend_type == "Friends")
                 <div class="col-span-1">
                   <span class="inline-block relative">
                    @if($friends->friend_userid == $userInfo->id )
                      @if($friends->get_request_user->get_profilephoto->count() == 0)
                       <img class="h-16 w-16 rounded-md " src="{{ asset('images/default_user.jpg') }}" alt="">
                      @else
                        <?php $img_path = $friends->get_request_user->get_profilephoto->first()->gallery_path; ?>
                        <?php $s3_profilelink = config('app.s3_public_link')."/users/profile_img/".$img_path; ?>
                        <img class="h-16 w-16 rounded-md" src="{{$s3_profilelink}}" alt="">
                      @endif
                   @else   
                      @if($friends->get_add_friend->get_profilephoto->count() == 0)
                       <img class="h-16 w-16 rounded-md " src="{{ asset('images/default_user.jpg') }}" alt="">
                      @else
                        <?php $img_path = $friends->get_add_friend->get_profilephoto->first()->gallery_path; ?>
                        <?php $s3_profilelink = config('app.s3_public_link')."/users/profile_img/".$img_path; ?>
                        <img class="h-16 w-16 rounded-md" src="{{$s3_profilelink}}" alt="">
                      @endif
                   @endif
                    

                    @if($friends->friend_userid == $userInfo->id )
                         <p class="font-bold text-gray-900 mt-2 text-sm truncate">
                          <a href="{{ route('editorViewUser',['id' => $friends->get_request_user->id ]) }}" target="_blank" > 
                           <span  class="truncate">{{ $friends->get_request_user->name}}</span>
                          </a>
                         </p>
                    @else   
                         <p class="font-bold text-gray-900 mt-2 text-sm  truncate">
                          <a class="truncate" href="{{ route('editorViewUser',['id' => $friends->get_add_friend->id ]) }}" target="_blank">
                            <span  class="truncate"> {{ $friends->get_add_friend->name}}</span?
                        </a>
                         </p>
                    @endif
                  </span>
                 </div>
                 @endif
                 @endforeach
              </div>
              


        </div>
      </div>



    <div class="mt-5 bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">
        <div class="pb-5 space-y-6">
              <h3 class="font-medium text-gray-900">Favorites</h3>
              <ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
                  @foreach($userFav as $fav)
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
              </ul>
          </div>
      </div>
      <div class="mt-5 bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">
        <div class="pb-5 space-y-6">
              <h3 class="font-medium text-gray-900">Recent Likes</h3>
              <ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
                  @foreach($recentLikes as $likes)
                  <li class="py-3 flex justify-between items-center">
                    <div class="flex items-center">
                      <img src="{{ asset('images/slider-img/slide1.jpg') }}" alt="" class="w-8 h-8 ">
                      <div class="ml-4 ">
                        <p class="text-sm font-medium text-gray-900">{{ $likes->get_audio->audio_name }}</p>
                        <p class="text-sm text-gray-500">{{ $likes->get_owner->email }}</p>
                      </div>
                    </div>
                    <p class="ml-6 bg-white rounded-md text-xs font-medium ext-gray-500"></p>
                  </li>
                @endforeach
              </ul>
          </div>
      </div>
  </div>