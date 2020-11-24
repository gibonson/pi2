<?php


namespace templates\form;

use File\FileScan;

new AddCalendarForm();


class AddCalendarForm
{

    public function __construct()
    {
        $eventList = new FileScan("userFiles/event");
        $eventFormList = "";
        foreach ($eventList->getAllFileList() as $executive) {
            $eventFormList = $eventFormList . '<option value="' . $executive . '">' . $executive . '</option>';
        }

        $readerList = new FileScan("userFiles/reader");
        $readerFormList = "";
        foreach ($readerList->getAllFileList() as $executive) {
            $readerFormList = $readerFormList . '<option value="' . $executive . '">' . $executive . '</option>';
        }

        $logicList = new FileScan("userFiles/logic");
        $logicFormList = "";
        foreach ($logicList->getAllFileList() as $executive) {
            $logicFormList = $logicFormList . '<option value="' . $executive . '">' . $executive . '</option>';
        }



        echo <<<HTML
    <form action="calendarAction" method="post">
    <input type="hidden" name="formStep" value="formStep">
            <table>
                <tr colspan="2">
                    Add calendar:
                </tr>
                <tr>
                    <th>calendarName</th>
                    <th><input type="text" name="calendarName"></th>
                </tr>
                <tr>
                    <th>time</th>
                    <th>
                        <input type="time" name="time">
                    </th>
                </tr>
                <tr>
                    <th>periodOfTime [s] </th>
                    <th>
                        <input type="number" name="periodOfTime" min="0" max="60" placeholder="0">
                    </th>
                </tr>
                <tr>
                    <th>eventsList</th>
                    <th>
                        <select name="eventsList[]" multiple="multiple" size ="10">
                            $eventFormList
                        </select>
                    </th>
                </tr>
                <tr>
                    <th>readerList</th>
                    <th>
                        <select name="readerList[]" multiple="multiple" size ="10">
                            $readerFormList
                        </select>
                    </th>
                </tr>
                <tr>
                    <th>logicList</th>
                    <th>
                        <select name="logicList[]" multiple="multiple" size ="10">
                            $logicFormList
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