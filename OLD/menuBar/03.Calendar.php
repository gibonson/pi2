<?php

namespace main;

require_once "templates/ProcessIconFormGenerator.php";

$bar = new ProcessIconFormGenerator("php -f /home/pi/www/calendar/CronPi.php",
    "webResources/icon/icon-calendar.png", "webResources/icon/icon-calendar-error.png");
?>

<li>
    <form action="index" method="post">
        <input type="hidden" name="indexSwitch" value="showCalendar">
        <input type="image" src="<?= $bar->getIcon() ?>" alt="Submit"
               style="width:40px;height:40px; -webkit-filter: invert(1);">
    </form>
    <ul>
        <li><?= $bar->getForm() ?></li>
    </ul>
</li>