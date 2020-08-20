<?php

foreach ($_POST['gpio'] as $gpio) {
    echo $gpio;
    echo "<br>";
    echo $commandGpioOut = "gpio -g mode " . $gpio . " out";
    echo "<br>";
    shell_exec($commandGpioOut);


    if ($_POST['delay'] == null) {
        if ($_POST['gpioValue'] == null) {
            $commandGpioRead = "gpio -g read " . $gpio;
            $commandGpioWriteHigh = "gpio -g write " . $gpio . " 1";
            $commandGpioWriteLow = "gpio -g write " . $gpio . " 0";

            $status = shell_exec($commandGpioRead);
            if ($status == 0) {
                shell_exec($commandGpioWriteHigh);
            } else {
                shell_exec($commandGpioWriteLow);
            }
        } else {
            echo $commandgpioValue = "gpio -g write " . $gpio . " " . $_POST['gpioValue'];
            shell_exec($commandgpioValue);
            echo "<br>";
        }
    } else {
        echo $delay = $_POST['delay'];
        $status = shell_exec("gpio -g read " . $gpio);
        if ($status == 0) {
            shell_exec('gpio -g write' . $gpio . ' 1');
            sleep($delay);
            shell_exec('gpio -g write ' . $gpio . ' 0');
        } else {
            shell_exec('gpio -g write ' . $gpio . ' 0');
            sleep($delay);
            shell_exec('gpio -g write ' . $gpio . ' 1');
        }
    }
}
header("Location: index");