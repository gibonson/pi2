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
$router->get("433", DIR_IOTLIB . "/433/433.php");
$router->get("DHT22", DIR_IOTLIB . "/DHT22/Dht22.php");
$router->get("camera", DIR_IOTLIB . "/FOTO-RPI/camera.php");
$router->get("GPIO", DIR_IOTLIB . "/GPIO/GPIO.php");


$router->get("AddNewJsonStep2", DIR_TEMPLATES . "/form/AddNewJsonStep2.php");
$router->get("SaveJson", __DIR__ . "/src/SaveJson.php");


$router->get("showCalendar", __DIR__ . "/calendar/ShowCalendar.php");
$router->get("CalendarOperation", __DIR__ . "/calendar/CalendarOperation.php");


$router->get("777", __DIR__ . "/src/Chmod777.php");
$router->get("DatabaseTest", __DIR__ . "/dataBase/DataBaseTest.php");
$router->get("AddData", __DIR__ . "/dataBase/AddData.php");

$router->get("IotDeviceList", __DIR__ . "/dataBase/IotDeviceList.php");


$router->get("LCD_data", __DIR__ . "/LCD/LCD_DATA.php");
$router->get("LcdForm", __DIR__ . "/LCD/LcdForm.php");


$router->get("ProcessManager", __DIR__ . "/src/ProcessManager.php");



$router->get("DeviceList", __DIR__ . "/src/DeviceFileVAdER.php");





require "templates/404.php";