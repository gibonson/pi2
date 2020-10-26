<?php

namespace app;

use iotLib\GPIO\MainLib as GPIO;
use iotLib\Socket433\MainLib as Socket433;

require_once "iotLibrary/executiveDevice/GPIO/MainLib.php";
require_once "iotLibrary/executiveDevice/433/MainLib.php";

class EventExe
{
    public function __construct(array $event)
    {
        echo $name = $event["device"];
        echo $fullName = $event["eventNameFull"];
        echo $id = $event["eventID"];
        echo $executiveArray = $event["parameters"];
        echo $iotLib = $event["iotLib"];


        switch ($iotLib) {
            case "iotLibrary/executiveDevice/GPIO":
                $exe = new GPIO($name, $fullName, $id, $executiveArray);
                $exe->execute();
                break;
            case "iotLibrary/executiveDevice/433":
                $exe = new Socket433($name, $fullName, $id, $executiveArray);
                $exe->execute();
                break;
        }
    }
}