<div class="grid grid-cols-12 gap-5 mt-5">

    @if($userSearchResult)
    @foreach ($userSearchResult as $userResults)
        <div class="col-span-6 relative flex justify-between p-2 mb-5 space-x-3 rounded-md shadow-md">
            @if($userResults->get_profilephoto->count() == 0)
                @php $userSearchThumbnail = asset('images/default_user.jpg'); @endphp
            @else
                @php      
                    $userSearchThumbnail_Path = $userResults->get_profilephoto->first()->gallery_path;
                    $userSearchThumbnail = config('app.s3_public_link')."/users/profile_img/".$userSearchThumbnail_Path;
                @endphp
            @endif
            <div class="bg-center bg-cover rounded-lg w-28 h-28" 
                style="background-image:url({{ $userSearchThumbnail }})">
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-xl font-bold text-gray-900"> {{ $userResults->name }}</p>
                <p class="mt-0 text-sm text-gray-500 truncate">{{ $userResults->email }}</p>
                <p class="mt-2 text-xs text-gray-500 truncate">
                    {{ $userResults->about }}
                </p>
            </div>
            <a href="{{ route('editorViewUser',['id' => $userResults->id]) }}" class="absolute inset-0 cursor-pointer" aria-hidden="true"></a>
        </div>
    @endforeach

    
    @endif
</div>




