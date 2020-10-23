<?php

namespace iotLib\GPIO;


use iotLib\ExecutiveDevice;

require_once "iotLibrary/ExecutiveDevice.php";

echo "in iot";

class MainLib extends ExecutiveDevice
{
    public function execute()
    {
        $executiveArray = self::getExecutiveArray(); // name => parameter
        foreach ($executiveArray as $name => $parameter) {
            $commandGpioOut = "gpio -g mode " . $name . " out";
            shell_exec($commandGpioOut);
            $status = null;
            if ($parameter == "on") {
                $status = 1;
            } elseif ($parameter == "off") {
                $status = 0;
            }
            $commandGpioWriteHigh = "gpio -g write " . $name . " " . $status;
            shell_exec($commandGpioWriteHigh);
        }
    }
}