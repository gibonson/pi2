<?php


namespace templates;

require_once "templates/TableGenerator.php";

new Tables();

class Tables
{
    public function __construct()
    {
        $list2 = new \File\FileScan("userFiles/event", "json", true);
        $eventList2 = [];
        foreach ($list2->getSearchFileList() as $fileName) {
            $file = file_get_contents("userFiles/event/" . $fileName, "r");
            $jsonfile = [];
            $jsonfile = array("fileName" => $fileName) + json_decode($file, true);
            array_push($eventList2, $jsonfile);
        }
        new TableGenerator($eventList2, "userFiles/event", "eventAction");

        $list3 = new \File\FileScan("userFiles/reader", "json", true);
        $eventList3 = [];
        foreach ($list3->getSearchFileList() as $fileName) {
            $file = file_get_contents("userFiles/reader/" . $fileName, "r");
            $jsonfile = [];
            $jsonfile = array("fileName" => $fileName) + json_decode($file, true);
            array_push($eventList3, $jsonfile);
        }
        new TableGenerator($eventList3, "userFiles/reader", "readerAction");



        $list4 = new \File\FileScan("userFiles/pack", "json", true);
        $eventList4 = [];
        foreach ($list4->getSearchFileList() as $fileName) {
            $file = file_get_contents("userFiles/pack/" . $fileName, "r");
            $jsonfile = [];
            $jsonfile = array("fileName" => $fileName) + json_decode($file, true);
            array_push($eventList4, $jsonfile);
        }
        new TableGenerator($eventList4, "userFiles/pack", "packAction");

        $list5 = new \File\FileScan("userFiles/logic", "json", true);
        $eventList5 = [];
        foreach ($list5->getSearchFileList() as $fileName) {
            $file = file_get_contents("userFiles/logic/" . $fileName, "r");
            $jsonfile = [];
            $jsonfile = array("fileName" => $fileName) + json_decode($file, true);
            array_push($eventList5, $jsonfile);
        }
        new TableGenerator($eventList5, "userFiles/logic", "logicAction");


        $list6 = new \File\FileScan("userFiles/calendar", "json", true);
        $eventList6 = [];
        foreach ($list6->getSearchFileList() as $fileName) {
            $file = file_get_contents("userFiles/calendar/" . $fileName, "r");
            $jsonfile = [];
            $jsonfile = array("fileName" => $fileName) + json_decode($file, true);
            array_push($eventList6, $jsonfile);
        }
        new TableGenerator($eventList6, "userFiles/calendar", "calendarAction");
    }
}