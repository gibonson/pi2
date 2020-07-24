<?php

namespace main;


class EditServiceForm
{

    public function __construct($servisName, $boxName, $boxContentPath, $iotLibraries, $boxBackground)
    {
        echo <<<HTML
             <form action="index.php" method="post">
                  <input type="hidden" name="ServiceName" value="$servisName"/>
                  <input type="hidden" name="boxName" value="$boxName"/>
                  <input type="hidden" name="boxContentPath" value="$boxContentPath"/>
                  <input type="hidden" name="iotLibraries" value="$iotLibraries"/>
                  <input type="hidden" name="boxBackground" value="$boxBackground"/>
                  <input type="hidden" name="form" value="addFormStep1"/>
                  <button type="submit" class="small_button">Edit</button>
             </form>
        HTML;
    }
}
