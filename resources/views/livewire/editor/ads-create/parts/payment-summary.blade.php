<div class="border-b-2 pb-10 pt-5 border-green-500 lg:px-0 sm:px-3">
    <h1 class="flex-1 font-bold text-gray-800 text-xl ">Payment Summary</h1> 
    <p class="mt-1 mb-3 text-sm text-gray-500">
      Your ad will run for {{ $compDays }} days.
    </p>
    <div class="bg-white py-2 px-3 rounded-md  lg:w-1/4 sm:w-1/2">
      <p class="mt-1 text-sm text-gray-800">
        Skip Duration :${{ $compSkip }}
      </p>
       <p class="mt-1 text-sm text-gray-800">
        Display Time :${{ $compDisplay }}
      </p>
      <p class="mt-1 text-sm text-gray-800">
        Days : {{ $compDays }} days 
      </p>
      <?php 
      $date = date_create(now());
      date_add($date, date_interval_create_from_date_string($compDays." days"));
      //echo date_format($date, "M d, Y");
      ?>
      <p class="mt-1 text-sm text-gray-800">
        End Date : {{ date_format($date, "M d, Y") }}
      </p>
     </div>
     <p class="mt-3 text-md text-white bg-custom-pink py-2 px-3  rounded-md  lg:w-1/4 sm:w-1/2">
      Total Budget : <b class="font-bold float-right">${{ $compTotal }}</b><br>
       <small> ${{ $compSkip + $compDisplay }} a day x {{ $compDays }} days</small>
       
   
    </p>

</div>