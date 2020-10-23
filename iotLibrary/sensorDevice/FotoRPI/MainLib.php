<?PHP

namespace iotLib\FotoRpi;

use iotLib\SensorDevice;

require_once "iotLibrary/SensorDevice.php";

class MainLib extends SensorDevice
{
    public function setResults()
    {
        $comand = "sudo raspistill -o /home/pi/www/userFiles/img/cameraTestFile.jpg";
        exec($comand);

        $result = [];
        $result["name"] = "fileName";
        $result["value"] = "fileName";
        $results = [];
        array_push($results, $result);


        $this->results = $results;

    }
}
