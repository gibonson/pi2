<?php

namespace main;

class showService
{
    public function __construct(string $servisName, string $boxName, string $boxContentPath, string $iotLibraries, string $boxBackground, string $serviseType)
    {
        echo '' ?>
        <div class="box">
            <img class="back" src="img/<?= $boxBackground ?>" alt=no back">
            <div class="text">
                <div class="title"><?= str_replace(".php", "", $boxName) ?></div>
                <?PHP include $boxContentPath; ?>
                <?PHP
                if($serviseType == "user"){
                    new AddEditServiceForm($servisName, $boxName, $boxContentPath, $iotLibraries, $boxBackground, "Edit");
                }
                ?>
            </div>
        </div>
        <?php
    }
}
