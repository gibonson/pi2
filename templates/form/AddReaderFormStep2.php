<?php

namespace templates;

use File\FileScan;

new AddReaderFormStep2();

class AddReaderFormStep2
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

        echo <<<HTML
    <form action="readerAction" method="post">
            <input type="hidden" name="formStep" value="formStep3">
            <input type="hidden" name="iotLib" value="$iotLib">
            
            <table>
                <tr colspan="2">
                    Add reader parameter:
                </tr>
                <tr>
                    <th>readerName</th>
                    <th><input type="text" name="fileName" placeholder="readerName"></th>
                </tr>
                <tr>
                    <th>readerNameFull</th>
                    <th><input type="text" name="readerNameFull" placeholder="readerNameFull"></th>
                </tr>
                <tr>
                    <th>readerID</th>
                    <th><input type="number" name="readerID" placeholder="readerID"></th>
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
                    <th>readerDescription</th>
	                <th><textarea name="description" cols="50" rows="5">reader description</textarea></th>
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