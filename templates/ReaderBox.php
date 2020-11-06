<?php


namespace templates;


class ReaderBox
{

    public
    function __construct(string $boxName, string $boxContent, string $boxBackground, array $results, array $parameters)
    {

        $boxName = str_replace(".json", "", $boxName);
        echo '' ?>
        <div class="box">
            <img class="back" src="userFiles/img/<?= $boxBackground ?>" alt=no back">
            <div class="text">
                <div class="title"><?= $boxName ?></div>
                <?php
                $unit = "";
                foreach ($results as $name => $value) {
                    foreach ($parameters as $nameParameter => $valueParameter) {
                        if ($nameParameter == $name) {
                            $unit = $valueParameter;
                        }
                    }
                    echo $name . " -> " . $value . $unit . "<br>";
                }
                echo "<br>" . $boxContent ?>
            </div>
        </div>
        <?php
    }

}