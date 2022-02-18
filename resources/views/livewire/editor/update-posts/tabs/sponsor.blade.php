@if(Auth::user()->get_plan->check_features('o3')->count() != 0 )

<div class="mt-5">
    <h2 class="text-lg leading-6 font-medium text-gray-900">Sponsorship</h2>
    <p class="mt-1 text-sm text-gray-500">
        Enter your sponsorship details in the fields.
    </p>
</div>

<div class="border-t-2 border-custom-pink">
    <div class="mt-5">
        <label for="email" class="block text-sm font-medium text-gray-700">Company Name</label>
        <div class="mt-1">
            <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="spon_name" />
        </div>
    </div>

    <div class="mt-5">
        <label for="email" class="block text-sm font-medium text-gray-700">Company Website</label>
        <div class="mt-1">
            <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="spon_website" />
        </div>
    </div>

    <div class="mt-5">
        <label for="email" class="block text-sm font-medium text-gray-700">Location</label>
        <div class="mt-1">
            <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="spon_location" />
        </div>
    </div>

    <div class="mt-5">
        <label for="email" class="block text-sm font-medium text-gray-700">Upload Image</label>
        <div class="mt-1">
            <input type="file" class="" wire:model="spon_image" />
        </div>
    </div>

    <div class="mt-3 text-right sm:mt-5 mb-5">
        <button
            wire:click="addSponsor()"
            class="w-1/4 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md"
        >
            Add Sponsor
        </button>
    </div>

    <div class="border-t-2 border-custom-pink mt-5"></div>
    <ul role="list" class="divide-y divide-gray-200">
        @foreach($audio->get_sponsor as $sponsor )
        <li class="py-4 flex">
            <div class="ml-3">
                <p class="text-sm font-medium text-gray-900">{{ $sponsor->audiospon_name }}</p>
                <p class="text-sm text-gray-500">{{ $sponsor->audiospon_website }}</p>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endif
