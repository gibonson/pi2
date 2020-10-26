<?php


namespace main;

require "Dht22.php";

new Insert();

class Insert
{
    public function __construct()
    {
        $run = new Dht22();
        $run->addToDB();
    }
}