<?php

namespace calendar;

require "event.php";

$eventList[] = null;
$myfile = fopen("/home/pi/www/calendar-old/calendar-old.txt", "r") or die("Unable to open file!");

while (!feof($myfile)) {

    $line = fgets($myfile);
    $event = new event($line);
    array_push($eventList, $event);
    echo $event->getCommand();
    echo $event->getDate();

}
fclose($myfile);
echo "\n";

//print_r($eventList);
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
    foreach ($eventList as $event => $item) {
        if ($item->getDate() == $date) {
            echo $item->getDate() . "jest rowne dacie" . $date . "\n";
            echo $command = $item->getCommand() . "\n";
            shell_exec($command);
        }
    }
    sleep(60);
}
