<section>
    <div x-data="{modal: false}" class="flex justify-between mb-5 space-x-3">
        <h3 class="text-xl font-bold text-gray-900">About Us</h3>

        @if($channel->channel_ownerid == Auth::user()->id)
        <button @click="modal = !modal"  class="font-bold cursor-pointer hover:underline hover-text-custom-pink text-md text-custom-pink">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
        </button>

        <!-- modal -->
        <div x-cloak x-show="modal"  class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
          <div 
           x-transition:enter="transition ease-out duration-100" 
           x-transition:enter-start="transform opacity-0 scale-95" 
           x-transition:enter-end="transform opacity-100 scale-100" 
           x-transition:leave="transition ease-in duration-75" 
           x-transition:leave-start="transform opacity-100 scale-100" 
           x-transition:leave-end="transform opacity-0 scale-95"
          class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0" >
          
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"  @click="modal = false, share = false"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div 
               x-transition:enter="transition ease-out duration-300" 
               x-transition:enter-start="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
               x-transition:enter-end="transform opacity-100 translate-y-0 sm:scale-100" 
               x-transition:leave="transition ease-in duration-200" 
               x-transition:leave-start="transform opacity-100 translate-y-0 sm:scale-100" 
               x-transition:leave-end="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg lg:max-w-3xl sm:w-full sm:p-6">
              <div>
               
              <div class="">
                  
              <div class="flex items-start space-x-4">

                <div class="flex-1 min-w-0">
                  <div class="relative">
                    <p class="mb-3 font-bold text-gray-500 text-md">Tell viewers about your channel.</p>
                    <div class="overflow-hidden border border-gray-300 rounded-lg shadow-sm focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">

                      <label for="comment" class="sr-only">Add your comment</label>
                      <textarea wire:model="channel_about" rows="3"  class="block w-full py-3 border-0 resize-none focus:ring-0 sm:text-sm" placeholder=""></textarea>

                      <!-- Spacer element to match the height of the toolbar -->
                      <div class="py-2" aria-hidden="true">
                        <!-- Matches height of button in toolbar (1px border + 36px content height) -->
                        <div class="py-px">
                          <div class="h-9"></div>
                        </div>
                      </div>
                    </div>

                    <div class="absolute inset-x-0 bottom-0 flex justify-between py-2 pl-3 pr-2">
                      <div class="flex items-center space-x-5">
                     
                        
                      </div>
                      <div class="flex-shrink-0">
                        <button wire:click="updateAbout({{$channel->id}})" class="px-3 py-2 text-white rounded-md bg-custom-pink">Save</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



                </div>


              </div>

            </div>
          </div>
        </div>


        <!-- modal -->
        @endif
  </div>
    <p class="text-gray-700">{{$channel_about}}</p>
</section>