<?php

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


        if(!isset($url[1])){
            require 'main.php';
            exit();
        }
        if ($url[1] == trim($route, "/")) {
            array_shift($url);
            require $file;
            exit();
        }

    }
}