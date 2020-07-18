<?PHP
$line1 = $_GET['alarm'];
$line2 = $_GET['komunikat'];

$command = "sudo python ../../../externalLibraries/lcd/alarm_clock.py " . $line1 . " " . $line2;

echo $command;
exec($command);

header("Location: ../../../index.php");
                                        
            
            