<?php


namespace main;


class AddEditJsonToForm
{

    public function __construct(string $addOrEdit, string $name)
    {
        if ($addOrEdit == "edit") {
            $file = file_get_contents("userFiles/jsonBoxes/" . $name . ".json", "r");
            self::editJson();
            Json($name, $file);
        }
        if ($addOrEdit == "add") {
            $file = file_get_contents("iotLibraries/" . $name . "/" . $name . ".json", "r");
            self::addNewJson($name, $file);
        }


    }

    public function addNewJson($name, $file)
    {
        new AddNewJson($name, $file);
    }

    public function editJson($name, $file)
    {

        echo $file;
    }


}