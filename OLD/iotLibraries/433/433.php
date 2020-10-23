<?PHP

$code = $_POST['socket'];

$command = "sudo ./iotLibraries/433/codesend ".$code;
echo $command;
exec($command);

header("Location: index");