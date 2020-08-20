<?php

namespace calendar;

require "Event.php";

new CronPi();


class CronPi{

    public function __construct()
    {
        $calenderFile = file_get_contents("calendar.json", "r+") or die("Unable to open file!");
        $calenderJson = json_decode($calenderFile, true);


        $eventList = [];

        foreach ($calenderJson as $key => $value) {
            echo $time = $value["time"];echo "\n";
            echo $command = $value["command"];echo "\n";
            $event = new Event($time, $command);
            echo $codeTime = $event->getCodeTime();echo "\n";echo "\n";
            array_push($eventList, $event);

        }

        while (true) {

           echo "\n";
            echo date("H:i");
            echo " ";
            echo $currentTime = date("H") * 60 + date("i");
            echo "\n";
            foreach ($eventList as $event) {
                if ($event->getCodeTime() == $currentTime) {
                    echo $event->getCodeTime() . "jest rowne dacie" . $currentTime . "\n";
                    echo $command = $event->getCommand() . "\n";
                    //shell_exec($command);
                }
            }
            sleep(2);
        }
    }
}