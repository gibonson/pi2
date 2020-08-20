<?php

namespace main;


class AddEditServiceForm
{

    public function __construct($servisName, $boxName, $boxContent, $iotLibraries, $boxBackground, $buttonText)
    {

        if($buttonText == "Edit"){
            $submit = '<button type="submit" class="small_button">Edit</button>';
        } else {
            $submit = '<a type="submit" onclick="this.closest(\'form\').submit();return false;" style="cursor:pointer">'.$buttonText.'</a>';
        }

        echo <<<HTML
             <form action="post.php" method="post">
                  <input type="hidden" name="ServiceName" value="$servisName"/>
                  <input type="hidden" name="boxName" value="$boxName"/>
                  <input type="hidden" name="boxContent" value="$boxContent"/>
                  <input type="hidden" name="iotLibraries" value="$iotLibraries"/>
                  <input type="hidden" name="boxBackground" value="$boxBackground"/>
                  <input type="hidden" name="form" value="addFormStep1"/>
                  $submit
             </form>
        HTML;
    }
}
