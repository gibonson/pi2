<?php


namespace app\form;

new LogicAction();

class LogicAction
{
    public function __construct()
    {
        if (isset($_POST["path"])) $this->path = $_POST["path"];
        if (isset($_POST["fileName"])) $this->fileName = $_POST["fileName"];
        if (!isset($_POST["action"])) $_POST["action"] = null;

        switch ($_POST["action"]) {
            case null:
                if (!isset($_POST["formStep"])) {
                    require_once "templates/form/AddLogicForm.php";
                } elseif ($_POST["formStep"] == "formStep2") {
                    require_once "templates/form/AddLogicFormStep2.php";
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

        $fileName = $_POST["fileName"] . ".json";
        $logic = [];


        $logic["iotLib"] = $_POST["iotLib"];

        $logic["logicNameFull"] = $_POST["logicNameFull"];

        $logic["logicID"] = $_POST["logicID"];

        $logic["description"] = $_POST["description"];

        $logic["boxBackground"] = $_POST["boxBackground"];

        $parameters = [];

        if (isset($_POST["name1"])) {
            $parameters[$_POST["name1"]] = $_POST["parameter1"];
        };
        if (isset($_POST["name2"])) {
            $parameters[$_POST["name2"]] = $_POST["parameter2"];
        };

        $logic["parameters"] = $parameters;

        $logic["condition"] = $_POST["condition"];
        $logic["value"] = $_POST["value"];
        $logic["ifTrueEvents"] = $_POST["ifTrueEvents"];
        $logic["ifFalseEvents"] = $_POST["ifFalseEvents"];


        echo "<br>";
        print_r($logic);
        $logicJSON = json_encode($logic);
        echo $logicJSON;
        $fullPath = "userFiles/logic/" . $fileName;
        $myfile = fopen($fullPath, "w") or die("Unable to open file!");
        fwrite($myfile, $logicJSON);
        fclose($myfile);
        require "app/osOperation/Chmod777.php";

    }

    public function edit()
    {
    }

    public function remove()
    {
    }
}