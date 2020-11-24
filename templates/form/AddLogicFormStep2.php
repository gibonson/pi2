<?php


namespace templates\form;

require_once "app/form/GetNextID.php";


use app\form\GetNextID;
use File\FileScan;

new AddLogicFormStep2();

class AddLogicFormStep2
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
        $nextID = $nextID->getNextID("logic");

        $eventList = new FileScan("userFiles/event");

        $formList = "";

        foreach ($eventList->getAllFileList() as $executive) {
            $formList = $formList . '<option value="' . $executive . '">' . $executive . '</option>';
        }



        echo <<<HTML
    <form action="logicAction" method="post">
            <input type="hidden" name="formStep" value="formStep3">
            <input type="hidden" name="iotLib" value="$iotLib">
            
            <table>
                <tr colspan="2">
                    Add logic parameter:
                </tr>
                <tr>
                    <th>logicName</th>
                    <th><input type="text" name="fileName" placeholder="logicName"></th>
                </tr>
                <tr>
                    <th>logicNameFull</th>
                    <th><input type="text" name="logicNameFull" placeholder="logicNameFull"></th>
                </tr>
                <tr>
                    <th>logicID</th>
                    <th><input type="hidden" name="logicID" value="$nextID">$nextID</th>
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
                    <th>logicDescription</th>
	                <th><textarea name="description" cols="50" rows="5">logic description</textarea></th>
	            </tr>
                <tr>
                    <th>Parameter</th>
	                <th>$parameter</th>
	            </tr>
	            <tr>
	                <th>condition</th>
	                <th>
	                <select name="condition">
                      <option value="equal">equal</option>
                      <option value="smaller">smaller</option>
                      <option value="bigger">bigger</option>
                      <option value="different">different</option>
                    </select>
                    </th>
                </tr>
                <tr>
                    <th>value</th>
                    <th><input type="number" name="value"></th>
                </tr>
                <tr>
                    <th>if true</th>
                    <th>                        
                        <select name="ifTrueEvents[]" multiple="multiple" size ="10">
                        $formList
                        </select>
                    </th>
                </tr>
	            <tr>
                    <th>if false</th>
                    <th>                        
                        <select name="ifFalseEvents[]" multiple="multiple" size ="10">
                        $formList
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