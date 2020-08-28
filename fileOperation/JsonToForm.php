<?php


namespace main;

require "templates/ButtonStyle.php";
require "iotLibraries/CpuTemp/CpuTemp.php";
require "iotLibraries/DHT22/Dht22.php";
require "templates/ChartTemplate.php";


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

        if (isset($box["form"]["buttonClass"])) {
            $buttonAdd = new ButtonStyle($box["form"]["buttonClass"]);
            $buttonClass = $buttonAdd->buttonAdd;
        }

        $buttonText = '';
        if (isset($box["form"]["buttonText"])) {
            $buttonText = $box["form"]["buttonText"];

        }


        $servisName = $jsonFileName;
        $boxContent = "";

        if (isset($box["form"])) {
            $action = $box["form"]["action"];
            $method = $box["form"]["method"];

            $boxContent = $boxContent . '<form action="' . $action . '" method="' . $method . '"> ';
            $boxContent = $boxContent . '<button class="' . $buttonClass . '" type="submit">' . $buttonText . '</button><br>';
            if (isset($box["form"]["input"])) {
                foreach ($box["form"]["input"] as $key => $value) {
                    $label = "";
                    if (isset($value["label"])) {
                        $label = '<label for=' . $value["name"] . '>' . $value["label"] . '</label>';
                    }
                    $boxContent = $boxContent .
                        $label .
                        '<input type="' . $value["type"] . '" name="' . $value["name"] . '" value="' . $value["value"] . '">';
                    if ($value["type"] != "hidden") {
                        $boxContent = $boxContent . "<br>";
                    }
                }
            }
            if (isset($box["form"]["select"])) {
                $boxContent = $boxContent . '<select id="' . $box["form"]["selectId"] . '" name="' . $box["form"]["selectName"] . '"> ';
                foreach ($box["form"]["select"] as $key => $value) {

                    $boxContent = $boxContent .
                        '<option value=' . $value["value"] . '>' . $value["optionText"] . '</option>';
                }

                $boxContent = $boxContent . '</select>';
            }
            $boxContent = $boxContent . "</form>";

        }

        if (isset($box["execute"])) {
            if ($box["execute"] == "CpuTemp()") {
                $cpuTemp = new CpuTemp();
                $template = new ChartTemplate();
                $boxContent = $boxContent . $template->getTemplate("temperatura", "&deg", $cpuTemp->getTemp());
            }
            if ($box["execute"] == "DHT22()") {
                $template = new ChartTemplate();
                $boxContent = $boxContent . $template->getTemplate("temperatura", "&deg", $_SESSION['DHT_temp']);
                $boxContent = $boxContent . $template->getTemplate("Wilgotnosc", "%", $_SESSION['DHT_humid']);
            }

        }
        $boxContent = $boxContent . $text;


        new ShowService($servisName, $boxName, $boxContent, $iotLibraries, $boxBackground);
    }
}

?>
