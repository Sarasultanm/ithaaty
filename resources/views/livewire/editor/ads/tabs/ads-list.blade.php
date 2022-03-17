
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                  <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                      <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                         Activity
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                         Ads Type
                                         </th>
                                       <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                         Skip Duration
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Display Time
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          Status
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          Action
                                        </th>
                                      <!--   <th scope="col" class="relative px-6 py-3">
                                          <span class="sr-only">Edit</span>
                                        </th> -->
                                      </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($ads_list as $ads)
                                      <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                            </div>
                                            <div class="ml-4">
                                              <div class="text-sm font-medium text-gray-900">
                                              {{ $ads->adslist_name }}
                                              </div>
                                              <div class="text-sm text-gray-500">
                                                {{ $ads->adslist_videolink }}
                                              </div>
                                              <div class="text-sm text-gray-500">
                                                <strong>   </strong>
                                              </div>
                                            </div>
                                          </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                          <!--  <div class="text-sm text-gray-900">Category</div> -->
                                           <div class="text-sm text-gray-500"></div>
                                         </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                         <!--  <div class="text-sm text-gray-900">Category</div> -->
                                          <div class="text-sm text-gray-500">{{ $ads->adslist_adstype }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                         <!--  <div class="text-sm text-gray-900">Category</div> -->
                                          <div class="text-sm text-gray-500">{{ $ads->adslist_displaytime }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                           <div class="text-sm font-bold text-gray-500">{{ $ads->adslist_status }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                          <a href="{{ route('editorAdsUpdate',['id' => $ads->id ]) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">Update</a> / 
                                           <a href="{{ route('editorAdsStats',['id' => $ads->id ]) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">Stats</a>
                                          @if($ads->adslist_status == "Confirm")
                                        <!--  <a href="{{ route('adminAdsSetup',['id' => $ads->id]) }}" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-2 py-2 border-gray-200 text-base font-medium text-black hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Setup
                                           </a>  -->
                                          @endif
                                        </td>

                                       <!-- <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                          <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>  -->
                                      </tr>
                                      @endforeach
                                      <!-- More people... -->
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                        </div>
