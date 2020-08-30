<?php

include 'Router.php';
include "config.php";

$url = $_SERVER['REQUEST_URI'];

//echo __DIR__;
$router = new Router($url);
$router->get("footer", __DIR__ . "/templates/footer.php");
$router->get("404", __DIR__ . "/templates/404.php");
$router->get("index", __DIR__ . "/main.php");


$router->get("lcd", DIR_IOTLIB . "/LCD/lcd.php");
$router->get("443", DIR_IOTLIB . "/443/443.php");
$router->get("DHT22", DIR_IOTLIB . "/DHT22/Dht22.php");
$router->get("camera", DIR_IOTLIB . "/FOTO-RPI/camera.php");
$router->get("GPIO", DIR_IOTLIB . "/GPIO/GPIO.php");


$router->get("AddNewJsonStep2", DIR_TEMPLATES . "/form/AddNewJsonStep2.php");


$router->get("showCalendar", __DIR__ . "/calendar/ShowCalendar.php");
$router->get("CalendarOperation", __DIR__ . "/calendar/CalendarOperation.php");
$router->get("StartCalendar", __DIR__ . "/calendar/StartCalendar.php");
$router->get("StopCalendar", __DIR__ . "/calendar/StopCalendar.php");


$router->get("777", __DIR__ . "/fileOperation/Chmod777.php");
$router->get("DatabaseTest", __DIR__ . "/dataBase/DataBaseTest.php");
$router->get("AddData", __DIR__ . "/dataBase/AddData.php");


$router->get("IotDeviceList", __DIR__ . "/dataBase/IotDeviceList.php");


require "templates/404.php";