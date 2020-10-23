<?php


namespace templates;


class MainPage
{
    public function __construct($menuBar, $content)
    {
        echo <<<HTML
<html>
<head>
    <meta charset="UTF-8">
    <title>SmartPI</title>
    <link rel="stylesheet" type="text/css" href="webResources/css/style.css">
    <link rel="stylesheet" type="text/css" href="webResources/css/style_button.css">
    <link rel="stylesheet" type="text/css" href="webResources/css/style_link.css">
    <link rel="stylesheet" type="text/css" href="webResources/css/nav.css">
    <link rel="icon" href="webResources/icon/icon-RPi-Logo.png">
</head>

<body>
<header class="header">
    <ul>

HTML;
        require_once $menuBar;
        echo <<<HTML
    </ul>
</header>
<section>
HTML;
        require_once $content;
        echo <<<HTML
</section>
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

