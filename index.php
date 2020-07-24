<?php
namespace main;
require "fileOperation/FileScan.php";
require "fileOperation/FileSearch.php";
require "services/Service.php";
require "templates/ShowService.php";
require "templates/form/EditServiceForm.php";
require "templates/form/AddEditServiceFormStep1.php";
require "templates/form/AddEditServiceFormStep2.php";


?>
<html>
<head>
    <meta charset="UTF-8">
    <title>SmartPI</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style_button.css">
    <link rel="stylesheet" type="text/css" href="css/style_link.css">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Semi Circle Progress Bar CSS -->
    <link rel="stylesheet" href="css/style_status_bar.css">
    <!-- Semi Circle Progress Bar JS -->
    <script src="js/script.js"></script>

</head>

<body>

<header class="header">
    <div class="header_title"><Smart PI</div>
    <div class="header_content">
        <?PHP
        echo PHP_OS . "    ";
        echo "PHP version: " . PHP_VERSION . "<br>";
        echo $mainDir = '/home/pi/www';
        echo "<br>";
        echo $systemServicesDirectory = '/home/pi/www/systemServices';
        echo "<br>";
        echo $userServicesDirectory = '/home/pi/www/userServices';
        echo "<br>";
        ?>
    </div>
    <div class="header_content_left">

        <?php
        $servername = "localhost";
        $username = "user";
        $password = "user";

        // Create connection

        $conn = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$conn) {
            echo '<img src="img/database-close-512.png" alt="failed" style="width:40px;height:40px;   -webkit-filter: invert(1);
   filter: invert(1);">';
            echo "Connection failed: " . mysqli_connect_error();
        } else {
            echo '<img src="img/database-check-512.png" alt="ok" style="width:40px;height:40px;   -webkit-filter: invert(1);
   filter: invert(1);">';
            echo "Connected successfully";

        }
        ?>

    </div>


</header>

<section>
    <?php
    switch ($_POST["form"]) {
        case "addFormStep1":
            new AddEditServiceFormStep1($_POST["ServiceName"], $_POST["boxName"], $_POST["iotLibraries"], $_POST["boxBackground"]);
            break;
        case "addFormStep2":
            new AddEditServiceFormStep2($_POST["ServiceName"], $_POST["boxName"], $_POST["boxContent"],
                $_POST["iotLibraries"], $_POST["boxBackground"]);
            break;
        default:
            $userServicesList = new FileScan($userServicesDirectory);
            foreach ($userServicesList->getFileList() as $servisName) {
                if (strpos($servisName, "old")) {
                    continue;
                }
                $serviseType = "user";
                new Service($userServicesDirectory, $servisName, $serviseType);
            }

            $systemServicesList = new FileScan($systemServicesDirectory);
            foreach ($systemServicesList->getFileList() as $servisName) {
                $serviseType = "system";
                new Service($systemServicesDirectory, $servisName, $serviseType);
            }
    }

    //    if ($_POST["addModule"] == "true") {
    //
    //        $moduleName = $_POST["moduleName"];
    //        $boxName = $_POST["boxName"];
    //        $scriptName = $_POST["scriptName"];
    //        $scriptContentPath = $_POST["scriptContentPath"];
    //        $boxContentPath = $_POST["boxContentPath"];
    //        $boxBackground = $_POST["boxBackground"];
    //
    //        new AddEditServiceFormStep2($mainDir, $moduleName, $boxName, $scriptName, $boxContentPath, $scriptContentPath, $boxBackground);
    //    }
    //
    //    if ($_POST["addModule"] == "final") {
    //
    //        $oldModuleName = $_POST["oldModuleName"];
    //        $moduleName = $_POST["moduleName"];
    //        $oldBoxName = $_POST["oldBoxName"];
    //        $boxName = $_POST["boxName"];
    //        $oldBoxContent = $_POST["oldBoxContent"];
    //        $boxContent = $_POST["boxContent"];
    //        $oldScriptName = $_POST["oldScriptName"];
    //        $scriptName = $_POST["scriptName"];
    //        $oldScriptContent = $_POST["oldScriptContent"];
    //        $scriptContent = $_POST["scriptContent"];
    //        $boxBackground = $_POST["boxBackground"];
    //
    //
    //        new EditModuleFormStep3($mainDir, $oldModuleName, $moduleName, $oldBoxName, $boxName, $oldBoxContent, $boxContent,
    //            $oldScriptName, $scriptName, $oldScriptContent, $scriptContent, $boxBackground);
    //    }


    ?>
</section>

<footer>
    <?php
    echo date('Y-m-d H:i:s');
    ?>
    Jakub Palica &copy; copyright 1410

</footer>
</body>
</html>