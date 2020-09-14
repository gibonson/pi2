<?php


use main\FileScan;

echo '<li><a><img src="webResources/icon/icon-add.png" style="width:40px;height:40px;"></a>';
$iotDirList = new FileScan(DIR_IOTLIB);
echo "<ul>";
foreach ($iotDirList->getFileList() as $iotLib) {
    echo '<li>';
    $addNewBox = new \main\AddEditJsonBox("add", $iotLib);
    echo '</li>';
}
echo "</ul>";
echo "</li>";