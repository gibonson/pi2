<?php


namespace app;

use iotLib\CPUTemp\MainLib as CpuTemp;
use iotLib\DHT22\MainLib as DHT22;
use iotLib\FotoRPI\MainLib as FotoRPI;
use iotLib\GpioStatus\MainLib as GpioStatus;
use templates\ReaderBox;

require_once "iotLibrary/sensorDevice/CpuTemp/MainLib.php";
require_once "iotLibrary/sensorDevice/DHT22/MainLib.php";
require_once "templates/ReaderBox.php";

class ReaderExe
{
    public function __construct(array $reader)
    {

//        print_r($reader);
        $name = $reader["fileName"];
        $iotLib = $reader["iotLib"];
        $fullName = $reader["readerNameFull"];
        $id = $reader["readerID"];
        $description = $reader["description"];
        $boxBackground = $reader["boxBackground"];
        $parameters = $reader["parameters"];
//        print_r($parameters);


        $results = [];

        switch ($iotLib) {
            case "iotLibrary/sensorDevice/CpuTemp":
                $exe = new CpuTemp($name, $fullName, $id, $parameters);
                $exe->setResults();
                $results = $exe->getResults();
                break;
            case "iotLibrary/sensorDevice/DHT22":
                $exe = new DHT22($name, $fullName, $id, $parameters);
                $exe->setResults();
                $results = $exe->getResults();
                break;
            case "iotLibrary/sensorDevice/FotoRPI":
//                $exe = new FotoRPI($name, $fullName, $id, $parameters);
//                $exe->getResults();
//                $exe->setResults();
//                $results = $exe->getResults();
                break;
            case "iotLibrary/sensorDevice/GpioStatus":
//                $exe = new GpioStatus($name, $fullName, $id, $parameters);
//                $exe->getResults();
//                $exe->setResults();
//                $results = $exe->getResults();
                break;
        }
        new ReaderBox($name, $description, $boxBackground, $results, $parameters);

    }

}