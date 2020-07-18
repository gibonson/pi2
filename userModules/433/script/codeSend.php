<?PHP

$code = $_GET['socket'];
$line1 = str_replace(" ","_",$line1);

$command = "sudo ./../../../iotLibraries/433/codesend ".$code;
echo $command;
exec($command);

header("Location: ../../../index.php");