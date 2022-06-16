<section aria-labelledby="trending-heading">
    <div class="bg-white rounded-lg shadow">
      <div class="p-6">
        <h2 id="trending-heading" class="text-base font-medium text-gray-900">
          Recommendation
        </h2>
    
        <div class="flow-root mt-6">
          <ul class="-my-4 divide-y divide-gray-200">
            @foreach ($recommended as $reco )
            <li class="relative flex py-4 space-x-3">
              <div class="flex-shrink-0">
                @if ($reco->get_audio->get_thumbnail->count() != 0) 
                    @php 
                        $reco_img_path =$reco->get_audio->get_thumbnail->first()->gallery_path; 
                        $reco_s3_thumbnail = config('app.s3_public_link')."/users/podcast_img/".$episode_img_path; 
                    @endphp 
                @else 
                    @php 
                        $reco_s3_thumbnail = asset('images/default_podcast.jpg');
                    @endphp 
                @endif
                <img class="w-12 h-12 rounded" src="{{ $reco_s3_thumbnail }}">
              </div>
              <div class="flex-1 min-w-0">
                <p class="text-sm font-bold text-gray-800">{{ $reco->get_audio->audio_name }}</p>
                <p class="text-sm text-gray-800"> {{ Str::limit( $reco->get_audio->audio_summary , 30) }}
                </p>
            
              </div>
              <a 
              href="{{ route('editorPodcastView',['id' => $reco->get_audio->id]) }}"
                class="absolute inset-0 cursor-pointer" 
                aria-hidden="true"></a>
            </li>
            @endforeach
            <!-- More posts... -->
          </ul>
        </div>
      

      </div>
    </div>
  </section>