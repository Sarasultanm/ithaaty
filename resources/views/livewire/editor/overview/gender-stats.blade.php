<div class="shadow-lg rounded-lg overflow-hidden">
    <div class="py-3 px-5 bg-gray-50">Gender</div>
    <canvas class="p-10" id="chartPie"></canvas>
  </div>
  @php
      $getTotalFemale = 0;
      $getTotalMale = 0;
  @endphp
  @foreach ( Auth::user()->get_channels as $channel_list )
    @foreach($channel_list->get_podcast()->get() as $podcast_items)
        @foreach ($podcast_items->get_episodes  as $episodes_list )
            @if($episodes_list->get_audiotimestats->count() != 0)
                @php
                    $getTotalFemale = $getTotalFemale + $this->getGenderPerAudio($episodes_list->poditem_audioid)['totalfemale'];
                    $getTotalMale =  $getTotalMale + $this->getGenderPerAudio($episodes_list->poditem_audioid)['totalmale'];
                @endphp
            @endif
        @endforeach
    @endforeach
@endforeach
<br>

  <!-- Required chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <!-- Chart pie -->
  <script>
    const TotalFemale = <?php echo $getTotalFemale; ?>;
    const TotalMale = <?php echo $getTotalMale; ?>;
    const dataPie = {
      labels: ["Female", "Male"],
      datasets: [
        {
          label: "Gender Stats",
          data: [TotalFemale, TotalMale],
          backgroundColor: [
            "rgb(133, 105, 241)",
            "rgb(164, 101, 241)",
          ],
          hoverOffset: 4,
        },
      ],
    };
  
    const configPie = {
      type: "pie",
      data: dataPie,
      options: {},
    };
  
    var chartBar = new Chart(document.getElementById("chartPie"), configPie);
  </script>