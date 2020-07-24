<?php
?>
<form action="" method="get">
    <button class="button" style="
    <?PHP
    $status = shell_exec('gpio -g read 18');
    if ($status == 0) {
        echo "background-color: #AF4C4C ";
    }

    ?>
            " type="submit">DELAY SWITCH No1</button>
    <br><br>
    <label for="delay">delay time[s]</label>
    <input type="number" name=delay value="0"/>
</form>
włącza/wyłącza jeden z przekaźników na podany czas
