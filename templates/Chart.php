<?php

class Chart
{

    public function __construct($arrayChart)
    {
        echo <<<HTML
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable($arrayChart);

        var options = {
            backgroundColor: 'white',
            title: 'temperatura',
            curveType: 'function',
            legend: {position: 'bottom'}
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }
</script>
<div id="curve_chart" class="box" style="width: 630px; height: 310px; padding: 10px"></div>
HTML;
    }
}

