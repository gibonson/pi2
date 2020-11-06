<?php

namespace app\form;

new ReaderAction();

class ReaderAction
{
    public $path;
    public $fileName;
    public $iotLib;


    public function __construct()
    {
        if (isset($_POST["path"])) $this->path = $_POST["path"];
        if (isset($_POST["fileName"])) $this->fileName = $_POST["fileName"];
        if (!isset($_POST["action"])) $_POST["action"] = null;

        switch ($_POST["action"]) {
            case null:
                if (!isset($_POST["formStep"])) {
                    require_once "templates/form/AddReaderForm.php";
                } elseif ($_POST["formStep"] == "formStep2") {
                    require_once "templates/form/AddReaderFormStep2.php";
                } elseif ($_POST["formStep"] == "formStep3") {
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

        $fileName = $_POST["fileName"] . "13.json";

        $event = [];

        $event["iotLib"] = $_POST["iotLib"];

        $event["readerNameFull"] = $_POST["readerNameFull"];

        $event["readerID"] = $_POST["readerID"];

        $event["description"] = $_POST["description"];

        $event["boxBackground"] = $_POST["boxBackground"];

        $parameters = [];

        if (isset($_POST["name1"])) {
            $parameters[$_POST["name1"]] = $_POST["parameter1"];

        };

        if (isset($_POST["name2"])) {
            $parameters[$_POST["name2"]] = $_POST["parameter2"];
        }

        if (isset($_POST["name3"])) {
            $parameters[$_POST["name3"]] = $_POST["parameter3"];
        }

        $event["parameters"] = $parameters;

        echo "<br>";
        print_r($event);

        $eventJSON = json_encode($event);
        echo $eventJSON;

        $fullPath = "userFiles/reader/" . $fileName;

        $myfile = fopen($fullPath, "w") or die("Unable to open file!");
        fwrite($myfile, $eventJSON);
        fclose($myfile);

        require "app/osOperation/Chmod777.php";
    }

    public function edit()
    {
        echo "File edit reader";
    }

    public function remove()
    {
        $fullPath = $this->path . "/" . $this->fileName;
        if (!unlink($fullPath)) {
            echo("Cannot be deleted");
        } else {
            echo("Has been deleted");
        }
        header("Location: index");
    }

}