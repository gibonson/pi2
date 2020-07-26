<?php
namespace main;
require "fileOperation/FileScan.php";
require "fileOperation/FileSearch.php";
require "fileOperation/Service.php";
require "fileOperation/AddEditService.php";
require "templates/ShowService.php";
require "templates/form/EditServiceForm.php";
require "templates/form/AddEditServiceFormStep1.php";
require "templates/form/AddEditServiceFormStep2.php";
require "dataBase/DataBaseTest.php";

$mainDir = '/home/pi/www';
$systemServicesDirectory = '/home/pi/www/systemServices';
$userServicesDirectory = '/home/pi/www/userServices';
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>SmartPI</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style_button.css">
    <link rel="stylesheet" type="text/css" href="css/style_link.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Semi Circle Progress Bar CSS -->
    <link rel="stylesheet" href="css/style_status_bar.css">
    <!-- Semi Circle Progress Bar JS -->
    <script src="js/script.js"></script>
    <script src="js/nav.js"></script>


</head>

<body>
<header class="header">

    <nav>
        <div class="container">
            <ul>
                <li><a href="index.php"><img src="img/home.png" style="width:40px;height:40px;   -webkit-filter: invert(1);
   filter: invert(1);"></a></li>
                <li><a href="#"><?php new DataBaseTest() ?></a></li>

                <li><a href="systemServices/calendar_form/calform.php"><img src="img/calendar-time-icon.png" alt="ok"
                                                                            style="width:40px;height:40px;   -webkit-filter: invert(1);
   filter: invert(1);"><i class='fa fa-angle-down'></i></a>
                    <ul>
                        <li><a href="#">Category One</a></li>
                        <li><a href="#">Category Two</a></li>
                        <li><a href="#">Category Three</a></li>
                    </ul>
                </li>
                <li class='sub-menu'><a href="systemServices/calendar/calendarTest.php"><img src="img/seting.png"
                                                                                             style="width:40px;height:40px;   -webkit-filter: invert(1);
   filter: invert(1);""><i class='fa fa-angle-down'></i></a>
                    <ul>
                        <li><a href="#">OS: <?= PHP_OS ?></a></li>
                        <li><a href="#">PHP version: <?= PHP_VERSION ?></a></li>
                        <li><a href="#">mainDir: <?= $mainDir ?></a></li>
                        <li><a href="#">System Services: <?= $systemServicesDirectory ?></a></li>
                        <li><a href="#">User Services: <?= $userServicesDirectory ?></a></li>
                    </ul>
                </li>
                <li><a href="index.php"><img src="img/RPi-Logo.png" style="height:40px;"></a></li>
                <li><a href="index.php"><img src="img/777.png" style="width:40px;height:40px;   -webkit-filter: invert(1);
   filter: invert(1);""></a>
                </li>
                <li><a href="index.php"><img src="img/user.png" style="width:40px;height:40px;   -webkit-filter: invert(1);
   filter: invert(1);""></a></li>
                <li><a href="systemServices/addModule/Add%20Module.php"><img src="img/add-image-png.png"
                                                                             style="width:40px;height:40px;"></a></li>
            </ul>
        </div>
    </nav>


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

//            $systemServicesList = new FileScan($systemServicesDirectory);
//            foreach ($systemServicesList->getFileList() as $servisName) {
//                $serviseType = "system";
//                new Service($systemServicesDirectory, $servisName, $serviseType);
//            }
    }
    ?>
</section>


<footer>
    <?php
    echo date('Y-m-d H:i:s');
    ?>
    Jakub Palica &copy; copyright 1410

</footer>


<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $('nav li').hover(
        function () {
            $('ul', this).stop().slideDown(200);
        },
        function () {
            $('ul', this).stop().slideUp(200);
        }
    );
</script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>
</body>
</html>