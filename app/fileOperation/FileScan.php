<?php

namespace File;

class FileScan
{
    public $allFileList = [];
    public $searchFileList = [];

    public function __construct(string $dir, string $fileName = null, bool $extension = null)
    {
        $fileList = scandir($dir);
        if (($key = array_search('.', $fileList)) !== false) {
            unset($fileList[$key]);
        }
        if (($key = array_search('..', $fileList)) !== false) {
            unset($fileList[$key]);
        }
        self::setAllFileList($fileList);


        if (isset($extension) || $extension == true) {
            $fileName = "." . $fileName;
        }
        if (isset($fileName)) {
            $searchFileList = [];
            foreach (self::getAllFileList() as $file) {
                if (strpos($file, $fileName)) {
//                    echo "jest";
                    array_push($searchFileList, $file);
                }

            }
            self::setSearchFileList($searchFileList);
        }

    }

    /**
     * @param array $allFileList
     */
    public function setAllFileList(array $allFileList): void
    {
        $this->allFileList = $allFileList;
    }

    /**
     * @param array $searchFileList
     */
    public function setSearchFileList(array $searchFileList): void
    {
        $this->searchFileList = $searchFileList;
    }


    /**
     * @return array
     */
    public function getAllFileList(): array
    {
        return $this->allFileList;
    }



    /**
     * @return array
     */
    public function getSearchFileList(): array
    {
        return $this->searchFileList;
    }
}
