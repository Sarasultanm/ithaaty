@if(Auth::user()->get_plan->check_features('o4')->count() != 0 )
<div class="mt-5">
    <h2 class="text-lg leading-6 font-medium text-gray-900">Reference</h2>
    <p class="mt-1 text-sm text-gray-500">
        Add a reference for you podcast
    </p>
    <div class="border-t-2 border-custom-pink"></div>

    <div class="flex">
        <div class="mt-5 w-40 mr-5">
            <label for="email" class="block text-sm font-medium text-gray-700">Title</label>
            <div class="mt-1">
                <input
                    type="text"
                    name="email"
                    id="email"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                    wire:model="ref_title"
                />
            </div>
        </div>

        <div class="flex-auto mt-5 mr-5">
            <label for="email" class="block text-sm font-medium text-gray-700">Link</label>
            <div class="mt-1">
                <input
                    type="text"
                    name="email"
                    id="email"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                    wire:model="ref_link"
                />
            </div>
        </div>
        <div class="w-15 mt-5">
            <label for="email" class="block text-sm font-medium text-gray-700">&nbsp;</label>
            <div class="mt-1">
                <button
                    wire:click="addReference({{ $a_id }})"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-1 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md"
                >
                    Add Reference
                </button>
            </div>
        </div>
    </div>
    <div class="border-t-2 border-custom-pink mt-16"></div>
    <div class="mt-5">
        <h2 class="text-lg leading-6 font-medium text-gray-900">Reference List</h2>
        <ul role="list" class="divide-y divide-gray-200">
            @foreach($audio->get_references as $ref )
            <li class="py-4 flex">
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">{{ $ref->audioref_title }}</p>
                    <p class="text-sm text-gray-500">{{ $ref->audioref_link }}</p>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>

@endif