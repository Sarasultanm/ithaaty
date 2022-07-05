@if(Auth::user()->plan == 'new' || Auth::user()->plan =="") 
@else 
    @if(Auth::user()->get_plan->check_features('s2')->count() != 0 )
    <!-- comments -->
        <div class="mt-5">
            <div class="mt-1">
                <input
                    type="text"
                    name="email"
                    id="email"
                    placeholder="Comments"
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    wire:model.lazy="comments"
                    wire:keydown.enter="saveComment({{ $audio->id }},{{$audio->audio_editor}})"
                />
            </div>
        </div>
    @endif
@endif 
@if($audio->get_comments->count() != 0 )
    <div x-data="{ open: false }">
        <div class="mt-5">
            <div class="flex space-x-3">
                <div>
                    <p class="text-xs font-medium text-gray-900">
                        <a class="cursor-pointer hover:underline" @click="open = true">View Comments</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="mt-5" x-show="open" @click.away="open = false">
            @foreach($audio->get_comments as $comments)
            <div class="flex space-x-3">
                <div class="flex-shrink-0">
                    @if($comments->get_user->get_profilephoto->count() == 0)
                    <img class="w-5 h-5 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="" />
                    @else
                    <?php $commentsprofile_path = $comments->get_user->get_profilephoto->first()->gallery_path; ?>
                    <img class="w-5 h-5 rounded-full" src="{{ asset('users/profile_img/'.$commentsprofile_path) }}" alt="" />
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <div class="p-2 mb-3 bg-gray-100 rounded-md">
                        <p class="text-xs font-medium text-gray-900">
                            <a href="/editor/users//{{ $audio->audio_editor }}" class="font-bold hover:underline">{{ $comments->get_user->name }}</a>
                        </p>
                        <p class="text-sm text-gray-500">
                            {{ $comments->coms_message }}<br />
                            <br />
                            <span class="text-xs text-right text-gray-500"><i>Posted at: {{ $comments->created_at }}</i></span>
                        </p>
                    </div>
                </div>
            </div>
            @if( $comments->get_reply->count() == 0)
            <div class="">
                <div class="mb-2 ml-8">
                    <input
                        type="text"
                        name="email"
                        id="email"
                        placeholder="Reply"
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        wire:model.lazy="reply"
                        wire:keydown.enter="saveReply({{ $audio->id }},{{$audio->audio_editor}},{{ $comments->id }})"
                    />
                </div>
            </div>
            @endif
                @foreach ($comments->get_reply as $replies )
                <div class="flex ml-8 space-x-3">
                    <div class="flex-shrink-0">
                        @if($replies->get_user->get_profilephoto->count() == 0)
                        <img class="w-5 h-5 rounded-full" src="{{ asset('images/default_user.jpg') }}" alt="" />
                        @else
                        <?php $replyprofile_path = $replies->get_user->get_profilephoto->first()->gallery_path; ?>
                        <img class="w-5 h-5 rounded-full" src="{{ asset('users/profile_img/'.$replyprofile_path) }}" alt="" />
                        @endif
                        
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="p-2 mb-3 bg-gray-100 rounded-md">
                            <p class="text-xs font-medium text-gray-900">
                                <a href="/editor/users//1" class="font-bold hover:underline">{{ $replies->get_user->name }}</a>
                            </p>
                            <p class="text-sm text-gray-500">
                                {{ $replies->rep_message }}<br />
                                <br />
                                <span class="text-xs text-right text-gray-500"><i>Posted at: {{ $replies->created_at }}</i></span>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

            @endforeach
        </div>
    </div>
@endif
