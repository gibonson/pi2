<?php


namespace main;


class AddNewJson
{
    public function __construct($name, $file)
    {
        echo <<<HTML
<form action="index" method="post">
<input type="hidden" name="file" value="$file">
<input type="hidden" name="name" value="$name">
<input type="hidden" name="AddNewJsonBox" value="true">
<a type="submit" onclick="this.closest('form').submit();return false;" style="cursor:pointer">$name</a>
</form>
HTML;


    }
}