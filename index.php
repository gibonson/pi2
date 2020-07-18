<?php
namespace main;
require "moduleOperation/Module.php";
require "moduleOperation/ModuleScan.php";
require "moduleOperation/ShowModule.php";
require "form/EditModuleFormStep2.php";
require "form/EditModuleFormStep3.php";

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
    <div class="header_title">Smart PI</div>
    <div class="header_content">
        <?PHP
        echo PHP_OS . "    ";
        echo "PHP version: " . PHP_VERSION . "<br>";
        echo $mainDir = '/home/pi/www';
        echo "<br>";
        ?>
    </div>
</header>

<section>
    <?php
    if ($_POST["addModule"] == "true") {

        $moduleName = $_POST["moduleName"];
        $boxName = $_POST["boxName"];
        $scriptName = $_POST["scriptName"];
        $scriptContentPath = $_POST["scriptContentPath"];
        $boxContentPath = $_POST["boxContentPath"];
        $boxBackground = $_POST["boxBackground"];

        new EditModuleFormStep2($mainDir, $moduleName, $boxName, $scriptName, $boxContentPath, $scriptContentPath, $boxBackground);
    }

    if ($_POST["addModule"] == "final") {

        $oldModuleName = $_POST["oldModuleName"];
        $moduleName = $_POST["moduleName"];
        $oldBoxName = $_POST["oldBoxName"];
        $boxName = $_POST["boxName"];
        $oldBoxContent = $_POST["oldBoxContent"];
        $boxContent = $_POST["boxContent"];
        $oldScriptName = $_POST["oldScriptName"];
        $scriptName = $_POST["scriptName"];
        $oldScriptContent = $_POST["oldScriptContent"];
        $scriptContent = $_POST["scriptContent"];
        $boxBackground = $_POST["boxBackground"];


        new EditModuleFormStep3($mainDir, $oldModuleName, $moduleName, $oldBoxName, $boxName, $oldBoxContent, $boxContent,
            $oldScriptName, $scriptName, $oldScriptContent, $scriptContent, $boxBackground);
    }


    new ModuleScan($mainDir);
    foreach (ModuleScan::$list as $moduleDir) {
        if (strpos($moduleDir, "hide")) {
            continue;
        }
        if (strpos($moduleDir, "old")) {
            continue;
        }
        new ShowModule($mainDir, $moduleDir);
    }
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