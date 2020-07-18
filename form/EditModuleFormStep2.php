<?php

namespace main;
require "moduleOperation/FileOperation.php";

//require "fileOperation/FileSearch.php";


class EditModuleFormStep2
{
    /**
     * EditModuleFormStep2 constructor.
     * @param $mainDir
     * @param $moduleName
     * @param $boxName
     * @param $scriptName
     * @param $boxContentPath
     * @param $scriptContentPath
     * @param $boxBackground
     */

    public function __construct($mainDir, $moduleName, $boxName, $scriptName, $boxContentPath,
                                $scriptContentPath, $boxBackground)
    {
        $boxContent = "";
        if ($boxContentPath !== "boxContentPath") {
            $file = fopen($boxContentPath, "r");
            while (!feof($file)) {
                $boxContent = $boxContent . fgets($file);
            }
            fclose($file);
        } else {
            $boxContent = "uzupełnij boxa";
        }

        $scriptContent = "";
        if ($scriptContentPath !== "scriptContentPath") {
            if (file_exists($scriptContentPath)) {
                $file = fopen($_POST["scriptContentPath"], "r");
                while (!feof($file)) {
                    $scriptContent = $scriptContent . fgets($file);
                }
                fclose($file);
            }
        } else {
            $scriptContent = "uzupełnij skrypt";
        }

        $type = ["jpg", "png"];
        new FileSearch('/home/pi/www/img', $type);
        $fileSelect = "";
        foreach (FileSearch::getFinalList() as $file) {
            $fileSelect = $fileSelect . '<option value="' . $file . '">' . $file . '</option>';

        }


        echo <<<HTML
        <div class="box" style="width: 650px; height: auto; margin: 10px">
            <div class="text">
            $boxBackground
                <form action="index.php" method="post">
                    <br>
                    <input type="hidden" name="mainDir" value="$mainDir"/>
                    moduleName: <input type="text" name="moduleName" value="$moduleName"/>
                    <input type="hidden" name="oldModuleName" value="$moduleName"/>
                    boxName: <input type="text" name="boxName" value="$boxName"/><br>
                    <input type="hidden" name="oldBoxName" value="$boxName"/>
                    boxContentPath: <br><textarea rows="20" cols="80" name="boxContent">
                    $boxContent
                    </textarea><br>
                    <br><textarea hidden rows="20" cols="80" name="oldBoxContent">
                    $boxContent
                    </textarea><br>
                    scriptName: <input type="text" name="scriptName" value="$scriptName"/><br>
                    <input type="hidden" name="oldScriptName" value="$scriptName"/><br>
                    scriptContentPath: <br><textarea rows="20" cols="80" name="scriptContent">
                    $scriptContent
                    </textarea><br>
                    <br><textarea hidden rows="20" cols="80" name="oldScriptContent">
                    $scriptContent
                    </textarea>
                    <input type="hidden" name="boxBackground" value="$boxBackground">
                    <input type="hidden" name="addModule" value="final">
                    
                     <select id="cars" name="cars">
                              $fileSelect             
                      </select>
                    
                    
                    <button type="submit">send</button>
                </form>
                <form action="index.php" method="post">
                    <input type="hidden" name="addModule" value="false"/>
                    <button type="submit" name="moduleName">anuluj</button>
                </form>
            </div>
        </div>
        HTML;
    }
}