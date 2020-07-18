            <?PHP

$line1 = $_GET['line1'];
$line2 = $_GET['line2'];

$line1 = str_replace(" ","_",$line1);
$line2 = str_replace(" ","_",$line2);

$command = "sudo python ../../../iotLibraries/lcd/lcd_input.py ".$line1." ".$line2;
echo $command;
exec($command);

header("Location: ../../../index.php");
            