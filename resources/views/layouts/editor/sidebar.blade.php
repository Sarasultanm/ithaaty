<nav aria-label="Sidebar" class="sticky top-4 divide-y divide-gray-300">
          <div class="pb-8 space-y-1">
            <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-600 hover:bg-gray-50" -->
          
             <x-nav-link-custom :href="route('editorDashboard')" :active="request()->routeIs('editorDashboard')">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg><span class="truncate">Home</span>
             </x-nav-link-custom>

             <x-nav-link-custom :href="route('editorNotification')" :active="request()->routeIs('editorNotification')">
              <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
            </svg><span class="truncate">Notification</span>
             </x-nav-link-custom>

             <x-nav-link-custom :href="route('editorAds')" :active="request()->routeIs('editorAds')">
              <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
              <span class="truncate">
                Ads
              </span>
            </x-nav-link-custom>

            @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
            @else
            @if(Auth::user()->get_plan->check_features('s4')->count() != 0 )
              <x-nav-link-custom :href="route('editorPlaylistDetails')" :active="request()->routeIs('editorPlaylistDetails','editorPlaylist')">
              <!-- Heroicon name: outline/fire -->
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
              </svg><span class="truncate">Playlists</span>
             </x-nav-link-custom>
             @endif
             @endif

             @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")

             @else

              @if(Auth::user()->get_plan->check_features('p3')->count() != 0 || Auth::user()->get_plan->check_features('p2')->count() != 0 )

              <p class="pt-5 px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="communities-headline">
               Podcast
              </p>
              
                  <x-nav-link-custom :href="route('editorPodcast')" :active="request()->routeIs('editorPodcast','editorPodcastUpdate','editorPodcastDetails')">
                  <!-- Heroicon name: outline/fire -->
                  <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                  </svg><span class="truncate">Podcast</span>
                </x-nav-link-custom>
               @endif
             @endif
             
             @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")

             @else

             @if(Auth::user()->get_plan->check_features('a1')->count() == 0 )

               @if(Auth::user()->get_audio->count() != 0)
               <x-nav-link-custom :href="route('editorOverview')" :active="request()->routeIs('editorOverview')">
                <!-- Heroicon name: outline/fire -->
                <svg xmlns="http://www.w3.org/2000/svg"   fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg><span class="truncate">Analytics</span>
               </x-nav-link-custom>
                @endif

              @endif  

             @endif
           
             

            @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
            @else
            @if(Auth::user()->get_plan->check_features('s2')->count() != 0 )
             <x-nav-link-custom :href="route('editorNotes')" :active="request()->routeIs('editorNotes')">
              <!-- Heroicon name: outline/fire -->
              <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
              </svg><span class="truncate">Notes</span>
             </x-nav-link-custom>
            @endif
            @endif


              <p class="pt-5 px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="communities-headline">
                Highlights
              </p>


            <x-nav-link-custom :href="route('editorPopular')" :active="request()->routeIs('editorPopular')">
              <!-- Heroicon name: outline/fire -->
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
              </svg>
              <span class="truncate">
                Popular
              </span>
            </x-nav-link-custom>

            <x-nav-link-custom :href="route('editorTrending')" :active="request()->routeIs('editorTrending')">
              <!-- Heroicon name: outline/trending-up -->
              <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
              </svg>
              <span class="truncate">
                Trending
              </span>
            </x-nav-link-custom>

            @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
            @else

            @if(Auth::user()->get_plan->check_features('s3')->count() != 0 )

            <p class="pt-5 px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="communities-headline">
               Social
            </p>  
             <x-nav-link-custom :href="route('editorActivity')" :active="request()->routeIs('editorActivity')">
              <!-- Heroicon name: outline/fire -->
            <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
            </svg><span class="truncate">Activity</span>
             </x-nav-link-custom>

             <x-nav-link-custom :href="route('editorFriends')" :active="request()->routeIs('editorFriends')">
              <!-- Heroicon name: outline/fire -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
              <span class="truncate">Friends</span>
             </x-nav-link-custom>

             @endif
             @endif


            @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
            @else
            @if(Auth::user()->get_plan->check_features('s3')->count() != 0 )
             <p class="pt-5 px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="communities-headline">
               Subscribers
            </p> 


             <x-nav-link-custom :href="route('editorFollowing')" :active="request()->routeIs('editorFollowing')">
              <!-- Heroicon name: outline/fire -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
              <span class="truncate">Following</span>
             </x-nav-link-custom>

            <x-nav-link-custom :href="route('editorFollowers')" :active="request()->routeIs('editorFollowers')">
              <!-- Heroicon name: outline/fire -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
              <span class="truncate">Followers</span>
             </x-nav-link-custom>

             @endif
             @endif



            <p class="pt-5 px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="communities-headline">
               Others
            </p>    


            <x-nav-link-custom :href="route('editorPlans')" :active="request()->routeIs('editorPlans')">
              <!-- Heroicon name: outline/fire -->
                <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg><span class="truncate">Plans</span>
             </x-nav-link-custom>
           <!--  @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
            @else
            @if(Auth::user()->get_plan->check_features('s3')->count() != 0 )
             <x-nav-link-custom :href="route('editorSubscribers')" :active="request()->routeIs('editorSubscribers')">
           
                <svg xmlns="http://www.w3.org/2000/svg"fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg><span class="truncate">Subcribers</span>
             </x-nav-link-custom>
             @endif
             @endif -->



             <x-nav-link-custom :href="route('editorSettings')" :active="request()->routeIs('editorSettings')">
              <!-- Heroicon name: outline/fire -->
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg><span class="truncate">Settings</span>
             </x-nav-link-custom>



           
           



          </div>

           


        </nav>