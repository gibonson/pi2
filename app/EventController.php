<?php


namespace app;

require_once "app/EventExe.php";

new EventController($_POST["form"]);

class EventController
{
    public function __construct($eventFile)
    {
        $file = file_get_contents("userFiles/event/" . $eventFile, "r");
        $event = array("fileName" => $eventFile) + json_decode($file, true);
        print_r($event);
        new EventExe($event);
        header("Location: index");
    }
}