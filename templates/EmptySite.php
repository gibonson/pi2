<?php


use app\EventExe;


require_once "templates/TableGenerator.php";

require_once "app/fileOperation/FileScan.php";
require_once "app/EventExe.php";

require_once "templates/MainPage.php";
echo "json";

$fullPath = "userFiles/event/gpio18on.json";

$file = null;
$myfile = file_get_contents($fullPath, "r");
print_r($myfile);

$myfile = json_decode($myfile,true);


echo "<br>";
echo "<br>";
echo "<br>";


new EventExe($myfile);



exit();


$list = new \File\FileScan("userFiles/deviceList", "json", true);
$deviceList = [];
foreach ($list->getSearchFileList() as $fileName) {
    $file = file_get_contents("userFiles/deviceList/" . $fileName, "r");
    $jsonfile = [];
    $jsonfile = array("fileName" => $fileName) + json_decode($file, true);
    array_push($deviceList, $jsonfile);
}
new \templates\TableGenerator($deviceList, "userFiles/deviceList", "deviceAction");

echo "<br>";

$list2 = new \File\FileScan("userFiles/event", "json", true);
$eventList2 = [];
foreach ($list2->getSearchFileList() as $fileName) {
    $file = file_get_contents("userFiles/event/" . $fileName, "r");
    $jsonfile = [];
    $jsonfile = array("fileName" => $fileName) + json_decode($file, true);
    array_push($eventList2, $jsonfile);
}
new \templates\TableGenerator($eventList2, "userFiles/event", "eventAction");


$test = new \CPUTemp\MainLib("test", "testfull", "10");
$test->setResults();
print_r($test->getResults());

echo "<br>";

$test5 = new \GpioStatus\MainLib("test", "testfull", "10", [13]);
$test5->setResults();
print_r($test5->getResults());

echo "<br>";
echo "<br>";
echo "<br>";

echo "<a href='deviceAction'>deviceAction</a>";
echo "<br>";
echo "<a href='eventAction'>eventAction</a>";


//$test2 = new \DHT22\MainLib("test", "testfull", "10", "CPUTemp", 'builtin');
//$test2->setResults();
//print_r($test2->getResults());

echo "<br>";

//$test3 = new \FOTORPI\MainLib("test", "testfull", "10", "CPUTemp", 'builtin');
//$test3->setResults();
//print_r($test3->getResults());

echo "<br>";

//$test4 = new \GPIO\MainLib("test", "testfull", "10", "CPUTemp", 'GPIO', [
//    "13" => "on",
//    "16" => "on",
//    "20" => "on",
//    "21" => "on"
//]);
//
//$test4->execute();
echo "<br>";

//$test6 = new \Socket433\MainLib("test", "testfull", "10", "CPUTemp", 'GPIO', [4433, 5201, 5393]);
//$test6->execute();
?>
