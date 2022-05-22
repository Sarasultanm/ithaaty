<!-- table list -->
<div class="shadow-sm sm:rounded-md sm:overflow-hidden">
    <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="px-4 py-6 bg-white sm:p-6">    
            <div class="flex flex-col mt-8">
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
                        @foreach ($channel_list->get_invitation('channel_private_invitation')->get() as $invitation_list )
                        <tr>
                        <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">{{ $invitation_list->usercol_email }}</td>
                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $invitation_list->created_at }}</td>
                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $invitation_list->usercol_typestatus }}</td>
                        <td class="px-3 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                            Edit
                        </td>
                        </tr>
                        @endforeach
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