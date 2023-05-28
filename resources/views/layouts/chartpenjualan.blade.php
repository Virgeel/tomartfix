
<!-- Your existing code -->

<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div class="item3" >
    <canvas id="myChart" style="font-family:Poppins;background-color:white;border-radius:15px;padding:10px;" width="" height="300px;"></canvas>
    
</div>


<!-- Create a script section to write JavaScript code -->
<script>
  // Get the canvas element
var ctx = document.getElementById('myChart').getContext('2d');
// Set the chart data
var chartData = {
    labels: {!! json_encode($tanggal) !!}.map(function(date) {
        return date ? date : ''; // Replace null values with empty string
    }),
    datasets: [
        @foreach($pegawai as $data)
        {
            label: '{{$data->nama}}',
            data: {!! json_encode($stok->where('pegawai_id', $data->id)->pluck('total')) !!},
            backgroundColor: getRandomColor(),
            borderColor: 'rgba(209, 218, 175, 1)',
            borderWidth: 1
        },
        @endforeach
    ]
};


function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
// Set the chart options
var chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        xAxes: [{
            type: 'time',
            time: {
                unit: 'day',
                displayFormats: {
                    day: 'DD'
                }
            },
            ticks: {
                autoSkip: true,
                maxTicksLimit: 31
            }
        }],
        yAxes: [{
            ticks: {
                beginAtZero: true,
                callback: function(value, index, values) {
                    return 'Rp. ' + value.toLocaleString('id-ID');
                }
            }
        }]
    },
    tooltips: {
        callbacks: {
            label: function(tooltipItem, data) {
                var label = data.datasets[tooltipItem.datasetIndex].label || '';
                var value = tooltipItem.yLabel;
                return label + ': Rp. ' + value.toLocaleString('id-ID');
            }
        }
    }
};
// Create the chart
var myChart = new Chart(ctx, {
    type: 'line',
    data: chartData,
    options: chartOptions
});

</script>



