<?php


namespace app;

use templates\ReaderBox;

require_once "app/ReaderExe.php";

new EventController($_POST["form"]);

class ReaderController
{
    public function __construct($readerFile)
    {
        $file = file_get_contents("userFiles/reader/" . $readerFile, "r");
        $reader = json_decode($file, true);
        print_r($reader);
        new ReaderBox($reader);
        header("Location: index");
    }
}