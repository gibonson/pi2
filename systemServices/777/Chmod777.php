<?php


if (isset($_GET['777'])) {
    new Chmod777();
} else {
    header("Location: ../../index.php");
}


class Chmod777
{
    function __construct()
    {
        echo "test";
        $permissionCommand = "sudo chmod -R 777 " . "/home/pi/www/";
        exec($permissionCommand);
        header("Location: ../../index.php");
    }
}


