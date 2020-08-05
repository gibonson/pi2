<?php


$time = $_POST["date"];
$command = $_POST["command"];


echo $lineToAdd = "\n" . $time . ">" . $command;

$myfile = fopen("/home/pi/www/calendar-old/calendar-old.txt", "a+") or die("Unable to open file!");

fwrite($myfile, $lineToAdd);
fclose($myfile);


header("Location: addEditRemoveEvent.php");

