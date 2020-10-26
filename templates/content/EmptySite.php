<?php

use iotLib\CPUTemp\MainLib;

require_once "iotLibrary/sensorDevice/CpuTemp/MainLib.php";
require_once "app/fileOperation/FileScan.php";
require_once "app/EventExe.php";
require_once "app/ReaderExe.php";
require_once "templates/MainPage.php";

echo "<br>";
echo "<br>";

//$test = new MainLib("test", "testfull", "10");
//$test->setResults();
//print_r($test->getResults());

$file = file_get_contents("userFiles/reader/dht22.json", "r");
$reader = array("fileName" => "123.json") + json_decode($file, true);
echo "<br>";
new \app\ReaderExe($reader);

$file = file_get_contents("userFiles/reader/123.json", "r");
$reader = array("fileName" => "123.json") + json_decode($file, true);
echo "<br>";
echo "<br>";

echo "<br>";
echo "<br>";


new \app\ReaderExe($reader);
//$test2 = new \DHT22\MainLib("test", "testfull", "10", "CPUTemp", 'builtin');
//$test2->setResults();
//print_r($test2->getResults());


//$test3 = new \FOTORPI\MainLib("test", "testfull", "10", "CPUTemp", 'builtin');
//$test3->setResults();
//print_r($test3->getResults());

echo "<br>";

//$test6 = new \Socket433\MainLib("test", "testfull", "10", "CPUTemp", 'GPIO', [4433, 5201, 5393]);
//$test6->execute();
?>
