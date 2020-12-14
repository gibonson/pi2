<?php


namespace templates;

require_once "app/osOperation/ProcessIconFormGenerator.php";

use app\ProcessIconFormGenerator;


$bar = new ProcessIconFormGenerator("sudo python /home/pi/www/iotLibrary/executiveDevice/LCD/alarm_clock.py",
    "webResources/icon/icon-lcd.png", "webResources/icon/icon-lcd-error.png");

?>
<div class="subnav">
    <button class="subnavbtn"><img class="img_menu" src="<?= $bar->getIcon() ?>"></button>
    <div class="subnav-content">
        <?= $bar->getForm() ?>
    </div>
</div>
