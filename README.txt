sudo pkill php
ps ax | grep 'php -f /home/pi/www/calendar/cronPi.php'


tail -f /var/log/apache2/error.log

php -f /home/pi/www/calendar/cronPi.php

sciągawka dla mnie:)
exec('sudo python lcd/lcd_input.py dupa blada');


.htaccess nadpisanie
$ sudo nano /etc/apache2/apache2.conf
edytujemy  - AllowOverride None

dodanie sudo do grupy www-data
sudo addgroup www-data
sudo visudo and add
#includedir /etc/sudoers.d
%www-data  ALL=(ALL:ALL) NOPASSWD:ALL


2020-07-29- poprawioni dziłanie DHT wstawienie wartości do zmiennej $_SESSION
2020-08-11 dodano routing