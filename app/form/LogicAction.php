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
    }

    public function edit()
    {
    }

    public function remove()
    {
    }
}