<?php

namespace iotLib\DHt22;

use iotLib\SensorDevice;

require_once "iotLibrary/SensorDevice.php";

class MainLib extends SensorDevice
{
    public function setResults()
    {
        $cmd = "sudo python /home/pi/www/iotLibraries/DHT22/AdafruitDHT.py 22 4";
        $output = shell_exec($cmd);
        $DHT = explode(" ", $output);

        $DHT_temp = $DHT[0];
        $DHT_humid = $DHT[1];

        $DHT_temp = trim(str_replace('temp=', '', $DHT_temp));
        $DHT_humid = trim(str_replace('hum=', '', $DHT_humid));

        $result = [];
        $result["name"] = "temp";
        $result["value"] = $DHT_temp;
        $results = [];
        array_push($results, $result);
        $result["name"] = "humid";
        $result["value"] = $DHT_humid;
        array_push($results, $result);

        $this->results = $results;

    }
}