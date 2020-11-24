<?php

namespace templates;

require_once "app/osOperation/ProcessIconFormGenerator.php";

use app\ProcessIconFormGenerator;


$bar = new ProcessIconFormGenerator("php -f /home/pi/www/app/webCron/Calendar.php",
    "webResources/icon/icon-calendar.png", "webResources/icon/icon-calendar-error.png");

?>

<li>
    <form action="index" method="post">
        <input type="hidden" name="indexSwitch" value="showCalendar">
        <input type="image" src="<?= $bar->getIcon() ?>" alt="Submit"
               style="width:60px;height:60px; -webkit-filter: invert(1);">
    </form>
    <ul>
        <li><?= $bar->getForm() ?></li>
        <li><a href="calendarAction">Add Event</a></li>
    </ul>
</li>