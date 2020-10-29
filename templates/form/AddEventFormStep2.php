<?php

namespace templates;

require_once "app/form/GetNextID.php";

use app\form\GetNextID;
use File\FileScan;

new AddEventFormStep2();

class AddEventFormStep2
{
    public function __construct()
    {
        $iotLib = $_POST["iotLib"];

        if (file_exists($iotLib . "/parameters.php")) {
            $parameter = file_get_contents($iotLib . "/parameters.php", "r");
        } else {
            $parameter = "no parameters";
        }

        $background = new FileScan("userFiles/img");
        $background = $background->getAllFileList();
        $backgroundList = "";
        foreach ($background as $backgroundFile) {
            $backgroundList = $backgroundList . '<option value="' . $backgroundFile . '">' . $backgroundFile . '</option>';
        }


        $nextID = new GetNextID();
        $nextID = $nextID->getNextID();
        echo <<<HTML
    <form action="eventAction" method="post">
            <input type="hidden" name="formStep" value="formStep3">
            <input type="hidden" name="iotLib" value="$iotLib">
            
            <table>
                <tr colspan="2">
                    Add event parameter:
                </tr>
                <tr>
                    <th>eventName</th>
                    <th><input type="text" name="fileName" placeholder="eventName"></th>
                </tr>
                <tr>
                    <th>eventNameFull</th>
                    <th><input type="text" name="eventNameFull" placeholder="eventNameFull"></th>
                </tr>
                <tr>
                    <th>eventID</th>
                    <th><input type="number" name="eventID" placeholder="$nextID"></th>
                </tr>
                <tr>
                    <th>boxBackground</th>
                    <th>
                        <select name="boxBackground">
                            $backgroundList;
                        </select>
                    </th>
                </tr>
                <tr>
                    <th>event Description</th>
	                <th><textarea name="description" cols="50" rows="5">event description</textarea></th>
	            </tr>
                <tr>
                    <th>Parameter</th>
	                <th>$parameter</th>
	            </tr>
                <tr>
                    <th colspan="2"><input type="submit" value="Add"></th>
                </tr>
            </table>
    </form>
HTML;

    }


}