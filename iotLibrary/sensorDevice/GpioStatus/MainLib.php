<?php

namespace iotLib\GpioStatus;

use app\log\LogAction;
use iotLib\SensorDevice;

require_once "iotLibrary/SensorDevice.php";

class MainLib extends SensorDevice
{
    public function setResults()
    {

        $log = new LogAction();

        $results = [];
        $executiveArray = self::getExecutiveArray(); // name => parameter
        foreach ($executiveArray as $name) {
            $commandGpioRead = "gpio -g read " . $name;
            $status = trim(shell_exec($commandGpioRead));
            $results[$name] = $status;
            $log->addLog("GPIO " . $name . " -> " . $status);
        }
        $this->results = $results;
    }
}