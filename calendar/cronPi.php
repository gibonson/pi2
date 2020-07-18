<?php

use calendar\event;

require "event.php";

//24 * 60 * 60 = 86400
//shell_exec('gpio -g write 18 1');
//shell_exec('gpio -g write 18 0');
$eventList[] = null;
$myfile = fopen("/home/pi/www/calendar/calendar.txt", "r") or die("Unable to open file!");

while (!feof($myfile)) {

    $line = fgets($myfile);
    $event = new event($line);
    array_push($eventList, $event);
    echo $event->getCommand();
    echo $event->getDate();

}
fclose($myfile);
echo "\n";

print_r($eventList);
unset($eventList[0]);
print_r($eventList);

echo "\n";
echo "\n";
echo "\n";
echo "\n";
echo "\n";


while (true) {


    echo "\n";
    echo date("H:i");
    echo " ";
    echo $date = date("H") * 60 + date("i");
    echo "\n";
    foreach ($eventList as $event => $value) {
        if ($value->getDate() == $date) {
            echo $value->getDate() . "jest rowne dacie" . $date."\n";
            echo $command = $value->getCommand()."\n";
            shell_exec($command);
        }
    }
    sleep(60);
}
