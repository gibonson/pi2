<?PHP

$code = $_POST['socket'];


$command = "sudo ./iotLibraries/443/codesend ".$code;
echo $command;
exec($command);

header("Location: index");