<div class="shadow-sm sm:rounded-md sm:overflow-hidden">
    <div class="px-4 py-6 bg-white sm:p-6">
        <div class="flex items-end justify-between">
            <div class="flex-auto">
              <h3 class="font-bold text-gray-900 text-md">Invitation Users </h3>
              <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <input type="email" class="w-1/3 pr-10 mt-5 rounded-md item-center sm:text-sm" placeholder="Enter email address" wire:model="emailInvitation" />
            </div>
            <div class="mt-1">
                <button wire:click="sendInvitation({{$channel_list->id}})" type="button" class=" mt-10 items-center px-2.5 py-1.5 border border-transparent text-sm font-medium rounded shadow-sm text-white bg-custom-pink">
                    Send Invitation
                </button>
            </div>
        </div> 
       
        <div class="text-center">

            <div>@error('emailInvitation') <span class="text-xs text-center text-red-600">{{$message}}</span> @enderror</div>
        </div>

       
    </div>
</div>