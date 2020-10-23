<?php
include 'Router.php';
include 'config.php';

$url = $_SERVER['REQUEST_URI'];
$router = new Router($url);

$router->get("deviceAction", "app/form/DeviceAction.php");
$router->get("eventAction", "app/form/EventAction.php");
$router->get("777", "app/osOperation/Chmod777.php");
$router->get("index", "templates/EmptySite.php");

new \templates\MainPage("templates/MenuBar.php", "templates/404.php");