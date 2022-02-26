<section>
    <div class="mt-4">
        <div class="mb-5 w-full ">
           <h1 class="font-bold text-gray-800 text-xl">Following</h1> 
        </div> 
        <div class="grid gap-4 grid-cols-9">
          @foreach($userFollow as $follow)
            <div class="col-span-3 bg-white p-2 ">
                <div class="mt-2 text-sm text-gray-700 space-y-4">
                   <div class="text-white bg-cover h-36">
                       <!-- <img class="h-full mx-auto my-0 rounded-full" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">  -->
                        @if($follow->get_user->get_profilephoto->count() == 0)
                           <img class="h-full mx-auto my-0 " src="{{ asset('images/default_user.jpg') }}" alt="">
                        @else
                            <?php $img_path = $follow->get_user->get_profilephoto->first()->gallery_path; ?>
                            <?php $s3_profilelink = config('app.s3_public_link')."/users/profile_img/".$img_path; ?>
                            <img class="h-full mx-auto my-0 " src="{{$s3_profilelink}}" alt="">
                        @endif 
                   </div>
                </div>
                <div>
                  <div class="flex space-x-3">
                    <div class="min-w-0 flex-1">
                      <p class="text-md font-bold text-gray-900 mt-2">
                        <a href="{{ route('editorViewUser',['id' => $follow->get_user->id ]) }}" class="hover:underline">{{ $follow->get_user->name }}</a>
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
           @endforeach
          </div>
      </div>
</section>