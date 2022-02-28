<section>

    <div  class="flex justify-between space-x-3 mb-5">
        <h3 class="text-gray-900 text-xl font-bold">Channel List</h3>
    



     </div>
     
     <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mb-5">
         
         @if($sub_channel_list)
         @foreach($sub_channel_list as $sub_channel)
         <li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
           <div class="flex-1 flex flex-col p-8">

             <?php $img_path = $sub_channel->get_channel_photo->gallery_path ?>
             <?php $s3_link = config('app.s3_public_link')."/users/channe_img/".$img_path; ?>
             <img class="w-32 h-32 flex-shrink-0 mx-auto rounded-full" src="{{ $s3_link }}" alt=""> 

             <h3 class="mt-6 text-gray-900 text-sm font-medium">{{$sub_channel->channel_name}}</h3>
             <dl class="mt-1 flex-grow flex flex-col justify-between">
               <dt class="sr-only">Title</dt>
               <dd class="text-gray-500 text-sm">{{ $sub_channel->get_subs()->count() }} subcribers</dd>
               <dt class="sr-only">Role</dt>
                
             </dl>
           </div>
           <div>
             <div class="-mt-px flex divide-x divide-gray-200">
               <div class="w-0 flex-1 flex">
                 @if(!empty($sub_channel->channel_uniquelink))
                 <a target="_blank" href="{{ route('editorChannelView',['link' => $sub_channel->channel_uniquelink ]) }}" class="cursor-pointer relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                   <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                   </svg>
                    <span class="ml-3 text-gray-400 font-regular">Manage</span>
                 </a>
                 @else
                    <a target="_blank" class="cursor-pointer relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                   
                    <span class="ml-3 text-red-600  font-regular">Update links in the settings</span>
                 </a>
                 @endif
                   

                
               </div>
             </div>
           </div>
         </li>
         @endforeach
         @endif
       
         <!-- More people... -->
     </ul>

     <!-- channel list -->
     <!-- <div class="hidden">
     <h3 class="text-gray-900 text-xl font-bold mb-5">Subcribed Channel</h3>
     
     <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                 @foreach($allchannels as $channel_item)
                 @if($channel_item->channel_ownerid != Auth::user()->id )
                 <li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
                   <div class="flex-1 flex flex-col p-8">

                     <?php // $img_path = $channel_item->get_channel_photo->gallery_path ?>
                     <?php // $s3_link = config('app.s3_public_link')."/users/channe_img/".$img_path; ?>
                     <img class="w-32 h-32 flex-shrink-0 mx-auto rounded-full" src="{{ $s3_link }}" alt=""> 

                     <h3 class="mt-6 text-gray-900 text-sm font-medium">{{$channel_item->channel_name}}</h3>
                     <dl class="mt-1 flex-grow flex flex-col justify-between">
                       <dt class="sr-only">Title</dt>
                       <dd class="text-gray-500 text-sm">{{ $channel_item->get_subs()->count() }} subcribers</dd>
                       <dt class="sr-only">Role</dt>
                      
                     </dl>
                   </div>
                   <div>
                     <div class="-mt-px flex divide-x divide-gray-200">
                       <div class="w-0 flex-1 flex">
                         @if($channel_item->check_user_subs(Auth::user()->id)->count() == 0)
                         <a wire:click="subChannel({{$channel_item->id}})" class="cursor-pointer relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                        
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400"  viewBox="0 0 20 20" fill="currentColor">
                             <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                           </svg>
                            <span class="ml-3 text-gray-400 font-regular">Subcribe</span>
                         </a>

                         @else

                          <a class="cursor-pointer relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                        
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-custom-pink"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                         </svg>
                           <span class="ml-3 text-custom-pink font-bold">Subcribed</span>
                         </a>
                         @endif
                       </div>
                     </div>
                   </div>
                 </li>
                 @endif
                 @endforeach

               </ul>
   
     </div> -->
    <!-- channel list -->

</section>