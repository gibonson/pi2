<?php

namespace main;


class AddEditServiceFormStep1
{

    public function __construct($ServiceName, $boxName, $iotLibraries, $boxBackground)
    {

        if ($iotLibraries == "") {
            new FileScan("/home/pi/www/iotLibraries");
            $fileIotLibraries = "";
            foreach (FileScan::getFileList() as $file) {
                $fileIotLibraries = $fileIotLibraries . '<option value="' . $file . '">' . $file . '</option>';
            }
        } else {
            $fileIotLibraries = '<option value="' . $iotLibraries . '">' . $iotLibraries . '</option>';
        }


        if ($boxBackground == "") {
            $type = ["jpg", "png"];
            new FileSearch('/home/pi/www/img', $type);

            $fileBackground = "";
            foreach (FileSearch::getFinalList() as $file) {
                $fileBackground = $fileBackground . '<option value="' . $file . '">' . $file . '</option>';
            }
        } else {
            $fileBackground = '<option value="' . $boxBackground . '">' . $boxBackground . '</option>';
        }

        $boxContent = "";
        $boxContentPath = "/home/pi/www/userServices/" . $ServiceName . "/" . $boxName;
        if (file_exists($boxContentPath)) {
            $file = fopen($boxContentPath, "r");
            while (!feof($file)) {
                $boxContent = $boxContent . fgets($file);
            }
            fclose($file);
        } else {
            $boxContent = "uzupełnij boxa";
        }


        echo <<<HTML
         <div class="box" style="width: auto; height: auto; margin: 10px">
            <form action="index.php" method="post">
            <table style="width:95%; margin: 30px;">
                <tr>
                    <th>nazwa Serwisu(folder)</th>
                    <th><input type="text" style="width:95%" name="ServiceName" value="$ServiceName"/></th>
                </tr>
                <tr>
                    <th>nazwa boxa</th>
                    <th><input type="text" style="width:95%" name="boxName" value="$boxName"/></th>
                </tr>
                <tr>
                    <th>zawartosc formularza</th>
                    <th><textarea rows="20" cols="75" name="boxContent"style="margin: 30px">$boxContent</textarea></th>
                </tr>
                <tr>
                    <th>docelowa biblioteka</th>
                    <th><select id="iotLibraries"  style="width:95%"  name="iotLibraries">$fileIotLibraries</select></th>
                </tr>
                <tr>
                    <th>tlo boxa</th>
                    <th><select id="iotLibraries"  style="width:95%"  name="boxBackground">$fileBackground</select></th>
                </tr>
                <tr>
                  <th colspan="2">
                  <input type="hidden" name="form" value="addFormStep2"/>
                  <button type="submit" class="small_button">Save</button>
                  </th>
             </form>
         </div>
         HTML;
    }
}