sudo pkill php
ps ax | grep 'php -f /home/pi/www/calendar/cronPi.php'
pgrep -fl aa.sh

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



https://medium.com/@anujdev11/communication-between-arduino-and-raspberry-pi-using-nrf24l01-818687f7f363