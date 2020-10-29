<?php

namespace iotLib\DHt22;

use app\log\LogAction;
use iotLib\SensorDevice;

require_once "iotLibrary/SensorDevice.php";

class MainLib extends SensorDevice
{
    public function setResults()
    {
        $log = new LogAction();


        $cmd = "sudo python iotLibrary/sensorDevice/DHT22/AdafruitDHT.py 22 4";
        $output = shell_exec($cmd);
        $DHT = explode(" ", $output);

        $DHT_temp = $DHT[0];
        $DHT_humid = $DHT[1];

        $DHT_temp = trim(str_replace('temp=', '', $DHT_temp));
        $DHT_humid = trim(str_replace('hum=', '', $DHT_humid));

        $results["temp"] = $DHT_temp;
        $results["humid"] = $DHT_humid;
        $this->results = $results;


        $log->addLog("temp -> " . $DHT_temp);
        $log->addLog("humid -> " . $DHT_humid);
//        $_SESSION[self::getId()]["temp"] =$DHT_temp;
//        $_SESSION[self::getId()]["humid"] =$DHT_humid;
    }
}