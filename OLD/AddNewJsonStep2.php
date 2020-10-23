<?php


namespace main;

class AddNewJsonStep2
{
    public function __construct()
    {
        $file = file_get_contents($_POST["file"], "r");
        $name = $_POST["name"];
        echo <<<HTML
         <div class="box" style="width: auto; height: auto; margin: 10px">
            <form action="SaveJson" method="post">
            <table style="width:95%; margin: 30px;">
                <tr>
                    <th>nazwa Serwisu(folder)</th>
                    <th><input type="text" style="width:95%" name="ServiceName" value="$name"/></th>
                </tr>
                <tr>
                    <th>zawartosc formularza</th>
                    <th><textarea rows="20" cols="75" name="boxContent"style="margin: 30px">$file</textarea></th>
                </tr>
                <tr>
                  <th colspan="2">
                  <button type="submit" name="indexSwitch"  value="AddNewJsonBox2" class="small_button">Save</button>
                  <button type="submit" name="indexSwitch"  value="" class="small_button">Exit</button>
                  </th>
                  </tr>
                  </table>
             </form>
         </div>
HTML;
    }
}