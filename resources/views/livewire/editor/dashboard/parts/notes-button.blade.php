@if(Auth::user()->plan == 'new' || Auth::user()->plan =="") 
@else 
@if(Auth::user()->get_plan->check_features('s2')->count() != 0 )
<!-- notes -->
<span class="inline-flex items-center mr-3 text-sm" @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses">
    <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        <span class="font-medium text-gray-900">Notes</span>
    </button>
</span>
<!-- notes -->
@endif @endif
