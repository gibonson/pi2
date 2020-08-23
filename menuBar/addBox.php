<?php


use main\AddEditJsonToForm;
use main\FileScan;

echo '<li><a><img src="webResources/icon/icon-add.png" style="width:40px;height:40px;"></a>';
$iotDirList = new FileScan(DIR_IOTLIB);
echo "<ul>";
foreach ($iotDirList->getFileList() as $iotLib) {
    echo '<li>';
    $addNewBox = new AddEditJsonToForm("add", $iotLib);
//    echo $iotLib;
    echo '</li>';
}
echo "</ul>";
echo "</li>";