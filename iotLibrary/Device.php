<?php

namespace iotLib;

abstract class Device
{
    public $name;
    public $fullName;
    public $id;
    public $protocol;
    public $executiveArray; // name => parameter

    /**
     * Device constructor.
     * @param $name
     * @param $fullName
     * @param $id
     * @param $executiveArray
     */
    public function __construct($name, $fullName, $id, $executiveArray = null)
    {
        $this->name = $name;
        $this->fullName = $fullName;
        $this->id = $id;
        $this->executiveArray = $executiveArray;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName): void
    {
        $this->fullName = $fullName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


    /**
     * @return null
     */
    public function getExecutiveArray()
    {
        return $this->executiveArray;
    }

    /**
     * @param null $executiveArray
     */
    public function setExecutiveArray($executiveArray): void
    {
        $this->executiveArray = $executiveArray;
    }


}