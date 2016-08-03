var $graphScript = $('#graphScript');
var cRateJson = JSON.parse($graphScript.attr('cRateJson') || "null");

// 100ml中の含有率
var names = [];
var rates = [];
for (var i = 0; i < cRateJson.length; i++) {
  names[i] = cRateJson[i].name;
  rates[i] = cRateJson[i].rate;
}

var config = {
  type: 'bar',
  data: {
    labels: names,
    datasets: [{
        label: "100ml中のカフェイン含有量",
        backgroundColor: [
          "#379ad2",
          "#F7464A",
          "#a747d0",
          "#46BFBD",
          "#FDB45C",
          "#949FB1",
          "#4D5360",
        ],
        data: rates,
    }]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          max: 80,
          min: 0,
          stepSize: 10
        }
      }]
    }
  }
};
window.onload = function() {
  var ctx = document.getElementById("cRateGraph").getContext("2d");
  window.myPie = new Chart(ctx, config);
};
