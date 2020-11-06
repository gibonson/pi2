<?php


namespace main;


class AddNewJson
{
    public function __construct($name, $file, $edit = null)
    {
        if (isset($edit)) {
            $style = "background:grey; cursor:pointer";
            $submitName = "Edit BOX";
        } else {
            $name = $name . "13.json";
            $submitName = $name;
            $style = "cursor:pointer";
        }

        echo <<<HTML
<form action="index" method="post">
<input type="hidden" name="file" value="$file">
<input type="hidden" name="name" value="$name">
<input type="hidden" name="indexSwitch" value="AddNewJsonBox">
<a type="submit" onclick="this.closest('form').submit();return false;" style="$style">$submitName</a>
</form>
HTML;


    }
}