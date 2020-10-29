<?PHP

namespace iotLib\Socket433;

use app\log\LogAction;
use iotLib\ExecutiveDevice;

require_once "iotLibrary/ExecutiveDevice.php";
require_once "app/log/LogAction.php";

class MainLib extends ExecutiveDevice
{
    public function execute()
    {
        $log = new LogAction();


        $executiveArray = self::getExecutiveArray(); // name => parameter
        foreach ($executiveArray as $name => $value) {
            echo $value;
            $commandGpioRead = "sudo ./iotLibrary/executiveDevice/433/codesend " . $name;
            echo $status = shell_exec($commandGpioRead);
            $log->addLog($commandGpioRead);
        }
    }
}