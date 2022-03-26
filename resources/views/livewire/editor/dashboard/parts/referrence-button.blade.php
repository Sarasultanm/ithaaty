@if(Auth::user()->plan == 'new' || Auth::user()->plan =="") 
@else 
@if(Auth::user()->get_plan->check_features('o4')->count() != 0 )
<!-- referrence -->
<span class="inline-flex items-center text-sm" @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses">
    <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
            />
        </svg>
        <span class="font-medium text-gray-900">Referrence</span>
    </button>
</span>
<!-- referrence -->
@endif @endif
