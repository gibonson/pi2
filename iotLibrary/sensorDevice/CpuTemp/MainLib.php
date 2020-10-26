<?php

namespace iotLib\CPUTemp;

use app\log\LogAction;
use iotLib\SensorDevice;

require_once "iotLibrary/SensorDevice.php";

class MainLib extends SensorDevice
{
    public function setResults()
    {
        $log = new LogAction();

        $CPU_temp = shell_exec('vcgencmd measure_temp');
        $CPU_temp = str_replace('temp=', '', $CPU_temp);
        $CPU_temp = str_replace('\'C', '', $CPU_temp);
        $CPU_temp = trim($CPU_temp);
        $results["rpiCpuTemp"] = $CPU_temp;
        $this->results = $results;

        $log->addLog("rpiCpuTemp -> " . $CPU_temp);

    }
}