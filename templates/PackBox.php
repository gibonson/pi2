<?php


namespace templates;


class PackBox
{

    public
    function __construct(string $boxName, string $boxContent, string $boxBackground)
    {
        $boxNameShort = str_replace(".json", "", $boxName);
        echo '' ?>
        <div class="box">
            <img class="back" src="userFiles/img/<?= $boxBackground ?>" alt=no back">
            <div class="text">
                <div class="title"><?= $boxNameShort ?></div>
                <form action="packController" method="post">
                    <input type="submit" name="form" value="<?= $boxName ?>">
                </form>
                <?= $boxContent ?>
                <?php
                ?>
            </div>
        </div>
        <?php
    }


}
