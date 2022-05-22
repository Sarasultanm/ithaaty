<div class="shadow-sm sm:rounded-md sm:overflow-hidden">
    <div class="px-4 py-6 bg-white sm:p-6">
        <div class="flex justify-between">
            <div class="flex-auto">
              <h3 class="font-bold text-gray-900 text-md">Invitation Users </h3>
              <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <input wire:model.debounce.300ms="search" wire:keydown.enter="get_search()" 
                   type="text" placeholder="Search" class="flex-1 block border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
        </div> 
        @if($result) @if($result->count() != 0 )
        <div class="grid w-full grid-cols-6 gap-4 mt-5 sm:grid-cols-2">
            @foreach($result as $items) @if(Auth::user()->id != $items->id)

           
            <div class="relative flex items-center px-6 py-5 space-x-3 bg-white border border-gray-300 rounded-lg shadow-sm hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 ">
                <div class="flex-shrink-0">
                    @if($items->get_profilephoto->count() == 0)
                    <img class="w-10 h-10 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="" />
                    @else
                    <?php $img_path = $items->get_profilephoto->first()->gallery_path; ?>
                    <?php $s3_profilelink = config('app.s3_public_link')."/users/profile_img/".$img_path; ?>
                    <?php $userviewprofile = $items->get_profilephoto->first()->gallery_path; ?>
                    <img class="w-10 h-10 rounded-full" src="{{$s3_profilelink}}" alt="" />
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                  
                        <p class="text-sm font-medium text-gray-900">
                            {{ $items->name }} 
                        </p>
                        <p class="text-sm text-gray-500 truncate">
                            {{ $items->email }}
                        </p>
                   
                </div>
                <div class="flex-auto min-w-0">
                    <button wire:click="sendInvitationByButtonClick({{$channel_list->id}},{{$items->email}})" 
                            type="button" 
                            class="float-right inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-custom-pink">
                        Send Invitations
                    </button>
                </div>
            </div>
            @endif @endforeach
        </div>

        @else
        
        <div class="text-center">
            <h3 class="font-bold text-gray-900 text-md">User not found</h3>
            <p class="mt-2 text-sm text-gray-500">Try sending a invitation using the email address.</p>

            <div>
                <div class="mt-1">
                    <input type="email" class="w-1/4 pr-10 rounded-md item-center sm:text-sm" placeholder="Enter your email" wire:model="emailInvitation" />
                </div>
                <button wire:click="sendInvitation({{$channel_list->id}})" type="button" class="mt-2 items-center px-2.5 py-1.5 border border-transparent text-sm font-medium rounded shadow-sm text-white bg-custom-pink">
                    Send Invitation
                </button>
            </div>
            <div>@error('emailInvitation') <span class="text-xs text-center text-red-600">{{$message}}</span> @enderror</div>
        </div>

        @endif @endif
    </div>
</div>