<?php

namespace templates;

require_once "app/osOperation/ProcessIconFormGenerator.php";

use app\ProcessIconFormGenerator;


$bar = new ProcessIconFormGenerator("php -f /home/pi/www/app/calendar/Calendar.php",
    "webResources/icon/icon-calendar.png", "webResources/icon/icon-calendar-error.png");

?>
<div class="subnav">
    <button class="subnavbtn"><img class="img_menu" src="<?= $bar->getIcon() ?>"></button>
    <div class="subnav-content">
        <?= $bar->getForm() ?>
        <a href="calendarAction">Add Event</a>
    </div>
</div>