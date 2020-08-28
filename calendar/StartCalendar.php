<?php

namespace main;

new StartCalendar();

class StartCalendar
{
    public function __construct()
    {
        $cronRun = "php -f /home/pi/www/calendar/CronPi.php > /dev/null 2>/dev/null &";
        $output = shell_exec($cronRun);
        if ($output == null) {
            echo "blad uruchamiania";
        } else {
            echo "skrypt właśnie uruchomiony";
        }
        header("Location: index");
    }


}