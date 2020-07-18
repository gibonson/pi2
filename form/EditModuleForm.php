<?php

namespace main;


class EditModuleForm
{
    /**
     * EditModuleForm constructor.
     * @param $moduleName
     * @param $boxName
     * @param $boxContentPath
     * @param $scriptName
     * @param $scriptContentPath
     * @param $boxBackground
     */
    public function __construct($moduleName, $boxName, $boxContentPath, $scriptName, $scriptContentPath, $boxBackground)
    {
        echo <<<HTML
             <form action="index.php" method="post">
                  <input type="hidden" name="moduleName" value="$moduleName"/>
                  <input type="hidden" name="boxName" value="$boxName"/>
                  <input type="hidden" name="boxContentPath" value="$boxContentPath"/>
                  <input type="hidden" name="scriptName" value="$scriptName"/>
                  <input type="hidden" name="scriptContentPath" value="$scriptContentPath"/>
                  <input type="hidden" name="boxBackground" value="$boxBackground"/>
                  <input type="hidden" name="addModule" value="true"/>
                  <button type="submit">edit</button>
             </form>
        HTML;
    }
}
