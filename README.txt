├── calendar
│   ├── CalendarOperation.php
│   ├── CronPi.php
│   ├── Event.php
│   ├── ShowCalendar.php
│   ├── StartCalendar.php
│   └── StopCalendar.php
├── dataBase
│   ├── AddData.php
│   ├── DataBaseConn.php
│   ├── DataBaseTest.php
│   ├── DataBaseToChart.php
│   └── IotDeviceList.php
├── fileOperation
│   ├── AddEditJsonBox.php
│   ├── Chmod777.php
│   ├── FileScan.php
│   ├── FileSearch.php
│   ├── JsonToForm.php
│   └── SaveJson.php
├── iotLibraries
├── menuBar
├── templates
│   ├── 404.php
│   ├── ButtonStyle.php
│   ├── Chart.php
│   ├── ChartProgress.php
│   ├── footer.php
│   ├── form
│   │   ├── AddNewJson.php
│   │   └── AddNewJsonStep2.php
│   └── ShowService.php
├── userFiles
│   ├── calendarEvent.json
│   ├── calendar.json
│   ├── img
│   └── jsonBoxes
├── webResources
│   ├── background - ok
│   ├── css - poprawić
│   └── icon - zmienić wielkość ikon
├── .htaccess - ok
├── config.php - ok
├── index.php - poukładać
├── main.php - poukładać namespace
├── README.txt - ten plik
└── Router.php - ok


-----------------------------
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