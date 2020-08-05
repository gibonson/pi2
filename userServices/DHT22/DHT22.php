<?php
namespace main;
require "iotLibraries/DHT22/Dht22.php";

if (!isset($_SESSION['DHT_temp'])) {
    new Dht22();
}


//$cmd = "sudo python iotLibraries/DHT22/AdafruitDHT.py 22 4";
//$output = shell_exec($cmd);
//$DHT = explode(" ", $output);
//
//$DHT_temp = $DHT[0];
//$DHT_humid = $DHT[1];
//
//
//$DHT_temp = str_replace('temp=', '', $DHT_temp);
//$DHT_humid = str_replace('hum=', '', $DHT_humid);
?>
<div class="progress">
    <div class="barOverflow">
        <div class="bar" style="border-bottom-color: #ff6b00; border-right-color: #ff6b00;"></div>
    </div>
    <span><?PHP echo $_SESSION['DHT_temp'] ?></span>&deg;C
</div>
<div class="progress">
    <div class="barOverflow">
        <div class="bar"></div>
    </div>
    <span><?PHP echo $_SESSION['DHT_humid'] ?></span>%
</div>
<a href="iotLibraries/DHT22/Dht22.php?DHT=true">refreshDHT22</a>