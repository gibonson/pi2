<?php
$CPU_temp = shell_exec('vcgencmd measure_temp');
$CPU_temp = str_replace('temp=', '', $CPU_temp);
$CPU_temp = str_replace('\'C', '', $CPU_temp);
?>


<div class="progress">
    <div class="barOverflow">
        <div class="bar" style="border-bottom-color: #ff0016; border-right-color: #ff0016;"></div>
    </div>
    <span><?PHP echo $CPU_temp ?></span>&deg;C
</div>
Pokazuje temperaturę procesora raspberry pi


