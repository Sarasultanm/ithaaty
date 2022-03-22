<!-- table list -->

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                 Activity
                </th>
               <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                Days
                </th>
                {{-- <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                   Display Time
                </th> --}}
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                  Status
                </th>
                 <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                 Link
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                  Action
                </th>
              <!--   <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th> -->
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
               @foreach($adslist->get() as $ads)
               @if($ads->adslist_type == "Context Ads" )
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 w-10 h-10">
                      <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                      {{ $ads->adslist_name }}
                      </div>
                      <div class="text-sm text-gray-500">
                        {{ $ads->adslist_desc }}
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
                {{-- <td class="px-6 py-4 whitespace-nowrap">
              
                  <div class="text-sm text-gray-500">{{ $ads->adslist_displaytime }}</div>
                </td> --}}
                <td class="px-6 py-4 whitespace-nowrap">
                     <div class="text-sm font-bold text-gray-500">{{ $ads->adslist_status }}</div>
                </td>
                 <td class="px-6 py-4 whitespace-nowrap">
                      <a href="{{ $ads->adslist_weblink }}" target="_blank" class="inline-flex justify-center text-base font-medium text-indigo-500 shadow-sm hover:text-indigo-800 hover:underline sm:col-start-2 sm:text-sm">Open link
                      </a> 
                </td>
                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                      @if($ads->adslist_status == "Confirm")
                      <a href="{{ route('adminAdsSetup',['id' => $ads->id]) }}" class="inline-flex justify-center px-2 py-2 text-base font-medium text-black border border-transparent border-gray-200 rounded-md shadow-sm hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Setup
                      </a> 

                      @else

                      <button wire:click="confirmVideo({{$ads->id}})" class="inline-flex justify-center px-2 py-2 text-base font-medium text-black border border-transparent border-gray-200 rounded-md shadow-sm hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Approve
                      </button> 

                     @endif
                </td>
               <!--  <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                  <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                </td> -->
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

<!-- table list-->