<?php


namespace main;


class EditModuleFormStep3
{


    public function __construct($mainDir, $oldModuleName, $moduleName, $oldBoxName, $boxName, $oldBoxContent, $boxContent,
                                $oldScriptName, $scriptName, $oldScriptContent, $scriptContent, $boxBackground)
    {

        echo <<<HTML
        <div class="box" style="width: auto; height: auto; margin: 10px">
            <div class="text" style="margin: 10px">
            $boxBackground
                <table style="width:100%; border: 1px solid red" >
                    <tr>
                        <th>opis</th>
                        <th>stara wersja</th>
                        <th>nowa wersja</th>
                    </tr>
                    <tr>
                        <td>moduleName</td>
                        <td>$oldModuleName</td>
                        <td>$moduleName</td>
                    </tr>
                    <tr>
                        <td>boxName</td>
                        <td>$oldBoxName</td>
                        <td>$boxName</td>
                    </tr>
                    <tr>
                        <td>boxContetn</td>
                        <td><TEXTAREA readonly rows="10" cols="50">
                        $oldBoxContent
                        </TEXTAREA></td>
                        <td><TEXTAREA readonly rows="10" cols="50">
                        $boxContent
                        </TEXTAREA></td>
                    </tr>
                    <tr>
                        <td>scriptName</td>
                        <td>$oldScriptName</td>
                        <td>$scriptName</td>
                    </tr>
                    <tr>
                        <td>scriptContent</td>
                        <td><TEXTAREA readonly rows="10" cols="50">
                        $oldScriptContent
                        </TEXTAREA><br></td>
                        <td><TEXTAREA readonly rows="10" cols="50">
                        $scriptContent
                        </TEXTAREA><br></td>
                    </tr>
                </table>
                <a href="index.php">home</a>
            </div>
        </div>
        HTML;


        $fileOperation = new FileOperation();

        $boxBackground = str_replace("userModules/" . $moduleName . "/", "", $boxBackground);
        echo $boxBackground;

        echo $fileOperation->createDir($mainDir, $moduleName, $boxBackground);
        echo $fileOperation->createBox($mainDir, $moduleName, $boxName, $boxContent);
        echo $fileOperation->createScript($mainDir, $moduleName, $scriptName, $scriptContent);
    }


}