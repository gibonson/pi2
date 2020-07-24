<?php

namespace main;

class AddEditServiceFormStep2
{
    public function __construct($ServiceName, $boxName, $boxContent, $fileIotLibraries, $fileBackground)
    {
        echo $ServiceName;
        echo "<br>";
        echo $boxName;
        echo "<br>";
        echo "<br>";
        echo '<TEXTAREA readonly rows = "10" cols = "50" >' . $boxContent . '</TEXTAREA ></td >';
        echo "<br>";
        echo $fileIotLibraries;
        echo "<br>";
        echo $fileBackground;


        $addEditServie = new AddEditService();
        $addEditServie->addService($ServiceName, $boxName, $boxContent, $fileIotLibraries, $fileBackground);


    }
}


//        $boxContent = "";
//        if ($boxContentPath !== "boxContentPath") {
//            $file = fopen($boxContentPath, "r");
//            while (!feof($file)) {
//                $boxContent = $boxContent . fgets($file);
//            }
//            fclose($file);
//        } else {
//            $boxContent = "uzupełnij boxa";
//        }
//
//        $scriptContent = "";
//        if ($scriptContentPath !== "scriptContentPath") {
//            if (file_exists($scriptContentPath)) {
//                $file = fopen($_POST["scriptContentPath"], "r");
//                while (!feof($file)) {
//                    $scriptContent = $scriptContent . fgets($file);
//                }
//                fclose($file);
//            }
//        } else {
//            $scriptContent = "uzupełnij skrypt";
//        }
//
//        $type = ["jpg", "png"];
//        new FileSearch('/home/pi/www/img', $type);
//        $fileSelect = "";
//        foreach (FileSearch::getFinalList() as $file) {
//            $fileSelect = $fileSelect . '<option value="' . $file . '">' . $file . '</option>';
//
//        }
//
//
//        echo <<<HTML
//        <div class="box" style="width: 650px; height: auto; margin: 10px">
//            <div class="text">
//            $boxBackground
//                <form action="index.php" method="post">
//                    <br>
//                    <input type="hidden" name="mainDir" value="$mainDir"/>
//                    moduleName: <input type="text" name="moduleName" value="$moduleName"/>
//                    <input type="hidden" name="oldModuleName" value="$moduleName"/>
//                    boxName: <input type="text" name="boxName" value="$boxName"/><br>
//                    <input type="hidden" name="oldBoxName" value="$boxName"/>
//                    boxContentPath: <br><textarea rows="20" cols="80" name="boxContent">
//                    $boxContent
//                    </textarea><br>
//                    <br><textarea hidden rows="20" cols="80" name="oldBoxContent">
//                    $boxContent
//                    </textarea><br>
//                    scriptName: <input type="text" name="scriptName" value="$scriptName"/><br>
//                    <input type="hidden" name="oldScriptName" value="$scriptName"/><br>
//                    scriptContentPath: <br><textarea rows="20" cols="80" name="scriptContent">
//                    $scriptContent
//                    </textarea><br>
//                    <br><textarea hidden rows="20" cols="80" name="oldScriptContent">
//                    $scriptContent
//                    </textarea>
//                    <input type="hidden" name="boxBackground" value="$boxBackground">
//                    <input type="hidden" name="addModule" value="final">
//
//                     <select id="cars" name="cars">
//                              $fileSelect
//                      </select>
//
//
//                    <button type="submit">send</button>
//                </form>
//                <form action="index.php" method="post">
//                    <input type="hidden" name="addModule" value="false"/>
//                    <button type="submit" name="moduleName">anuluj</button>
//                </form>
//            </div>
//        </div>
////        HTML;
//    }
//}
//
//<div class="box" style="width: auto; height: auto; margin: 10px">
//            <div class="text" style="margin: 10px">
//    $boxBackground
//                <table style="width:100%; border: 1px solid red" >
//                    <tr>
//                        <th>opis</th>
//                        <th>stara wersja</th>
//                        <th>nowa wersja</th>
//                    </tr>
//                    <tr>
//                        <td>moduleName</td>
//                        <td>$oldModuleName</td>
//                        <td>$moduleName</td>
//                    </tr>
//                    <tr>
//                        <td>boxName</td>
//                        <td>$oldBoxName</td>
//                        <td>$boxName</td>
//                    </tr>
//                    <tr>
//                        <td>boxContetn</td>
//                        <td><TEXTAREA readonly rows="10" cols="50">
//    $oldBoxContent
//                        </TEXTAREA></td>
//                        <td><TEXTAREA readonly rows="10" cols="50">
//    $boxContent
//                        </TEXTAREA></td>
//                    </tr>
//                    <tr>
//                        <td>scriptName</td>
//                        <td>$oldScriptName</td>
//                        <td>$scriptName</td>
//                    </tr>
//                    <tr>
//                        <td>scriptContent</td>
//                        <td><TEXTAREA readonly rows="10" cols="50">
//    $oldScriptContent
//                        </TEXTAREA><br></td>
//                        <td><TEXTAREA readonly rows="10" cols="50">
//    $scriptContent
//                        </TEXTAREA><br></td>
//                    </tr>
//                </table>
//                <a href="index.php">home</a>
//            </div>
//        </div>