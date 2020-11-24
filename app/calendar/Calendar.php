<?php


namespace app\calendar;

use File\FileScan;

//require_once "app/calendar/Event.php";
require_once "app/calendar/CodeTime.php";
require_once "app/fileOperation/FileScan.php";

new Calendar();

class Calendar
{

    public function __construct()
    {
        $dayPlanList = [];

        $eventLst = new FileScan("userFiles/calendar", "json", true);
        foreach ($eventLst->getSearchFileList() as $fileName) {
            $file = file_get_contents("userFiles/calendar/" . $fileName, "r");
            $jsonfile = array("fileName" => $fileName) + json_decode($file, true);

            if (!isset($jsonfile["eventsList"])) {
                $jsonfile["eventsList"] = [];
            }
            if (!isset($jsonfile["readerList"])) {
                $jsonfile["readerList"] = [];
            };
            if (!isset($jsonfile["logicList"])) {
                $jsonfile["logicList"] = [];
            };

            $timeWithTask["eventsList"] = $jsonfile["eventsList"];
            $timeWithTask["readerList"] = $jsonfile["readerList"];
            $timeWithTask["logicList"] = $jsonfile["logicList"];

            $codeTime = new CodeTime($jsonfile["time"]);
            $codeTime = $codeTime->getCodeTime();
            while ($codeTime < 1440) {
                if (array_key_exists($codeTime, $dayPlanList)) {
                    $dayPlanList[$codeTime]["eventsList"] = array_merge($dayPlanList[$codeTime]["eventsList"], $timeWithTask["eventsList"]);
                    $dayPlanList[$codeTime]["readerList"] = array_merge($dayPlanList[$codeTime]["readerList"], $timeWithTask["readerList"]);
                    $dayPlanList[$codeTime]["logicList"] = array_merge($dayPlanList[$codeTime]["logicList"], $timeWithTask["logicList"]);
                } else {
                    $dayPlanList[$codeTime] = $timeWithTask;
                }
                if ($jsonfile["periodOfTime"] == 0) {
                    break;
                }
                $codeTime = $codeTime + $jsonfile["periodOfTime"];
            }
        }
        echo "\n";
        echo "\n";
        echo "\n";
        print_r($dayPlanList);
    }


//    public function __construct()
//    {
//        $calenderFile = file_get_contents("/home/pi/www/userFiles/calendar.json", "r+") or die("Unable to open file!");
//        $calenderJson = json_decode($calenderFile, true);
//
//
//        $eventList = [];
//
//
//        foreach ($calenderJson as $key => $value) {
//            echo "\n";
//            echo $time = $value["time"];
//            $codeTime = explode(":", $time);
//            $codeTime = $codeTime[0] * 60 + $codeTime[1];
//            echo "\t";
//            echo $command = $value["command"];
//            echo "\t";
//            if (isset($value["periodTime"])) {
//                echo $periodTime = $value["periodTime"];
//                echo "\t";
//                while ($codeTime < 1439) {
//                    if (!isset($eventList[$codeTime])) {
//                        $eventList[$codeTime] = [];
//                    }
//                    array_push($eventList[$codeTime], $command);
//                    $codeTime = $codeTime + $periodTime;
//                }
//            } else {
//                if (!isset($eventList[$codeTime])) {
//                    $eventList[$codeTime] = [];
//                }
//                array_push($eventList[$codeTime], $command);
//            }
//        }
//        ksort($eventList);
//        print_r($eventList);
//
//
//        while (true) {
//            echo "\n";
//            echo date("H:i");
//            echo " ";
//            echo $currentTime = date("H") * 60 + date("i");
//            echo "\n";
//
//            foreach ($eventList as $date => $key) {
//                if ("$date" == "$currentTime") {
//                    foreach ($key as $command => $value) {
//                        shell_exec($value);
//                    }
//                }
//            }
//            sleep(60);
//        }
//
//    }
//}
//

}