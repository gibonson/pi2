<?php
require_once "templates/MainPage.php";

class Router
{


    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function get($route, $file)
    {
        $url = trim($this->request, "/");
        $url = explode("/", $url);

        if (!isset($url[1])) {
            new \templates\MainPage("templates/MenuBar.php", "templates/EmptySite.php");
            exit();
        }
        if ($url[1] == $route) {
            array_shift($url);
            new \templates\MainPage("templates/MenuBar.php", $file);
            exit();
        }
    }
}
