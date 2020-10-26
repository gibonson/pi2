<?php


namespace app\log;

require_once "templates/form/LogForm.php";

use templates\form\LogForm;

if (isset($_POST["submit"])) {
    if ($_POST["submit"] == "clear") {
        $logAction = new LogAction();
        $logAction->clearLog();
    }
}


class LogAction
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function addLog($logLine)
    {
        if (!isset($_SESSION['logData'])) {
            $_SESSION['logData'] = "";
        }
        $logLine = date("Y-m-d h:i:s") . " -> " . $logLine;
        $_SESSION['logData'] = $logLine . "\n" . $_SESSION['logData'];
    }

    public function __toString()
    {
        $log = new LogForm($_SESSION["logData"]);
        $log = $log->generate();
        return $log;
    }

    public function clearLog()
    {
        session_unset();
        header("Location: index");
    }
}