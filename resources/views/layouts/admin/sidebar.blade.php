<nav aria-label="Sidebar" class="sticky top-4 divide-y divide-gray-300">
          <div class="pb-8 space-y-1">
            <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-600 hover:bg-gray-50" -->
            

             <x-nav-link-custom :href="route('adminDashboard')" :active="request()->routeIs('adminDashboard')">
                     <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
              </svg><span class="truncate">Dashboard</span>
             </x-nav-link-custom>

             <x-nav-link-custom :href="route('adminSettings')" :active="request()->routeIs('adminSettings')">
              <!-- Heroicon name: outline/fire -->
              <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg><span class="truncate">Settings</span>
             </x-nav-link-custom>


            <x-nav-link-custom :href="route('adminPopular')" :active="request()->routeIs('adminPopular')">
              <!-- Heroicon name: outline/fire -->
              <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
              </svg>
              <span class="truncate">
                Popular
              </span>
            </x-nav-link-custom>

             <x-nav-link-custom :href="route('adminAds')" :active="request()->routeIs('adminAds')">
              <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
              <span class="truncate">
                Ads
              </span>
            </x-nav-link-custom>

             <x-nav-link-custom :href="route('adminTrending')" :active="request()->routeIs('adminTrending')">
              <!-- Heroicon name: outline/trending-up -->
              <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
              </svg>
              <span class="truncate">
                Trending
              </span>
            </x-nav-link-custom>


            <x-nav-link-custom :href="route('adminPlans')" :active="request()->routeIs('adminPlans','adminPlansCreate')">
              <!-- Heroicon name: outline/trending-up -->
             <!--  <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
              </svg> -->
              <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
              <span class="truncate">
                Plans
              </span>
            </x-nav-link-custom>

            
          </div>
      <!--     <div class="pt-10">
            <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="communities-headline">
              My communities
            </p>
            <div class="mt-3 space-y-2" aria-labelledby="communities-headline">
              <a href="#" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                <span class="truncate">
                  Movies
                </span>
              </a>

              <a href="#" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                <span class="truncate">
                  Food
                </span>
              </a>

              <a href="#" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                <span class="truncate">
                  Sports
                </span>
              </a>

              <a href="#" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                <span class="truncate">
                  Animals
                </span>
              </a>

              <a href="#" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                <span class="truncate">
                  Science
                </span>
              </a>

              <a href="#" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                <span class="truncate">
                  Dinosaurs
                </span>
              </a>

              <a href="#" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                <span class="truncate">
                  Talents
                </span>
              </a>

              <a href="#" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                <span class="truncate">
                  Gaming
                </span>
              </a>
            </div>
          </div> -->
        </nav>