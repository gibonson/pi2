<?php


use main\DataBaseTest;

?>
<li>
    <?php echo new DataBaseTest(); ?>
    <ul>
        <form action="index" method="post">
            <input type="hidden" name="indexSwitch" value="showIotDeviceList">
            <input type="submit" value="show">
        </form>
    </ul>
</li>



