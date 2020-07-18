<?php

namespace main;
require 'form/EditModuleForm.php';


class showModule
{
    /**
     * showModule constructor.
     * @param $mainDir
     * @param $moduleDir
     */
    public function __construct(string $mainDir, string $moduleDir)
    {
        $module = new Module($mainDir, $moduleDir);
        if ($module->getBoxName() !== null) {
            $moduleName = $module->getModuleName();
            $boxName = $module->getBoxName();
            $boxBackground = $module->getBoxBackground();
            $boxContentPath = $module->getBoxContentPath();
            $scriptName = $module->getScriptName();
            $scriptContentPath = $module->getScriptContentPath();

            echo '' ?>
            <div class="box">
                <img class="back" src="<?= $boxBackground ?>" alt="no back">
                <div class="text">
                    <div class="title"><?= str_replace(".php", "", $module->getBoxName()) ?></div>
                    <?PHP include $module->getBoxContentPath(); ?>
                    <?PHP
                    new EditModuleForm($moduleName, $boxName, $boxContentPath, $scriptName, $scriptContentPath, $boxBackground);
                    ?>
                </div>
            </div>
            <?php
        }
    }
}