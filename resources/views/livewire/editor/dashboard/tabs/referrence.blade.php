@if(Auth::user()->plan == 'new' || Auth::user()->plan =="")
@else
@if(Auth::user()->get_plan->check_features('o4')->count() != 0 )
<div class="mt-5">
        <p class="font-bold text-gray-900 text-md">Affiliate : </p>
        <div class="mt-1">
          @foreach($audio->get_affiliate as $afi)
            @if(strpos($afi->audioafi_link, "https://")!==false)
              <p class="text-sm"><a target="_blank" href="{{ $afi->audioafi_link }}">{{ $afi->audioafi_title }}</a></p>
            @else
              <p class="text-sm"><a target="_blank" href="{{ 'https://'.$afi->audioafi_link }}">{{ $afi->audioafi_title }}</a></p>
            @endif
        @endforeach
        </div>
        <p class="font-bold text-gray-900 text-md">References : </p>
        <div class="mt-3">
          @foreach($audio->get_references as $refs)
            @if(strpos($refs->audioref_link, "https://")!==false)
                <p class="text-sm"><a target="_blank" href="{{ $refs->audioref_link }}">{{ $refs->audioref_title }}</a></p>
            @else
              <p class="text-sm"><a target="_blank" href="{{ 'https://'.$refs->audioref_link }}">{{ $refs->audioref_title }}</a></p>
            @endif
        @endforeach
        </div>
  </div>
  @endif
  @endif