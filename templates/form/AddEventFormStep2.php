<?php


namespace templates;

use File\FileScan;

new AddEventFormStep2();


class AddEventFormStep2
{
    public function __construct()
    {

        $device = $_POST["device"];

        $deviceFile = file_get_contents("userFiles/deviceList/" . $_POST["device"], "r");
        $deviceJson = json_decode($deviceFile, true);


        if (file_exists($deviceJson["iotLib"] . "/parameters.php")) {
            $parameter = file_get_contents($deviceJson["iotLib"] . "/parameters.php", "r");
        } else {
            $parameter = "no parameters";
        }

        echo <<<HTML
    <form action="eventAction" method="post">
            <input type="hidden" name="formStep" value="formStep3">
            <input type="hidden" name="device" value="$device">
            
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
                    <th><input type="number" name="eventID" placeholder=""></th>
                </tr>
                <tr>
                    <th>eventDescription</th>
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