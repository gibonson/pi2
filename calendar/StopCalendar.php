<?php


namespace calendar;

new StopCalendar();

class StopCalendar
{
    public function __construct()
    {
        $cronRun = "sudo pkill -f 'php -f /home/pi/www/calendar/CronPi.php'";
        echo "1";
        exec($cronRun);
        echo "2";

        header("Location: index");
    }
}