<?php

namespace templates;

use File\FileScan;

new AddEventForm();

class AddEventForm
{
    public function __construct()
    {
        $libList = new FileScan("iotLibrary/executiveDevice");

        $formList = "";
        foreach ($libList->getAllFileList() as $executive) {
            array_push($iotListWithPath, "iotLibrary/executiveDevice/" . $executive);
            $formList = $formList . '<option value="iotLibrary/executiveDevice/' . $executive . '">iotLibrary/executiveDevice/' . $executive . '</option>';
        }


        echo <<<HTML
    <form action="eventAction" method="post">
            <input type="hidden" name="formStep" value="formStep2">
            <table>
                <tr>
                <th colspan="2">
                    Add event:
                </th>
                </tr>
                <tr>
                    <th>Executive lib</th>
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