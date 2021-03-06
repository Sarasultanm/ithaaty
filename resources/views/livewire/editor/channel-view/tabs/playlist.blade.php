@if(Auth::user()->get_audio->count() != 0)
                    <div class="grid grid-cols-12 mt-5 gap-5">
                      @foreach($categoryList->get() as $category)
                          @if($category->getAudioById(Auth::user()->id)->count() != 0 )
                         <div class="col-span-12 bg-white p-2">
                             <h2 id="{{ $category->category_name }}-{{ $category->id }}" >{{ $category->category_name }}</h2>
                         </div>

                              @foreach($category->getAudioById(Auth::user()->id)->get() as $audioData)

                                <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-6 xs:col-span-6 bg-white p-2 ">
                                  <article aria-labelledby="question-title-81614">
                                   <div>
                                      <div class="flex space-x-3">
                                        <div class="min-w-0 flex-1">
                                          <p class="text-md font-bold text-gray-900">
                                            <a href="#" class="hover:underline">{{ $audioData->audio_name }}
                                              @if($audioData->audio_publish != "Publish")
                                              <svg class="h-5 w-5 text-custom-pink float-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg></a>
                                              @endif
                                          </p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mt-2 text-sm text-gray-700 space-y-4">
                                        @if($audioData->get_thumbnail->count() == 0)
                                           <?php $s3_thumbnail = "images/default_podcast.jpg"; ?>
                                        @else
                                          <?php $img_path = $audioData->get_thumbnail->first()->gallery_path; ?>
                                          <?php $s3_thumbnail = config('app.s3_public_link')."/users/podcast_img/".$img_path; ?>
                                        @endif
                                        <div class="text-white bg-cover h-36" style="background-image: url(<?php echo $s3_thumbnail; ?>);"></div>
                                        
                                    </div>

                                    <div>
                                      <div class="flex space-x-3">
                                        <div class="min-w-0 flex-1">                      
                                          <p class="text-xs text-gray-500 mt-2">
                                            <a class="hover:underline">
                                             
                                              <?php $date = date_create($audioData->created_at); ?>
                                              <time datetime="2020-12-09T11:43:00">{{ date_format($date,"M, Y") }}</time>  <span class="float-left">SE:{{ $audioData->audio_season }} | EP:{{ $audioData->audio_episode }}</span>
                                            </a>
                                          </p>
                                        <!--   <div class="text-xs font-bold text-gray-900 mt-5" x-data="{ open: false }"> -->
                                          <div class="text-xs font-bold text-gray-900 mt-5">
                                            
                                            <a href="{{ route('editorPodcastUpdate',['id' => $audioData->id]) }}"  class="hover:underline">Update</a>
                                            <a href="{{ route('editorPodcastDetails',['id' => $audioData->id]) }}" class="hover:underline float-right" >Details</a>

                                          </div>
                                        </div>
                                       
                                      </div>
                                    </div>

                                  </article>
                                </div>

                              @endforeach





                         @endif




                       @endforeach
                    </div>
                    @endif