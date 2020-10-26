<?php

namespace templates;

use File\FileScan;

new AddReaderForm();

class AddReaderForm
{
    public function __construct()
    {
        $libList = new FileScan("iotLibrary/sensorDevice");

        $formList = "";
        foreach ($libList->getAllFileList() as $executive) {
            array_push($iotListWithPath, "iotLibrary/sensorDevice/" . $executive);
            $formList = $formList . '<option value="iotLibrary/sensorDevice/' . $executive . '">iotLibrary/sensorDevice/' . $executive . '</option>';
        }


        echo <<<HTML
    <form action="readerAction" method="post">
            <input type="hidden" name="formStep" value="formStep2">
            <table>
                <tr colspan="2">
                    Add sensor:
                </tr>
                <tr>
                    <th>Sensor lib</th>
                    <th>
                        <select name="iotLib" id="iotLib">
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