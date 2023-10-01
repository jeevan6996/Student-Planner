<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Subject', 'Attended', 'Not Attended'],
          ['DBMS', 1, 2],
          ['SEPM', 1, 4],
          ['TOC', 3, 4],
          ['HCI', 4, 5]
        ]);

        var options = {
          chart: {
            title: 'Lecture Analysis',
            subtitle: 'Total Attended and Not attended',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
  </body>
</html>

