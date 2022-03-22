<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
      <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                Title
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                Days
                </th>
              {{-- <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                Skip Duration
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
              Display Time
              </th> --}}
              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                Status
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                Action
              </th>
            <!--   <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th> -->
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          @foreach($ads_list as $ads)
            @if($ads->adslist_type == "Social Ads")
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 w-10 h-10">
                    @php
                      $ads_image_link = config('app.s3_public_link')."/ads/context_ads/".$ads->get_gallery->gallery_path ; 
                    @endphp
                    <img class="w-10 h-10 rounded-full" src="{{ $ads_image_link }}" alt="">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-bold text-gray-900">
                   {{ $ads->adslist_name }}
                    </div>
                    <div class="text-sm text-gray-500">
                      <span class="truncate">{{ $ads->adslist_desc }}</span>
                    </div>
                    <div class="text-sm text-gray-500">
                      <strong>   </strong>
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-500">{{ $ads->adslist_days }}</div>
                </td>
              <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm font-bold text-gray-500">{{ $ads->adslist_status }}</div>
              </td>
              <td class="px-6 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                <a href="{{ route('editorAdsUpdate',['id' => $ads->id ]) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">Update</a> / 
                  <a href="{{ route('editorAdsStats',['id' => $ads->id ]) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">Stats</a>
                @if($ads->adslist_status == "Confirm")
              <!--  <a href="{{ route('adminAdsSetup',['id' => $ads->id]) }}" class="inline-flex justify-center px-2 py-2 text-base font-medium text-black border border-transparent border-gray-200 rounded-md shadow-sm hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Setup
                  </a>  -->
                @endif
              </td>

              <!-- <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
              </td>  -->
            </tr>
            @endif
            @endforeach
            <!-- More people... -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
