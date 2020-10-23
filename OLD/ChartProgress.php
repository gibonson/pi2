<?php

namespace main;

class ChartProgress
{
    public function getTemplate($nazwa, $jednostka, $value)
    {
        $value = ceil($value);
        return <<<HTML
 <label for="file">$nazwa: </label>
 <strong>$value $jednostka</strong>
  <br>
    <progress id="file" value="$value" max="100"> $value $jednostka </progress> 
 <br>
HTML;
    }
}