
<!-- Your existing code -->

<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div class="item3">
    <canvas id="myChart" style="background-color:white;border-radius:15px;padding:10px;" width="" height="300px;"></canvas>
</div>


<!-- Create a script section to write JavaScript code -->
<script>
    // Get the canvas element
    var ctx = document.getElementById('myChart').getContext('2d');
    // Set the chart data
    var chartData = {
        labels: {!! json_encode($tanggal) !!},
        datasets: [{
            label: 'Total Penjualan',
            data: {!! json_encode($total) !!},
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(209, 218, 175, 1)',
            borderWidth: 1
        }]
    };
    // Set the chart options
    var chartOptions = {
  responsive: true,
  maintainAspectRatio: false,
  scales: {
    xAxes: [{
      type: 'time',
      time: {
        displayFormats: {
          day: 'DD'
        },
        unit: 'day'
      },
      distribution: 'linear',
      ticks: {
        autoSkip: true,
        maxTicksLimit: 31
      }
    }],
    yAxes: [{
      ticks: {
        beginAtZero: true,
        callback: function(value, index, values) {
          return 'Rp. ' + value.toLocaleString();
        }
      }
    }]
  }
};
    // Create the chart
    var myChart = new Chart(ctx, {
        type: 'line',
        data: chartData,
        options: chartOptions
    });
</script>
