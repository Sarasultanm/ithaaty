<section>
    <div class="grid grid-cols-6 gap-4 mt-5">

         <div class="col-span-6 mb-6">
                <div>
                    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-4">
                    <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                        <dt class="text-md font-bold text-gray-900 truncate">Total Clicks</dt>
                        <dt class="text-xs font-regular text-gray-500 truncate">Number of clicks that your ad receives</dt>
                        <dd class="mt-3 text-3xl font-semibold text-gray-900">{{ $totalClick }}</dd>
                    </div>
                    <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                        <dt class="text-md font-bold text-gray-900 truncate">Total Impression</dt>
                        <dt class="text-xs font-regular text-gray-500 truncate">Number of times your ad is shown</dt>
                        <dd class="mt-3 text-3xl font-semibold text-gray-900">{{ $totalImpression }}</dd>
                    </div>
                    <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                        <dt class="text-md font-bold text-gray-900 truncate">Click through rate(CTR)</dt>
                        <dt class="text-xs font-regular text-gray-500 truncate">Avg. Click Rate of your ads</dt>
                        <dd class="mt-3 text-3xl font-semibold text-gray-900"> {{ round($totalCTR, 2);  }}%</dd>
                    </div>

                    <div class="px-4 py-5 bg-custom-pink shadow rounded-lg overflow-hidden sm:p-6">
                        <dt class="text-md font-bold text-white truncate">Today Click</dt>
                        <dt class="text-xs font-regular text-white truncate">Number of click this day</dt>
                        <dd class="mt-3 text-3xl font-semibold text-white">{{ $totalClickToday }}</dd>
                    </div>

                    </dl>
                </div>
         </div>


        <div class="col-span-3">
            <section>
                <h2 class="flex-1 text-xl font-bold text-gray-800">Click</h2>
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
                                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-center text-sm font-semibold text-gray-900">Age</th>
                                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-center text-sm font-semibold text-gray-900">Gender</th>
                                                <th scope="col" class="whitespace-nowrap px-4 py-3.5 text-right text-sm font-semibold text-gray-900">Date</th>
                                          
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @forelse ($latestRecordClick as $adsStatItem )
                                                <tr>
                                                    <td class="py-2 pl-4 pr-3 text-sm text-gray-500 whitespace-nowrap sm:pl-6">{{ $adsStatItem->as_country }}</td>
                                                    <td class="px-2 py-2 text-sm font-medium text-gray-900 whitespace-nowrap text-center">{{ $adsStatItem->as_age}}</td>
                                                    <td class="px-2 py-2 text-sm text-gray-900 whitespace-nowrap text-center">{{ $adsStatItem->as_gender }}</td>
                                                    <td class="px-4 py-2 text-sm text-gray-900 whitespace-nowrap text-right ">{{ Carbon\Carbon::parse($adsStatItem->created_at)->format('M d Y')  }}</td>
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


        <div class="col-span-3">
            <section>
                <h2 class="flex-1 text-xl font-bold text-gray-800">Impression </h2>
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
                                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-center text-sm font-semibold text-gray-900">Age</th>
                                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-center text-sm font-semibold text-gray-900">Gender</th>
                                                <th scope="col" class="whitespace-nowrap px-4 py-3.5 text-right text-sm font-semibold text-gray-900">Date </th>
                                          
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @forelse ($latestRecordShown as $adsShownItem )
                                                <tr>
                                                    <td class="py-2 pl-4 pr-3 text-sm text-gray-500 whitespace-nowrap sm:pl-6">{{ $adsShownItem->ash_country }}</td>
                                                    <td class="px-2 py-2 text-sm font-medium text-gray-900 whitespace-nowrap text-center">{{ $adsShownItem->ash_age}}</td>
                                                    <td class="px-2 py-2 text-sm text-gray-900 whitespace-nowrap text-center">{{ $adsShownItem->ash_gender }}</td>
                                                    <td class="px-4 py-2 text-sm text-gray-900 whitespace-nowrap text-right ">{{ Carbon\Carbon::parse($adsShownItem->created_at)->format('M d Y')  }}</td>
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

       
        <div class="col-span-3 mt-5">
            <!-- This example requires Tailwind CSS v2.0+ -->
                <h2 class="flex-1 text-xl font-bold text-gray-800">Country </h2>
                <ul role="list" class="divide-y divide-gray-200 ">
                   @foreach($listTopCountry as $country_items) 
                    <li class="py-4 flex">
                        <div class="h-10 w-10 rounded-full bg-custom-pink text-white font-bold p-2" alt="">
                                {{ Str::upper(Str::substr($country_items->as_country, 0, 2));   }}
                        </div>
                        <div class="ml-3">
                            <p class="text-md font-medium text-gray-900 mt-2">{{ $country_items->as_country }}</p>
                        </div>
                        <div class="ml-auto ">
                            <p class="mt-2 font-bold">{{ $country_items->total }}</p>
                        </div>
                    </li>

                    @endforeach
                   
                </ul>
  
        </div>



        <div class="col-span-3 mt-5">
            <h2 class="flex-1 text-xl font-bold text-gray-800">Preview Ads</h2>
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
        </div>
     

    </div>
</section>
