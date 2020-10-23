<?php


namespace templates;
require_once "app/fileOperation/FileScan.php";

use File\FileScan;

new AddDeviceForm();

class AddDeviceForm
{
    public function __construct()
    {
        $iotLibList = [];
        $sensorList = new FileScan("iotLibrary/sensorDevice");
        $executiveList = new FileScan("iotLibrary/executiveDevice");

        $iotListWithPath = [];
        foreach ($sensorList->getAllFileList() as $sensor) {
            array_push($iotListWithPath, "iotLibrary/sensorDevice/" . $sensor);
        }



        foreach ($executiveList->getAllFileList() as $executive) {
            array_push($iotListWithPath, "iotLibrary/executiveDevice/" . $executive);
        }


        $formList = "";

        foreach ($iotListWithPath as $lib) {
            $formList = $formList . '<option value="' . $lib . '">' . $lib . '</option>';
        }

        echo <<<HTML
    <form action="deviceAction" method="post" id="addDevice">
            <input type="hidden" name="path" value="userFiles/deviceList/">
            <input type="hidden" name="action" value="add">
            <table>
                <tr colspan="2">
                    Add device form:
                </tr>
                <tr>
                    <th>deviceName</th>
                    <th><input type="text" name="fileName" placeholder="deviceName"></th>
                </tr>
                <tr>
                    <th>deviceNameFull</th>
                    <th><input type="text" name="deviceNameFull" placeholder="deviceNameFull"></th>
                </tr>
                <tr>
                    <th>iotLib</th>
                    <th>
                        <select name="iotLib" id="iotLib" form="addDevice">
                            $formList;
                        </select>
                    </th>
                </tr>
                <tr>
                    <th colspan="2"><input type="submit" value="Add"></th>
                </tr>
            </table>
    </form>
HTML;
    }
}