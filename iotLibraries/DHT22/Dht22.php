<?php

namespace main;
session_start();


if (isset($_GET['DHT'])) {
    new Dht22();
} else {
    header("Location: ../../post.php");
}


class Dht22
{
    public function __construct()
    {
        echo "test";
        $cmd = "sudo python iotLibraries/DHT22/AdafruitDHT.py 22 4";
        $cmd = "sudo python AdafruitDHT.py 22 4";
        echo $output = shell_exec($cmd);
        $DHT = explode(" ", $output);

        $DHT_temp = $DHT[0];
        $DHT_humid = $DHT[1];


        $DHT_temp = str_replace('temp=', '', $DHT_temp);
        $DHT_humid = str_replace('hum=', '', $DHT_humid);

        unset($_SESSION['DHT_temp']);

        echo $_SESSION['DHT_temp'] = $DHT_temp;
        echo $_SESSION['DHT_humid'] = $DHT_humid;
       header("Location: ../../post.php");
    }
}




