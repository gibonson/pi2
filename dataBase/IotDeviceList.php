<?php


namespace main;

use mysqli;

include "config.php";


class IotDeviceList
{
    public $idDevice;
    public $description;

    public function viewDevice()
    {

        $conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSOWD, DATABASE_NAME);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT idDevice, description FROM IotDeviceList";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "IdDevice: " . $row["idDevice"] . " - Description: " . $row["description"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();


    }

    public function addDevice()
    {

    }

    public function removeDevice()
    {

    }

    public function editDevice()
    {

    }


}