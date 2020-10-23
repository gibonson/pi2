<?php


namespace main;

include_once "/home/pi/www/config.php";


class AddData
{
    public function __construct(string $id_Device, string $value)
    {
        $conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSOWD, DATABASE_NAME);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


//        $time = date('Y-m-d H:i:s');
        $time = date('Y-m-d H:i:s');

        $sql = "INSERT INTO IOT_measurement (id_Device, time ,value)
VALUES ('$id_Device', '$time' , '$value')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


    }


}