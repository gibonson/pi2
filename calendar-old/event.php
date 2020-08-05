<?php

namespace calendar;

class event
{
    public $date;   //data w minutach od poczatku doby
    public $dateFull; //date("H:i:s");
    public $command;

    public function __construct($line)
    {

        $event = explode(">", $line);
        //echo $event[0] . "\n";
        //11:09
        $this->dateFull = $event[0];
        $event[0] = explode(":", $event[0]);
        //print_r($event[0]);
        $event[0] = $event[0][0] * 60 + $event[0][1];
        $this->date = $event[0];
        //echo $event[0] . "\n";

        //echo $event[1] . "\n";
        $this->command = $event[1];
    }

    /**
     * @return float|int|mixed
     */
    public function getDateFull()
    {
        return $this->dateFull;
    }

    /**
     * @param float|int|mixed $dateFull
     */
    public function setDateFull($dateFull): void
    {
        $this->dateFull = $dateFull;
    }

    /**
     * @return float|int|mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param float|int|mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getCommand(): string
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
