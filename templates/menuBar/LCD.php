<?php
namespace main;

require_once "templates/ProcessIconFormGenerator.php";
$bar = new ProcessIconFormGenerator("sudo python /home/pi/www/iotLibraries/LCD/alarm_clock.py",
    "webResources/icon/icon-lcd.png", "webResources/icon/icon-lcd-error.png");
?>

<li>
    <a href="LcdForm"><img src="<?= $bar->getIcon() ?>" style="width:40px;height:40px;   -webkit-filter: invert(100);
filter: invert(1);""></a>
    <ul>
        <li><?= $bar->getForm() ?></li>
    </ul>
</li>

