<?php


namespace app;

new CalendarAction();

class CalendarAction
{
    public function __construct()
    {
        if (isset($_POST["path"])) $this->path = $_POST["path"];
        if (isset($_POST["fileName"])) $this->fileName = $_POST["fileName"];
        if (!isset($_POST["action"])) $_POST["action"] = null;

        switch ($_POST["action"]) {
            case null:
                if (!isset($_POST["formStep"])) {
                    require_once "templates/form/AddCalendarForm.php";
                } elseif ($_POST["formStep"] == "formStep") {
                    self::add();
                }
                break;
            case "edit":
                self::edit();
                break;
            case "remove":
                self::remove();
                break;
        }
    }

    public function add()
    {
        print_r($_POST);
        $fileName = $_POST["calendarName"] . ".json";
        $calendar["time"] = $_POST["time"];
        $calendar["periodOfTime"] = $_POST["periodOfTime"];
        $calendar["eventsList"] = $_POST["eventsList"];
        $calendar["readerList"] = $_POST["readerList"];
        $calendar["logicList"] = $_POST["logicList"];

        $calendarJSON = json_encode($calendar);
        echo $calendarJSON;

        $fullPath = "userFiles/calendar/" . $fileName;

        $myfile = fopen($fullPath, "w") or die("Unable to open file!");
        fwrite($myfile, $calendarJSON);
        fclose($myfile);

        require "app/osOperation/Chmod777.php";
    }

    public function remove()
    {

    }

    public function edit()
    {

    }


}