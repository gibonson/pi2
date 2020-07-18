<?php

use calendar\event;

require "event.php";

$eventList[] = null;
$myfile = fopen("/home/pi/www/calendar/calendar.txt", "r") or die("Unable to open file!");

while (!feof($myfile)) {
    $line = fgets($myfile);
    if($line != ""){
        $event = new event($line);
        array_push($eventList, $event);
        $event->getDate();
        $event->getDateFull();
        $event->getCommand();
    }

}
fclose($myfile);
echo "\n";


//print_r($eventList);
//unset($eventList[0]);
//print_r($eventList);
echo "<table border='1'>";
echo " <tr>
    <th> LP</th >
    <th> date</th >
    <th> command</th >
  </tr> ";
unset($eventList[0]);
$lp = 1;

foreach ($eventList as $value) {

    echo <<<HTML
     <tr>
         <form action="remove.php" method="post">
             <th>$lp</th>
             <th>$value->dateFull</th>
             <th>$value->command</th>
             <input type="hidden" name="lineToRemove" value=$lp>
             <th><input type="submit" value="remove"></th>
             </tr>
         </form>

     HTML;
    $lp++;
}

?>


<tr>
    <form action="add.php" method="post">
        <th><?= $lp ?></th>
        <th><input type="time" name="date" value="13:30"></th>
        <th><input type="command" name="command" value="polecenie"></th>
        <th><input type="submit" value="Submit"></th>
    </form>
</tr>
</table>



