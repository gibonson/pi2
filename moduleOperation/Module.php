<?php

namespace main;

class Module
{
    public $moduleDir;
    public $moduleName;
    public $boxName;
    public $boxContent;

    public $scriptName;
    public $scriptContentPath;

    public $otherFiles;
    public $boxBackground;

    /**
     * Module constructor.
     * @param $module
     * @param $mainDir
     */
    public function __construct($mainDir, $module)
    {


        self::setModuleName($module);
        $moduleDir = $mainDir . "/modules/" . $module;

        $moduleFileList = scandir($moduleDir);
        if (($key = array_search('.', $moduleFileList)) !== false) {
            unset($moduleFileList[$key]);
        }
        if (($key = array_search('..', $moduleFileList)) !== false) {
            unset($moduleFileList[$key]);
        }

        self::setBoxBackground("noImage");
        foreach ($moduleFileList as $file) {
            if (strpos($file, 'html')) {
                self::setBoxName($file);
                self::setBoxContentPath("modules/" . $module . "/" . $file);
            }
            if (strpos($file, 'php')) {
                self::setBoxName($file);
                self::setBoxContentPath("modules/" . $module . "/" . $file);
            }
            if (strpos($file, "jpg")) {
                self::setBoxBackground("modules/" . $module . "/" . $file);
            }
        }

        $scriptDir = $moduleDir . "/script";
        $scriptFileList = scandir($scriptDir);
        if (($key = array_search('.', $scriptFileList)) !== false) {
            unset($scriptFileList[$key]);
        }
        if (($key = array_search('..', $scriptFileList)) !== false) {
            unset($scriptFileList[$key]);
        }
        foreach ($scriptFileList as $scriptfile) {
            self::setScriptName($scriptfile);
            self::setScriptContentPath("modules/" . $module . "/script/" . $scriptfile);
        }
    }

    /**
     * @return mixed
     */
    public function getModuleName()
    {
        return $this->moduleName;
    }

    /**
     * @param mixed $module
     */
    public function setModuleName($module): void
    {
        $this->moduleName = $module;
    }


    /**
     * @return mixed
     */
    public function getModuleDir()
    {
        return $this->moduleDir;
    }

    /**
     * @param mixed $moduleDir
     */
    public function setModuleDir($moduleDir): void
    {
        $this->moduleDir = $moduleDir;
    }

    /**
     * @return mixed
     */
    public function getBoxName()
    {
        return $this->boxName;
    }

    /**
     * @param mixed $boxName
     */
    public function setBoxName($boxName): void
    {
        $this->boxName = $boxName;
    }

    /**
     * @return mixed
     */
    public function getBoxContentPath()
    {
        return $this->boxContent;
    }

    /**
     * @param mixed $boxContent
     */
    public function setBoxContentPath($boxContent): void
    {
        $this->boxContent = $boxContent;
    }

    /**
     * @return mixed
     */
    public function getScriptName()
    {
        return $this->scriptName;
    }

    /**
     * @param mixed $scriptName
     */
    public function setScriptName($scriptName): void
    {
        $this->scriptName = $scriptName;
    }

    /**
     * @return mixed
     */
    public function getScriptContentPath()
    {
        return $this->scriptContentPath;
    }

    /**
     * @param mixed $scriptContentPath
     */
    public function setScriptContentPath($scriptContentPath): void
    {
        $this->scriptContentPath = $scriptContentPath;
    }

    /**
     * @return mixed
     */
    public function getOtherFiles()
    {
        return $this->otherFiles;
    }

    /**
     * @param mixed $otherFiles
     */
    public function setOtherFiles($otherFiles): void
    {
        $this->otherFiles = $otherFiles;
    }

    /**
     * @return mixed
     */
    public function getBoxBackground()
    {
        return $this->boxBackground;
    }

    /**
     * @param mixed $boxBackground
     */
    public function setBoxBackground($boxBackground): void
    {
        $this->boxBackground = $boxBackground;
    }


}