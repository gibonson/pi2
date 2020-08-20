<?php

namespace main;

class DataBaseTest
{
    public function __construct()
    {
        $servername = "localhost";
        $username = "user";
        $password = "user";
        $conn = mysqli_connect($servername, $username, $password);

        if (!$conn) {
            echo '<img src="/icon/icon-database-close-512.png" alt="failed" style="width:40px;height:40px;   -webkit-filter: invert(1);
   filter: invert(1);">';
            echo "Connection failed: " . mysqli_connect_error();
        } else {
            echo '<img src="webResources/icon/icon-database-check-512.png" alt="ok" style="width:40px;height:40px;   -webkit-filter: invert(1);
   filter: invert(1);">';
        }
    }
}