<?php
include 'Router.php';
include 'config.php';

$url = $_SERVER['REQUEST_URI'];
$router = new Router($url);

$log = new \app\log\LogAction();

//form
$router->get("eventAction", "app/form/EventAction.php", $log);
$router->get("readerAction", "app/form/ReaderAction.php", $log);
$router->get("packAction", "app/form/PackAction.php", $log);
$router->get("logicAction", "app/form/LogicAction.php", $log);


//os function
$router->get("777", "app/osOperation/Chmod777.php", $log);

//app function
$router->get("logAction", "app/log/LogAction.php");
$router->get("eventController", "app/EventController.php");
$router->get("packController", "app/PackController.php");

//content
$router->get("index", "templates/content/MainContent.php", $log);
$router->get("tables", "templates/content/Tables.php", $log);

//404
new \templates\MainPage("templates/MenuBar.php", "templates/404.php");