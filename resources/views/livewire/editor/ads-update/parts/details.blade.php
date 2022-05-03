<div class="">
    <label for="email" class="block text-sm font-medium text-gray-700">Title</label>
    <div class="mt-1">
        <input wire:model.lazy="adslist_name" type="text" name="name" id="name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm " >
        @error('adslist_name') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
    </div>
</div>

<div class="mt-5">
    <label for="email" class="block text-sm font-medium text-gray-700">Description</label>
    <div class="mt-1">
        <textarea wire:model.lazy="adslist_desc" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm " ></textarea>
        @error('adslist_desc') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
    </div>
</div>

<div class="mt-5">
    <label for="email" class="block text-sm font-medium text-gray-700">Website Name</label>
    <div class="mt-1">
        <input wire:model.lazy="adslist_webname" type="text" name="name" id="name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm " >
        @error('adslist_webname') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
    </div>
</div>
<div class="mt-5">
    <label for="email" class="block text-sm font-medium text-gray-700">Website Link <span class="text-gray-400">(example : https://wwww.your-sample-complete-url.com)</span></label>
    <div class="mt-1">
        <input wire:model.lazy="adslist_weblink" type="text" name="name" id="name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm " >
        @error('adslist_weblink') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
    </div>
</div>