<section>
    @if(Auth::user()->plan == 'new' || Auth::user()->plan =="") @else @if(Auth::user()->get_plan->check_features('p3')->count() != 0 )

    <section aria-labelledby="payment_details_heading">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">RSS Link</h2>
                    <p class="mt-1 text-sm text-gray-500">Your RSS feed allows your podcast to appear in other podcast apps, in some cases automatically.</p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-2">
                        <input
                            wire:model="rss_link"
                            type="text"
                            name="first_name"
                            id="first_name"
                            autocomplete="cc-given-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                        />
                    </div>

                    <div class="col-span-4 sm:col-span-2 text-right">
                        <button wire:click="loadRss()" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white">
                            Upload RSS
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <?php $rss_quatity = $rss_data['item_quantity'] ?? 0; ?>

        <?php for ($i = 0; $i < $rss_quatity; $i++){ ?>
        <div class="shadow sm:rounded-md sm:overflow-hidden mt-5">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div class="grid grid-cols-4 gap-6">
                    <div class="col-span-1">
                        <img class="w-full h-auto" loading="lazy" src="{{ $rss_data['image_url'] ?? ''  }}" alt="" />
                    </div>
                    <div class="col-span-3 text-left relative">
                        <h2 class="text-lg leading-6 font-bold text-gray-900">{{ $rss_data["items"][$i]['title'] ?? '' }}</h2>
                        <p class="mt-1 text-sm text-gray-500">Author : {{ $rss_data["author"] ?? '' }}</p>
                        <p class="mt-5 text-md text-gray-500">{{ $rss_data["items"][$i]['description'] ?? '' }}</p>
                        <div class="mt-5 mb-5"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </section>

    @if(Auth::user()->get_audio_type('Upload')->count() != 0 ) @if(Auth::user()->get_rsslink->count() == 0)
    <section class="mt-5">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div class="grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-2">
                        <!-- <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Create RSS Link</h2> -->
                        <p class="mt-1 text-sm text-gray-500">Create your unique rss code to generate a custom rss link.</p>

                        <div class="mt-1 flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                https://ithaaty.com/feed/
                            </span>
                            <input
                                type="text"
                                name="company-website"
                                id="company-website"
                                class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300"
                                wire:model="rss_name"
                                placeholder="Enter Text here"
                            />
                        </div>
                        @error('rss_name') <span class="text-xs text-red-600">Required Fields</span> @enderror
                    </div>
                    <div class="col-span-4 sm:col-span-2 text-right mt-5">
                        <button wire:click="createRssLink()" class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white">
                            Create Link
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @else
    <section class="mt-5">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div class="grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-2">
                        <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">RSS Links.</h2>
                        <p class="mt-1 text-sm text-gray-500">
                            Your RSS feed allows your podcast to appear in other podcast apps.<br />
                            This is your rss link
                            <b>
                                <a target="_blank" href="{{ route('generateFeed',['rsslink' => Auth::user()->get_rsslink->first()->rss_links]) }}">
                                    ( https://ithaaty.com/feed/{{Auth::user()->get_rsslink->first()->rss_links}} )
                                </a>
                            </b>
                        </p>
                        <p class="pt-2"></p>
                    </div>
                    <div class="col-span-4 sm:col-span-2 text-right mt-4">
                        <a
                            target="_blank"
                            href="{{ route('generateFeed',['rsslink' => Auth::user()->get_rsslink->first()->rss_links]) }}"
                            class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white"
                        >
                            Open RSS
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endif @endif @endif @endif
</section>
