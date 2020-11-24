<?php


namespace app;

use iotLib\CPUTemp\MainLib as CpuTemp;
use iotLib\DHT22\MainLib as DHT22;
use iotLib\GpioStatus\MainLib as GpioStatus;
use templates\ReaderBox;

require_once "iotLibrary/sensorDevice/CpuTemp/MainLib.php";
require_once "iotLibrary/sensorDevice/DHT22/MainLib.php";
require_once "iotLibrary/sensorDevice/GpioStatus/MainLib.php";
require_once "templates/ReaderBox.php";

class ReaderExe
{
    private $results;

    public function __construct(array $reader, bool $onlyValue = null)
    {

//        print_r($reader);
        $name = $reader["fileName"];
        $iotLib = $reader["iotLib"];


        if (!isset($onlyValue)) {
            $fullName = $reader["readerNameFull"];
            $id = $reader["readerID"];
        } else {
            $fullName = $reader["logicNameFull"];
            $id = $reader["logicID"];
        }


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
            case "iotLibrary/sensorDevice/GpioStatus":
                $exe = new GpioStatus($name, $fullName, $id, $parameters);
                $exe->setResults();
                $results = $exe->getResults();
                break;
        }

        if (!isset($onlyValue)) {
            new ReaderBox($name, $description, $boxBackground, $results, $parameters);
        } else {
            $this->results = $results;
        }
    }

    /**
     * @return array
     */
    public function getResults(): array
    {
        return $this->results;
    }


}