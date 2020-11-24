<?php


namespace templates;


class LogicBox
{

    public
    function __construct($jsonFile)
    {
        $boxName = $jsonFile["fileName"];
        $boxContent = $jsonFile["description"];
        $boxBackground = $jsonFile["boxBackground"];

        $boxName = str_replace(".json", "", $boxName);
        echo '' ?>
        <div class="box">
            <img class="back" src="userFiles/img/<?= $boxBackground ?>" alt=no back">
            <div class="text">
                <div class="title"><?= $boxName ?></div>
                <form action="logicController" method="post">
                    <input type="submit" name="form" value="<?= $boxName ?>">
                </form>
                <?= $boxContent ?>
            </div>
        </div>
        <?php
    }

}