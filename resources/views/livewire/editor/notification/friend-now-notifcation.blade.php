<tr>
    <td class="px-6 py-4 whitespace-nowrap">
      <div class="flex items-center">
        <div class="flex-shrink-0 h-10 w-10">
          <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
        </div>
        <div class="ml-4">
          <div class="text-sm font-medium text-gray-900">
           {{ Auth::user()->name }}
          </div>
          <div class="text-sm text-gray-500">
           {{ $notif->notif_message }} <strong>{{ $notif->get_friend_info->get_add_friend->name }}</strong>
          </div>
        </div>
      </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
     <!--  <div class="text-sm text-gray-900">Category</div> -->
      <div class="text-sm text-gray-500"></div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
         <div class="text-sm font-bold text-gray-500">{{ $notif->notif_type }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
   <?php $date = $notif->created_at; echo $date->format('M d,Y'); ?>
     
    </td>
   <!--  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
      <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
    </td> -->
  </tr>