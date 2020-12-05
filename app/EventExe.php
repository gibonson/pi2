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
        $name = $event["fileName"];
        $fullName = $event["eventNameFull"];
        $id = $event["eventID"];
        $executiveArray = $event["parameters"];
        $iotLib = $event["iotLib"];


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