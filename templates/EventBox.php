<?php


namespace templates;


class EventBox
{
    public
    function __construct(string $boxName, string $boxContent, string $boxBackground)
    {
        $boxName = trim($boxName, ".json");
        echo '' ?>
        <div class="box">
            <img class="back" src="userFiles/img/<?= $boxBackground ?>" alt=no back">
            <div class="text">
                <div class="title"><?= $boxName ?></div>
                <form action="eventController" method="post">
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
