<?php


use main\DataBaseTest;

?>
<li>
    <?php echo new DataBaseTest(); ?>
    <ul>
        <li>
            <form action="index" method="post">
                <input type="hidden" name="indexSwitch" value="showIotDeviceList">
                <!--            <input type="submit" value="show">-->
                <a type="submit" onclick="this.closest('form').submit();return false;" style="cursor:pointer">Iot
                    device</a>
            </form>
        </li>
    </ul>
</li>



