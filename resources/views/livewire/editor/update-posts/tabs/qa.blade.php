@if(Auth::user()->get_plan->check_features('o5')->count() != 0 )
<div class="mt-5">
    <h2 class="text-lg leading-6 font-medium text-gray-900">Question</h2>
    <p class="mt-1 text-sm text-gray-500">
        Add a question for your podcast
    </p>
    <div class="border-t-2 border-custom-pink"></div>

    <div class="flex">
        <div class="flex-auto mt-5 mr-5">
            <div class="mt-1 flex">
                <div class="flex-auto">
                    <label for="email" class="block text-sm font-medium text-gray-700">Question</label>
                    <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="qa_question" />
                    @error('qa_question') <span class="text-xs text-red-600">Required Fields</span> @enderror
                </div>
                <div class="ml-2">
                    <label for="email" class="block text-sm font-medium text-gray-700">Time</label>
                    <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" wire:model="qa_time" />
                    @error('qa_time') <span class="text-xs text-red-600">Required Fields</span> @enderror
                </div>
            </div>
        </div>
        <div class="w-15 mt-5">
            <label for="email" class="block text-sm font-medium text-gray-700">&nbsp;</label>
            <div class="mt-1">
                <button
                    wire:click="addQuestion({{ $a_id }})"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-1 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md"
                >
                    Add Question
                </button>
            </div>
        </div>
    </div>
    <div class="border-t-2 border-custom-pink mt-16"></div>
    <div class="mt-5">
        <h2 class="text-lg leading-6 font-medium text-gray-900">Question List</h2>
        <ul role="list" class="">
            @foreach($audio->get_question as $qa )
            <li class="p-2 flex w-full border-custom-pink border-2 mt-2">
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">Question: {{ $qa->qa_question }}</p>
                    <p class="text-sm font-medium text-gray-900">Time: {{ $qa->qa_time }}</p>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endif
