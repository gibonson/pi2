<?php


namespace app;

require_once "app/ReaderExe.php";
require_once "app/EventExe.php";

use app\log\LogAction;

new LogicController($_POST["form"]);


class LogicController
{
    public function __construct($fileName)
    {
        $log = new LogAction();

        print_r($fileName);
        $file = file_get_contents("userFiles/logic/" . $fileName . ".json", "r");
        $jsonfile = array("fileName" => $fileName) + json_decode($file, true);
        print_r($jsonfile);
        $result = new ReaderExe($jsonfile, true);
        $result = $result->getResults();
        foreach ($result as $item) {
            echo $item;
        }

        echo $jsonfile["value"];
        if ($jsonfile["condition"] == "equal") {
            if ($item == $jsonfile["value"]) {
                self::condition($jsonfile["ifTrueEvents"]);
                $status = "true";
            } else {
                self::condition($jsonfile["ifFalseEvents"]);
                $status = "false";
            }
        } elseif ($jsonfile["condition"] == "smaller") {
            if ($item < $jsonfile["value"]) {
                self::condition($jsonfile["ifTrueEvents"]);
                $status = "true";
            } else {
                self::condition($jsonfile["ifFalseEvents"]);
                $status = "false";
            }
        } elseif ($jsonfile["condition"] == "bigger") {
            if ($item > $jsonfile["value"]) {
                self::condition($jsonfile["ifTrueEvents"]);
                $status = "true";
            } else {
                self::condition($jsonfile["ifFalseEvents"]);
                $status = "false";
            }
        } elseif ($jsonfile["condition"] == "different") {
            if ($item <> $jsonfile["value"]) {
                self::condition($jsonfile["ifTrueEvents"]);
                $status = "true";
            } else {
                self::condition($jsonfile["ifFalseEvents"]);
                $status = "false";
            }
        } else {
            $status = "condition error";
        }
        $log->addLog($item . " " . $jsonfile["condition"] . " " . $jsonfile["value"] . " -> " . $status);
        header("Location: index");


    }

    public function condition($eventList)
    {
        foreach ($eventList as $event) {
            $file = file_get_contents("userFiles/event/" . $event, "r");
            $event = json_decode($file, true);
            print_r($event);
            new EventExe($event);
        }
    }

}