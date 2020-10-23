<?php

namespace iotLib;
use main\AddDataNew;

require_once "Device.php";
require_once "dataBase/AddDataNew.php";

abstract class SensorDevice extends Device
{

    public $results; // name, value

    public function insertToDB()
    {
        foreach (self::getResults() as $result) {
            new AddDataNew(self::getId(), $result["name"], $result["value"]);
        }
    }

    /**
     * @return array
     */
    public function getResults(): array
    {
        return $this->results;
    }

    abstract function setResults();
}