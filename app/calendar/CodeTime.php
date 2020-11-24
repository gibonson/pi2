<?php


namespace app\calendar;


class CodeTime
{
    public $codeTime;

    public function __construct($time)
    {
        $codeTime = explode(":", $time);
        $codeTime = $codeTime[0] * 60 + $codeTime[1];
        self::setCodeTime($codeTime);
    }

    /**
     * @return mixed
     */
    public function getCodeTime()
    {
        return $this->codeTime;
    }

    /**
     * @param mixed $codeTime
     */
    public function setCodeTime($codeTime): void
    {
        $this->codeTime = $codeTime;
    }


}