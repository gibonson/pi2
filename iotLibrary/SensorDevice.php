<?php

namespace iotLib;

require_once "Device.php";

abstract class SensorDevice extends Device
{

    public $results; // name, value

    /**
     * @return array
     */
    public function getResults(): array
    {
        return $this->results;
    }

    abstract function setResults();
}