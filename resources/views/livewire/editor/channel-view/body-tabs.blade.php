<div 
x-data="{
  openTab: 5,
  activeClasses: 'border-custom-pink text-custom-pink',
  inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
}" 
class=""
>

<div class="border-b border-gray-200">
  <ul class="flex -mb-px" >
    <li @click="openTab = 1"  :class="openTab === 1 ? activeClasses : inactiveClasses"   class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer" >
      <a>Home</a>
    </li>
    <li @click="openTab = 5" :class="openTab === 5 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer">
      <a>Podcast</a>
    </li>
    {{-- <li @click="openTab = 6" :class="openTab === 6 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer">
      <a>Playlist</a>
    </li> --}}
    <li @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer">
      <a>Channels</a>
    </li>
    <li @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer">
      <a>About</a>
    </li>
    @if($channel->channel_ownerid == Auth::user()->id)
    <li @click="openTab = 4" :class="openTab === 4 ? activeClasses : inactiveClasses"  class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2 cursor-pointer">
      <a>Settings</a>
    </li>
    @endif
  </ul>
</div>

<div class="w-full pt-4">

  <div x-show="openTab === 4">
    <!-- tab 4 -->
      @include('livewire.editor.channel-view.tabs.settings')
    <!-- tab 4 -->
  </div>

  <div x-show="openTab === 1">
    <!-- tab 1 -->
    @include('livewire.editor.channel-view.tabs.home')
    <!-- tab 1 -->
  </div>

  <div x-show="openTab === 2">
    <!-- tab 2 -->
      @include('livewire.editor.channel-view.tabs.channels')
  <!-- tab 2 -->
  </div>

  <div x-show="openTab === 3">
    <!-- tab 3 -->
    @include('livewire.editor.channel-view.tabs.about')
    <!-- tab 3 -->
  </div>

  <div x-show="openTab === 5">
    <!-- tab 5 -->
    @include('livewire.editor.channel-view.tabs.podcast')
    <!-- tab 5 -->
  </div>

  {{-- <div x-show="openTab === 6">
    <!-- tab 6 -->
    @include('livewire.editor.channel-view.tabs.playlist')
    <!-- tab 6 -->
  </div> --}}
</div>
</div>