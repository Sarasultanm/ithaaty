<div class="">
    <label for="email" class="block text-sm font-medium text-gray-700">Title</label>
    <div class="mt-1">
        <input wire:model.lazy="contextTitle" type="text" name="name" id="name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm " >
        @error('contextTitle') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
    </div>
</div>

<div class="mt-5">
    <label for="email" class="block text-sm font-medium text-gray-700">Description</label>
    <div class="mt-1">
        <textarea wire:model.lazy="contextDescription" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm " ></textarea>
        @error('contextDescription') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
    </div>
</div>

<div class="mt-5">
    <label for="email" class="block text-sm font-medium text-gray-700">Website Name</label>
    <div class="mt-1">
        <input wire:model.lazy="contextUrlName" type="text" name="name" id="name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm " >
        @error('contextUrlName') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
    </div>
</div>
<div class="mt-5">
    <label for="email" class="block text-sm font-medium text-gray-700">Website Link <span class="text-gray-400">(example : https://wwww.your-sample-complete-url.com)</span></label>
    <div class="mt-1">
        <input wire:model.lazy="contextUrlLink" type="text" name="name" id="name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm " >
        @error('contextUrlLink') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
    </div>
</div>