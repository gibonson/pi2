<?PHP

$code = $_GET['socket'];

$command = "sudo ./codesend ".$code;
echo $command;
exec($command);

header("Location: ../../index.php");