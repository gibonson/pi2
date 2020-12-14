<?php


namespace app\dataBase;

use mysqli;

include_once "config.php";

class TableView
{
    public function __construct(string $tableName, $idDevice, $type, $range)
    {


        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSOWD, DATABASE_NAME);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $date = date("Y/m/d H:i:s");
        $date = date("Y/m/d H:i:s", strtotime($date) + 60 * 60);
        echo "<table>";
        echo "<tr><th colspan='100%'";
        echo "<h1>$tableName</h1></th></tr>";
        echo "<br>";

        for ($i = $range; $i > 0; $i--) {
            echo "<tr>";
            echo "<th>";
            $date = date("Y/m/d H:i:s", strtotime($date) - 60 * 60);
            echo date("m/d H:", strtotime($date)) . "00";

            $year = date("Y", strtotime($date));
            $month = date("m", strtotime($date));
            $day = date("d", strtotime($date));
            $hour = date("H", strtotime($date));

            $sql = "SELECT AVG(result) FROM measurement 
                            where id_device = '$idDevice' and type = '$type' 
                            and year(date) = '$year' 
                            and month(date) = '$month' 
                            and day(date) = '$day'
                            and hour(date) = '$hour' 
                            ;";
            $result2 = $conn->query($sql);
            echo "</th><th>" . $result2->fetch_assoc()["AVG(result)"] . "</tr>";
            echo "</th>";

        }
        echo "</table>";
//        $sql = "SELECT * FROM " . $tableName . " where id_device = '2' and type = 'humid' limit 20";
//        $result = $conn->query($sql);
//        if ($result->num_rows > 0) {
//            echo "<table>";
//            echo "<tr><th colspan='100%'";
//            echo "<h1>$tableName</h1></th>";
//            $columnName = [];
//            while ($row = $result->fetch_assoc()) {
//                if (empty($columnName)) {
//                    echo "<tr>";
//                    foreach ($row as $item => $value) {
//                        array_push($columnName, $item);
//                        echo "<th>" . $item . "</th >";
//                    }
//                    echo "</tr>";
//                }
//                echo "<tr>";
//                foreach ($columnName as $column) {
//                    echo "<th>";
//                    echo $row[$column];
//                    echo "</th>";
//                }
//            }
//            echo "</table>";
//            echo "<br>";
//        } else {
//            echo "Empty table";
//        }
        $conn->close();
    }
}