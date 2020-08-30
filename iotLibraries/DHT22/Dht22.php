<?php

namespace main;
session_start();

require "/home/pi/www/dataBase/AddData.php";


if (isset($_POST["run"]) == "true") {
    new Dht22();
}


class Dht22
{

    public static $ID_DEVICE = 2;
    public static $DEVICE_DESCRIPTION = "DHT22 temperature";
    public $DHT_temp;

    public static $ID_DEVICE_2 = 3;
    public static $DEVICE_DESCRIPTION_2 = "DHT22 humidity";
    public $DHT_humid;

    public function __construct()
    {
        $cmd = "sudo python /home/pi/www/iotLibraries/DHT22/AdafruitDHT.py 22 4";
        echo $output = shell_exec($cmd);
        $DHT = explode(" ", $output);

        $DHT_temp = $DHT[0];
        $DHT_humid = $DHT[1];


        $DHT_temp = str_replace('temp=', '', $DHT_temp);
        $DHT_humid = str_replace('hum=', '', $DHT_humid);

        unset($_SESSION['DHT_temp']);

        echo $_SESSION['DHT_temp'] = $DHT_temp;
        echo $_SESSION['DHT_humid'] = $DHT_humid;
        self::setDHTTemp($DHT_temp);
        self::setDHTHumid($DHT_humid);
        header("Location: index");
    }

    /**
     * @param mixed $DHT_temp
     */
    public function setDHTTemp($DHT_temp): void
    {
        $this->DHT_temp = $DHT_temp;
    }

    /**
     * @param mixed $DHT_humid
     */
    public function setDHTHumid($DHT_humid): void
    {
        $this->DHT_humid = $DHT_humid;
    }

    /**
     * @return mixed
     */
    public function getDHTTemp()
    {
        return $this->DHT_temp;
    }

    /**
     * @return mixed
     */
    public function getDHTHumid()
    {
        return $this->DHT_humid;
    }

    public function addToDB()
    {
        new AddData(self::$ID_DEVICE, self::getDHTTemp());
        new AddData(self::$ID_DEVICE_2, self::getDHTHumid());
    }
}