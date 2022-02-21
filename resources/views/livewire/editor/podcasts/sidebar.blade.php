<aside>
    <div class="bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">
        <div class="pb-5 space-y-6">
            <h3 class="font-medium text-gray-900">Favorites</h3>
            <ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
                @foreach($favorite->get() as $fav)
                <li class="py-3 flex justify-between items-center">
                    <div class="flex items-center">
                        <?php  $defaul_img = 'slide'.rand(1,10).'.jpg'; ?>
                        <img src="{{ asset('images/slider-img/'.$defaul_img) }}" alt="" class="w-8 h-8" />
                        <div class="ml-4">
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
            <h3 class="font-medium text-gray-900">Categories</h3>
            <ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
                @foreach($categoryList->get() as $category)
                <li class="py-3 flex justify-between items-center">
                    <a href="#{{ $category->category_name }}-{{ $category->id }}">
                        <div class="flex items-center">
                            <?php  $defaul_img = 'slide'.rand(1,10).'.jpg'; ?>
                            <img src="{{ asset('images/slider-img/'.$defaul_img) }}" alt="" class="w-8 h-8" />
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900">{{ $category->category_name }}</p>
                                <!-- <p class="text-sm text-gray-500">Guest: user@gmail.com</p> -->
                            </div>
                        </div>
                        <p class="ml-6 bg-white rounded-md text-xs font-medium ext-gray-500"></p>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</aside>
