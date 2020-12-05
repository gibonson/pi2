<?php


namespace app\dataBase;

use mysqli;

include_once "config.php";

new TableView("measurement");
echo "<br>";
new TableView("events");


class TableView
{
    public function __construct(string $tableName)
    {
        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSOWD, DATABASE_NAME);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM " . $tableName;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><td colspan='100%'";
            echo "<h1>$tableName</h1></td>";
            $columnName = [];
            while ($row = $result->fetch_assoc()) {
                if (empty($columnName)) {
                    echo "<tr>";
                    foreach ($row as $item => $value) {
                        array_push($columnName, $item);
                        echo "<th>" . $item . "</th >";
                    }
                    echo "</tr>";
                }
                echo "<tr>";
                foreach ($columnName as $column) {
                    echo "<th>";
                    echo $row[$column];
                    echo "</th>";
                }
            }
            echo "</table>";
            echo "<br>";
        } else {
            echo "Empty table";
        }
        $conn->close();
    }
}