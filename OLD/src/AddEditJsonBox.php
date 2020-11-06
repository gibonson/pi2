<?php


namespace main;


class AddEditJsonBox
{

    public function __construct(string $addOrEdit, string $name)
    {
        if ($addOrEdit == "edit") {

            $file = "userFiles/jsonBoxes/" . $name;
            self::editJson($name, $file);
        }
        if ($addOrEdit == "add") {
            $file = "iotLibraries/" . $name . "/" . $name . "13.json";
            self::addNewJson($name, $file);
        }
    }

    public function addNewJson($name, $file)
    {
        new AddNewJson($name, $file);
    }

    public function editJson($name, $file)
    {
        $edit = true;
        new AddNewJson($name, $file, $edit);
    }


}