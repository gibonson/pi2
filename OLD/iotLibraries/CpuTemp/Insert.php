<?php


namespace main;

require_once "CpuTemp.php";

new Insert();

class Insert
{
    public function __construct()
    {
        $run = new CpuTemp();
        $run->addToDB();
    }
}