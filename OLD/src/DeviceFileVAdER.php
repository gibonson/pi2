<?php

namespace main;
require "src/FileScan.php";

use templates\TableGenerator;

require_once "templates/TableGenerator.php";


$list = new DeviceFileVAdER();
$list->viewDevice();
echo "<br>";

class DeviceFileVAdER
{


    public function viewDevice()
    {
        $path = "/home/pi/www/userFiles/deviceList";
        $fileList = new FileScan($path);
        $deviceList = [];
        foreach ($fileList->getFileList() as $fileName) {
            $file = file_get_contents("/home/pi/www/userFiles/deviceList/" . $fileName, "r");
            $jsonfile = [];
            $jsonfile = array("fileName" => $fileName) + json_decode($file, true);
            array_push($deviceList, $jsonfile);
        }
        new TableGenerator($deviceList, $path);
    }

    public
    function addDevice()
    {


    }

    public
    function editDevice()
    {

    }

    public
    function removeDevice()
    {

    }

}