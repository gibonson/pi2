<?php
$cmd = "sudo python userModules/"."/script/AdafruitDHT.py 22 4";
$DHT_temp = shell_exec($cmd);


$DHT_temp = explode(" ", $DHT_temp);
$DHT_humid = $DHT_temp[1];
$DHT_temp = $DHT_temp[0];

$DHT_humid = str_replace('hum=', '', $DHT_humid);
$DHT_temp = str_replace('temp=', '', $DHT_temp);

?>
<div class="progress">
    <div class="barOverflow">
        <div class="bar" style="border-bottom-color: #ff6b00; border-right-color: #ff6b00;"></div>
    </div>
    <span><?PHP echo $DHT_temp ?></span>&deg;C
</div>
Dane pochodzą z układu DHT22


<?php echo $cmd?>