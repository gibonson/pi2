<?php

namespace main;
require "src/FileScan.php";

$list = new DeviceFileVAdER();
$list->viewDevice();


class DeviceFileVAdER
{


    public function viewDevice()
    {
        $fileList = new FileScan("/home/pi/www/userFiles/deviceList");

        $deviceList = [];
        foreach ($fileList->getFileList() as $file) {

            $file = file_get_contents("/home/pi/www/userFiles/deviceList/" . $file, "r");

            $file = json_decode($file, true);

            echo $file["iotLib"];
            echo "<br>";

//            array_push($deviceList, $file);

        }
//
//        foreach ($deviceList as $device) {
//            echo $device;
//
//        }
//        echo "<table border='1'><tr><th>deviceNameFull</th><th>deviceNameShort</th><th>iotLib</th><th>deviceID</th></tr>";


    }

    public function addDevice()
    {

    }

    public function editDevice()
    {

    }

    public function removeDevice()
    {

    }

}