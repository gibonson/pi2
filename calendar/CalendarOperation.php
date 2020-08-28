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

        $myfile = file_get_contents("userFiles/calendar.json");
        $myJSON = json_decode($myfile, true);

        array_push($myJSON, $event);

        $myfile = json_encode($myJSON);
        $file = fopen("userFiles/calendar.json", "w+") or die("Unable to open file!");
        fputs($file, $myfile);
        fclose($file);

        header("index");
        echo "
        <form name='fr' action='index' method='post'>
            <input type='hidden' name='indexSwitch' value='showCalendar'>
        </form>
        <script type='text/javascript'>
        document.fr.submit();
        </script>";
    }

    public function editEvent()
    {

    }

    public function removeEvent($time, $command)
    {
        echo $time."<br>";
        echo $command."<br>";


        $myfile = file_get_contents("userFiles/calendar.json", "r+") or die("Unable to open file!");
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
        $file = fopen("userFiles/calendar.json", "w+") or die("Unable to open file!");
        fputs($file, $newJSON);
        fclose($file);

        echo "usun";
//
//        echo "
//        <form name='fr' action='index' method='post'>
//            <input type='hidden' name='indexSwitch' value='showCalendar'>
//        </form>
//        <script type='text/javascript'>
//        document.fr.submit();
//        </script>";
    }

    public function saveToJson()
    {

    }


}