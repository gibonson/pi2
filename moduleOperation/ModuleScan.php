<?php

namespace main;

class ModuleScan
{
    public static $list;
    public $mainDir;

    /**
     * ModuleScan constructor.
     * @param $mainDir
     */
    public function __construct($mainDir)
    {
        $mainDir = $mainDir."/modules";
        $this->mainDir = $mainDir;
        $moduleList = scandir($mainDir);
        if (($key = array_search('.', $moduleList)) !== false) {
            unset($moduleList[$key]);
        }
        if (($key = array_search('..', $moduleList)) !== false) {
            unset($moduleList[$key]);
        }
        //print_r($moduleList);
        self::$list = $moduleList;
    }


}