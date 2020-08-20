<?php

namespace main;

class showService
{
    public function __construct(string $servisName, string $boxName, string $boxContentPath, string $iotLibraries, string $boxBackground)
    {
        echo '' ?>
        <div class="box">
            <img class="back" src="userFiles/img/<?= $boxBackground ?>" alt=no back">
            <div class="text">
                <div class="title"><?= $boxName?></div>


                <?= $boxContentPath ?>
            </div>
        </div>
        <?php
    }
}
