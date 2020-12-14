<?php

namespace iotLib;

require_once "Device.php";

abstract class ExecutiveDevice extends Device
{
    abstract function execute();
}