<?php


namespace main;
if (isset($_POST["action"])) {
    if ($_POST["action"] == "run") {
        echo "run ";
        $processManager = new ProcessManager();
        $processManager->run($_POST["command"]);
    } elseif ("kill") {
        echo "kill ";
        $processManager = new ProcessManager();
        $processManager->kill($_POST["command"]);
    }
}


class ProcessManager
{

    public function show($command): string
    {
        $fullCommand = "ps aux | grep -c '" . $command . "'";
        return shell_exec($fullCommand);
//        if ($processCounter == 2) {
//            return "process don't exist";
//        } elseif ($processCounter == 3) {
//            return "process exist";
//        } else {
//            return "duplicate process";
//        }
    }

    public function run(string $command)
    {
        echo "sprawdzam --> " . $command . " --> ";
        if (self::show($command) == 2) {
            $fullCommand = $command . " > /dev/null 2>/dev/null &";
            exec($fullCommand);
            if (self::show($command) == 3) {
                echo "uruchomiono";
            } else {
                echo "blad uruchomienia";
            }
        } else {
            echo "blad procesu";
        }
        header("Location: index");
    }

    public function kill($command)
    {
        $command = str_replace("sudo ", "", $command);
        $processCounter = self::show($command);
        $fullCommand = "sudo pkill -9 -f  '" . $command . "'";
        exec($fullCommand);
        if (self::show($command) < $processCounter) {
            echo "kill --> " . $fullCommand;
        } else {
            echo "kill error--> " . $fullCommand;
        }
        header("Location: index");
    }
}