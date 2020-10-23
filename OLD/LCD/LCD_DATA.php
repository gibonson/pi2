<?php

namespace main;

require_once "src/SessionVariables.php";
new LCD_DATA();

class LCD_DATA
{
    public function __construct()
    {
        $lcd = "";
        if ($file = fopen("/home/pi/www/LCD/LCDdata.txt", "r")) {
            while (!feof($file)) {
                $line = fgets($file);
                $lcd = $lcd . $line . "\n";
            }
            fclose($file);
        }


        echo "text" . "\n" . $lcd . "\n2000-09-26 22:59:15";

    }
}