$(document).ready(function(){
  //************************************************************************************************
	$.ajax({
		url: "stats_query/stats_query.php?f=sp",
		method: "GET",
    dataType: 'json',
		success: function(data) {
			console.log(data);
			var datev = [];
			var scan = [];

			for(var i in data) {
				datev.push("le " + data[i].date_v);
				scan.push(data[i].scan_p);
			}

			var chartdata = {
				labels: datev,
				datasets : [
					{
						label: 'Produit scaner',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: scan
					}
				]
			};

			var ctx = $("#nbr_prod_scan");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
  //************************************************************************************************
  $.ajax({
    url: "stats_query/stats_query.php?f=tps",
    method: "GET",
    dataType: 'json',
    success: function(data) {
      console.log(data);
      var datev = [];
      var scan = [];

      for(var i in data) {
        datev.push(data[i].date_v);
        scan.push(data[i].scan_p);
      }

      var chartdata = {
        labels: datev,
        datasets : [
          {
            label: 'Total scaner',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: scan
          },
        ]
      };

      var ctx = $("#tot_prod_scan");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata,
        options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }],
            xAxes: [{
                ticks: {
                    fontSize: 8
                }
            }]
        }
    }

      });
    },
    error: function(data) {
      console.log(data);
    }
  });
  //************************************************************************************************
  $.ajax({
    url: "stats_query/stats_query.php?f=nps",
    method: "GET",
    dataType: 'json',
    success: function(data) {
      console.log(data);
      var datev = [];
      var scan = [];
      var coloR = [];

         var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
         };

      for(var i in data) {
        datev.push(data[i].date_v);
        scan.push(data[i].scan_p);
        coloR.push(dynamicColors());
      }

      var chartdata = {
        labels: datev,
        datasets : [
          {
            label: 'Total scaner',
            backgroundColor: coloR,
            borderWidth: 1,
            data: scan
          },
        ]
      };

      var ctx = $("#name_prod_scan");

      var barGraph = new Chart(ctx, {
        type: 'doughnut',
        data: chartdata,
        options: {
					title: {
             display: true,
						 position: 'top',
             fontsize: 14,
             text: '10 produits les plus scaner',
         },
         legend: {
            display: false,
         },
       },
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});
