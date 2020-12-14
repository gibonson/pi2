<?php


namespace app;

use iotLib\CPUTemp\MainLib as CpuTemp;
use iotLib\DHT22\MainLib as DHT22;
use iotLib\GpioStatus\MainLib as GpioStatus;
use templates\ReaderBox;

require_once "iotLibrary/sensorDevice/CpuTemp/MainLib.php";
require_once "iotLibrary/sensorDevice/DHT22/MainLib.php";
require_once "iotLibrary/sensorDevice/GpioStatus/MainLib.php";
require_once "templates/ReaderBox.php";

class ReaderExe
{
    private $results;
    private $parameters;
    private $id;

    public function __construct(array $reader, bool $onlyValue = null)
    {

//        print_r($reader);
        $name = $reader["fileName"];
        $iotLib = $reader["iotLib"];


        if (!isset($onlyValue)) {
            $fullName = $reader["readerNameFull"];
            $id = $reader["readerID"];
        } else {
            $fullName = $reader["logicNameFull"];
            $id = $reader["logicID"];
        }
        $this->id = $id;

        $description = $reader["description"];
        $boxBackground = $reader["boxBackground"];
        $parameters = $reader["parameters"];
        $this->parameters = $parameters;
//        print_r($parameters);


        $results = [];

        switch ($iotLib) {
            case "iotLibrary/sensorDevice/CpuTemp":
                $exe = new CpuTemp($name, $fullName, $id, $parameters);
                $exe->setResults();
                $results = $exe->getResults();
                break;
            case "iotLibrary/sensorDevice/DHT22":
                $exe = new DHT22($name, $fullName, $id, $parameters);
                $exe->setResults();
                $results = $exe->getResults();
                break;
            case "iotLibrary/sensorDevice/GpioStatus":
                $exe = new GpioStatus($name, $fullName, $id, $parameters);
                $exe->setResults();
                $results = $exe->getResults();
                break;
        }

        if (!isset($onlyValue)) {
            new ReaderBox($name, $description, $boxBackground, $results, $parameters);
            $this->results = $results;
        } else {
            $this->results = $results;
        }
    }

    /**
     * @return array
     */
    public function getResults(): array
    {
        return $this->results;
    }


    /**
     * @return mixed
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    public function addToDataBase()
    {
        $conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSOWD, DATABASE_NAME);

        $id = self::getId();
        $results = self::getResults();
        $parameters = self::getParameters();

        foreach ($results as $type => $result) {
            $unit = $parameters["$type"];
            $sql = "INSERT INTO measurement (date, id_device, type, result, unit)
    VALUES(CURRENT_TIMESTAMP,'$id','$type','$result','$unit')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }


//        echo "addddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd";
//        $fileName = "test . json";
//        $output["timeStamp"] = "888";
//        $output["value"] = self::getResults();
//        $output["parameter"] = self::getParameters();
//        $output["id"] = self::getId();
//        $calendarJSON = json_encode($output);
//        echo $calendarJSON;
//        $fullPath = "userFiles / " . $fileName;
//        $myfile = fopen($fullPath, "w") or die("Unable to open file!");
//        fwrite($myfile, $calendarJSON);
//        fclose($myfile);
    }


}