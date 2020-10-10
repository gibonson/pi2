<?php

namespace main;

require_once "src/SessionVariables.php";


$session = new SessionVariables();
echo $session->getTest();
echo "wartosc posta: " . $_POST["test"];
//$session->setTest($_POST["test"]);

$GLOBALS["test"] = $_POST["test"];

class LcdForm
{
}

?>


<form action="LcdForm" method="post">
    <input name="test" value="test" type="text">
    <input type="submit">
</form>
