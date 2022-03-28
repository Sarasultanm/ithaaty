<section>
    <div class="grid grid-cols-5 gap-4 mt-5">
        <div class="col-span-2">
            <h1 class="flex-1 text-lg font-bold text-gray-800">Preview Ads</h1>
            <div class="flex p-1 mt-3 space-x-3 border-2 shadow-md">
                <div class="flex-shrink-0">
                    @php $ads_image_link = config('app.s3_public_link')."/ads/context_ads/".$ads_list->get_gallery->gallery_path ; @endphp
                    <img class="w-24 h-24 rounded-md" src="{{ $ads_image_link }}" alt="" />
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-lg font-bold text-gray-900 break-words h-7">
                        <a href="#" target="_blank" class="hover:underline">
                            {{ $ads_list->adslist_name }}
                        </a>
                    </p>
                    <p class="text-xs text-gray-700 font-regular">
                        <a href="{{ $ads_list->adslist_weblink }}" target="_blank" class="hover:underline">
                            {{ $ads_list->adslist_webname }}
                        </a>
                    </p>
                    <p class="text-xs text-gray-500 break-all font-regular">{{ $ads_list->adslist_desc }}</p>
                </div>
                <div class="flex self-center flex-shrink-0 mb-auto"></div>
            </div>

            <section>
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="mt-10">
                    <dl class="grid grid-cols-1 gap-5 mt-5 sm:grid-cols-2 lg:grid-cols-2">
                        <div class="relative px-4 pt-5 pb-2 overflow-hidden bg-white rounded-lg shadow sm:pt-2 sm:px-3">
                            <dt>
                                <div class="absolute p-3 bg-indigo-500 rounded-md">
                                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"
                                        />
                                    </svg>
                                </div>
                                <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Click</p>
                            </dt>
                            <dd class="flex items-baseline ml-16">
                                <p class="text-2xl font-semibold text-gray-900">{{ $ads_list->get_ads_stats()->count() }}</p>
                            </dd>
                        </div>

                        <div class="relative px-4 pt-5 pb-2 overflow-hidden bg-white rounded-lg shadow sm:pt-2 sm:px-3">
                            <dt>
                                <div class="absolute p-3 bg-indigo-500 rounded-md">
                                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                    </svg>
                                </div>
                                <p class="ml-16 text-sm font-medium text-gray-500 truncate">Avg. Click Rate</p>
                            </dt>
                            <dd class="flex items-baseline ml-16">
                                <p class="text-2xl font-semibold text-gray-900">58.16%</p>
                            </dd>
                        </div>
                    </dl>
                </div>
            </section>
        </div>

        <div class="col-span-3">
            <section>
                <h1 class="flex-1 text-lg font-bold text-gray-800">Latest Click <span class="float-right">Today click : 0</span></h1>
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="">
                    <div class="flex flex-col mt-3">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead class="bg-gray-50">

                                            <tr>
                                                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Country</th>
                                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Age</th>
                                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Gender</th>
                                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Date / Time</th>
                                          
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @forelse ($ads_list->get_ads_stats()->orderBy('id','DESC')->take(5)->get() as $adsStatItem )
                                                <tr>
                                                    <td class="py-2 pl-4 pr-3 text-sm text-gray-500 whitespace-nowrap sm:pl-6">{{ $adsStatItem->as_country }}</td>
                                                    <td class="px-2 py-2 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $adsStatItem->as_age}}</td>
                                                    <td class="px-2 py-2 text-sm text-gray-900 whitespace-nowrap">{{ $adsStatItem->as_gender }}</td>
                                                    <td class="px-2 py-2 text-sm text-gray-900 whitespace-nowrap">{{ Carbon\Carbon::parse($adsStatItem->created_at)->format('M d Y')  }}</td>
                                                </tr>
                                            @empty
                                                
                                            @endforelse
                                           
                                            <!-- More transactions... -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
