<?php
require_once "templates/MainPage.php";
require_once "app/log/LogAction.php";

class Router
{
    private $request;


    public function __construct($request)
    {
        $this->request = $request;
    }

    public function get($route, $file, $log = null)
    {

        $url = trim($this->request, "/");
        $url = explode("/", $url);

        if (!isset($url[1])) {
            new \templates\MainPage("templates/MenuBar.php", "templates/content/EmptySite.php", $log);
            exit();
        }
        if ($url[1] == $route) {
            array_shift($url);
            new \templates\MainPage("templates/MenuBar.php", $file, $log);
            exit();
        }
    }
}
