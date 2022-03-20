<div class="border-0 pb-10 border-green-500 mt-4">            
    <h1 class="flex-1 font-bold text-gray-800 text-xl ">Duration</h1> 
          <p class="mt-1 text-sm text-gray-500">
               Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sodales quis tortor at cursus.
          </p>             
    
           <div class="mt-5">
             <div class="flex">
                   <div class="flex-1 mr-2">
                             <label for="email" class="block text-sm font-medium text-gray-700">Skip Duration</label>
                             <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:click="adsComputation($event.target.value,'skip')"  wire:model="adslist_adstype">
                                <!--  <option>Select</option> -->
                                 <option value="0">No Skip</option>
                                 <!-- <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option> -->
                                 <option value="5">5 sec</option>
                             </select> 
                   </div>
                   <div class="flex-1 ml-2">
                             <label for="email" class="block text-sm font-medium text-gray-700">Display Time</label>
                             <div class="mt-1">
                               <!-- <input type="text" name="website" id="website" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="adslist_displaytime"> -->
                                <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:click="adsComputation($event.target.value,'display')"     wire:model="adslist_displaytime">
                                     <!-- <option>Select</option> -->
                                     <option value="1%">1%(Preroll)</option>
                                     <option value="10%">10%</option>
                                     <option value="20%">20%</option>
                                     <option value="30%">30%</option>
                                     <option value="40%">40%</option>
                                     <option value="50%">50%(Midroll)</option>
                                     <option value="60%">60%</option>
                                     <option value="70%">70%</option>
                                     <option value="80%">80%</option>
                                     <option value="90%">90%</option>
                                     <option value="100%">100%(Postroll)</option>
                                 </select> 
                             </div>
                   </div>
                   <div class="flex-1 ml-2">
                             <label for="email" class="block text-sm font-medium text-gray-700">Days</label>
                             <div class="mt-1">
                               <!-- <input type="text" name="website" id="website" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="adslist_displaytime"> -->
                                <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="adslist_days" wire:click="adsComputation($event.target.value,'days')"  >
                                    <!--  <option>Select</option> -->
                                     <option value="3">3 days</option>
                                     <option value="7">7 days</option>
                                     <option value="9">9 days</option>
                                     <option value="12">12 days</option>
                                 </select> 
                             </div>
                   </div>
             </div>
       </div>
     </div>