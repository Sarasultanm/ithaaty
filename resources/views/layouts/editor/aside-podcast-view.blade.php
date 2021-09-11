 <?php use App\Http\Livewire\Editor\EditorPodcastView; ?>
 
 <aside class="hidden xl:block xl:col-span-4 mt-4">
        <div class="sticky top-4 space-y-4">

            <div class="bg-white rounded-lg shadow">
              <div class="p-6">
                <h2 id="who-to-follow-heading" class="text-base font-medium text-gray-900">
                 References
                </h2>
                <div class="mt-6 flow-root">
                 
                </div>
              </div>
            </div>

          <section class="overflow-x-auto" style="height: 620px;">
            <div class="bg-white rounded-lg shadow">
              <div class="p-6">
                <h2 id="who-to-follow-heading" class="text-base font-medium text-gray-900">
                 Transcript
                </h2>
                <div class="mt-6 flow-root">
                  <p>{{ $audio->audio_summary }}</p>
                </div>
              </div>
            </div>
          </section>
         
        </div>
      </aside>