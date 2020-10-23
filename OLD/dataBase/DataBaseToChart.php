<?php


namespace main;

include "templates/Chart.php";

use mysqli;

class DataBaseToChart
{

    public function getData($idDevice, $unit, $chartName)
    {

        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSOWD, DATABASE_NAME);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "SELECT time, value, id_Device FROM IOT_measurement where id_Device = " . $idDevice . " order by time desc limit 24";
        $result = $conn->query($sql);


        $arrayChart = "";

        if ($result->num_rows > 0) {
            $arrayChart = $arrayChart . "[";
            $arrayChart = $arrayChart . "['time', '" . $unit . "'],";
            while ($row = $result->fetch_assoc()) {
                $arrayChart = $arrayChart . "['" . $row["time"] . "'," . $row["value"] . "],";
            }
            $arrayChart = $arrayChart . "]";

        } else {
            echo "0 results";
        }
        $conn->close();

//        echo $arrayChart;

        $chart = new Chart($arrayChart, $chartName);
    }


}