<?php

namespace main;


class FileOperation
{
    public function createDir($mainDir, $moduleName, $boxBackground): string
    {
        $fullPath = $mainDir . "/modules/" . $moduleName;
        $permissionCommand = "sudo chmod -R 777 " . $fullPath;

        if (!file_exists($fullPath)) {
            if (mkdir($fullPath, 0777, true)) {
                exec($permissionCommand);
                return "ok";
            } else {
                return "fail";
            }
        } else {
            $oldFullPath = $fullPath . "-old-" . microtime(true);
            if (rename($fullPath, $oldFullPath)) {
                if (mkdir($fullPath, 0777, true)) {
                    exec($permissionCommand);
                    if (!copy($oldFullPath . "/" . $boxBackground, $fullPath . "/" . $boxBackground)) {
                        echo $boxBackground;
                        echo "failed to copy $oldFullPath - > $fullPath...\n";
                    }
                    return "ok";
                } else {
                    return "fail";
                }
            } else {
                return "fail";
            }
        }
    }


    public function createBox($mainDir, $moduleName, $boxName, $boxContent): string
    {
        $fullPath = $mainDir . "/modules/" . $moduleName;
        $permissionCommand = "sudo chmod -R 777 " . $fullPath;

        $boxFile = fopen($mainDir . "/modules/" . $moduleName . "/" . $boxName, "w") or die("Unable to open file!");
        fwrite($boxFile, $boxContent);
        fclose($boxFile);

        exec($permissionCommand);
        return "ok";
    }

    public function createScript($mainDir, $moduleName, $scriptName, $scriptContent): string
    {
        $fullPath = $mainDir . "/modules/" . $moduleName;
        $permissionCommand = "sudo chmod -R 777 " . $fullPath;

        mkdir($mainDir . "/modules/" . $moduleName . "/script/", 0777, true);
        $scriptFile = fopen($mainDir . "/modules/" . $moduleName . "/script/" . $scriptName, "w") or die("Unable to open file!");
        fwrite($scriptFile, $scriptContent);
        fclose($scriptFile);

        exec($permissionCommand);
        return "ok";
    }


}