<?php

namespace iotLib\CPUTemp;

use iotLib\SensorDevice;

require_once "iotLibrary/SensorDevice.php";

class MainLib extends SensorDevice
{
    public function setResults()
    {
        $CPU_temp = shell_exec('vcgencmd measure_temp');
        $CPU_temp = str_replace('temp=', '', $CPU_temp);
        $CPU_temp = str_replace('\'C', '', $CPU_temp);
        $result = [];
        $result["name"] = "pomiarCPU";
        $result["value"] = $CPU_temp;
        $results = [];
        array_push($results, $result);
        $this->results = $results;
    }
}