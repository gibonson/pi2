<?php

foreach ($_GET['gpio'] as $gpio) {
    echo $gpio;
    echo "<br>";
    echo $commandGpioOut = "gpio -g mode " . $gpio . " out";
    echo "<br>";
    shell_exec($commandGpioOut);

    if ($_GET['gpioValue'] == null) {
        echo $commandGpioRead = "gpio -g read " . $gpio;
        echo "<br>";
        echo $commandGpioWriteHigh = "gpio -g write " . $gpio . " 1";
        echo "<br>";
        echo $commandGpioWriteLow = "gpio -g write " . $gpio . " 0";
        echo "<br>";

        $status = shell_exec($commandGpioRead);
        if ($status == 0) {
            shell_exec($commandGpioWriteHigh);
        } else {
            shell_exec($commandGpioWriteLow);
        }
    } else {
        echo $commandgpioValue = "gpio -g write " . $gpio . " " . $_GET['gpioValue'];
        shell_exec($commandgpioValue);
        echo "<br>";
    }
}
header("Location: ../../index.php");