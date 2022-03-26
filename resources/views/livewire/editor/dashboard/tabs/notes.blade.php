@if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
@else
@if(Auth::user()->get_plan->check_features('s2')->count() != 0 )
<!-- notes-view -->
        <div class="flex mt-5">
           <input type="text" name="email" id="email" placeholder="Time" class="flex-1 block w-20 mr-3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="notes_time" >
          <input type="text" name="email" id="email" placeholder="Notes" class="block w-full mr-3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="notes_message"  >
          <button wire:click="saveNotes({{ $audio->id }},{{$audio->audio_editor}})" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" >
  Save
  </button>
        </div>
        @if($audio->get_notes->count() != 0 )

    <div x-data="{ open: false }">
      
    <div class="mt-5">
      <div class="flex space-x-3">
              <div>
                <p class="text-xs font-medium text-gray-900">
                  <a class="cursor-pointer hover:underline" @click="open = true">View Notes</a>
                </p>
              </div>
            
          </div>

    </div>
    <div class="mt-5" x-show="open" @click.away="open = false">
      @foreach($audio->get_notes as $notes)
      @if($notes->notes_userid == Auth::user()->id )
          <div class="flex space-x-3">
            
              <div class="flex-shrink-0">
                <img class="w-5 h-5 rounded-full" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              </div>
              <div class="flex-1 min-w-0">
               <div class="p-2 mb-3 bg-gray-100 rounded-md "> 
                <p class="text-xs font-medium text-gray-900">
                  <a href="/editor/users//{{ $audio->audio_editor }}" class="font-bold hover:underline">{{ $notes->get_user->name }}</a>
                </p>
                <p class="text-sm text-gray-500">
                 {{ $notes->notes_time }}  {{ $notes->notes_message }}
                </p>
                </div>

                
              </div>
            
          </div>
          @endif
          @endforeach
    </div>
    </div>
    @endif
  <!-- notes-view -->
  @endif
  @endif