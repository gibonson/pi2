<?php


namespace main;

include "config.php";


new AddData("czujnik3","data3");

class AddData
{
    public function __construct(string $sensorId, string $data)
    {
        $conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSOWD, DATABASE_NAME);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO TestTable (TestTableSensor, TestTableData)
VALUES ('$sensorId', '$data')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


    }


}