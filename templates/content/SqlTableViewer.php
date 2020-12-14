<?php


namespace templates\content;

use app\dataBase\TableView;

require_once "app/dataBase/TableView.php";


new SqlTableViewer();

class SqlTableViewer
{
    public function __construct()
    {
        echo <<<HTML
    <form action="SqlTableViewer" method="post">
            <table>
                <tr>
                <th colspan="2">Table parameter:</th>                
                </tr>
                <tr>
                    <th>type</th>
                    <th>
                        <select name="type">
                            <option value="CPU temperature[stC]|1|rpiCpuTemp">id 1 rpiCpuTemp</option>
                            <option value="temperature[stC]|2|temp">id 2 temp</option>
                            <option value="humidity[%]|2|humid">id 2 humid</option>
                        </select>
                    </th>
                </tr>
                <tr>
                    <th>range</th>
                    <th><input type="number" name="range" value="24"></th>
                </tr>
               
                <tr>
                    <th colspan="2"><input type="submit" value="Show"></th>
                </tr>
            </table>
    </form>
HTML;

        if (isset($_POST["type"])) {
            $type = explode("|", $_POST["type"]);
            $tableName = $type[0];
            $idDevice = $type[1];
            $type = $type[2];
            setcookie("type", $_POST["type"], time() + (86400), "/");
        } elseif (isset($_COOKIE["type"])) {
            $type = explode("|", $_COOKIE["type"]);
            $tableName = $type[0];
            $idDevice = $type[1];
            $type = $type[2];
        } else {
            $tableName = "CPU temperature[stC]";
            $idDevice = 1;
            $type = "rpiCpuTemp";
        }
        if (isset($_POST["range"])) {
            $range = $_POST["range"];
            setcookie("range", $_POST["range"], time() + (86400), "/");
        } elseif (isset($_COOKIE["type"])) {
            $range = $_COOKIE["range"];
        } else {
            $range = 24;
        }

        echo "<br>";
        new TableView($tableName, $idDevice, $type, $range);

    }


}