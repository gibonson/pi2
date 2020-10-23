<?php

namespace templates;

class TableGenerator
{
    public function __construct(array $arrayData, string $path, string $actionForm = null)
    {
        $columnNames = [];
        $rows = [];
        $singleRow = [];

        foreach ($arrayData as $arrayRow) {
            foreach ($arrayRow as $item => $value) {
                if (!in_array($item, $columnNames)) {
                    array_push($columnNames, $item);
                }
            }
        }
//            print_r($columnNames);
        foreach ($arrayData as $arrayRow) {
            foreach ($columnNames as $singleColumnName) {
                if (array_key_exists($singleColumnName, $arrayRow)) {
                    array_push($singleRow, $arrayRow[$singleColumnName]);
                } else {
                    array_push($singleRow, "x");
                }
            }
//            print_r($singleRow);
            array_push($rows, $singleRow);
            unset($singleRow);
            $singleRow = [];
        }
        echo "
<table style='width:80%' border='1'>
  <tr>
  <td colspan='";
        echo count($columnNames) + 2;
        echo "'>$path</td>
  </tr>
  <tr>
    <td>Lp</td>";
        $titleTables = "";
        foreach ($columnNames as $singleColumnName) {
            $titleTables = $titleTables . "<td>" . $singleColumnName . "</td>";
        }
        echo $titleTables;

        echo "
  </tr>";
        $lp = 0;
        foreach ($rows as $singleRow) {
            $lp++;
            echo "<tr><td>" . $lp . "</td>";
            $rows = "";
            foreach ($singleRow as $singleValue) {
                if (gettype($singleValue) == "array") {
                    $singleValue = "table";
                }
                $rows = $rows . "<td>" . $singleValue . "</td>";
            }
            echo $rows;
            if (isset($actionForm)) {
                echo "<td>
<form action='$actionForm' method='post'>
<input type='hidden' name='path' value='$path'>
<input type='hidden' name='fileName' value='$singleRow[0]'>
<input type='submit' name='action' value='edit'>
<input type='submit' name='action' value='remove'>
</form>
</td>";
            }
            echo "</tr>";
        }
        echo " 
  </table> 
";
    }
}