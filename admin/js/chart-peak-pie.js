// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPeakChart");
var myPeakChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Subscribed", "Free"],
    datasets: [{
      data: [194, 813],
      backgroundColor: ['#007bff', '#dc3545'],
    }],
  },
});