<?php


namespace templates;

use app\ReaderExe;
use File\FileScan;

require_once "templates/EventBox.php";
require_once "templates/PackBox.php";
require_once "templates/LogicBox.php";
require_once "app/ReaderExe.php";


new MainContent();

class MainContent
{
    public function __construct()
    {
        $eventLst = new FileScan("userFiles/event", "json", true);
        foreach ($eventLst->getSearchFileList() as $fileName) {
            $file = file_get_contents("userFiles/event/" . $fileName, "r");
            $jsonfile = array("fileName" => $fileName) + json_decode($file, true);
            new EventBox($jsonfile["fileName"], $jsonfile["description"], $jsonfile["boxBackground"]);
        }

        $readerList = new FileScan("userFiles/reader", "json", true);
        foreach ($readerList->getSearchFileList() as $fileName) {
            $file = file_get_contents("userFiles/reader/" . $fileName, "r");
            $jsonfile = array("fileName" => $fileName) + json_decode($file, true);
            new ReaderExe($jsonfile);
        }

        $packList = new FileScan("userFiles/pack", "json", true);
        foreach ($packList->getSearchFileList() as $fileName) {
            $file = file_get_contents("userFiles/pack/" . $fileName, "r");
            $jsonfile = array("fileName" => $fileName) + json_decode($file, true);
            new PackBox($jsonfile["fileName"], $jsonfile["description"], $jsonfile["boxBackground"]);
        }

        $logicList = new FileScan("userFiles/logic", "json", true);
        foreach ($logicList->getSearchFileList() as $fileName) {
            $file = file_get_contents("userFiles/logic/" . $fileName, "r");
            $jsonfile = array("fileName" => $fileName) + json_decode($file, true);
            new LogicBox($jsonfile);
        }

    }
}