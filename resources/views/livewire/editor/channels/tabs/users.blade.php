<div class="grid grid-cols-10 gap-4">
    <section class="col-span-10">

        <div class="shadow-sm sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-6 bg-white sm:p-6">
                <div class="flex items-end justify-between">
                    <div class="flex-auto">
                      <h3 class="font-bold text-gray-900 text-md">Invite Collaborators </h3>
                      <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    <div class="mt-1">
                       
                    </div>
                </div> 
               
                <div class="text-center">
        
                    <div>@error('emailCollabInvitation') <span class="text-xs text-center text-red-600">{{$message}}</span> @enderror</div>
                </div>
        
               
            </div>
        </div>


       <!-- table list -->
        <div class="shadow-sm sm:rounded-md sm:overflow-hidden">
            <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="px-4 py-6 bg-white sm:p-6">    
                    <div class="flex flex-col">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Email</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Date Invited</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                                    <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Role</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ( Auth::user()->get_collaborators()->get() as $collaborators)
                                <tr>
                                    <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">{{ $collaborators->get_user->email }}</td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $collaborators->created_at }}</td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $collaborators->usercol_typestatus }}</td>
                                    <td class="px-3 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                                        Edit
                                    </td>
                                </tr>
                              @empty
                                Empty
                              @endforelse

                                {{-- @foreach ($channel_list->get_invitation('channel_private_invitation')->get() as $invitation_list )
                                <tr>
                                <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">{{ $invitation_list->usercol_email }}</td>
                                <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $invitation_list->created_at }}</td>
                                <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $invitation_list->usercol_typestatus }}</td>
                                <td class="px-3 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                                    Edit
                                </td>
                                </tr>
                                @endforeach --}}
                                <!-- More people... -->
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

        </div>
        <!-- table list -->

    </section>
 
     
</div>
