<?php


namespace main;

require "Dht22.php";

new Insert();

class Insert
{
    public function __construct()
    {
        echo "1";
        $run = new Dht22();
        $run->addToDB();

    }


}