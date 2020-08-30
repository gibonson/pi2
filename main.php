<?php

namespace main;

use calendar\ShowCalendar;

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

require "dataBase/IotDeviceList.php"


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