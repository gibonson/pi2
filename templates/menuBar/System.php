<li><img src="webResources/icon/icon-RPi-Logo.png" style="width:40px;height:40px;">
    <ul>

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
        ?>

        <li><a href="777"><img src="webResources/icon/icon-777.png"
                               style="width:40px;height:40px; -webkit-filter: invert(1);"></a></li>
        <li><a href="#">OS: <?= PHP_OS ?></a></li>
        <li><a href="#">PHP version: <?= PHP_VERSION ?></a></li>
        <li><a href="#">mainDir: <?= __DIR__ ?></a></li>
        <li><a href="#">User Services: <?= __DIR__ ?></a></li>
    </ul>
</li>