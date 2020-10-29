<?php


namespace app\form;


use File\FileScan;

class GetNextID
{

    public function getNextID(): string
    {
        $eventLst = new FileScan("userFiles/event/", "json", true);
        $readerList = new FileScan("userFiles/reader/", "json", true);
        $eventLst = $eventLst->getSearchFileList();
        $readerList = $readerList->getSearchFileList();

        $nextID = 0;

        foreach ($readerList as $item) {
            $file = file_get_contents("userFiles/reader/" . $item, "r");
            $file = json_decode($file, true);
            if ($file["readerID"] > $nextID) {
                $nextID = $file["readerID"];
            }
        }

        foreach ($eventLst as $item) {
            $file = file_get_contents("userFiles/event/" . $item, "r");
            $file = json_decode($file, true);
            if ($file["eventID"] > $nextID) {
                $nextID = $file["eventID"];
            }
        }



        $nextID = $nextID + 1;
        return $nextID;
    }

}