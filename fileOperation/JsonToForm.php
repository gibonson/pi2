<?php


namespace main;

require "templates/ButtonStyle.php";


class JsonToForm
{
    public function __construct(string $jsonFileName)
    {


        $box = file_get_contents("userFiles/jsonBoxes/" . $jsonFileName, "r");
        $box = json_decode($box, true);

        $boxName = $box["boxname"];
        $boxBackground = $box["wallpaper"];
        $text = $box["text"];
        $iotLibraries = $box["iotLib"];

        $buttonAdd = new ButtonStyle($box["form"]["buttonClass"]);
        $buttonClass = $buttonAdd->buttonAdd;


        $buttonText = $box["form"]["buttonText"];
        $servisName = "test";
        $ContentPath = "";

        if (isset($box["form"])) {
            $action = $box["form"]["action"];
            $method = $box["form"]["method"];

            $ContentPath = $ContentPath . '<form action="' . $action . '" method="' . $method . '"> ';
            $ContentPath = $ContentPath . '<button class="' . $buttonClass . '" type="submit">' . $buttonText . '</button><br>';
            if (isset($box["form"]["input"])) {
                foreach ($box["form"]["input"] as $key => $value) {
                    $label = "";
                    if (isset($value["label"])) {
                        $label = '<label for=' . $value["name"] . '>' . $value["label"] . '</label>';
                    }
                    $ContentPath = $ContentPath .
                        $label .
                        '<input type="' . $value["type"] . '" name="' . $value["name"] . '" value="' . $value["value"] . '">';
                    if ($value["type"] != "hidden") {
                        $ContentPath = $ContentPath . "<br>";
                    }
                }
            }
            if (isset($box["form"]["select"])) {
                $ContentPath = $ContentPath . '<select id="' . $box["form"]["selectId"] . '" name="' . $box["form"]["selectName"] . '"> ';
                foreach ($box["form"]["select"] as $key => $value) {

                    $ContentPath = $ContentPath .
                        '<option value=' . $value["value"] . '>' . $value["optionText"] . '</option>';
                }

                $ContentPath = $ContentPath . '</select>';
            }
            $ContentPath = $ContentPath . "</form>";
            $ContentPath = $ContentPath . $text;
        }
        new ShowService($servisName, $boxName, $ContentPath, $iotLibraries, $boxBackground);
    }
}

?>
