<?PHP
include "config.php";

if (isset($_POST['alarm'])) {
    $line1 = $_POST['alarm'];
    $line2 = $_POST['komunikat'];
    $command = "sudo python " . DIR_IOTLIB . "/LCD/alarm_clock.py " . $line1 . " " . $line2;
}


if (isset($_POST['line1'])) {
    $line1 = $_POST['line1'];
    $line2 = $_POST['line2'];

    $line1 = str_replace(" ", "_", $line1);
    $line2 = str_replace(" ", "_", $line2);
    $command = "sudo python " . DIR_IOTLIB . "/LCD/lcd_input.py " . $line1 . " " . $line2;
}
echo $command;
exec($command);

header("Location: index");