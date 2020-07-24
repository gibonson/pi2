<?php

namespace main;

class Service
{
    public $boxName;
    public $boxContentPath;
    public $boxBackground;

    public function __construct(string $servicesDirectory, $servisName, $serviseType)
    {

        $servceFullPath = $servicesDirectory . "/" . $servisName;
        $serviceFileList = scandir($servceFullPath);

        if (($key = array_search('.', $serviceFileList)) !== false) {
            unset($serviceFileList[$key]);
        }
        if (($key = array_search('..', $serviceFileList)) !== false) {
            unset($serviceFileList[$key]);
        }

        $boxBackground = "no file";
        $iotLibraries = "no library";
        foreach ($serviceFileList as $file) {
            if (strpos($file, "php")) {
                $boxContentPath = $servceFullPath . "/" . $file;
                $boxName = $file;
            }

            if ($file == "library.txt") {
                if ($myfile = fopen($servceFullPath . "/library.txt", "r")) {
                    $iotLibraries = fgets($myfile);
                    fclose($myfile);
                }
            }

            if ($file == "background.txt") {
                if ($myfile = fopen($servceFullPath . "/background.txt", "r")) {
                    $boxBackground = fgets($myfile);
                    fclose($myfile);
                }
            }
        }
        new ShowService($servisName, $boxName, $boxContentPath, $iotLibraries, $boxBackground, $serviseType);

    }

}