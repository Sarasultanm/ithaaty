<section>
  <div class="grid grid-cols-6 gap-4 mt-5">

        <div class="col-span-6 mb-6">
                <div>
                    <dl class="grid grid-cols-1 gap-5 mt-5 sm:grid-cols-4">
                    <div class="px-4 py-5 overflow-hidden bg-white rounded-lg shadow sm:p-6">
                        <dt class="font-bold text-gray-900 truncate text-md">Total Clicks</dt>
                        <dt class="text-xs text-gray-500 truncate font-regular">Number of clicks that your ad receives</dt>
                        <dd class="mt-3 text-3xl font-semibold text-gray-900">{{ $totalClick }}</dd>
                    </div>
                    <div class="px-4 py-5 overflow-hidden bg-white rounded-lg shadow sm:p-6">
                        <dt class="font-bold text-gray-900 truncate text-md">Total Impression</dt>
                        <dt class="text-xs text-gray-500 truncate font-regular">Number of times your ad is shown</dt>
                        <dd class="mt-3 text-3xl font-semibold text-gray-900">{{ $totalImpression }}</dd>
                    </div>
                    <div class="px-4 py-5 overflow-hidden bg-white rounded-lg shadow sm:p-6">
                        <dt class="font-bold text-gray-900 truncate text-md">Click through rate(CTR)</dt>
                        <dt class="text-xs text-gray-500 truncate font-regular">Avg. Click Rate of your ads</dt>
                        <dd class="mt-3 text-3xl font-semibold text-gray-900"> {{ round($totalCTR, 2);  }}%</dd>
                    </div>

                    <div class="px-4 py-5 overflow-hidden rounded-lg shadow bg-custom-pink sm:p-6">
                        <dt class="font-bold text-white truncate text-md">Today Click</dt>
                        <dt class="text-xs text-white truncate font-regular">Number of click this day</dt>
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
                                                    <td class="px-2 py-2 text-sm font-medium text-center text-gray-900 whitespace-nowrap">{{ $adsStatItem->as_age}}</td>
                                                    <td class="px-2 py-2 text-sm text-center text-gray-900 whitespace-nowrap">{{ $adsStatItem->as_gender }}</td>
                                                    <td class="px-4 py-2 text-sm text-right text-gray-900 whitespace-nowrap ">{{ Carbon\Carbon::parse($adsStatItem->created_at)->format('M d Y')  }}</td>
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
                                                    <td class="px-2 py-2 text-sm font-medium text-center text-gray-900 whitespace-nowrap">{{ $adsShownItem->ash_age}}</td>
                                                    <td class="px-2 py-2 text-sm text-center text-gray-900 whitespace-nowrap">{{ $adsShownItem->ash_gender }}</td>
                                                    <td class="px-4 py-2 text-sm text-right text-gray-900 whitespace-nowrap ">{{ Carbon\Carbon::parse($adsShownItem->created_at)->format('M d Y')  }}</td>
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
                    <li class="flex py-4">
                        <div class="w-10 h-10 p-2 font-bold text-white rounded-full bg-custom-pink" alt="">
                                {{ Str::upper(Str::substr($country_items->as_country, 0, 2));   }}
                        </div>
                        <div class="ml-3">
                            <p class="mt-2 font-medium text-gray-900 text-md">{{ $country_items->as_country }}</p>
                        </div>
                        <div class="ml-auto ">
                            <p class="mt-2 font-bold">{{ $country_items->total }}</p>
                        </div>
                    </li>

                    @endforeach
                   
                </ul>
        </div>


      <div class="col-span-3">
          <h1 class="flex-1 text-lg font-bold text-gray-800">Preview Ads</h1>

          <div class="p-3 mt-3 space-y-3 border-2 shadow-md">

            <div class="flex-1 min-w-0">
              <p class="text-lg font-bold text-gray-900 break-words h-7">
                  <a href="#" target="_blank" class="hover:underline">
                     {{ $ads_list->adslist_name }}
                  </a>
              </p>
              <p class="text-xs text-gray-700 font-regular">
                  <a href="#" target="_blank" class="hover:underline">
                    {{ $ads_list->adslist_webname }}
                  </a>
              </p>
              <p class="text-xs text-gray-500 font-regular">{{ $ads_list->adslist_desc }}</p>
            </div>

            <div class="flex-shrink-0">
                @php
                  $ads_social_link = config('app.s3_public_link')."/ads/social_ads/".$ads_list->get_gallery->gallery_path ; 
                @endphp
               
                  @if ($ads_list->adslist_videotype == "image")
                      <img class="w-full rounded-md h-80" src="{{ $ads_social_link }}" alt="" />

                  @elseif($ads_list->adslist_videotype == "video")
                      <video class="w-full rounded-md h-80" poster="{{ asset('images/default_user.jpg') }}" controls>
                          <source src="{{ $ads_social_link }}" type="video/mp4">
                          <source src="{{ $ads_social_link }}" type="video/ogg">
                          Your browser does not support the video tag.
                      </video>

                  @elseif($ads_list->adslist_videotype == "audio")
                      <video class="w-full rounded-md h-80" poster="{{ asset('images/default_user.jpg') }}"  controls>
                          <source src="{{ $ads_social_link }}" type="video/mp4">
                          <source src="{{ $ads_social_link }}" type="video/ogg">
                          Your browser does not support the video tag.
                      </video>
                  @endif
            </div>
            


          </div>

         
      </div>


      <div class="col-span-3">
        <div class="">
                
            <div class="overflow-hidden rounded-lg shadow-lg">
              <div class="px-5 py-3 bg-gray-50">
                  Ads Chart
              </div>
              <canvas class="p-10 " id="chartBar"></canvas>
            </div>
        
            <!-- Required chart.js -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        
            <!-- Chart bar -->
            <script>
        
                const labelsBarChart = [
                'Jan',
                'Feb',
                'Marc',
                'Apri',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec',
                ];
                const dataBarChart = {
                labels: labelsBarChart,
                datasets: [{
                    label: 'My First dataset',
                    backgroundColor: '#f98b88',
                    borderColor: 'hsl(252, 82.9%, 67.8%)',
                    data: [{{$jan}},{{$feb}},{{$mar}},{{$apr}},{{$may}},{{$jun}},{{$jul}},{{$aug}},{{$sep}},{{$oct}},{{$nov}},{{$dec}}],
                }]
                };
        
                const configBarChart = {
                type: 'bar',
                data: dataBarChart,
                options: {}
                };
        
        
                var chartBar = new Chart(
                document.getElementById('chartBar'),
                configBarChart
                );
            </script>
        
        </div>
    </div>
    <div class="col-span-3">

        <div class="overflow-hidden rounded-lg shadow-lg">
            <div class="px-5 py-3 bg-gray-50">Gender</div>
            <canvas class="p-10" id="chartPie"></canvas>
          </div>
         
        <br>
        
          <!-- Required chart.js -->
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
          
          <!-- Chart pie -->
          <script>
            const TotalFemale = <?php echo $totalFemale; ?>;
            const TotalMale = <?php echo $totalMale; ?>;
            const dataPie = {
              labels: ["Female", "Male"],
              datasets: [
                {
                  label: "Gender Stats",
                  data: [TotalFemale, TotalMale],
                  backgroundColor: [
                    "rgb(133, 105, 241)",
                    "rgb(164, 101, 241)",
                  ],
                  hoverOffset: 4,
                },
              ],
            };
          
            const configPie = {
              type: "pie",
              data: dataPie,
              options: {},
            };
          
            var chartBar = new Chart(document.getElementById("chartPie"), configPie);
          </script>
    </div>
    

      
  </div>
</section>
