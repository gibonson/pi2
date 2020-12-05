<?php


namespace app\calendar;

use app\EventExe;
use app\LogicController;
use app\ReaderExe;
use File\FileScan;

require_once "app/calendar/CodeTime.php";
require_once "app/fileOperation/FileScan.php";
require_once "app/EventExe.php";
require_once "app/ReaderExe.php";
require_once "app/LogicController.php";

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
        $lastTime = 0;

        while (true) {
            echo "\n";
            echo date("H:i");
            echo $currentTime = date("H") * 60 + date("i");
            echo "\n";

            if ($currentTime <> $lastTime) {
                foreach ($dayPlanList as $planTime => $events) {
                    if ($currentTime == $planTime) {
                        echo "\n";
                        print_r($events["eventsList"] = array_unique($events["eventsList"]));
                        foreach ($events["eventsList"] as $event) {
                            $file = file_get_contents("userFiles/event/" . $event, "r");
                            $event = json_decode($file, true);
                            print_r($event);
                            new EventExe($event);
                        }
                        echo "\n";
                        print_r($events["readerList"] = array_unique($events["readerList"]));
                        foreach ($events["readerList"] as $reader) {
                            $file = file_get_contents("userFiles/reader/" . $reader, "r");
                            $jsonfile = array("fileName" => $reader) + json_decode($file, true);
                            new ReaderExe($jsonfile);

                        }
                        echo "\n";
                        print_r($events["logicList"] = array_unique($events["logicList"]));
                        foreach ($events["logicList"] as $logic) {
                            new LogicController($logic);
                        }
                        echo "\n";
                    }
                }
                $lastTime = $currentTime;
            } else {
                echo "skip";
            }
            sleep(1);
        }
    }
}