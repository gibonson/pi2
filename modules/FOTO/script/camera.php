<?PHP
echo $module = $_GET['module'];
echo $comand = "sudo raspistill -o /home/pi/www/modules/".$module."/cameraTestFile.jpg";
exec($comand);
header("Location: ../../../index.php");