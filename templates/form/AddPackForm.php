<?php


namespace templates\form;


use File\FileScan;


new AddPackForm();

class AddPackForm
{

    public function __construct()
    {

        $libList = new FileScan("userFiles/event");

        $formList = "";

        foreach ($libList->getAllFileList() as $executive) {
            $formList = $formList . '<option value="' . $executive . '">' . $executive . '</option>';
        }

        echo <<<HTML
    <form action="packAction" method="post">
    <input type="hidden" name="formStep" value="formStep">
            <table>
                <tr colspan="2">
                    Add eventPack:
                </tr>
                <tr>
                    <th>packName</th>
                    <th><input type="text" name="packName"></th>
                </tr>
                <tr>
                    <th>boxBackground</th>
                    <th>
                        <input type="hidden" name="boxBackground" value="programowanie.jpg">programowanie.jpg
                    </th>
                </tr>
                <tr>
                    <th>description</th>
                    <th><textarea name="description" cols="50" rows="5">events description</textarea></th>
                </tr>
                <tr>
                    <th>Executive lib</th>
                    <th>
                        <select name="events[]" multiple="multiple" size ="10">
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