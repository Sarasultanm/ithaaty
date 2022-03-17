<div class="grid grid-cols-10 gap-4">
    <section class="mt-5 col-span-10">
        <div class="shadow-sm sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div class="grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-3">
                        <h3 class="text-gray-900 font-bold text-md">Podcast URL</h3>
                        <p class="mt-1 text-sm text-gray-500">Create your unique podcast link.</p>

                        <div class="mt-1 relative flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                https://ithaaty.com/channel/podcast/
                            </span>

                            <input
                                type="text"
                                name="company-website"
                                id="company-website"
                                class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-lg focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300"
                                wire:model="podcast_uniquelink"
                                placeholder="Enter Text here"
                            />

                            <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                                <button class="inline-flex items-center border border-gray-200 rounded px-2 text-sm font-sans font-medium text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 col-span-10">
        <div class="shadow-sm sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div class="grid grid-cols-4 gap-6">
                    <div class="col-span-4">
                        <h3 class="text-gray-900 font-bold text-md">About</h3>
                        <p class="mt-1 text-sm text-gray-500">Enter the details for your podcast</p>
                        <div class="mt-1">
                            <textarea rows="4" name="comment" id="comment" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 col-span-10">
        <div class="shadow-sm sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div class="grid grid-cols-4 gap-6">
                    <div class="col-span-4">
                        <h3 class="text-gray-900 font-bold text-md">Categories</h3>
                        <p class="mt-1 text-sm text-gray-500">Choose your podcast categories</p>
                    </div>
                    @foreach($categories as $category)
                    <div class="col-span-2">
                    
                        <div class="relative flex items-start">
                            <div class="flex items-center h-5">
                                @if( $category->checkPodcastCategory($podcast->id)->where('pc_typestatus','active')->count() == 0)
                                    <input wire:click="addCategory({{ $category->id }})" type="checkbox" 
                                    class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                                @else
                                    <input checked wire:click="removeCategory({{ $category->id }})" type="checkbox" 
                                    class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                                @endif
                                
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="comments" class="font-bold text-gray-900">{{$category->category_name}}</label>
                                <p id="comments-description" class="text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ac leo sed erat congue laoreet tempus a leo.</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <section class="mt-2 col-span-10">
        <button  type="submit" class="mt-5 bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 float-right ">Update</button>
   </section>

</div>
