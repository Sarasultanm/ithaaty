<section>
    <div class="mb-5 w-full ">
        <h1 class="font-bold text-gray-800 text-xl">Friends</h1> 
    </div>
    <div class="grid gap-4 grid-cols-9">
       @foreach($userFriendList as $friends)
        @if($friends->friend_type == "Friends")
        <div class="col-span-3 bg-white p-2 ">
            <div class="mt-2 text-sm text-gray-700 space-y-4">
               <div class="text-white bg-cover h-36">
                   @if($friends->friend_userid == $userInfo->id )
                      @if($friends->get_request_user->get_profilephoto->count() == 0)
                       <img class="h-full mx-auto my-0 " src="{{ asset('images/default_user.jpg') }}" alt="">
                      @else
                        <?php $img_path = $friends->get_request_user->get_profilephoto->first()->gallery_path; ?>
                        <?php $s3_profilelink = config('app.s3_public_link')."/users/profile_img/".$img_path; ?>
                        <img class="h-full mx-auto my-0" src="{{$s3_profilelink}}" alt="">
                      @endif
                   @else   
                      @if($friends->get_add_friend->get_profilephoto->count() == 0)
                       <img class="h-full mx-auto my-0 " src="{{ asset('images/default_user.jpg') }}" alt="">
                      @else
                        <?php $img_path = $friends->get_add_friend->get_profilephoto->first()->gallery_path; ?>
                        <?php $s3_profilelink = config('app.s3_public_link')."/users/profile_img/".$img_path; ?>
                        <img class="h-full mx-auto my-0 " src="{{$s3_profilelink}}" alt="">
                      @endif
                   @endif
               </div> 
            </div>
            <div>
              <div class="flex space-x-3">
                <div class="min-w-0 flex-1">
                  <p class="text-md font-bold text-gray-900 mt-2">
                      @if($friends->friend_userid == $userInfo->id )
                      <a href="{{ route('editorViewUser',['id' => $friends->get_request_user->id ]) }}" target="_blank" class="hover:underline">
                         {{ $friends->get_request_user->name}}
                      </a>
                      @else   
                       <a href="{{ route('editorViewUser',['id' => $friends->get_add_friend->id ]) }}" target="_blank" class="hover:underline">
                         {{ $friends->get_add_friend->name}}
                      </a>
                      @endif
                  </p>
                  <p class="text-xs text-gray-500">
                    <a class="hover:underline">
                      Followers <span class="float-right">0,000,000</span>
                    </a>
                  </p>
                </div>
              </div>
            </div>
        </div>
        @endif
       @endforeach
    </div>
</section>