<?php

namespace calendar;
require "Event.php";


$callendarOperation = new CalendarOperation();

switch ($_POST["operation"]) {
    case "add":
        $callendarOperation->addEvent($_POST["time"], $_POST["command"]);
        break;
    case "remove":
        $callendarOperation->removeEvent($_POST["time"], $_POST["command"]);
        break;
}

class CalendarOperation
{
    public static $EventList = [];


    public function addEvent($time, $command)
    {
        $event = new Event($time, $command);

        $myfile = file_get_contents("calendar.json");
        $myJSON = json_decode($myfile, true);

        array_push($myJSON, $event);

        $myfile = json_encode($myJSON);
        $file = fopen("calendar.json", "w+") or die("Unable to open file!");
        fputs($file, $myfile);
        fclose($file);

        header("Location: ../calendar/ShowCalendar.php");
    }

    public function editEvent()
    {

    }

    public function removeEvent($time, $command)
    {

        $myfile = file_get_contents("calendar.json", "r+") or die("Unable to open file!");
        $myJSON = json_decode($myfile, true);

        $newJSON = [];
        foreach ($myJSON as $key => $value) {

            if ($value["time"] == $time && $value["command"] == $command) {
                echo $time . " i " . $command . "remove<br>";
                continue;

            } else {
                echo $value["time"] . " i " . $value["command"] . "zostaje<br>";
                $event = new Event($value["time"], $value["command"]);
                array_push($newJSON, $event);
            }
        }
        print_r($newJSON);

        $newJSON = json_encode($newJSON);
        $file = fopen("calendar.json", "w+") or die("Unable to open file!");
        fputs($file, $newJSON);
        fclose($file);

        echo "usun";
        header("Location: ../calendar/ShowCalendar.php");

    }

    public function saveToJson()
    {

    }


}