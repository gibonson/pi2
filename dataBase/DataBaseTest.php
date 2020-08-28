<?php

namespace main;

include "config.php";


class DataBaseTest
{

    public $Status;

    public function __construct()
    {

        $conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSOWD, DATABASE_NAME);

        if (!$conn) {
            $this->Status = '<img src="webResources/icon/icon-database-error.png" alt="failed" style="width:40px;height:40px;   -webkit-filter: invert(1);
   filter: invert(1);">';
//            echo "Connection failed: " . mysqli_connect_error();
        } else {
            $this->Status = '<img src="webResources/icon/icon-database.png" alt="ok" style="width:40px;height:40px;   -webkit-filter: invert(1);
   filter: invert(1);">';
        }
    }

    public function __toString()
    {
        try {
            return (string)$this->Status;
        } catch (Exception $exception) {
            return '';
        }
    }

}