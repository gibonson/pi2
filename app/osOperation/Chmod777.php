<?php

namespace app;

new Chmod777();

class Chmod777
{
    function __construct()
    {
        $permissionCommand = "sudo chmod -R 777 " . "/home/pi/www/";
        exec($permissionCommand);
        header("Location: index");
    }
}