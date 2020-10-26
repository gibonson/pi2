<?php


namespace templates\form;


class LogForm
{

    public $form;

    public function __construct($log)
    {
        $this->form =
            '
        <form action="logAction" method="post">
            <table>
                <tr>
                    <h1>LOGBOX</h1>
                </tr>
                <tr>
            <textarea name="log" rows="10" cols="50">' .
            $log . '
</textarea >
<br >
</tr >
<tr >
    <input type = "submit" name = "submit" value = "clear" >
</tr >
</table >
</form >';

    }

    public function generate()
    {
        return $this->form;
    }
}