<?php

namespace calendar;

require "Event.php";

new ShowCalendar();

class ShowCalendar
{

    public function __construct()
    {
        $myfile = file_get_contents("calendar.json");

        $myJSON = json_decode($myfile, true);

        echo "<table border='1'>";
        echo "<tr>
              <th>LP</th>
              <th>date</th>
              <th>command</th>
              <th>codeTime</th>
              <th>function</th>
              </tr>";
        $lp = 1;
        foreach ($myJSON as $key => $value) {


            $time = $value["time"];
            $command = $value["command"];
            $event = new Event($time, $command);
            $codeTime = $event->getCodeTime();

            echo <<<HTML
                 <tr>
                    <th>$lp</th>
                    <th>$time</th>
                    <th>$command</th>
                    <th>$codeTime</th>
                    <form action="CalendarOperation.php" method="post">
                         <input type="hidden" name="time" value=$time>
                         <input type="hidden" name="command" value=$command>
                         <input type="hidden" name="operation" value=remove>
                         <th><input type="submit" value="remove"></th>
                    </form>
                 </tr>
                 HTML;
            $lp++;
        }
        echo <<<HTML
                <tr>
                    <form action="CalendarOperation.php" method="post">
                    <th><?= $lp ?></th>
                    <th><input type="time" name="time" value="13:30"></th>
                    <th><input type="command" name="command" value="polecenie"></th>
                    <input type="hidden" name="operation" value=add>
                    <th><input type="submit" value="Add"></th>
                    </form>
                </tr>
            </table>
HTML;

    }
}