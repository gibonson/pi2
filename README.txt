css - wiadomo
externalLibraries - folder z bibliotekami zewnętrznymi
form - formularze
img - obrazki
js - aktualnie jeden skrypt do generowania wykresów
modules - pliki modułów użytkownika



sudo pkill php
ps ax | grep 'php -f /home/pi/www/calendar/cronPi.php'


 tail -f /var/log/apache2/error.log

php -f /home/pi/www/calendar/cronPi.php

<?php
$homepage = file_get_contents('');
echo $homepage;
?>




sciągawka dla mnie:)

exec('sudo python lcd/lcd_input.py dupa blada');
sudo addgroup www-data
sudo visudo and add
#includedir /etc/sudoers.d
%www-data  ALL=(ALL:ALL) NOPASSWD:ALL