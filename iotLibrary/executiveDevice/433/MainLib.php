<?PHP

namespace iotLib\Socket433;

use iotLib\ExecutiveDevice;

require_once "iotLibrary/ExecutiveDevice.php";

class MainLib extends ExecutiveDevice
{
    public function execute()
    {
        $executiveArray = self::getExecutiveArray(); // name => parameter
        foreach ($executiveArray as $name) {
            $commandGpioRead = "sudo ./iotLibraries/433/codesend " . $name;
            $status = shell_exec($commandGpioRead);
        }
    }
}