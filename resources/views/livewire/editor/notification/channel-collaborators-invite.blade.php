<tr>
    <td class="px-6 py-4 whitespace-nowrap">
      <div class="flex items-center">
        {{-- <div class="flex-shrink-0 h-10 w-10">
          <img class="h-10 w-10 rounded-full" src="{{ asset('images/logo.png') }}" alt="">
        </div> --}}
        <div class="ml-4">
          <div class="text-sm font-bold text-gray-900">
            {{ $notif->get_collaborators_info->get_channel->channel_name }}
          </div>
          <div class="text-sm text-gray-500">
           {{ $notif->notif_message }} </b>
          </div>
        </div>
      </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
     <!--  <div class="text-sm text-gray-900">Category</div> -->
     
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
         <div class="text-sm font-bold text-gray-500">
             {{-- {{ $notif->notif_type }} --}}
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
   <?php $date = $notif->created_at; echo $date->format('M d,Y'); ?>
     
    </td>
   <!--  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
      <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
    </td> -->
  </tr>