<?php


namespace app\form;


use File\FileScan;

class GetNextID
{

    public function getNextID(string $device = null): string
    {


        $eventLst = new FileScan("userFiles/event/", "json", true);
        $eventLst = $eventLst->getSearchFileList();


        $readerList = new FileScan("userFiles/reader/", "json", true);
        $readerList = $readerList->getSearchFileList();


        $nextReaderID = 0;

        foreach ($readerList as $item) {
            $file = file_get_contents("userFiles/reader/" . $item, "r");
            $file = json_decode($file, true);
            if ($file["readerID"] > $nextReaderID) {
                $nextReaderID = $file["readerID"];
            }
        }
        $nexEventID = 0;

        foreach ($eventLst as $item) {
            $file = file_get_contents("userFiles/event/" . $item, "r");
            $file = json_decode($file, true);
            if ($file["eventID"] > $nexEventID) {
                $nexEventID = $file["eventID"];
            }
        }

        $nextID = 0;
        if ($device == "event") {
            $nextID = $nexEventID;
        } elseif ($device == "reader") {
            $nextID = $nextReaderID;
        } else {
            if ($nexEventID >= $nextReaderID) {
                $nextID = $nexEventID;
            } else {
                $nextID = $nextReaderID;
            }
        }

        $nextID = $nextID + 1;
        return $nextID;
    }

}