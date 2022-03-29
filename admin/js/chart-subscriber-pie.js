Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';


var ctx = document.getElementById("mySubscriberChart");
var mySubscriberChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Subscribed", "Free"],
    datasets: [{
      data: [1292, 8343],
      backgroundColor: ['#007bff', '#dc3545'],
    }],
  },
});