<?php


namespace app\form;

new PackAction();

class PackAction
{
    public function __construct()
    {
        if (isset($_POST["path"])) $this->path = $_POST["path"];
        if (isset($_POST["fileName"])) $this->fileName = $_POST["fileName"];
        if (!isset($_POST["action"])) $_POST["action"] = null;

        switch ($_POST["action"]) {
            case null:
                if (!isset($_POST["formStep"])) {
                    require_once "templates/form/AddPackForm.php";
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

        $eventsPack = [];

        $fileName = $_POST["packName"] . ".json";
        $eventsPack["description"] = $_POST["description"];
        $eventsPack["boxBackground"] = $_POST["boxBackground"];
        $eventsPack["events"] = $_POST["events"];

        print_r($eventsPack);

        $eventJSON = json_encode($eventsPack);
        echo $eventJSON;

        $fullPath = "userFiles/pack/" . $fileName;

        $myfile = fopen($fullPath, "w") or die("Unable to open file!");
        fwrite($myfile, $eventJSON);
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