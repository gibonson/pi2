<?php


namespace main;
require_once "config.php";

new SaveJson();

class SaveJson
{
    public function __construct()
    {
        $serviceName = $_POST['ServiceName'];
        $json = $_POST['boxContent'];
        $filePath = "/home/pi/www/userFiles/jsonBoxes/" . $serviceName;
        echo $filePath;

        if (file_exists($filePath)) {
            echo "plik jest";
            $oldFilePath = $filePath . "-old-" . microtime(true);
            if (rename($filePath, $oldFilePath)) {
                echo "udało sie zmienić nazwe  folderu na " . $oldFilePath . "<br>";
            } else {
                echo "nie udało sie zmienić nazwe  folderu na " . $oldFilePath . "<br>";
            }
        }
        file_put_contents($filePath, $json);
        echo "ok";

        require "src/Chmod777.php";

    }

}