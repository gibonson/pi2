<?php

namespace app;

new DeviceAction();

class DeviceAction
{
    public $path;
    public $fileName;
    public $deviceNameFull;
    public $iotLib;


    public function __construct()
    {
        if(isset($_POST["path"])) $this->path = $_POST["path"];
        if(isset($_POST["fileName"])) $this->fileName = $_POST["fileName"];
        if(!isset($_POST["action"])) $_POST["action"] = null;

        switch ($_POST["action"]) {
            case null:
                require_once "templates/form/AddDeviceForm.php";
                break;
            case "add":
                self::add();
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
        $this->deviceNameFull = $_POST["deviceNameFull"];
        $this->iotLib = $_POST["iotLib"];

        $device = new \stdClass();
        $device->deviceNameFull = $this->deviceNameFull;
        $device->iotLib = $this->iotLib;

        $deviceJSON = json_encode($device);
        echo $deviceJSON;

        $fullPath = $this->path . $this->fileName . ".json";

        $myfile = fopen($fullPath, "w") or die("Unable to open file!");
        fwrite($myfile, $deviceJSON);
        fclose($myfile);

        require "app/osOperation/Chmod777.php";

    }

    public function edit()
    {
        echo "File Edit";
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