 <?php use App\Http\Livewire\Editor\EditorDashboard; ?>
 
 <aside class="hidden xl:block xl:col-span-4">
        <div class="sticky top-4 space-y-4">
          <section aria-labelledby="who-to-follow-heading">
            <div class="bg-white rounded-lg shadow">
              <div class="p-6">
                <h2 id="who-to-follow-heading" class="text-base font-medium text-gray-900">
                  Who to follow
                </h2>
                <div class="mt-6 flow-root">
                  <ul class="-my-4 divide-y divide-gray-200">
                    @foreach($randomList as $randomUsers)

                    @if( EditorDashboard::checkFollow($randomUsers->id) == 0 )
                    <li class="flex items-center py-4 space-x-3">
                      <div class="flex-shrink-0">
                        <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                      </div>
                      <div class="min-w-0 flex-1">
                        <p class="text-sm font-medium text-gray-900">
                          <a href="#">{{ $randomUsers->name }}</a>
                        </p>
                        <p class="text-sm text-gray-500">
                          <a href="#">{{ $randomUsers->email }}</a>
                        </p>
                      </div>
                      <div class="flex-shrink-0">
                        <button  wire:click="follow({{ $randomUsers->id }})" type="button" class="inline-flex items-center px-3 py-0.5 rounded-full bg-rose-50 text-sm font-medium text-rose-700 hover:bg-rose-100">
                          <!-- Heroicon name: solid/plus -->
                          <svg class="-ml-1 mr-0.5 h-5 w-5 text-rose-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                          </svg>
                          <span>
                            Follow
                          </span>
                        </button>
                      </div>
                    </li>
                    @endif
                    @endforeach


                    <!-- More people... -->
                  </ul>
                </div>
                <div class="mt-6">
                  <a href="#" class="w-full block text-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    View all
                  </a>
                </div>
              </div>
            </div>
          </section>
          <section aria-labelledby="trending-heading">
            <div class="bg-white rounded-lg shadow">
              <div class="p-6">
                <h2 id="trending-heading" class="text-base font-medium text-gray-900">
                  Trending
                </h2>
                <div class="mt-6 flow-root">
                  <ul class="-my-4 divide-y divide-gray-200">
                    <li class="flex py-4 space-x-3">
                      <div class="flex-shrink-0">
                        <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Floyd Miles">
                      </div>
                      <div class="min-w-0 flex-1">
                        <p class="text-sm text-gray-800">{{$mostlike->first()->get_audio->get_user->name}} </p>
                        <p class="text-sm text-gray-800"> {{$mostlike->first()->get_audio->audio_name}} 
                        </p>
                        <div class="mt-2 flex space-x-6">
                          <span class="inline-flex items-center text-sm">
                            <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500"> 
                              <!-- Heroicon name: solid/thumb-up -->
                              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                              </svg>
                              <span class="font-medium text-gray-900">{{ $mostlike->first()->get_audio->get_like->count() }}</span>
                              <span class="sr-only">likes</span>
                            </button>
                          </span>
                          <span class="inline-flex items-center text-sm">
                            <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                              <!-- Heroicon name: solid/chat-alt -->
                              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
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
                  <a href="#" class="w-full block text-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    View all
                  </a>
                </div>
              </div>
            </div>
          </section>
        </div>
      </aside>