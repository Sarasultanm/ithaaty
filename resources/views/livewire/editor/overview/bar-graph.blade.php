<div class="">
					
    <div class="shadow-lg rounded-lg overflow-hidden">
      <div class="py-3 px-5 bg-gray-50">
          Audience
      </div>
      <canvas class="p-10 " id="chartBar"></canvas>
    </div>

    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Chart bar -->
    <script>

        const labelsBarChart = [
        'Jan',
        'Feb',
        'Marc',
        'Apri',
        'May',
        'Jun',
        'Jul',
        'Aug',
        'Sep',
        'Oct',
        'Nov',
        'Dec',
        ];
        const dataBarChart = {
        labels: labelsBarChart,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: '#f98b88',
            borderColor: 'hsl(252, 82.9%, 67.8%)',
            data: [{{$jan}},{{$feb}},{{$mar}},{{$apr}},{{$may}},{{$jun}},{{$jul}},{{$aug}},{{$sep}},{{$oct}},{{$nov}},{{$dec}}],
        }]
        };

        const configBarChart = {
        type: 'bar',
        data: dataBarChart,
        options: {}
        };


        var chartBar = new Chart(
        document.getElementById('chartBar'),
        configBarChart
        );
    </script>

</div>