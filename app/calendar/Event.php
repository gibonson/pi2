<?php

namespace app\calendar;

class Event
{
    public $eventsList;
    public $readerList;
    public $logicList;

    /**
     * Event constructor.
     * @param $eventsList
     * @param $readerList
     * @param $logicList
     */
    public function __construct($eventsList, $readerList, $logicList)
    {
        $this->eventsList = $eventsList;
        $this->readerList = $readerList;
        $this->logicList = $logicList;
    }

    /**
     * @return mixed
     */
    public function getEventsList()
    {
        return $this->eventsList;
    }

    /**
     * @param mixed $eventsList
     */
    public function setEventsList($eventsList): void
    {
        $this->eventsList = $eventsList;
    }

    /**
     * @return mixed
     */
    public function getReaderList()
    {
        return $this->readerList;
    }

    /**
     * @param mixed $readerList
     */
    public function setReaderList($readerList): void
    {
        $this->readerList = $readerList;
    }

    /**
     * @return mixed
     */
    public function getLogicList()
    {
        return $this->logicList;
    }

    /**
     * @param mixed $logicList
     */
    public function setLogicList($logicList): void
    {
        $this->logicList = $logicList;
    }



}