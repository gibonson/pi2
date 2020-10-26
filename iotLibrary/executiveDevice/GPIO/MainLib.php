<?php

namespace iotLib\GPIO;

use app\log\LogAction;
use iotLib\ExecutiveDevice;

require_once "iotLibrary/ExecutiveDevice.php";
require_once "app/log/LogAction.php";

class MainLib extends ExecutiveDevice
{
    public function execute()
    {
        $log = new LogAction();

        $executiveArray = self::getExecutiveArray(); // name => parameter
        foreach ($executiveArray as $name => $parameter) {
            $commandGpioOut = "gpio -g mode " . $name . " out";
            shell_exec($commandGpioOut);
            $status = null;
            if ($parameter == "high") {
                $status = 1;
            } elseif ($parameter == "low") {
                $status = 0;
            }
            $commandGpioWriteHigh = "gpio -g write " . $name . " " . $status;
            shell_exec($commandGpioWriteHigh);
            $log->addLog($commandGpioWriteHigh);


        }
    }
}