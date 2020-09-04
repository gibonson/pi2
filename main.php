<?php

namespace main;

use calendar\ShowCalendar;
use Chart;
use mysqli;

include "config.php";

session_start();
require "fileOperation/FileScan.php";
require "fileOperation/FileSearch.php";
require "templates/ShowService.php";
require "templates/form/AddNewJson.php";
require "templates/form/AddNewJsonStep2.php";
require "dataBase/DataBaseTest.php";
require "fileOperation/JsonToForm.php";
require "fileOperation/AddEditJsonToForm.php";
require "calendar/ShowCalendar.php";
require "dataBase/IotDeviceList.php";


?>
<html>
<head>
    <meta charset="UTF-8">
    <title>SmartPI</title>
    <link rel="stylesheet" type="text/css" href="webResources/css/style.css">
    <link rel="stylesheet" type="text/css" href="webResources/css/style_button.css">
    <link rel="stylesheet" type="text/css" href="webResources/css/style_link.css">
    <link rel="stylesheet" type="text/css" href="webResources/css/nav.css">
</head>

<body>
<header class="header">
    <ul>
        <?php

        $menuBar = new FileScan("menuBar");
        foreach (FileScan::getFileList() as $menu) {
            include "menuBar" . "/" . $menu;
        }
        ?>
    </ul>
</header>

<section>
    <?php


    $arrayChart = "
        [
            ['Year', 'Sales', 'Expenses'],
            ['2004', 1000, 400],
            ['2005', 1170, 460],
            ['2006', 660, 1120],
            ['2007', 660, 1120],
            ['2007', 660, 1120],
            ['2007', 660, 1120],
            ['2008', 1030, 540]
        ]";



    $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSOWD, DATABASE_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT time, value, id_Device FROM IOT_measurement where id_Device = 2 order by time desc limit 100";
    $result = $conn->query($sql);


    $arrayChart = "";

    if ($result->num_rows > 0) {
        $arrayChart = $arrayChart . "[";
        $arrayChart = $arrayChart . "['time', 'Sales'],";
        while ($row = $result->fetch_assoc()) {
            $arrayChart = $arrayChart . "['" . $row["time"] . "'," . $row["value"] . "],";
        }
        $arrayChart = $arrayChart . "]";

    } else {
        echo "0 results";
    }
    $conn->close();

    echo $arrayChart;
    require "templates/Chart.php";

    new Chart($arrayChart);


    switch ($_POST["indexSwitch"]) {
        case "AddNewJsonBox":
            new AddNewJsonStep2();
            break;
        case "AddNewJsonBox2":
            echo "form2";
            break;
        case "showCalendar":
            new ShowCalendar();
            break;
        case "showIotDeviceList":
            $list = new IotDeviceList();
            $list->viewDevice();
            break;
        default:
            $jsonBoxes = new FileScan("userFiles/jsonBoxes");
            foreach ($jsonBoxes->getFileList() as $servisName) {
                new JsonToForm($servisName);
            }
            break;

    }


    ?>
</section>
<?php
require "templates/footer.php";
?>
</body>
</html>