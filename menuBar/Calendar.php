<?php

$command = "ps aux |grep -c 'php'";
$output = exec($command) - 1;

if ($output == "2") {
    $icon = "webResources/icon/icon-calendar.png";
    $startStopCalendar = '<form action="StopCalendar" method="post">
            <a type="submit" onclick="this.closest(\'form\').submit();return false;" style="cursor:pointer">Stop service</a></form>';
} else {
    $icon = "webResources/icon/icon-calendar-error.png";
    $startStopCalendar = '<form action="StartCalendar" method="post">
            <a type="submit" onclick="this.closest(\'form\').submit();return false;" style="cursor:pointer">Start service</a></form>';
}
?>


<li>
    <form action="index" method="post">
        <input type="hidden" name="indexSwitch" value="showCalendar">
        <input type="image" src="<?= $icon ?>" alt="Submit"
               style="width:40px;height:40px; -webkit-filter: invert(1);">
    </form>
    <ul>
        <li><?= $startStopCalendar ?></li>

    </ul>
</li>