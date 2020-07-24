<?php
namespace main;

class FileScan
{
    public static $fileList;

    public function __construct(string $dir)
    {
        $fileList = scandir($dir);
        if (($key = array_search('.', $fileList)) !== false) {
            unset($fileList[$key]);
        }
        if (($key = array_search('..', $fileList)) !== false) {
            unset($fileList[$key]);
        }
        self::$fileList = $fileList;
    }

    /**
     * @return array|false
     */
    public static function getFileList()
    {
        return self::$fileList;
    }


}