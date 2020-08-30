<?php

namespace main;


class CpuTemp
{

    public static $ID_DEVICE = 1;
    public static $DEVICE_DESCRIPTION = "CPUTEMP";

    public function getTemp(): string
    {
        $CPU_temp = shell_exec('vcgencmd measure_temp');
        $CPU_temp = str_replace('temp=', '', $CPU_temp);
        $CPU_temp = str_replace('\'C', '', $CPU_temp);
        return $CPU_temp;
    }
}