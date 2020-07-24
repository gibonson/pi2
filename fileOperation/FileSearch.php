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
     * @return array|false
     */
    public static function getFinalList()
    {
        return self::$finalList;
    }
}
