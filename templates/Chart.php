<?php

namespace main;

class Chart
{

    public function __construct($arrayChart, $chartName)
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
            fontSize: 9,
            title: '$chartName',
            chartArea: {'width': '90%', 'height': '50%'},
            curveType: 'function',
            legend: {position: 'bottom'}
        };

        var chart = new google.visualization.LineChart(document.getElementById('$chartName'));

        chart.draw(data, options);
    }
</script>
<div id="$chartName" class="box" style="width: 930px; height: 290px; padding: 10px"></div>
HTML;
    }
}

