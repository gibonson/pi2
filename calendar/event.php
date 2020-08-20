<?php

namespace calendar;

class Event
{
    public $time;
    public $command;

    /**
     * Event constructor.
     * @param $time
     * @param $command
     */
    public function __construct($time, $command)
    {
        $this->time = $time;
        $this->command = $command;

    }

    public function getCodeTime()
    {
        $codeTime = explode(":", $this->time);
        $codeTime = $codeTime[0] * 60 + $codeTime[1];
        return $codeTime;
    }


    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time): void
    {
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * @param mixed $command
     */
    public function setCommand($command): void
    {
        $this->command = $command;
    }


}