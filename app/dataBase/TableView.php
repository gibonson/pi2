<?php


namespace app\dataBase;

use mysqli;

include_once "config.php";

class TableView
{
    public function __construct(string $tableName, $idDevice, $type, $range, $showTable)
    {
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSOWD, DATABASE_NAME);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $date = date("Y/m/d H:i:s");
        $date = date("Y/m/d H:i:s", strtotime($date) + 60 * 60);

        $output = [];
        for ($i = $range; $i > 0; $i--) {
            $date = date("Y/m/d H:i:s", strtotime($date) - 60 * 60);

            $year = date("Y", strtotime($date));
            $month = date("m", strtotime($date));
            $day = date("d", strtotime($date));
            $hour = date("H", strtotime($date));

            $sql = "SELECT AVG(result) FROM measurement
                            where id_device = '$idDevice' and type = '$type'
                            and year(date) = '$year'
                            and month(date) = '$month'
                            and day(date) = '$day'
                            and hour(date) = '$hour'
                            ;";
            $result2 = $conn->query($sql);
            $formattedResult = substr($result2->fetch_assoc()["AVG(result)"], 0, -2);
            $output[date("d H:", strtotime($date)) . "00"] = $formattedResult;
        }

        $conn->close();

        if($showTable == "true"){
            self::table($tableName, $output);
        }

        self::chart($tableName, $output);
    }

    public function table($tableName, $output)
    {
        echo "<table><tr><th colspan='100%'><h1>$tableName</h1></th></tr>";
        foreach ($output as $value => $item) {
            echo "<tr><th>$value</th><th>$item</th></tr>";
        }
        echo "</table>";

    }

    public function chart($tableName, $output)
    {

        $formattedOutput = "['chart','$tableName'],";

        $output = array_reverse($output);
        foreach ($output as $key => $value) {
            $formattedOutput = $formattedOutput . "['" . $key . "'," . $value . "],";
        }
//        print_r($formattedOutput);
        echo <<<HTML
<div style="width: 90%">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<br><br>
       <button style="button" id="change-chart">Change to Classic</button>
      <div id="chart_div" style="width: 1000px; height: 500px;"></div>
   
<script>
 google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {

        var button = document.getElementById('change-chart');
        var chartDiv = document.getElementById('chart_div');

        var data = google.visualization.arrayToDataTable([
            $formattedOutput
        ]);

        var materialOptions = {
          width: 1000,
          chart: {
            title: '$tableName',
            subtitle: 'subtitlesubtitlesubtitlesubtitle'
          },
          series: {
            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
          },
          axes: {
            y: {
              distance: {label: 'parsecs'}, // Left y-axis.
              brightness: {side: 'right', label: 'apparent magnitude'} // Right y-axis.
            }
          }
        };

        var classicOptions = {
          width: 1000,
          series: {
            0: {targetAxisIndex: 0},
            1: {targetAxisIndex: 1}
          },
          title: 'Nearby galaxies - distance on the left, brightness on the right',
          vAxes: {
            // Adds titles to each axis.
            0: {title: 'parsecs'},
            1: {title: 'apparent magnitude'}
          }
        };

        function drawMaterialChart() {
          var materialChart = new google.charts.Bar(chartDiv);
          materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
          button.innerText = 'Change to Classic';
          button.onclick = drawClassicChart;
        }

        function drawClassicChart() {
          var classicChart = new google.visualization.ColumnChart(chartDiv);
          classicChart.draw(data, classicOptions);
          button.innerText = 'Change to Material';
          button.onclick = drawMaterialChart;
        }

        drawMaterialChart();
    };
      
</script>
</div>

HTML;
    }
}