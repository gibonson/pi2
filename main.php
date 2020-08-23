<?php

namespace main;

include "config.php";

session_start();
require "fileOperation/FileScan.php";
require "fileOperation/FileSearch.php";
require "templates/ShowService.php";
require "templates/form/AddNewJson.php";
require "templates/form/AddNewJsonStep2.php";
require "dataBase/DataBaseTest.php";
require "fileOperation/JsonToForm.php";
require "fileOperation/FileToMenuBar.php";
require "fileOperation/AddEditJsonToForm.php";


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

    <!--        <ul>-->
    <!--            <li><a href="#">Strona główna</a></li>-->
    <!--            <li><a href="#">Newsy</a>-->
    <!--                <ul>-->
    <!--                    <li><a href="#">Internet</a></li>-->
    <!--                    <li><a href="#">Sprzęt</a>-->
    <!--                        <ul>-->
    <!--                            <li><a href="#">Komputery</a></li>-->
    <!--                            <li><a href="#">Tablety</a></li>-->
    <!--                            <li><a href="#">Telefony</a></li>-->
    <!--                        </ul>-->
    <!--                    </li>-->
    <!--                    <li><a href="#">Oprogramowanie</a></li>-->
    <!--                    <li><a href="#">Wydarzenia</a></li>-->
    <!--                </ul>-->
    <!--            </li>-->
    <!--        </ul>-->
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
    if ($_POST["AddNewJsonBox"] == "true") {
        new AddNewJsonStep2();
    }


    $jsonBoxes = new FileScan("userFiles/jsonBoxes");
    foreach ($jsonBoxes->getFileList() as $servisName) {
        new JsonToForm($servisName);
    }
    ?>
</section>
<?php
require "templates/footer.php";
?>
</body>
</html>