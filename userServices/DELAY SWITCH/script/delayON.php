<?php

//shell_exec('gpio -g mode 18 out');
echo $delay = $_GET['delay'];


$status = shell_exec('gpio -g read 18');
if($status == 0){
    shell_exec('gpio -g write 18 1');
    sleep ($delay);
    shell_exec('gpio -g write 18 0');
}
else{
    shell_exec('gpio -g write 18 0');
    sleep ($delay);
    shell_exec('gpio -g write 18 1');
}


header("Location: ../../../index.php");
?>

