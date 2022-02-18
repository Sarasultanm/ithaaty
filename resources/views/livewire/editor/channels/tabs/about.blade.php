<div x-data="{modal: false}" class="flex justify-between space-x-3 mb-5">
    <h3 class="font-bold text-xl text-gray-900">About Us</h3>
    <button @click="modal = !modal" class="cursor-pointer hover:underline hover-text-custom-pink font-bold text-md text-custom-pink">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
    </button>
    <!-- modal -->
    <div x-cloak x-show="modal" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
        >
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" @click="modal = false, share = false"></div>
            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="transform opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="transform opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg lg:max-w-3xl sm:w-full sm:p-6"
            >
                <div>
                    <div class="">
                        <div class="flex items-start space-x-4">
                            <div class="min-w-0 flex-1">
                                <div class="relative">
                                    <p class="text-md font-bold text-gray-500 mb-3">Tell viewers about your channel.</p>
                                    <div class="border border-gray-300 rounded-lg shadow-sm overflow-hidden focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">
                                        <label for="comment" class="sr-only">Add your comment</label>
                                        <textarea wire:model.lazy="channel_about" rows="3" class="block w-full py-3 border-0 resize-none focus:ring-0 sm:text-sm" placeholder=""></textarea>
                                        <!-- Spacer element to match the height of the toolbar -->
                                        <div class="py-2" aria-hidden="true">
                                            <!-- Matches height of button in toolbar (1px border + 36px content height) -->
                                            <div class="py-px">
                                                <div class="h-9"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="absolute bottom-0 inset-x-0 pl-3 pr-2 py-2 flex justify-between">
                                        <div class="flex items-center space-x-5"></div>
                                        <div class="flex-shrink-0">
                                            <button wire:click="updateAbout({{$channel_list->id}})" class="bg-custom-pink text-white py-2 px-3 rounded-md">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
</div>
<p class="text-gray-700">{{$channel_about}}</p>
