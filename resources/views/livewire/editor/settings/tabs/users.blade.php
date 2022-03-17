<section>
   
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div  x-data="{modal: false}" class="flex items-center">
                    <div class="flex-1">
                        <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Users</h2>
                        <p class="mt-1 text-sm text-gray-500">List of copartners users.</p>
                    </div>
                    <button @click="modal = !modal" 
                    class="bg-custom-pink border border-transparent rounded-md shadow-sm 
                    py-2 px-4 inline-flex float-right text-sm font-medium text-white ">Add Users
                    </button>


                    <!-- create copartnet -->

                    <div x-cloak x-show="modal" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <div
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
                        >
                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" @click="modal = false, share = false"></div>

                            <!-- This element is to trick the browser into centering the modal contents. -->
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                            <div
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                x-transition:enter-end="transform opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="transform opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave-end="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6"
                            >
                                <div>
                                    <div class="mt-3 sm:mt-5">
                                        <div class="mt-5">
                                            <label class="block text-sm font-medium text-gray-700">Username</label>
                                            <div class="mt-1">
                                              <input type="text" wire:model="colab_username" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Enter your username">
                                            </div>
                                            @error('colab_username') <span class="text-center text-xs text-red-600"> {{ $message }}</span> @enderror
                                        </div>
                                        <div class="mt-5">
                                            <label class="block text-sm font-medium text-gray-700">Email Address</label>
                                            <div class="mt-1">
                                              <input type="email" wire:model="email"  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Enter your email address">
                                            </div>
                                            @error('email') <span class="text-center text-xs text-red-600"> {{ $message }}</span> @enderror
                                        </div>
                                        <div class="mt-5">
                                            <label class="block text-sm font-medium text-gray-700">Password</label>
                                            <div class="mt-1">
                                              <input type="text" wire:model="colab_password" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Enter your password">
                                            </div>
                                            @error('colab_password') <span class="text-center text-xs text-red-600"> {{ $message }}</span> @enderror
                                        </div>
                                        <div class="mt-5">
                                            <label for="location" class="block text-sm font-medium text-gray-700">Podcast</label>
                                            <select wire:model="colab_channel" id="location" name="location" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                              @foreach (Auth::user()->channels as $channel_items )
                                                  <option value="{{ $channel_items->id }}">{{ $channel_items->channel_name }}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                    </div>
                                </div>

                                <div class="mt-5 sm:mt-6 flex justify-between space-x-3">
                                
                                    <a @click="modal = !modal" type="button" class="text-custom-pink hover:underline mt-3">
                                        Cancel
                                    </a>
                                    <button wire:click="addUsers()"  type="button" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white">
                                      Save Users
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- create copartnet -->

                </div>
                
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                          <thead>
                            <tr>
                              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0">Username</th>
                              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Email</th>
                             
                              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Podcast</th>
                              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Role</th>
                              <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 md:pr-0">
                                <span class="sr-only">Edit</span>
                              </th>
                            </tr>
                          </thead>
                          <tbody class="divide-y divide-gray-200">
                            @forelse ( Auth::user()->get_collaborators()->get() as $collaborators)
                              <tr>                                                                
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0">{{ $collaborators->get_user->name }}</td>
                                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $collaborators->get_user->email }}</td>
                                
                                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $collaborators->get_channel->channel_name }}</td>
                                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $collaborators->usercol_type }}</td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                                  <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, Lindsay Walton</span></a>
                                </td>
                              </tr>
                            @empty
                              Empty
                            @endforelse
                            
                
                            <!-- More people... -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

            </div>
        </div>
  
</section>
