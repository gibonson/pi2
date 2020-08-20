<?php

namespace main;

include "config.php";


session_start();
require "fileOperation/FileScan.php";
require "fileOperation/FileSearch.php";
require "fileOperation/Service.php";
require "fileOperation/AddEditService.php";
require "templates/ShowService.php";
require "templates/form/AddEditServiceForm.php";
require "templates/form/AddEditServiceFormStep1.php";
require "templates/form/AddEditServiceFormStep2.php";
require "dataBase/DataBaseTest.php";
require "fileOperation/JsonToForm.php";

$iotLibrariesDirectory = __DIR__ . '/iotLibraries';


?>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>SmartPI</title>
        <link rel="stylesheet" type="text/css" href="webResources/css/style.css">
        <link rel="stylesheet" type="text/css" href="webResources/css/style_button.css">
        <link rel="stylesheet" type="text/css" href="webResources/css/style_link.css">
        <link rel="stylesheet" type="text/css" href="webResources/css/nav.css">
        <link rel="stylesheet" type="text/css" href="webResources/css/style_status_bar.css">

        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Semi Circle Progress Bar JS -->
        <script src="webResources/js/script.js"></script>
    </head>

<body>
<header class="header">

    <nav>
        <div class="container">
            <ul>
                <li><a href="index"><img src="webResources/icon/icon-home.png" style="width:40px;height:40px;   -webkit-filter: invert(1);
   filter: invert(1);"></a></li>
                <li><a href="#"><?php new DataBaseTest() ?></a></li>
                <li><a href="777"><img src="webResources/icon/icon-777.png" style="width:40px;height:40px;   -webkit-filter: invert(1);
   filter: invert(1);""></a></li>

                <li class='sub-menu'><a href="#"><img src="webResources/icon/icon-add.png"
                                                      style="width:40px;height:40px;"></a>
                    <ul>
                        <?php
                        $iotDirList = new FileScan($iotLibrariesDirectory);
                        foreach ($iotDirList->getFileList() as $iotLib) {
                            echo '<li>';
                            new AddEditServiceForm("NewService", "Newox.php", "iot-template", $iotLib, "", $iotLib);
                            echo '</li>';
                        }
                        ?>
                    </ul>
                </li>


                <li><a href="calendar/ShowCalendar.php"><img src="webResources/icon/icon-calendar.png" alt="ok"
                                                             style="width:40px;height:40px;   -webkit-filter: invert(1);
   filter: invert(1);"><i class='fa fa-angle-down'></i></a>
                    <ul>
                        <li><a href="#">Category One</a></li>
                        <li><a href="#">Category Two</a></li>
                        <li><a href="#">Category Three</a></li>
                    </ul>
                </li>

                <li><a href="index.php"><img src="webResources/icon/ison-seting.png"
                                             style="width:40px;height:40px;   -webkit-filter: invert(1);
   filter: invert(1);""></a></li>

                <li><a href="index.php"><img src="webResources/icon/icon-user.png" style="width:40px;height:40px;   -webkit-filter: invert(1);
   filter: invert(1);""></a></li>


                <li class='sub-menu'><a href="systemServices/calendar/calendarTest.php"><img
                                src="webResources/icon/icon-RPi-Logo.png"
                                style="height:40px;">
                        <i class='fa fa-angle-down'></i></a>
                    <ul>
                        <li><a href="#">OS: <?= PHP_OS ?></a></li>
                        <li><a href="#">PHP version: <?= PHP_VERSION ?></a></li>
                        <li><a href="#">mainDir: <?= __DIR__ ?></a></li>
                        <li><a href="#">User Services: <?= __DIR__ ?></a></li>
                        <li><a href="#">User Services: <?= "" ?></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<section>
    <?php

//    $userServicesList = new FileScan(DIR_BOXES);
//    foreach ($userServicesList->getFileList() as $servisName) {
//        if (strpos($servisName, "old")) {
//            continue;
//        }
//        $serviseType = "user";
//        new Service(DIR_BOXES, $servisName);
//    }

    $jsonBoxes = new FileScan("userFiles/jsonBoxes");
    foreach ($jsonBoxes->getFileList() as $servisName) {

        new JsonToForm($servisName);

    }


    ?>
</section>
    <?php
require "templates/footer.php";