<?php


namespace templates;

use File\FileScan;

require_once "templates/EventBox.php";


new MainContent();

class MainContent
{
    public function __construct()
    {

        $list = new FileScan("userFiles/event", "json", true);
        foreach ($list->getSearchFileList() as $fileName) {
            $file = file_get_contents("userFiles/event/" . $fileName, "r");
            $jsonfile = [];
            $jsonfile = array("fileName" => $fileName) + json_decode($file, true);

            new EventBox($jsonfile["fileName"], $jsonfile["description"], $jsonfile["boxBackground"]);
        }
    }
}