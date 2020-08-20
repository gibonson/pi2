<?php

namespace main;

class AddEditServiceFormStep2
{
    public function __construct($ServiceName, $boxName, $boxContent, $fileIotLibraries, $fileBackground)
    {
        $addEditServie = new AddEditService();
        $addEditServie->addService($ServiceName, $boxName, $boxContent, $fileIotLibraries, $fileBackground);
    }
}

