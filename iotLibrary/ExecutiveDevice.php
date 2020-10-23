<?php

namespace iotLib;
use main\AddDataNew;

require_once "Device.php";
require_once "dataBase/AddDataNew.php";

abstract class ExecutiveDevice extends Device
{
    abstract function execute();
}