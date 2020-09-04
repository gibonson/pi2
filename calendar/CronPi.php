<?php

namespace calendar;

require "Event.php";

new CronPi();


class CronPi
{

    public function __construct()
    {
        $calenderFile = file_get_contents("/home/pi/www/userFiles/calendar.json", "r+") or die("Unable to open file!");
        $calenderJson = json_decode($calenderFile, true);


        $eventList = [];


        foreach ($calenderJson as $key => $value) {
            echo "\n";
            echo $time = $value["time"];
            $codeTime = explode(":", $time);
            $codeTime = $codeTime[0] * 60 + $codeTime[1];
            echo "\t";
            echo $command = $value["command"];
            echo "\t";
            if (isset($value["periodTime"])) {
                echo $periodTime = $value["periodTime"];
                echo "\t";
                while ($codeTime < 1439) {
                    if (!isset($eventList[$codeTime])) {
                        $eventList[$codeTime] = [];
                    }
                    array_push($eventList[$codeTime], $command);
                    $codeTime = $codeTime + $periodTime;
                }
            } else {
                if (!isset($eventList[$codeTime])) {
                    $eventList[$codeTime] = [];
                }
                array_push($eventList[$codeTime], $command);
            }
        }
        ksort($eventList);
        print_r($eventList);


        while (true) {
            echo "\n";
            echo date("H:i");
            echo " ";
            echo $currentTime = date("H") * 60 + date("i");
            echo "\n";

            foreach ($eventList as $date => $key) {
                if ("$date" == "$currentTime") {
                    foreach ($key as $command => $value) {
                        shell_exec($value);
                    }
                }
            }
            sleep(60);
        }

    }
}