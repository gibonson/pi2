<?php

namespace templates;

require_once "app/fileOperation/FileScan.php";

use File\FileScan;

new AddEventForm();

class AddEventForm
{
    public function __construct()
    {
        $deviceList = new FileScan("userFiles/deviceList");
        $deviceList = $deviceList->getAllFileList();
        $formList = "";
        foreach ($deviceList as $device) {
            $formList = $formList . '<option value="' . $device . '">' . $device . '</option>';
        }

        echo <<<HTML
    <form action="eventAction" method="post">
            <input type="hidden" name="formStep" value="formStep2">
            <table>
                <tr colspan="2">
                    Add event form:
                </tr>
                <tr>
                    <th>device</th>
                    <th>
                        <select name="device" id="device">
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