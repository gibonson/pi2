<?php
$command = " pgrep php";
$cronRun = "php -f /home/pi/www/calendar/cronPi.php > /dev/null 2>/dev/null &";
$output = shell_exec($command);

echo "PID skryptu, który ma w nazwie PHP: " . $output . "<br>";

if ($output == null) {
    echo "Uruchamiam skrypt<br>";
    //shell_exec($cronRun);
    if ($output == null) {
        echo "blad uruchamiania";
    } else {
        echo "skrypt właśnie uruchomiony";
    }


} else {
    echo "skrypt był już uruchomiony";
}


//$output = explode("\n", $output);
//foreach ($output as $line) {
//    echo $line . "<br>";
//}


//if (strpos($output, "php -f /home/pi/www/calendar/cronPi.php")) {
//    echo "skrypt uruchomiony";
//
//} else {
//    shell_exec($cronRun);
//
//    echo "uruchom skrypt";
//}


/*    <form action="modules/<?= $module->getModuleName() ?>/script/<?= $module->getScriptName() ?>">*/
/*        <input type="hidden" name=pid value="<?= $output ?>>"/><br>*/
//        <input type="hidden" name=kill value="true>>"/><br>
//        <button class="button" type="submit">KILL</button>
//    </form>
//
/*    <form action="modules/<?= $module->getModuleName() ?>/script/<?= $module->getScriptName() ?>">*/
/*        <input type="hidden" name=run value="<?= $command ?>>"/><br>*/
//        <input type="hidden" name=kill value="false>>"/><br>
//        <button class="button" type="submit">KILL</button>
//    </form>



