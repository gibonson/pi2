<?php

$lineToRemove = $_POST["lineToRemove"];
echo $lineToRemove . "<br>";


$myfile = fopen("/home/pi/www/calendar-old/calendar-old.txt", "r") or die("Unable to open file!");
$newContent = "";
$lineCounter = 0;


while (!feof($myfile)) {
    $lineCounter++;
    $line = fgets($myfile);
    if ($lineToRemove == $lineCounter) {
        echo "skip<br>";
        continue;
    }
    echo $line . "<br>";
    $newContent = $newContent . $line;
}
fclose($myfile);
echo "\n";
echo $newContent;
file_put_contents("/home/pi/www/calendar-old/calendar-old.txt", $newContent);
fclose($myfile);
header("Location: addEditRemoveEvent.php");




