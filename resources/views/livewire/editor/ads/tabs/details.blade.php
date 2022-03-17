<div class="mb-2">
    <div class="relative  py-5 px-3 flex items-center space-x-3 ">
      <div class="flex-shrink-0">
        <img class="h-20 w-auto" src="{{ asset('ads/company/'.$checkAds->first()->ads_logo) }}" alt="">
      </div>
      <div class="flex-1 min-w-0">
          <p class="text-3xl font-bold text-gray-900 mb-2">
            {{ $checkAds->first()->ads_name }}
          </p>
          <p class="text-sm text-gray-500 truncate">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 float-left mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
            </svg>
             {{ $checkAds->first()->ads_website }}
          </p>
           <p class="text-sm text-gray-500 truncate">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4  float-left  mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            {{ $checkAds->first()->ads_location }}
          </p>
       
      </div>
      <div class="flex">
        @if($checkAds->first()->ads_status == "Confirm")
         <button class="pointer inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2  text-base font-medium text-black border-gray-300 hover:bg-green-700 hover:text-white sm:col-start-2 sm:text-md">
           Active
          </button>
        @else
         <button wire:click="confirmComp({{$ads_id}})" class="pointer inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2  text-base font-medium text-black border-gray-300 hover:bg-green-700 hover:text-white sm:col-start-2 sm:text-md">
           Confirm 
          </button>


        @endif
        
      </div>
    </div>
</div>

<div class="border-t-2 pb-10 border-custom-pink ">
<div class="mt-5 w-full flex">
<div class="flex-1">
  <!--  <h1 class="font-bold text-gray-800 text-xl">Submit</h1> 
     <div class="mt-2">
      <div class="text-sm font-medium text-gray-900">
      {{ $checkAds->first()->get_user->name }} 
      </div>
      <div class="text-sm text-gray-500">
      {{ $checkAds->first()->get_user->email }} 
      </div>
      <div class="text-sm text-gray-500">
        <strong>   </strong>
      </div>
    </div> -->
</div>

<div class="text-right">
   <h1 class="flex-1 font-bold text-gray-800 text-xl ">Supporting Documents</h1> 
     <p class="mt-1 text-sm text-gray-500">
        Please click the link below to see the documents
      </p>
       <a href="{{ $checkAds->first()->ads_filelink }}" class="mt-5 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2  text-base font-medium text-white border-gray-300 bg-custom-pink  sm:col-start-2 sm:text-md">
           Check Documents
          </a>
     
</div>

</div>
</div>
