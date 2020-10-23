<?php

namespace templates;

require_once "app/fileOperation/FileScan.php";

new MenuBar();

class MenuBar
{
    public function __construct()
    {
        $menuBar = new \File\FileScan("templates/menuBar");
        foreach ($menuBar->getAllFileList() as $menu) {
            include "templates/menuBar" . "/" . $menu;
        }
    }
}