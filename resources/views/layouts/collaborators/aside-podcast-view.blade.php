 <?php use App\Http\Livewire\Editor\EditorPodcastView; ?>
 
 <aside class="hidden xl:block xl:col-span-3 mt-4">
        <!-- <div class="sticky top-4 space-y-4"> -->
         <div class="top-4 space-y-4">  
          <section class="overflow-x-auto" style="height:auto">
            <div class="bg-white rounded-lg shadow">
              <div class="p-6">
                <h2 id="who-to-follow-heading" class="text-base font-medium text-gray-900">
                 Transcript
                </h2>
                <div class="mt-6 flow-root text-sm">
                  <p class="truncated">{{ $audio->audio_summary }}</p>
                </div>
              </div>
            </div>
          </section>
         
        </div>

        <div class=" mt-5 bg-white p-5 rounded-lg border-gray-200 overflow-y-auto lg:block">
            <div class="pb-5">
                  <h3 class="font-medium text-gray-900">Hashtag Feeds</h3>
                  <p class="text-rose-600 text-sm mx-0 font-bold">{{$audio->audio_hashtags}} {{ $getHashtags }}</p>
                  <?php 
                   $str = $audio->audio_hashtags;
                    $items_hastags = preg_match_all('/#\w+/iu', $str, $itens);
                      for ($i=0; $i < $items_hastags ; $i++) { 
                              echo $itens[0][$i];
                      }
                    ?>
                  <ul class="mt-2 border-t border-b border-gray-200 divide-y divide-gray-200">
  
                   <li class="py-3 flex justify-between items-center">
                        <div class="flex items-center">
                          <img src="{{ asset('images/slider-img/slide5.jpg') }}" alt="" class="w-8 h-8">
                           <div class="ml-4 ">
                             <p class="text-sm font-medium text-gray-900">Facebook </p>
                             <?php $fb_string = $audio->audio_hashtags;    
                              $fb_text=preg_replace('/#(\\w+)/','<a target="_blank" class="text-rose-500 font-bold" href=https://www.facebook.com/hashtag/$1>$0</a>',$fb_string); ?>
                             <p class="text-sm text-gray-500"><?php echo $fb_text; ?></p>
                          </div>
                        </div>
                       <!-- <p class="ml-6 bg-white rounded-md text-xs font-medium ext-gray-500">View</p> -->
                    </li>

                    <li class="py-3 flex justify-between items-center">
                        <div class="flex items-center">
                          <img src="{{ asset('images/slider-img/slide5.jpg') }}" alt="" class="w-8 h-8">
                           <div class="ml-4 ">
                             <p class="text-sm font-medium text-gray-900">Instagram </p>
                             <p class="text-sm text-gray-500">{{$audio->audio_hashtags}}</p>
                          </div>
                        </div>
                       <!-- <p class="ml-6 bg-white rounded-md text-xs font-medium ext-gray-500">View</p> -->
                    </li>

                    <li class="py-3 flex justify-between items-center">
                        <div class="flex items-center">
                          <img src="{{ asset('images/slider-img/slide5.jpg') }}" alt="" class="w-8 h-8">
                           <div class="ml-4 ">
                             <p class="text-sm font-medium text-gray-900">Twitter </p>
                              <?php $twit_string = $audio->audio_hashtags;    
                              $twit_text=preg_replace('/#(\\w+)/','<a target="_blank" class="text-rose-500 font-bold" href=https://twitter.com/search?q=$1&src=typed_query>$0</a>',$twit_string); ?>
                             <p class="text-sm text-gray-500"><?php echo $twit_text; ?></p>
                          </div>
                        </div>
                       <!-- <p class="ml-6 bg-white rounded-md text-xs font-medium ext-gray-500">View</p> -->
                    </li>
  
                  </ul>
              </div>
        </div>


      </aside>