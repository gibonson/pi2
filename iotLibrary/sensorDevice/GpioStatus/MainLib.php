<?php

namespace iotLib\GpioStatus;

use iotLib\SensorDevice;

require_once "iotLibrary/SensorDevice.php";

class MainLib extends SensorDevice
{
    public function setResults()
    {
        $executiveArray = self::getExecutiveArray(); // name => parameter
        foreach ($executiveArray as $name) {
            $commandGpioRead = "gpio -g read " . $name;
            $status = shell_exec($commandGpioRead);
        }
        $result = [];
        $results = [];
        $result["name"] = $name;
        $result["value"] = $status;
        array_push($results, $result);

        $this->results = $results;
    }
}