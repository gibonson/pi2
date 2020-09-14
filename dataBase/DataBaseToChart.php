<?php


namespace main;

use Chart;
use mysqli;

class DataBaseToChart
{

    public function __construct()
    {

        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSOWD, DATABASE_NAME);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT time, value, id_Device FROM IOT_measurement where id_Device = 2 order by time desc limit 100";
        $result = $conn->query($sql);


        $arrayChart = "";

        if ($result->num_rows > 0) {
            $arrayChart = $arrayChart . "[";
            $arrayChart = $arrayChart . "['time', 'temperature'],";
            while ($row = $result->fetch_assoc()) {
                $arrayChart = $arrayChart . "['" .  gmdate("H+2:i", $row["time"]) . "'," . $row["value"] . "],";
            }
            $arrayChart = $arrayChart . "]";

        } else {
            echo "0 results";
        }
        $conn->close();

//        echo $arrayChart;
        require "templates/Chart.php";

        new Chart($arrayChart);
    }


}