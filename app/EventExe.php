<?php


namespace app;


use iotLib\GPIO\MainLib as GPIO;


use iotLib\CPUTemp\MainLib as CpuTemp;
use iotLib\Socket433\MainLib as Socket433;

use iotLib\CPUTemp\MainLib as CpuTtemp;
use iotLib\DHT22\MainLib as DHT22;
use iotLib\FotoRPI\MainLib as FotoRPI;
use iotLib\GpioStatus\MainLib as GpioStatus;


require_once "iotLibrary/executiveDevice/GPIO/MainLib.php";
require_once "iotLibrary/executiveDevice/433/MainLib.php";

require_once "iotLibrary/sensorDevice/CpuTemp/MainLib.php";
require_once "iotLibrary/sensorDevice/DHT22/MainLib.php";
require_once "iotLibrary/sensorDevice/FotoRPI/MainLib.php";
require_once "iotLibrary/sensorDevice/GpioStatus/MainLib.php";


class EventExe
{
    public function __construct(array $event)
    {
        print_r($event);
        echo "<br>";
        echo $event["device"];

        $fullPath = "userFiles/deviceList/" . $event["device"];

        $file = null;
        $myfile = file_get_contents($fullPath, "r");
        print_r($myfile);
        echo "<br>";

        $myfile = json_decode($myfile, true);

        print_r($myfile);
        echo "<br>";

        $name = "dup";
        $fullName = "dupppppa";
        $id = 10;

        $executiveArray = ["13" => "on",

            "16" => "on",
            "20" => "on",
            "21" => "on"
        ];

        echo $iotPath = $myfile["iotLib"] . "/" . "MainLib.php";
        require_once $iotPath;


        $exe = new GPIO($name, $fullName, $id, $executiveArray);
        $exe->execute();


//        $event["device"];
//
//
//        $myfile = fopen($fullPath, "w") or die("Unable to open file!");
//        fwrite($myfile, $deviceJSON);
//        fclose($myfile);


    }
}