<?php


namespace app;

require_once "app/EventExe.php";


new PackController($_POST["form"]);

class PackController
{

    public function __construct($packFile)
    {
        echo $packFile;
        $file = file_get_contents("userFiles/pack/" . $packFile, "r");
        $events = json_decode($file, true);
        print_r($events["events"]);

        foreach ($events["events"] as $event) {
            $file = file_get_contents("userFiles/event/" . $event, "r");
            $event = json_decode($file, true);
//            print_r($event);
            new EventExe($event);
        }
        header("Location: index");
    }
}