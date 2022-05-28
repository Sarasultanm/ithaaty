  <header x-data="{ header: false }"  @keydown.escape.stop="header = false" @click.away="header = false" class="shadow-sm lg:static lg:overflow-y-visible" 
  @if(Auth::user()->get_csm('csm_headerbg','active')->count() != 0 )
    style="background:{{Auth::user()->get_csm('csm_headerbg','active')->first()->csm_value }};"
  @else
    style="background:#fff;"
  @endif
  
  >
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="relative flex justify-between xl:grid xl:grid-cols-12 lg:gap-8">
        <div class="flex md:absolute md:left-0 md:inset-y-0 lg:static xl:col-span-2">
          <div class="flex items-center flex-shrink-0">
            <a href="/editor/dashboard">
              <img class="block w-auto" src="{{ asset('images/logo.png') }}" alt="Workflow" style="height:70px;">
            </a>
          </div>
        </div>
        <div class="flex-1 min-w-0 md:px-8 lg:px-0 xl:col-span-6">
          <div class="flex items-center px-6 py-4 md:max-w-3xl md:mx-auto lg:max-w-none lg:mx-0 xl:px-0">
            <div class="w-full">
              <label for="search" class="sr-only">Search</label>
              <div class="relative flex">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
         
                  <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                  </svg>
                </div>
                <input wire:model="searchbar" name="search" class="block w-3/4 py-2 pl-10 pr-3 text-sm placeholder-gray-500 bg-white border border-gray-300 rounded-md focus:outline-none focus:text-gray-900 focus:placeholder-gray-400 focus:ring-1 focus:ring-rose-500 focus:border-rose-500 sm:text-sm" placeholder="Search" type="search">
                <div class="flex-1 ">
                  <select  class="block w-4/5 py-2 pr-3 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option wire:click="getSearchResult('podcaster')"  value="podcaster">Podcaster</option>
                    <option value="channel">Channel</option>
                    <option value="podcast">Podcast</option>
                    <option value="episodes">Episodes</option>
                  </select>
                </div> 
              
              </div>
            </div>
          </div>
        </div>

        <div class="flex items-center md:absolute md:right-0 md:inset-y-0 lg:hidden">
          <!-- Mobile menu button -->
          <button type="button" class="inline-flex items-center justify-center p-2 -mx-2 text-gray-400 rounded-md hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-rose-500"  @click="header = !header">
            <span class="sr-only">Open menu</span>
            <!--
              Icon when menu is closed.

              Heroicon name: outline/menu

              Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block w-6 h-6" :class="{ 'hidden': header, 'block': !(header) }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!--
              Icon when menu is open.

              Heroicon name: outline/x

              Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden w-6 h-6" :class="{ 'block': header, 'hidden': !(header) }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

          <div x-cloak x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false"  class="hidden lg:flex lg:items-center lg:justify-end xl:col-span-4">
	          <p class="text-sm font-medium text-right text-gray-900">
              @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
               <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-gray-800 mr-3 border-red-500 border-2">Free</span>
              @else
              <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-gray-800 mr-3 border-red-500 border-2">{{ Auth::user()->get_plan->plan_name }}</span>
              @endif
             {{ Auth::user()->name }}<br>
             <span class="text-xs text-gray-500">{{ Auth::user()->email }}</span>

 	          </p>

            <a href="#" class="flex-shrink-0 p-1 ml-5 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
              <span class="sr-only">View notifications</span>
              <!-- Heroicon name: outline/bell -->
              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
              </svg>
            </a>

            <!-- Profile dropdown -->
            <div class="relative flex-shrink-0 ml-5">
              <div>
                <button type="button" class="flex bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true"  @click="open = !open" aria-haspopup="true" x-bind:aria-expanded="open">
                  <span class="sr-only">Open user menu</span>
                  @if(Auth::user()->get_profilephoto->count() == 0)
                    <img class="w-8 h-8 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="">
                  @else
                    <?php $img_path = Auth::user()->get_profilephoto->first()->gallery_path; ?>
                    <?php $s3_link = config('app.s3_public_link')."/users/profile_img/".$img_path; ?>
                    <img class="w-8 h-8 rounded-full" src="{{ $s3_link }}" alt=""> 
                  @endif
                </button>
              </div>
              <div x-description="Dropdown menu, show/hide based on menu state." x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <!-- Active: "bg-gray-100", Not Active: "" -->

                <a href="{{ route('editorViewUser',['id' => Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>

                <a href="{{ route('editorSettings') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>

              
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log out') }}
                    </x-dropdown-link>
                </form>
              </div>
            </div>
 

            {{-- <a href="#" class="items-center hidden px-4 py-2 ml-6 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
              New Post
            </a> --}}

        </div>


      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <nav class="lg:hidden" aria-label="Global" x-cloak  x-show="header">
      <div class="max-w-3xl px-2 pt-2 pb-3 mx-auto space-y-1 sm:px-4">
        <!-- Current: "bg-gray-100 text-gray-900", Default: "hover:bg-gray-50" -->

        @include('layouts.editor.mobile-menu')

        <!-- <a href="#" class="block px-3 py-2 text-base font-medium text-gray-900 bg-gray-100 rounded-md">Home</a>
        <a href="#" class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-50">Popular</a>
        <a href="#" class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-50">Communities</a>
        <a href="#" class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-50">Trending</a> -->
      </div>
      <div class="pt-4 pb-3 border-t border-gray-200">
        <div class="flex items-center max-w-3xl px-4 mx-auto sm:px-6">

          <div class="flex-shrink-0">
            @if(Auth::user()->get_profilephoto->count() == 0)
              <img class="w-10 h-10 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="">
            @else
              <?php $img_path = Auth::user()->get_profilephoto->first()->gallery_path; ?>
              <?php $s3_link = config('app.s3_public_link')."/users/profile_img/".$img_path; ?>
              <img class="w-10 h-10 rounded-full" src="{{ $s3_link }}" alt="">
            @endif
          </div>

          <div class="ml-3">
              <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
              <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>

          </div>
          
          <div class="flex-shrink-0 p-1 ml-auto text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
            @if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
              <span class="inline-flex items-right px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-gray-800 mr-3 border-red-500 border-2">Free</span>
              @else
              <span class="inline-flex items-right px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-gray-800 mr-3 border-red-500 border-2">{{ Auth::user()->get_plan->plan_name }}</span>
              @endif
            <!--  <span class="sr-only">View notifications</span>

            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg> -->
          </div>
        </div>
        <div class="max-w-3xl px-2 mx-auto mt-3 space-y-1 sm:px-4">

          <a href="{{ route('editorViewUser',['id' => Auth::user()->id]) }}" class="block px-3 py-2 text-base font-medium text-gray-500 rounded-md hover:bg-gray-50 hover:text-gray-900" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>

          <a href="{{ route('editorSettings') }}" class="block px-3 py-2 text-base font-medium text-gray-500 rounded-md hover:bg-gray-50 hover:text-gray-900" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>


          <form method="POST" action="{{ route('logout') }}">
              @csrf
              <x-dropdown-link :href="route('logout')"
                      onclick="event.preventDefault();
                                  this.closest('form').submit();" class="block text-base font-medium text-gray-500 rounded-md hover:bg-gray-50 hover:text-gray-900">
                  {{ __('Sign out') }}
              </x-dropdown-link>
          </form>
        </div>
      </div>
    </nav>
  </header>