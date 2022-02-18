@if(Auth::user()->get_plan->check_features('o8')->count() != 0 )
<div class="mt-5">
    <h2 class="text-lg leading-6 font-medium text-gray-900">Chapters</h2>
    <p class="mt-1 text-sm text-gray-500">
        Add a chapters for your podcast
    </p>
    <div class="border-t-2 border-custom-pink"></div>

    <div class="mt-5">
        <label for="email" class="block text-sm font-medium text-gray-700">VTT Files</label>
        <div class="mt-1">
            <textarea rows="20" class="w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="vttfile"></textarea>
        </div>
        @error('vttfile') <span class="text-xs text-red-600">Required Fields</span> @enderror
    </div>
    <div class="w-15 mt-5">
        <label for="email" class="block text-sm font-medium text-gray-700">&nbsp;</label>
        <div class="mt-1">
            <button
                wire:click="uploadChapters({{$a_id}})"
                class="w-auto inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md float-right"
            >
                Update Chapters
            </button>
        </div>
    </div>
</div>
@endif
