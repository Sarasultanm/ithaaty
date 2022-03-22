 <?php use App\Http\Livewire\Editor\EditorDashboard; ?>
 
 <aside class="hidden xl:block xl:col-span-4">
        <div class="sticky space-y-4 top-4">
          @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
          @else
          @if(Auth::user()->get_plan->check_features('s3')->count() != 0 )

         
          


          <section aria-labelledby="who-to-follow-heading">
            <div class="bg-white rounded-lg shadow">
              <div class="p-6">
                <h2 id="who-to-follow-heading" class="text-base font-medium text-gray-900">
                  Who to follow
                </h2>
                <div class="flow-root mt-6">
                  <ul class="-my-4 divide-y divide-gray-200">
                    @foreach($randomList as $randomUsers)

                    @if( EditorDashboard::checkFollow($randomUsers->id) == 0 )
                    <li>
                      <a href="{{ route('editorViewUser',['id' => $randomUsers->id]) }}" class="flex items-center py-4 space-x-3 pointer hover:bg-gray-100">
                      <div class="flex-shrink-0">
                        @if($randomUsers->get_profilephoto->count() == 0)
                         <img class="w-10 h-10 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="">
                        @else
                          <?php $sideprofile_path = $randomUsers->get_profilephoto->first()->gallery_path; ?>
                          <img class="w-10 h-10 rounded-full" src="{{ asset('users/profile_img/'.$sideprofile_path) }}" alt="">
                        @endif
                       <!--  <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt=""> -->
                      </div>
                      <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900">
                        {{ $randomUsers->name }}
                        </p>
                        <p class="text-sm text-gray-500">
                         {{ $randomUsers->email }}
                        </p>
                      </div>
                      <div class="flex-shrink-0">
                        <button  wire:click="follow({{ $randomUsers->id }})" type="button" class="bg-custom-pink inline-flex items-center px-3 py-0.5 rounded-full  text-sm font-medium text-white">
                          <!-- Heroicon name: solid/plus -->
                          <svg class="-ml-1 mr-0.5 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                          </svg>
                          <span>
                            Follow
                          </span>
                        </button>
                      </div>
                      </a>
                    </li>
                    @endif
                    @endforeach


                    <!-- More people... -->
                  </ul>
                </div>
                <div class="mt-6">
                  <a href="#" class="block w-full px-4 py-2 text-sm font-medium text-center text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50">
                    View all
                  </a>
                </div>
              </div>
            </div>
          </section>
          @endif
           @endif
          <section aria-labelledby="trending-heading">
            <div class="bg-white rounded-lg shadow">
              <div class="p-6">
                <h2 id="trending-heading" class="text-base font-medium text-gray-900">
                  Trending
                </h2>
                <div class="flow-root mt-6">
                  <ul class="-my-4 divide-y divide-gray-200">
                    <li class="flex py-4 space-x-3">
                      <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Floyd Miles">
                      </div>
                      <div class="flex-1 min-w-0">
                        <p class="text-sm text-gray-800">{{$mostlike->first()->get_audio->get_user->name}} </p>
                        <p class="text-sm text-gray-800"> {{$mostlike->first()->get_audio->audio_name}} 
                        </p>
                        <div class="flex mt-2 space-x-6">
                          <span class="inline-flex items-center text-sm">
                            <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500"> 
                              <!-- Heroicon name: solid/thumb-up -->
                              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                              </svg>
                              <span class="font-medium text-gray-900">{{ $mostlike->first()->get_audio->get_like->count() }}</span>
                              <span class="sr-only">likes</span>
                            </button>
                          </span>
                          <span class="inline-flex items-center text-sm">
                            <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                              <!-- Heroicon name: solid/chat-alt -->
                              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                              </svg>
                              <span class="font-medium text-gray-900">{{ $mostlike->first()->get_audio->get_comments->count() }}</span>
                            </button>
                          </span>
                        </div>
                      </div>
                    </li>

                    <!-- More posts... -->
                  </ul>
                </div>
                <div class="mt-6">
                  <a href="#" class="block w-full px-4 py-2 text-sm font-medium text-center text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50">
                    View all
                  </a>
                </div>
              </div>
            </div>
          </section>

          <section aria-labelledby="trending-heading">
            @if($contextAds->count() != 0)
                <h2 class="mt-2 ml-2 text-base font-bold text-gray-900">
                  Sponsors
                </h2>
                <div class="bg-white rounded-lg shadow">
                  <div class="">
                    <div class="flow-root">
                      
                   
                          <div class="relative flex p-1 space-x-3">
                            <div class="flex-shrink-0">
                              @php
                                  $ads_image_link = config('app.s3_public_link')."/ads/context_ads/".$contextAds->first()->get_gallery->gallery_path ; 
                                @endphp
                                <img class="w-24 h-24 rounded-md" src="{{ $ads_image_link }}" alt="" />
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-lg font-bold text-gray-900 break-words h-7">
                                    <a href="#" target="_blank" class="hover:underline">
                                      {{ $contextAds->first()->adslist_name }}
                                    </a>
                                </p>
                                <p class="text-xs text-gray-700 font-regular">
                                    <a href="{{ $contextAds->first()->adslist_weblink }}" target="_blank" class="hover:underline">
                                      {{ $contextAds->first()->adslist_webname }}
                                    </a>
                                </p>
                                <p class="text-xs text-gray-500 break-all font-regular">{{ $contextAds->first()->adslist_desc }}</p>
                            </div>
                            <a target="_blank" href="{{ $contextAds->first()->adslist_weblink }}" class="absolute inset-0 cursor-pointer" aria-hidden="true"></a>
                          </div>
                    
                    </div>
                  
                  </div>
                </div>
                @endif
          </section>

                    <section aria-labelledby="who-to-follow-heading">
            <div class="">
              <div class="">
                <!-- <h2 id="who-to-follow-heading" class="text-base font-medium text-gray-900">
                  Who to follow
                </h2> -->
           <!--      <div class="flow-root mt-6">
                  <div class="mb-2">
                      <div class="relative flex items-center px-6 py-5 space-x-3 bg-white border border-gray-300 rounded-md shadow-sm hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 ">
                        <div class="flex-shrink-0">
                          <img class="w-12 h-12" src="{{ asset('sponsor/sponsor1.jpg') }}" alt="">
                        </div>
                        <div class="flex-1 min-w-0">
                          <a href="#" class="focus:outline-none">
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            <p class="font-bold text-gray-900 text-md">
                              Company Nmae
                            </p>
                            <p class="text-sm text-gray-500 truncate">
                              <svg xmlns="http://www.w3.org/2000/svg" class="float-left w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                              </svg>
                              www.samplecompany.com
                            </p>
                             <p class="text-sm text-gray-500 truncate">
                              <svg xmlns="http://www.w3.org/2000/svg" class="float-left w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>
                              Sample Address 123 Street, Test
                            </p>
                          </a>
                        </div>
                      </div>
                  </div>

                  <div class="mb-2">
                      <div class="relative flex items-center px-6 py-5 space-x-3 bg-white border border-gray-300 rounded-md shadow-sm hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 ">
                        <div class="flex-shrink-0">
                          <img class="w-12 h-12" src="{{ asset('sponsor/sponsor2.jpg') }}" alt="">
                        </div>
                        <div class="flex-1 min-w-0">
                          <a href="#" class="focus:outline-none">
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            <p class="font-bold text-gray-900 text-md">
                              Company Name
                            </p>
                            <p class="text-sm text-gray-500 truncate">
                              <svg xmlns="http://www.w3.org/2000/svg" class="float-left w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                              </svg>
                              www.samplecompany.com
                            </p>
                             <p class="text-sm text-gray-500 truncate">
                              <svg xmlns="http://www.w3.org/2000/svg" class="float-left w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>
                              Sample Address 123 Street, Test
                            </p>
                          </a>
                        </div>
                      </div>
                  </div>

                </div> -->

                <div class="mt-6">
                  <!-- <a href="{{ route('editorAds') }}" class="block w-full px-4 py-2 text-sm font-medium text-center text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50">
                    Promote you Company
                  </a> -->
                  <a href="{{ route('editorAds') }}" class="block w-full px-4 py-4 text-sm font-bold text-center text-white border border-gray-300 shadow-sm bg-custom-pink">PROMOTE YOUR COMPANY</a>
                </div>
              </div>
            </div>
          </section>











        </div>
      </aside>