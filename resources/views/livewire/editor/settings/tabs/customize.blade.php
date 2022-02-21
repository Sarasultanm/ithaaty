<section>
    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="bg-white py-6 px-4 sm:p-6">
            <div>
                <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Customization</h2>
                <p class="mt-1 text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla est turpis</p>
            </div>

            <div class="mt-6 grid grid-cols-4 gap-6">
                <div class="col-span-4 sm:col-span-4">
                    <!-- color picker -->
                    <div x-data="{isOpen: false,header_bg:'{{$this->header_bg}}'}" x-cloak>
                        <div class="w-full">
                            <div class="mb-5">
                                <div class="flex items-center">
                                    <div>
                                        <label for="colorSelected" class="block font-regular mb-1">Header Background Colors</label>
                                        <input
                                            id="colorSelected"
                                            type="text"
                                            placeholder="Pick a color"
                                            class="border border-transparent shadow px-4 py-2 leading-normal text-gray-700 bg-white rounded-md focus:outline-none focus:shadow-outline"
                                            wire:model="header_bg"
                                        />
                                    </div>
                                    <div class="relative ml-3 mt-8">
                                        <button
                                            type="button"
                                            @click="isOpen = !isOpen"
                                            class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow bg-custom-pink text-white"
                                            :style="`background: ${header_bg}; color: white`"
                                        >
                                            <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path fill="none" d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z" />
                                                <path
                                                    d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z"
                                                />
                                            </svg>
                                        </button>

                                        <div
                                            x-show="isOpen"
                                            @click.away="isOpen = false"
                                            x-transition:enter="transition ease-out duration-100 transform"
                                            x-transition:enter-start="opacity-0 scale-95"
                                            x-transition:enter-end="opacity-100 scale-100"
                                            x-transition:leave="transition ease-in duration-75 transform"
                                            x-transition:leave-start="opacity-100 scale-100"
                                            x-transition:leave-end="opacity-0 scale-95"
                                            class="origin-top-right absolute right-0 mt-2 w-52 rounded-md shadow-lg z-30"
                                        >
                                            <div class="rounded-md bg-white shadow-xs px-4 py-3">
                                                <div class="flex flex-wrap -mx-2">
                                                    @foreach($colors as $color)
                                                    <div class="px-2">
                                                        <button
                                                            wire:click="putColor('header','{{$color}}')"
                                                            class="w-8 h-8 inline-flex rounded-full cursor-pointer border-solid border-white border-4 focus:outline-none focus:shadow-outline"
                                                            :style="`background: {{$color}};box-shadow: 0 0 0 1px rgb(0 0 0 / 10%);`"
                                                        ></button>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative ml-3 mt-8">
                                        <button wire:click="updateBackground('header')" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- color picker -->
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center">
                            <span class="bg-white px-2 text-gray-500">
                                <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path fill="#6B7280" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <!-- color picker -->
                    <div x-data="{isOpen: false,page_bg:'{{$this->page_bg}}'}" x-cloak>
                        <div class="w-full">
                            <div class="mb-5">
                                <div class="flex items-center">
                                    <div>
                                        <label for="colorSelected" class="block font-regular mb-1">Page Background Colors</label>
                                        <input
                                            id="colorSelected"
                                            type="text"
                                            placeholder="Pick a color"
                                            class="border border-transparent shadow px-4 py-2 leading-normal text-gray-700 bg-white rounded-md focus:outline-none focus:shadow-outline"
                                            wire:model="page_bg"
                                        />
                                    </div>
                                    <div class="relative ml-3 mt-8">
                                        <button
                                            type="button"
                                            @click="isOpen = !isOpen"
                                            class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow bg-custom-pink text-white"
                                            :style="`background: ${page_bg}; color: white`"
                                        >
                                            <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path fill="none" d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z" />
                                                <path
                                                    d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z"
                                                />
                                            </svg>
                                        </button>

                                        <div
                                            x-show="isOpen"
                                            @click.away="isOpen = false"
                                            x-transition:enter="transition ease-out duration-100 transform"
                                            x-transition:enter-start="opacity-0 scale-95"
                                            x-transition:enter-end="opacity-100 scale-100"
                                            x-transition:leave="transition ease-in duration-75 transform"
                                            x-transition:leave-start="opacity-100 scale-100"
                                            x-transition:leave-end="opacity-0 scale-95"
                                            class="origin-top-right absolute right-0 mt-2 w-52 rounded-md shadow-lg z-30"
                                        >
                                            <div class="rounded-md bg-white shadow-xs px-4 py-3">
                                                <div class="flex flex-wrap -mx-2">
                                                    @foreach($colors as $color)
                                                    <div class="px-2">
                                                        <button
                                                            wire:click="putColor('page','{{$color}}')"
                                                            class="w-8 h-8 inline-flex rounded-full cursor-pointer border-solid border-white border-4 focus:outline-none focus:shadow-outline"
                                                            :style="`background: {{$color}};box-shadow: 0 0 0 1px rgb(0 0 0 / 10%);`"
                                                        ></button>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative ml-3 mt-8">
                                        <button wire:click="updateBackground('page')" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- color picker -->
                </div>

                <div class="col-span-6 sm:col-span-4 text-right mt-36">
                    &nbsp;
                </div>
            </div>
        </div>
    </div>
</section>
