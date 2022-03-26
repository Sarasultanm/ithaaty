<div class="mt-5">
    <div class="mt-1">
       <span class="inline-flex items-center mr-3 text-sm">
            <button wire:click="like({{ $audio->id }},{{$audio->audio_editor}},'like')" class="inline-flex space-x-2 text-green-600 hover:text-green-500">
           <!-- <button class="inline-flex space-x-2 text-green-600 hover:text-green-700" > -->
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
            </svg>
            <span class="font-medium text-gray-900">{{ $audio->get_react('like')->count()  }}</span>
            <span class="sr-only">likes</span>
          </button>
        </span>  

        <span class="inline-flex items-center mr-3 text-sm">
           <button wire:click="like({{ $audio->id }},{{$audio->audio_editor}},'star')" class="inline-flex space-x-2 text-green-600 hover:text-green-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
            <span class="font-medium text-gray-900">{{ $audio->get_react('star')->count()  }}</span>
            <span class="sr-only">star</span>
          </button>
        </span>

        <span class="inline-flex items-center mr-3 text-sm">
           <button wire:click="like({{ $audio->id }},{{$audio->audio_editor}},'happy')" class="inline-flex space-x-2 text-green-600 hover:text-green-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z" clip-rule="evenodd" />
            </svg>
            <span class="font-medium text-gray-900">{{ $audio->get_react('happy')->count()  }}</span>
            <span class="sr-only">happy</span>
          </button>
        </span>

        <span class="inline-flex items-center mr-3 text-sm">
           <button wire:click="like({{ $audio->id }},{{$audio->audio_editor}},'sad')" class="inline-flex space-x-2 text-green-600 hover:text-green-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-7.536 5.879a1 1 0 001.415 0 3 3 0 014.242 0 1 1 0 001.415-1.415 5 5 0 00-7.072 0 1 1 0 000 1.415z" clip-rule="evenodd" />
            </svg>
            <span class="font-medium text-gray-900">{{ $audio->get_react('sad')->count()  }}</span>
            <span class="sr-only">sad</span>
          </button>
        </span>

        <span class="inline-flex items-center mr-3 text-sm">
           <button wire:click="like({{ $audio->id }},{{$audio->audio_editor}},'dislike')" class="inline-flex space-x-2 text-green-600 hover:text-green-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M18 9.5a1.5 1.5 0 11-3 0v-6a1.5 1.5 0 013 0v6zM14 9.667v-5.43a2 2 0 00-1.105-1.79l-.05-.025A4 4 0 0011.055 2H5.64a2 2 0 00-1.962 1.608l-1.2 6A2 2 0 004.44 12H8v4a2 2 0 002 2 1 1 0 001-1v-.667a4 4 0 01.8-2.4l1.4-1.866a4 4 0 00.8-2.4z" />
          </svg>
            <span class="font-medium text-gray-900">{{ $audio->get_react('dislike')->count()  }}</span>
            <span class="sr-only">dislike</span>
          </button>
        </span>



    </div>
</div>