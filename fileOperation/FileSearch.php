<?php
namespace main;


class FileSearch
{
    public static $finalList;

    public function __construct(string $location, array $extensionList)
    {
        $finalList = [];
        $listOfAllFiles = scandir($location);
        foreach ($listOfAllFiles as $file) {
            foreach ($extensionList as $extension) {
                if (strpos($file, "." . $extension)) {
                    array_push($finalList, $file);
                }
            }
        }
        self::$finalList = $finalList;
    }

    /**
     * @return array
     */
    public static function getFinalList(): array
    {
        return self::$finalList;
    }



}

?>

<!--$mainDir = $mainDir . "/modules";-->
<!--$this->mainDir = $mainDir;-->
<!--$moduleList = scandir($mainDir);-->
<!--if (($key = array_search('.', $moduleList)) !== false) {-->
<!--    unset($moduleList[$key]);-->
<!--}-->
<!--if (($key = array_search('..', $moduleList)) !== false) {-->
<!--    unset($moduleList[$key]);-->
<!--}-->
<!--//print_r($moduleList);-->
<!--self::$list = $moduleList;-->
<!--}-->

