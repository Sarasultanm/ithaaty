<div class="shadow-sm sm:rounded-md sm:overflow-hidden">
    <div class="px-4 py-6 bg-white sm:p-6">
        <div class="grid grid-cols-4 gap-6">
            <div class="col-span-4 sm:col-span-3">
                <h3 class="font-bold text-gray-900 text-md">Generate Unique Code</h3>
                <p class="mt-1 text-sm text-gray-500">Create your unique channel link.</p>

                <div class="relative flex mt-1 rounded-md shadow-sm">
                    <input
                        type="text"
                        name="company-website"
                        id="company-website"
                        class="w-1/2 min-w-0 px-3 py-2 border-gray-300 rounded-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        wire:model="channel_privatecode"
                        placeholder="Enter Text here"
                    />

                  
                </div>
            </div>
            <div class="col-span-4 mt-5 text-right sm:col-span-1">
                <button wire:click="generateChannelCode()" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-custom-pink">Create</button>
            </div>
        </div>
    </div>
</div>