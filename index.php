<?php

include 'Router.php';
include "config.php";

$url = $_SERVER['REQUEST_URI'];

//echo __DIR__;
$router = new Router($url);
$router->get("post", __DIR__ . "/templates/post.php");
$router->get("about", __DIR__ . "/templates/about.php");
$router->get("footer", __DIR__ . "/templates/footer.php");
$router->get("404", __DIR__ . "/templates/404.php");
$router->get("index", __DIR__ . "/main.php");



$router->get("lcd", DIR_IOTLIB . "/LCD/lcd.php");
$router->get("443", DIR_IOTLIB . "/443/443.php");
$router->get("DHT22", DIR_IOTLIB . "/DHT22/Dht22.php");
$router->get("camera", DIR_IOTLIB . "/FOTO-RPI/camera.php");
$router->get("GPIO", DIR_IOTLIB . "/GPIO/GPIO.php");



$router->get("777", __DIR__ . "/systemServices/777/Chmod777.php");

require "templates/404.php";