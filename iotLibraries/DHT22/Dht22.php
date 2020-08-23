<?php

namespace main;
session_start();


if (isset($_POST["run"]) == "true") {
    new Dht22();
}


class Dht22
{
    public function __construct()
    {
        $cmd = "sudo python /home/pi/www/iotLibraries/DHT22/AdafruitDHT.py 22 4";
        echo $output = shell_exec($cmd);
        $DHT = explode(" ", $output);

        $DHT_temp = $DHT[0];
        $DHT_humid = $DHT[1];


        $DHT_temp = str_replace('temp=', '', $DHT_temp);
        $DHT_humid = str_replace('hum=', '', $DHT_humid);

        unset($_SESSION['DHT_temp']);

        echo $_SESSION['DHT_temp'] = $DHT_temp;
        echo $_SESSION['DHT_humid'] = $DHT_humid;
        header("Location: index");
    }
}




