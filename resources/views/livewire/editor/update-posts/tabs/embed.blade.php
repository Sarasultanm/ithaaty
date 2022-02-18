<!-- <div class="border-t-2 border-custom-pink mt-16"></div>   -->
<div class="mt-5">
    <h2 class="text-lg leading-6 font-medium text-gray-900">Embed Code</h2>
    <p class="mt-1 text-sm text-gray-500">
        This information will be displayed publicly so be careful what you share.
    </p>
</div>
<div class="border-t-2 border-custom-pink"></div>
<div class="mt-5">
    <div class="mt-1">
        <textarea id="about" name="about" rows="4" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="embedlink"></textarea>
    </div>
</div>
<div class="mt-5">
    <label for="about" class="block text-sm font-medium text-gray-700">
        Hashtags
    </label>
    <div class="mt-1">
        <textarea rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="hashtags"></textarea>
    </div>
</div>

<div class="border-t-2 border-custom-pink mt-16"></div>

<div class="mt-3 text-right sm:mt-5 mb-20">
    <button
        wire:click="updateEmbed()"
        class="w-1/4 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md"
    >
        Update Info
    </button>
</div>
