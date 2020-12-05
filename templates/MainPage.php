<?php


namespace templates;


use templates\form\LogForm;

class MainPage
{
    public function __construct($menuBar, $content, $log = null)
    {
        echo <<<HTML
<html>
<head>
    <meta charset="UTF-8">
    <title>SmartPI</title>
    <link rel="stylesheet" type="text/css" href="webResources/css/style.css">
    <link rel="stylesheet" type="text/css" href="webResources/css/style_button.css">
    <link rel="stylesheet" type="text/css" href="webResources/css/style_link.css">
    <link rel="icon" href="webResources/icon/icon-RPi-Logo.png">
</head>

<body>
<header class="header">
HTML;
require_once $menuBar;
echo <<<HTML
</header>
<section>
HTML;
        require_once $content;
        echo <<<HTML
</section>
HTML;
        echo $log;
//        new LogForm($_SESSION["logData"]);
        echo <<<HTML
<footer>
HTML;
        echo date('Y-m-d H:i:s');
        echo <<<HTML
     Jakub Palica &copy; copyright 1410
</footer>
</body>
</html>
HTML;
    }
}

