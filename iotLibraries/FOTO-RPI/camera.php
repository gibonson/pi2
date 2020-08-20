<?PHP
echo $comand = "sudo raspistill -o /home/pi/www/userFiles/img/cameraTestFile.jpg";
exec($comand);
header("Location: index");