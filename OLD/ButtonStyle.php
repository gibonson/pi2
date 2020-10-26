<?php

namespace main;


class ButtonStyle
{
    public $buttonAdd;

    public function __construct(string $style)
    {
        if ($style != "button") {
            $status = shell_exec('gpio -g read 20');
            if ($status == 0) {
                $this->buttonAdd = "button\" style=\"background-color: #AF4C4C ";
            } else{
                $this->buttonAdd = "button";
            }
        } else {
            $this->buttonAdd = "button";
        }

    }
}