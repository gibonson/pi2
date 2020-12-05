<?php

namespace templates;
require_once "config.php";

$conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSOWD, DATABASE_NAME);

if (!$conn) {
    $DBStatus = '<img class="img_menu" src="webResources/icon/icon-database-error.png" alt="failed" >';
//            echo "Connection failed: " . mysqli_connect_error();
} else {
    $DBStatus = ' <a href="sqlView"><img class="img_menu" src="webResources/icon/icon-database.png" alt="ok"></a>';
}
?>
<div class="subnav">
    <button class="subnavbtn"><?= $DBStatus ?></button>
</div>
